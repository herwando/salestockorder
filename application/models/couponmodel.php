<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couponmodel extends CI_Model {

	public function getCoupon()
	{
		$data = $this->db->query('select * from coupon');
		return $data->result_array();
	}
}
