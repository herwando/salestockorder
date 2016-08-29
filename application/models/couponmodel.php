<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couponmodel extends CI_Model {

	public function getCoupon()
	{
		$data = $this->db->query('select * from coupon');
		return $data->result_array();
	}
	
	public function apply($id)
	{
		$data1 = array('Status' => 1);
		$this->db->where('Id', $id);
		$this->db->update('coupon', $data1);
	}
	
	public function getCouponId() {
		$data = $this->db->query('select * from coupon where status=1');
		return $data->row(1);
	}
	
	public function addTotalCoupon($id) 
	{
		$this->db->select('Total');
		$this->db->where('Id', $id);
		$data = $this->db->get('coupon')->row(1);
		$temp = $data->Total;
		$data1 = array('Total' => $temp+1);
		$this->db->where('Id', $id);
		$this->db->update('coupon', $data1);
	}
	
	public function deleteStatus($id) {
		$data = array('Status' => 0);
		$this->db->where('Id',$id);
		$this->db->update('coupon', $data);
	}
	
	public function getStatusId() {
		$this->db->select('Id');
		$this->db->where('Status', 1);
		$data = $this->db->get('coupon')->row(1);
		$temp = 0;
		if($data) {
			$temp = $data->Id;
		}
		return $temp;
	}
	
	public function deleteTotalCoupon($id) 
	{
		$this->db->select('Total');
		$this->db->where('Id', $id);
		$data = $this->db->get('coupon')->row(1);
		$temp = $data->Total;
		$data1 = array('Total' => $temp-1);
		$this->db->where('Id', $id);
		$this->db->update('coupon', $data1);
	}
}
