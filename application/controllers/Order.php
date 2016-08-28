<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('ordermodel');
		$data['order'] = $this->ordermodel->getOrder();
		$data['price'] = $this->ordermodel->getTotalPrice();
		$this->load->view('order_view', $data);
	}
	
	public function deleteOrder($id) {
		$this->load->helper('url');
		$this->load->model('ordermodel');
		$this->load->model('productmodel');
		$data = $this->ordermodel->getPid($id);
		$this->productmodel->addTotalProduct($data->Pid, $data->Total);
		$this->ordermodel->deleteOrder($id);
		$this->index();
	}
}
