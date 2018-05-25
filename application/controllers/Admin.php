<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index(){
		if($this->session->userdata('user_logged_in')==FALSE){
			redirect(base_url('admin/login'), "location");
			exit();
		}

		$this->load->view('admin/common/header');
		$this->load->view('admin/common/left_panel');
		$this->load->view('admin/common/top_panel');
		$this->load->view('admin/category'); 
		$this->load->view('admin/common/bottom_panel');
		$this->load->view('admin/common/footer');
	}

	/**
	 * [login description]
	 * @return [type] [description]
	 */
	public function login(){
		if($this->session->userdata('user_logged_in')==TRUE){
			redirect(base_url('admin/index'), "location");
			exit();
		}
		if(!empty($this->input->post('u_name')) || !empty($this->input->post('u_enc_pwd'))){
			$this->form_validation->set_rules('u_name', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('u_enc_pwd', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				
				$data = array(
					'u_name' => $this->input->post('u_name'),
					'u_enc_pwd' => sha1($this->input->post('u_enc_pwd'))
				);
				
				$result = $this->Admin_model->login($data);
				if (!empty($result)) {
					$session_data = array(
						'user_name' => $result[0]['u_name'],
						'user_email' => $result[0]['u_email'],
						'user_id' => $result[0]['user_pk'],
						'user_logged_in' => TRUE,
					);
					$this->session->set_userdata($session_data);
					redirect("admin/index", "refresh");
				} else {
					$data = array(
						'error_message' => 'Invalid Username or Password'
					);
					
					$content['data'] = $data;
				}
			}
		}else{
			$content['data'] = '';
		}
		$this->load->view('admin/common/header');
		$this->load->view('admin/login',$content);
		$this->load->view('admin/common/footer');

	}

	/**
	 * [logout description]
	 * @return [type] [description]
	 */
	public function logout(){
		session_destroy();
		unset($_SESSION["user_name"]);
		unset($_SESSION["user_email"]);
		unset($_SESSION["user_id"]);
		unset($_SESSION["user_logged_in"]);
		
        redirect(base_url() . "admin/login");
	}


	public function request_password(){
		if(!empty($this->input->post('u_email'))){
			$this->form_validation->set_rules('u_email', 'Email', 'trim|required|xss_clean|valid_email');
			if ($this->form_validation->run() == FALSE) {
				
				$data = array(
					'u_email' => $this->input->post('u_email')
				);
				
				$result = $this->Admin_model->check_user_by_email($data);
				if (!empty($result)) {
					$randid = rand();
					$insert_data = array(
						'fph_label' => 1,
						'fph_user_cust_fk' => $result['user_pk'],
						'fph_rand_id' => $randid,
						'fph_rand_id_status' => 0,
						'fph_created_dtm'       => date("Y-m-d H:i:s"),
		                'fph_updated_dtm'     => date("Y-m-d H:i:s")
					);

					$insert_id = $this->Admin_model->insert_data('Forgot_pwd_history', $insert_data);
					$data = array(
						'error_message' => 'Please check your email for new password or click this url <a href="'.base_url('admin/reset_password/'.md5($randid).'/'.md5($result['user_pk'])).'">reset password</a>',
					);
				} else {
					$data = array(
						'error_message' => 'Email address not registered'
					);
				}
				$content['data'] = $data;
				$this->load->view('admin/common/header');
				$this->load->view('admin/request_password', $content);
				$this->load->view('admin/common/footer');
			}
		}else{
			$this->load->view('admin/common/header');
			$this->load->view('admin/request_password');
			$this->load->view('admin/common/footer');
		}
	}

	/**
	 * [reset_password description]
	 * @param  [type] $randid [description]
	 * @param  [type] $userid [description]
	 * @return [type]         [description]
	 */
	public function reset_password($randid, $userid){
		if($this->session->userdata('user_logged_in')==TRUE){
			redirect(base_url('admin/index'), "location");
			exit();
		}
		$check_reset_url = $this->Admin_model->check_reset_url($randid, $userid);
		if($check_reset_url){
			$data = array(
				'randid' => $randid,
				'userid' => $userid,
			); 
			if($check_reset_url['fph_rand_id_status'] == 0){
				$this->form_validation->set_rules('u_enc_pwd', 'Password', 'trim|required|xss_clean');
				$this->form_validation->set_rules('u_confirm_pwd', 'Password', 'trim|required|xss_clean|matches[u_enc_pwd]');
				if ($this->form_validation->run() == FALSE) {
					$u_enc_pwd 		= $this->input->post('u_enc_pwd');
					$u_confirm_pwd 	= $this->input->post('u_confirm_pwd');
					if($u_enc_pwd != $u_confirm_pwd){
						$data['error_message2'] = 'Password didnt Match';
					}else{
						$data = array(
							'u_enc_pwd' => sha1($this->input->post('u_enc_pwd')),
							'Updated_by' => "Reset Password",
							'Updated_dtm' => date("Y-m-d H:i:s")
						);
						$this->Admin_model->update_data($data, $check_reset_url['fph_user_cust_fk'], "user_pk", "Internal_User");
						$data = array(
							'fph_rand_id_status' => 1,
							'fph_updated_dtm' => date("Y-m-d H:i:s")
						);
						$this->Admin_model->update_data($data, $check_reset_url['fph_pk'], "fph_pk", "Forgot_pwd_history");
						$data['error_message2'] = 'Password has been changed';
					}
				}
			}else{
				$data['error_message'] = 'Password has been change<br/> Please login from this URL <a href="'.base_url('admin/login/').'">Login</a>';
			}

			$content['data'] = $data;
		}else{
			$data = array(
				'error_message' => 'Invalid URL'
			);
			$content['data'] = $data;
		
		}
		
			
		$this->load->view('admin/common/header');
		$this->load->view('admin/reset_password', $content);
		$this->load->view('admin/common/footer');
		
	}

	public function change_password(){
		if(empty($this->session->userdata('user_id'))){
			redirect(base_url('admin/login'), "location");
			exit();
		}
		if(!empty($this->input->post('u_name')) || !empty($this->input->post('u_enc_pwd'))){
			$userid = $this->session->userdata('user_id');
			$this->form_validation->set_rules('u_old_pwd', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('u_enc_pwd', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('u_confirm_pwd', 'Password', 'trim|required|xss_clean|matches[u_enc_pwd]');
			if ($this->form_validation->run() == FALSE) {
				$u_old_pwd 		= $this->input->post('u_old_pwd');
				$u_enc_pwd 		= $this->input->post('u_enc_pwd');
				$u_confirm_pwd 	= $this->input->post('u_confirm_pwd');
				$check_old_pwd = $this->Admin_model->check_old_pwd(sha1($u_old_pwd), $userid);
				if($u_enc_pwd != $u_confirm_pwd){
					$data['error_message2'] = 'Password didnt Match';
				}else if(!$check_old_pwd){
					$data['error_message2'] = 'Wrong Password';
				}else{
					$data = array(
						'u_enc_pwd' => sha1($this->input->post('u_enc_pwd')),
						'Updated_by' => "Reset Password",
						'Updated_dtm' => date("Y-m-d H:i:s")
					);
					$this->Admin_model->update_data($data, $userid, "user_pk", "Internal_User");
					$data['error_message2'] = 'Password has been changed';
				}
			}
		}else{
			$data['error_message2'] = '';
		}

		$content['data'] = $data;
		
			
		$this->load->view('admin/common/header');
		$this->load->view('admin/change_password', $content);
		$this->load->view('admin/common/footer');
		
	}

	/**
	 * [send_email description]
	 * @param  [type] $to         [description]
	 * @param  [type] $from       [description]
	 * @param  [type] $formname   [description]
	 * @param  [type] $recipients [description]
	 * @param  [type] $subject    [description]
	 * @param  [type] $message    [description]
	 * @return [type]             [description]
	 */
	public function send_email($to, $from, $formname, $recipients, $subject, $message) {
	   $config = Array(
			      'protocol' => $this->get_site_options('protocol'),
			      'smtp_host' => $this->get_site_options('smtp_host'),
			      'smtp_port' => $this->get_site_options('smtp_port'),
			      'smtp_user' => $this->get_site_options('smtp_user'),
			      'smtp_pass' => $this->get_site_options('smtp_pass'),
				  'mailtype' => $this->get_site_options('mailtype'), 
        		  'charset'   => $this->get_site_options('charset')
			);
	  $this->CI->load->library('email', $config);
	  $this->CI->email->clear(TRUE);
	  $this->CI->email->from($from, 'Cortina Watch'); 
	  $this->CI->email->to($to);
	  $this->CI->email->subject($subject);
	  $this->CI->email->message($message); 
	  $this->CI->email->attach($terms); 
	
	  $this->CI->email->send();
	  return TRUE;
	
	}

	
}
