<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class todolController extends CI_Controller {
    public function index() {
        $this->load->view('todol'); // Load the 'todo' view
    }

    public $db;
    public $session;
}
?>
