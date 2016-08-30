<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactionmodel extends CI_Model {

	public function getTransaction()
	{
		$data = $this->db->query('select * from transaction');
		return $data->result_array();
	}
	
	public function addTransaction($name, $phone, $email, $address, $total, $ordercus)
	{
		$data = array(
			'Name' => $name,
			'Phone' => $phone,
			'Email' => $email,
			'Address' => $address,
			'Total' => $total,
			'OrderCus' => $ordercus,
			'Resi' => 0,
			'Status' => 0
		);
		$this->db->insert('transaction', $data);
	}
	
	public function updatePembayaran($id, $pembayaran)
	{
		$data1 = array(
			'Pembayaran' => $pembayaran,
			'Status' => 1
		);
		$this->db->where('Id', $id);
		$this->db->update('transaction', $data1);
	}
	
	public function updateStatus($id, $status)
	{
		$data1 = array(
			'Status' => $status
		);
		$this->db->where('Id', $id);
		$this->db->update('transaction', $data1);
	}
	
}
