<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends CI_Controller {

	private $appid = 'appid';
	private $secretid = 'secretid';
	private $mch_id = 'mchid';
	private $key = 'key';
	/* 用户唯一标识openid
	**　string(28)
	*/ 
	private $openid = '';

	public function __construct()
	{
		parent::__construct();
		//读取
		$this->load->helper('auth');
		$this->openid = check_openid();
	}
	/*	微信回调接口
	**	
	**
	*/
	public function notif()
	{
		//读取
		$this->load->model('Order_model');
		$this->load->helper('pay');
		$getXML = file_get_contents("php://input");
		$getData = match_notif_response($getXML);
		if($getData['code'] == 'SUCCESS' && $getData['orderid']){
			$orderid = $getData['orderid'];
			//查询系统订单
			$order = $this->Order_model->get_order_by_orderid($orderid);
			if(!$order){
				echo 'fail';
			}
			//查询微信接口订单
			$result = $this->queryOrder($orderid);
			if($result['state'] == 'SUCCESS'){
				$sys_result = $this->Order_model->set_paystatus_by_orderid($orderid);
				if($sys_result)
					echo 'SUCCESS';
				else
					echo 'FAIL';
			} else{
				echo $result['state'];
			}
		} else{
			echo $getData['code'];
		}
	}
	/*	生成签名对外接口
	*	@param POST数据,appid,timeStamp,nonceStr,package,signType
	*	@return sign(string)
	*/
	public function signApi()
	{
		//读取
		$this->load->library('form_validation');
		$this->form_validation->set_rules('appId', '公众号id', 'required|regex_match[/wxe083120fa3df05d0/]');
		$this->form_validation->set_rules('timeStamp', '时间戳', 'required|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('nonceStr', '随机字符串', 'required|min_length[32]|max_length[32]');
		$this->form_validation->set_rules('package', '订单详情扩展字符串', 'required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('signType', '签名方式', 'required|regex_match[/MD5/]');
		if($this->form_validation->run() != false){
			$sign = $this->createSign($this->input->post(null , true));
			$data = array('message' => '生成成功' , 'status' => 1 , 'sign' => $sign);
			header('Content-type:text/json');
			echo json_encode($data);
		} else{
			if(validation_errors()){
				$data = array('message' => validation_errors() , 'status' => 0 , 'sign' => null);
				header('Content-type:text/json');
				echo json_encode($data);
			} else{
				$data = array('message' => '请使用POST提交表单' , 'status' => 0 , 'sign' => null);
				header('Content-type:text/json');
				echo json_encode($data);
			}
		}
	}
	/*	对外支付接口
	*	@param orderid
	*	@return jsondata
	*/
	public function jsApiPay($orderid = '')
	{
		//读取
		$this->load->model('Order_model');
		$this->load->helper('order');
		//获取订单信息
		$system_order = $this->Order_model->get_order_by_orderid($orderid);
		//构成body
		$api_order['body'] = '';
		$api_order['detail'] = '';
		if($system_order['p1']){
			$api_order['body'] .= photoname_list('p1').' ';
			$api_order['detail'] .= photoname_list('p1').'*'.$system_order['p1'].' ';
		}
		if($system_order['p2']){
			$api_order['body'] .= photoname_list('p2').' ';
			$api_order['detail'] .= photoname_list('p2').'*'.$system_order['p2'].' ';
		}
		if($system_order['p3']){
			$api_order['body'] .= photoname_list('p3').' ';
			$api_order['detail'] .= photoname_list('p3').'*'.$system_order['p3'].' ';
		}
		if($system_order['p4']){
			$api_order['body'] .= photoname_list('p4').' ';
			$api_order['detail'] .= photoname_list('p4').'*'.$system_order['p4'].' ';
		}
		if($system_order['p5']){
			$api_order['body'] .= photoname_list('p5').' ';
			$api_order['detail'] .= photoname_lit('p5').'*'.$system_order['p5'].' ';
		}
		$api_order['attach'] = '感官制剂';
		$api_order['orderid'] = $system_order['orderid'];
		$api_order['price'] = $system_order['price'];
		$prepay_id = $this->unifyOrder($api_order);
		if($prepay_id){
			header('Content-type:text/json');
			$data = array('status' => 1 , 'message' => '统一下单成功' , 'prepay_id' => $prepay_id );
			echo json_encode($data);
		} else{
			header('Content-type:text/json');
			$data = array('status' => 0 , 'message' => '统一下单出现问题' , 'prepay_id' => null);
			echo json_encode($data);
		}
	}
	/* 统一下单接口
	** order(array) 包含商品详情
	*/
	protected function unifyOrder($order = array())
	{
		$this->load->helper('common');
		$this->load->helper('pay');
		//调用地址
		$url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
		$device_info = 'WEB';
		//生成随机字符串
		$nonce_str = $this->createNonceString();
		$body = $order['body'];
		$detail = $order['detail'];
		$attach = $order['attach'];
		$out_trade_no = $order['orderid'];
		$fee_type = 'CNY';
		$total_fee = 20;//intval($order['price']);
		$spbill_create_ip = get_ip();
		$time_start = date('YmdHis' , time());
		$time_expire = date('YmdHis' , time()+1800);
		$notify_url = site_url('Notif/notif/');
		$trade_type = 'JSAPI';
		$openid = $_SESSION['openid'];
		$sign_data = array('appid' => $this->appid , 'mch_id' => $this->mch_id , 'device_info' => $device_info , 'nonce_str' => $nonce_str , 'body' => $body , 'detail' => $detail , 'attach' => $attach , 'out_trade_no' => $out_trade_no , 'fee_type' => $fee_type , 'total_fee' => $total_fee , 'spbill_create_ip' => $spbill_create_ip , 'time_start' => $time_start , 'time_expire' => $time_expire , 'notify_url' => $notify_url , 'trade_type' => $trade_type , 'openid' => $openid);
		//生成签名
		$sign = $this->createSign($sign_data);
		$sign_data['sign'] = $sign;
		//生成XML字符串
		$xml_string = $this->createXML($sign_data);
		$response = $this->postXML($url , $xml_string);
		$match = match_unifyorder_response($response);
		if($match){
			return $match;
		} else{
			return false;
		}
	}
	/*	查询订单接口
	**	orderid(string) : 订单ID
	**  return 
	*/
	protected function queryOrder($orderid = '')
	{
		//读取
		$this->load->model('Order_model');
		$this->load->helper('pay');
		$url = 'https://api.mch.weixin.qq.com/pay/orderquery';
		//查询数据库订单
		$order = $this->Order_model->get_order_by_orderid($orderid);
		$sign_data = array('appid' => $this->appid , 'mch_id' => $this->mch_id , 'out_trade_no' => $orderid , 'nonce_str' => $this->createNonceString());
		$sign = $this->createSign($sign_data);
		$sign_data['sign'] = $sign;
		//生成XML字符串
		$xml_string = $this->createXML($sign_data);
		$response = $this->postXML($url , $xml_string);
		$response = match_queryorder_response($response);
		return $response;
	}
	/*	关闭订单接口
	**	orderid(string) : 订单ID
	**  return
	*/
	protected function closeOrder($orderid = '')
	{
		//读取
		$this->load->model('Order_model');
		$url = 'https://api.mch.weixin.qq.com/pay/closeorder';
		//查询数据库订单
		$order = $this->Order_model->get_order_by_orderid($orderid);
		if($order['uid'] != $_SESSION['openid'])
			exit(0);
		$sign_data = array('appid' => $this->appid , 'mch_id' => $this->mch_id , 'out_trade_no' => $orderid , 'nonce_str' => $this->createNonceString());
		$sign = $this->createSign($sign_data);
		$sign_data['sign'] = $sign;
		//生成XML字符串
		$xml_string = $this->createXML($sign_data);
		$response = $this->postXML($url , $xml_string);
	}
	/*	申请退款接口
	**	
	**
	*/
	protected function refund($orderid)
	{
		//读取
		$this->load->model('Order_model');
	}
	/*	生成随机字符串接口
	**  return nonce_str(string(32))
	*/
	protected function createNonceString()
	{
		$str = substr(microtime() , 0 , 6);
		$nonce_str = md5($str);
		return $nonce_str;
	}

	/*	生成签名接口
	**  sign_data(array):包含有签名相关的数据
	**  return sign(string(32))
	*/
	protected function createSign($sign_data = array())
	{
		//读取
		$this->load->helper('pay');
		$sign_data = asckey_sort($sign_data);
		//构成stringA
		$stringA = '';
		foreach($sign_data as $key=>$value){
			if($key != "sign" && $value != "" && !is_array($value)){
				$stringA .= $key . "=" . $value . "&";
			}
		}
		$stringSignTemp = $stringA.'key='.$this->key;
		$string = 'appid=wxe083120fa3df05d0&nonceStr=5K8264ILTKCH16CQ2502SI8ZNMTM67VS&package=prepay_id=123456789&signType=MD5&timeStamp=1414561699&key=ganguanzhijizhaoxiangguan8888888';
		$sign = strtoupper(md5($stringSignTemp));
		return $sign;
		
	}

	/*	根据二维数组生成XML字符串
	**	$array 二维数组
	**  return string(xml)
	*/
	protected function createXML($array = array())
	{
		$xml = '<xml>';
		foreach($array as $key => $value){
			$xml .= "<{$key}>{$value}</{$key}>";
		}
		$xml .= '</xml>';
		return $xml;
	}

	/*	POSTXML接口
	**  url(string):POST的地址 ， xml(string):POST的XML数据
	**  response(string)
	*/
	protected function postXML($url , $xml)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS , $xml);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
}