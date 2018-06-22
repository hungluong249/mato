<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nopage extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        //$this->render('nopage_view');
        $this->load->view('nopage_view');
    }

}
