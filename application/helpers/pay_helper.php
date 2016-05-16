<?php
/*	将数组中的键值按ASCII字典排序
**	输入array 二维数组
**  return array 排好序的二维数组
*/
function asckey_sort($array)
{
	$key_array = array();
	$value_array = array();
	$i = 0;
	foreach($array as $key=>$value){
		$key_array[$i] = $key;
		$value_array[$i] = $value;
		$i++;
	}
	for($i = 0 ; $i < count($key_array) ; $i++){
		for($j = 0 ; $j < count($key_array)-1 ; $j++){
			if(asc_compare($key_array[$j] , $key_array[$j+1])){
				$temp = $key_array[$j];
				$key_array[$j] = $key_array[$j+1];
				$key_array[$j+1] = $temp;
				$temp = $value_array[$j];
				$value_array[$j] = $value_array[$j+1];
				$value_array[$j+1] = $temp;
			}
		}
	}
	for($i = 0 ; $i < count($key_array) ; $i++){
		$return_array[$key_array[$i]] = $value_array[$i];
	}
	return $return_array;
}

/*	比较两个字符串ASC字典值
**  a(string) , b(string)
**	a>=b return1 a<b return0
*/
function asc_compare($a = '' , $b = '')
{
	$len = strlen($a) > strlen($b) ? strlen($b) : strlen($a);
	for($i = 0 ; $i < $len ; $i++){
		if(ord($a[$i]) > ord($b[$i])){
			return 1;
		}
		elseif(ord($a[$i]) < ord($b[$i]))
			return 0;
		else
			continue;
	}
	if($len == strlen($b) && $len != strlen($a))
		return 1;
	else
		return 0;
}

/*	正则表达抓取统一下单返回XML的数据
**	xml(string)
**	prepay_id(string)
*/
function match_unifyorder_response($xml)
{
	$pattern = '%<prepay_id><!\[CDATA\[(.*>)</prepay_id>%si';
	preg_match_all($pattern , $xml , $match);
	$prepay_id = '';
	if($match[1][0])
		$prepay_id = substr($match[1][0] , 0 , 36);
	return $prepay_id;
}

/* 正则表达抓取查询订单返回XML的数据
** xml(string)
** 
*/
function match_queryorder_response($xml)
{
	$pattern = '%<return_msg><!\[CDATA\[(.*?)</return_msg>%si';
	preg_match_all($pattern, $xml, $msg);
	if(isset($msg[1][0])){
		$temp_msg = '';
		for($i=0;$i<strlen($msg[1][0]);$i++){
			if($msg[1][0][$i] != ']'){
				$temp_msg .= $msg[1][0][$i];
			} else{
				break;
			}
		}
	}
	$pattern = '%<trade_state><!\[CDATA\[(.*?)</trade_state>%si';
	preg_match($pattern, $xml , $state);
	if(isset($state[1])){
		$temp_state = '';
		for($i=0;$i<strlen($state[1]);$i++){
			if($state[1][$i] != ']'){
				$temp_state .= $state[1][$i];
			} else{
				break;
			}
		}
	}
	$array = array('msg' => $temp_msg , 'state' => $temp_state);
	return $array;
}