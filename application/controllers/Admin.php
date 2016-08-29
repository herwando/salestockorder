<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$this->load->model('shippingmodel');
		$data['admin'] = $this->adminmodel->getTransaction();
		$data['shipping'] = $this->shippingmodel->getShipping();
		$this->load->view('admin_view', $data);
	}
	
	public function cancel($id)
	{
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$this->adminmodel->updateStatus($id, 3);
		$this->index();
	}
	
	public function valid($id)
	{
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$this->adminmodel->updateStatus($id, 2);
		$this->index();
	}
	
	public function selectShipping($id, $shipping)
	{
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$this->adminmodel->updateShipping($id, $shipping);
		$this->adminmodel->updateStatus($id, 4);
		$this->index();
	}
}
