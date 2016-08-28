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
	
	public function order($id, $total) {
		$this->load->helper('url');
		$this->load->model('productmodel');
		$data = $this->productmodel->getProductId($id);
		$this->productmodel->deleteProduct($id, $total);
		$this->load->model('ordermodel');
		$this->ordermodel->addOrder($data->Name, $data->Picture, $total, $data->Price);
		$this->index();
	}
}
