<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() { // FIXED constructor
        parent::__construct();
        $this->load->database();
    }

	public $db;
	public $session;


    public function signup() {
        // Retrieve form data
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT); // SECURE PASSWORD HASHING

        // Insert into database
        $query = "INSERT INTO users(name, mobile, password) VALUES (?, ?, ?)";
        $this->db->query($query, array($name, $mobile, $password));

        // Return JSON response
        echo json_encode(["status" => "success", "message" => "Signup successful"]);
    }

	public function login() {
		// Retrieve form data
		$mobile = $this->input->post('mobile');
		$password = $this->input->post('password'); // Do NOT hash here
	
		// Fetch user from database (DO NOT check password in SQL)
		$query = "SELECT * FROM users WHERE mobile = ?";
		$result = $this->db->query($query, array($mobile))->row_array();
	
		if ($result && password_verify($password, $result['password'])) {
			// Store user session data
			$userData = [
				'id' => $result['id'], 
				'name' => $result['name'], 
				'mobile' => $result['mobile']
			];
	
			$this->session->set_userdata('userdata', $userData);
			echo json_encode(["status" => "success", "message" => "Login successful"]);
		} else {
			echo json_encode(["status" => "error", "message" => "Invalid mobile or password"]);
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		echo json_encode(["status" => "success", "message" => "Logout successful"]);
		exit;
	}
	


	
	
	
	
}
