<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin_model extends CI_Model {
	public function __construct() {
        $this->load->database();
    }

	// Read data using username and password
	public function login($data) {
		
		// var_dump($password);

		$query = $this->db->query("SELECT * FROM internal_user WHERE u_name='".$data['u_name']."' AND u_enc_pwd='".$data['u_enc_pwd']."'");
        $data = $query->result_array();

		return $data;
	}

	public function check_user_by_email($data) {
		$query = $this->db->query("SELECT * FROM internal_user WHERE u_email='".$data['u_email']."' ");
        $data = $query->row_array();

		return $data;
	}

	public function insert_data($tablename, $data){
		$this->db->insert($tablename, $data);
		return $this->db->insert_id();
		
	}

	public function check_reset_url($randid, $userid){
		$query = $this->db->query("SELECT * FROM Forgot_pwd_history WHERE MD5(fph_rand_id)='".$randid."' and MD5(fph_user_cust_fk)='".$userid."'");
        $data = $query->row_array();
		return $data;
	}

	public function check_old_pwd($old_pwd, $userid){
		$query = $this->db->query("SELECT * FROM Internal_User WHERE u_enc_pwd='".$old_pwd."' and user_pk='".$userid."'");
        $data = $query->row_array();
		return $data;
	}



	public function update_data($data, $id, $fieldname, $tablename){
        $this->db->where($fieldname, $id);
        return $this->db->update($tablename,$data);
    }
	
}