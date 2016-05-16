<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {

	private $appid = 'appid';
	private $secretid = 'secretid';
	private $mch_id = 'mch_id';
	private $key = 'key';
	public function __construct()
	{
		parent::__construct();
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