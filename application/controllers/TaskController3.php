<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController3 extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('puzzel'); // Load task details page
    }

    public $db;
    public $session;
}
?>