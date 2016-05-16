<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $appid = 'appid';
	private $secretid = 'secretid';

	/*	检验登陆状态的接口
	**
	*/
	public function checkLogin()
	{
		if(isset($_SESSION['openid'])){
			$data = array('status' => 1 , 'message' => '已登录' , 'url' => null);
		} else{
			$data = array('status' => 0 , 'message' => '未登录','url' => site_url('Auth/authAccessToken'));
		}
		header('Content-type:text/json');
		echo json_encode($data);
	}
	/* 跳转到包含accesstoken的URL , 也是认证的入口
	** 
	*/
	public function authAccessToken()
	{
		$redirect_uri = urlencode(site_url('Auth/authCode'));
		$response_type = 'code';
		$state = 'tms';
		$scope = 'snsapi_base';
		$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.$redirect_uri.'&response_type='.$response_type.'&scope='.$scope.'&state='.$state.'#wechat_redirect';
		header('Location :' . $url , true, 302);
	}

	/* 获取到包含openid的json输出格式的URL
	**
	*/
	public function authCode()
	{
		$code = isset($_GET['code']) ? $_GET['code'] : null;
		$state = isset($_GET['state']) ? $_GET['state'] : null;
		if($state == 'tms' && $code){
			$grant_type = 'authorization_code';
			$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->secretid.'&code='.$code.'&grant_type='.$grant_type;
			$data = $this->getOpenID($url);
			$openid = $data->openid;
			$_SESSION['openid'] = $openid;
			$url = base_url().'index.html';
			header('Location :' . $url , true , 302);
		}
	}

	/* 通过CURL解析获取JSON数据格式
	** url(string):获取json数据的uri
	*/
	protected function getOpenID($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$output = curl_exec($ch);
		curl_close($ch);
		return json_decode($output);
	}
}