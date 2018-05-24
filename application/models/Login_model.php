<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_model extends CI_Model {
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
	
}