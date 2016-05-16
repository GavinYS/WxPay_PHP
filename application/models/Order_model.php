<?php

class Order_model extends CI_Model {

	public function insert_order_data($data)
	{
		return $this->db->insert('order' , $data);
	}

	public function select_order_by_uid($uid , $where = array() , $limit = 20 , $offset = 0)
	{
		$this->db->order_by('id DESC');
		$this->db->limit($limit , $offset);
		$this->db->where('uid' , $uid);
		if($where)
			$this->db->where($where);
		$query = $this->db->get('order');
		$array = $query->result_array();
		if($array)
			return $array;
		else
			return array();
	}

	public function get_order_by_orderid($orderid)
	{
		$this->db->order_by('id DESC');
		$this->db->limit(1);
		$this->db->where('orderid' , $orderid);
		$query = $this->db->get('order');
		$array = $query->result_array();
		if($array)
			return $array[0];
		else
			return array();
	}
	public function select_order($where = array() , $limit = 20 , $offset = 0)
	{
		$this->db->order_by('id DESC');
		$this->db->limit($limit , $offset);
		if($where)
			$this->db->where($where);
		$query = $this->db->get('order');
		$array = $query->result_array();
		if($array)
			return $array;
		else
			return array();
	}

	public function count_order($where = array())
	{
		if($where)
			$this->db->where($where);
		return $this->db->count_all_results('order');
	}

	public function set_paystatus_by_orderid($orderid)
	{
		$this->db->limit(1);
		$this->db->where('orderid' , $orderid);
		$data = array('pay_status' => 1);
		return $this->db->update('order' , $data);
	}

	public function get_timelimit_by_timeperiod($timeperiod)
	{
		$this->db->limit(1);
		$this->db->where('timeperiod' , $timeperiod);
		$query = $this->db->get('timelimit');
		$array = $query->result_array();
		if($array)
			return $array[0];
		else
			return array();
	}
}