<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('transactionmodel');
		$data['transaction'] = $this->transactionmodel->getTransaction();
		$this->load->view('transaction_view', $data);
	}
	
	public function updateResi($id, $resi)
	{
		$this->load->helper('url');
		$this->load->model('transactionmodel');
		$this->transactionmodel->updateResi($id, $resi);
		$this->index();
	}
	
	public function finish($id)
	{
		$this->load->helper('url');
		$this->load->model('transactionmodel');
		$this->transactionmodel->updateStatus($id, 5);
		$this->index();
	}
}
