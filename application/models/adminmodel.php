<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {

	public function getTransaction()
	{
		$data = $this->db->query('select * from transaction');
		return $data->result_array();
	}
	
	public function updateStatus($id, $status)
	{
		$data1 = array(
			'Status' => $status
		);
		$this->db->where('Id', $id);
		$this->db->update('transaction', $data1);
	}
	
	public function updateShipping($id, $shipping)
	{
		$data1 = array(
			'Shipping' => $shipping
		);
		$this->db->where('Id', $id);
		$this->db->update('transaction', $data1);
	}
}
