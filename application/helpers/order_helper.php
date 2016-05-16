<?php

/* 照片价目表
** pid(int) : 照片id
** return price(int)
*/
function price_list($pid)
{
	switch($pid){
		case 1: return 108;break;//证件照
		case 2: return 88;break;//写真照
		case 3: return 198;break;//结婚照
		case 4: return 148;break;//宠物照
		case 5: return 148;break;//毕业照
		default: return 0;break;
	}
}

/*	时间段表
**	tid(int) : 时间id
**  return timeperiod(string)
*/
function time_list($tid)
{
	switch($tid){
		case 1: return '10:00';break;
		case 2: return '10:30';break;
		case 3: return '11:00';break;
		case 4: return '11:30';break;
		case 5: return '12:00';break;
		case 6: return '12:30';break;
		case 7: return '13:00';break;
		case 8: return '13:30';break;
		case 9: return '14:00';break;
		case 10: return '14:30';break;
		case 11: return '15:00';break;
		case 12: return '15:30';break;
		case 13: return '16:00';break;
		case 14: return '16:30';break;
		case 15: return '17:00';break;
		case 16: return '17:30';break;
		case 17: return '18:00';break;
		case 18: return '18:30';break;
		case 19: return '19:00';break;
		case 20: return '19:30';break;
		case 21: return '20:00';break;
		default: return '10:00';break;
	}
}

/*	照片名称表
**	@param name(string)
**	@return name(string)
*/
function photoname_list($name = 'p1')
{
	switch($name){
		case 'p1': return '证件照';break;
		case 'p2': return '写真照';break;
		case 'p3': return '结婚照';break;
		case 'p4': return '宠物照';break;
		case 'p5': return '毕业照';break;
		default: return '';break;
	}
}