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
	
	public function updatePembayaran($id, $pembayaran)
	{
		$this->load->helper('url');
		$this->load->model('transactionmodel');
		$this->transactionmodel->updatePembayaran($id, $pembayaran);
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
