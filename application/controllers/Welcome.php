<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load database
		$this->load->model('Login_model');
	}

	public function index(){
		if($this->session->userdata('user_logged_in')==TRUE){
			redirect(base_url('index.php/dashboard'), "location");
			exit();
		}

		$this->load->view('common/header');
		$this->load->view('welcome');
		$this->load->view('common/footer');
	}

	public function login_authentication(){
		if($this->session->userdata('user_logged_in')==TRUE){
			redirect(base_url('index.php/dashboard'), "refresh");
			exit();
		}



		$this->form_validation->set_rules('u_name', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('u_enc_pwd', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			
			$data = array(
				'u_name' => $this->input->post('u_name'),
				'u_enc_pwd' => sha1($this->input->post('u_enc_pwd'))
			);
			
			$result = $this->Login_model->login($data);
			if (!empty($result)) {
				// echo '<pre>';
				// var_dump($result);
				// echo '</pre>';

				// Add user data in session
				$session_data = array(
					'user_name' => $result[0]['u_name'],
					'user_email' => $result[0]['u_email'],
					'user_id' => $result[0]['user_pk'],
					'user_logged_in' => TRUE,
				);
				$this->session->set_userdata($session_data);
				
				// Successfull login, go to dashboard
				redirect("dashboard", "refresh");

			} else {

				// Login error
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				
				$content['data'] = $data;

				$this->load->view('common/header');
				$this->load->view('welcome', $content);
				$this->load->view('common/footer');

			}
		}
	
	}
}
