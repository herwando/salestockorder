<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('couponmodel');
		$data['coupon'] = $this->couponmodel->getCoupon();
		$this->load->view('coupon_view', $data);
	}
}
