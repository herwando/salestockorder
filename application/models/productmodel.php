<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel extends CI_Model {

	public function getProduct()
	{
		$data = $this->db->query('select * from product');
		return $data->result_array();
	}
	
	public function deleteProduct($id)
	{
		$this->db->select('Stock');
		$this->db->where('Id', $id);
		$data = $this->db->get('product')->row(1);
		if($data->Stock > 0) {
			$temp = $data->Stock;
			$data1 = array('Stock' => $temp-1);
			$this->db->where('Id', $id);
			$this->db->update('product', $data1);
		}
	}
}
