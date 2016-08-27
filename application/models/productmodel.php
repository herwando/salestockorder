<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel extends CI_Model {

	public function getProduct()
	{
		$data = $this->db->query('select * from product');
		return $data->result_array();
	}
}
