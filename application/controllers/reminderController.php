<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reminderController extends CI_Controller {
    public function index() {
        $this->load->view('reminder'); // Load the 'todo' view
    }

    public $db;
    public $session;
}
?>