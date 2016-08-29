<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shippingmodel extends CI_Model {

	public function getShipping()
	{
		$data = $this->db->query('select * from shipping');
		return $data->result_array();
	}
	
}
