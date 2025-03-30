<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashController extends CI_Controller {
    public function index() {
        $this->load->view('dash'); // Load the 'todo' view
    }

    public $db;
    public $session;
}
?>