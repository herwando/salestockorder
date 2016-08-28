<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel extends CI_Model {

	public function getProduct()
	{
		$data = $this->db->query('select * from product');
		return $data->result_array();
	}
	
	public function getProductId($id) {
		$data = $this->db->query('select * from product where Id='.$id);
		return $data->row(1);
	}
	
	public function deleteProduct($id, $total)
	{
		$this->db->select('Stock');
		$this->db->where('Id', $id);
		$data = $this->db->get('product')->row(1);
		if($data->Stock > 0) {
			$temp = $data->Stock;
			$data1 = array('Stock' => $temp-$total);
			$this->db->where('Id', $id);
			$this->db->update('product', $data1);
		}
	}
	
	public function addTotalProduct($id, $total) 
	{
		$this->db->select('Stock');
		$this->db->where('Id', $id);
		$data = $this->db->get('product')->row(1);
		$temp = $data->Stock;
		$data1 = array('Stock' => $temp+$total);
		$this->db->where('Id', $id);
		$this->db->update('product', $data1);
	}
}
