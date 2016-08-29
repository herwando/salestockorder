<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('ordermodel');
		$this->load->model('couponmodel');
		$this->load->model('bankmodel');
		$data['order'] = $this->ordermodel->getOrder();
		$data['price'] = $this->ordermodel->getTotalPrice();
		$data['coupon'] = $this->couponmodel->getCouponId();
		$data['bank'] = $this->bankmodel->getBank();
		$this->load->view('order_view', $data);
	}
	
	public function deleteOrder($id) {
		$this->load->helper('url');
		$this->load->model('ordermodel');
		$this->ordermodel->deleteOrder($id);
		$this->index();
	}
	
	public function deleteCoupon($id) {
		$this->load->helper('url');
		$this->load->model('couponmodel');
		$this->couponmodel->deleteStatus($id);
		$this->index();
	}
	
	public function orderPart2($total, $ordercus) {
		$this->load->helper('url');
		$data['total'] = $total;
		$data['ordercus'] = $ordercus;
		$this->load->view('order_view2', $data);
	}
	
	public function deleteCouponProduct($name, $phone, $email, $address, $total, $ordercus) {
		$this->load->helper('url');
		$this->load->model('couponmodel');
		$this->load->model('ordermodel');
		$this->load->model('productmodel');
		$this->load->model('transactionmodel');
		$id = $this->couponmodel->getStatusId();
		if($id) {
			$this->couponmodel->deleteTotalCoupon($id);
			$this->couponmodel->deleteStatus($id);
		}
		$data = $this->ordermodel->getOrder();
		foreach($data as $d) {
			$data1 = $this->ordermodel->getPid($d{'Id'});
			$this->ordermodel->deleteOrder($d{'Id'});
			$this->productmodel->deleteProduct($data1->Pid, $data1->Total);
		}
		$this->transactionmodel->addTransaction($name, $phone, $email, $address, $total, $ordercus);
		$this->index();
	}
}
