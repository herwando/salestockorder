<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordermodel extends CI_Model {

	public function getOrder()
	{
		$data = $this->db->query('select * from ordering');
		return $data->result_array();
	}
	
	public function getTotalPrice() {
		$data = $this->db->query('select Price from ordering');
		return $data->result_array();
	}
	
	public function addOrder($name, $picture, $total, $price, $pid)
	{
		$data = array(
			'Name' => $name,
			'Picture' => $picture,
			'Total' => $total,
			'Price' => $price*$total,
			'Pid' => $pid
		);
		$this->db->insert('ordering', $data);
	}
	
	public function deleteOrder($id) {
		$this->db->where('Id',$id);
		$this->db->delete('ordering');
	}
	
	
	public function getPid($id) {
		$data = $this->db->query('select Pid,Total from ordering where Id='.$id);
		return $data->row(1);
	}
}
