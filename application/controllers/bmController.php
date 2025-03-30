<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bmController extends CI_Controller {
    public function index() {
        $this->load->view('bm'); // Load the 'todo' view
    }

    public $db;
    public $session;
}
?>