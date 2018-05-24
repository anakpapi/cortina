<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function index(){
		$this->load->view('common/header');
		$this->load->view('common/left_panel');
		$this->load->view('common/top_panel');
		$this->load->view('product'); 
		$this->load->view('common/bottom_panel');
		$this->load->view('common/footer');
	}

	public function add(){
		$this->load->view('common/header');
		$this->load->view('common/left_panel');
		$this->load->view('common/top_panel');
		$this->load->view('product'); 
		$this->load->view('common/bottom_panel');
		$this->load->view('common/footer');
	}
}
