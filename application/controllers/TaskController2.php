<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController2 extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('stroop'); // Load task details page
    }

    public $db;
    public $session;
}
?>