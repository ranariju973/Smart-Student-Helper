<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bmtController extends CI_Controller {
    public function index() {
        $this->load->view('bmt'); // Load the 'todo' view
    }

    public $db;
    public $session;
}
?>