<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('productmodel');
		$data['product'] = $this->productmodel->getProduct();
		$this->load->view('welcome_message', $data);
	}
}
