<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index(){

		// Check whether user logged in or not
		// var_dump($this->session->userdata('user_logged_in'));
		
		if($this->session->userdata('user_logged_in')==FALSE){
			redirect(base_url(), "location");
			// exit();
		}
		
			 


		$this->load->view('common/header');
		$this->load->view('common/left_panel');
		$this->load->view('common/top_panel');
		$this->load->view('dashboard');
		$this->load->view('common/bottom_panel');
		$this->load->view('common/footer');
	}
}
