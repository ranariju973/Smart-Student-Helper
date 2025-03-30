<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController1 extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('memory'); // Load task details page
    }

    public $db;
    public $session;
}
?>