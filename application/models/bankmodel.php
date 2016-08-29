<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bankmodel extends CI_Model {

	public function getBank()
	{
		$data = $this->db->query('select * from bank');
		return $data->result_array();
	}
	
}
