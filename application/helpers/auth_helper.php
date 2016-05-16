<?php

/* 验证用户openid
**
*/
function check_openid()
{
	$openid = isset($_SESSION['openid']) ? $_SESSION['openid'] : null;
	$openid = strlen($openid) == 28 ? $openid : null;
	if($openid){
		return $openid;
	} else{
		$auth_url = site_url('Auth/authAccessToken');
		redirect('Auth/authAccessToken');
		exit;
	}
}