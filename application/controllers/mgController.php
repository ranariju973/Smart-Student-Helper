<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mgController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('mg'); // Load your todo list view
    }
    public $db;
    public $session;
}
?>
