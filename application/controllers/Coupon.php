<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('couponmodel');
		$data['coupon'] = $this->couponmodel->getCoupon();
		$data['status'] = $this->couponmodel->getCouponId();
		$this->load->view('coupon_view', $data);
	}
	
	public function apply($id) {
		$this->load->helper('url');
		$this->load->model('couponmodel');
		$this->couponmodel->apply($id);
		$this->index();
	}
	
}
