<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    public function index() {
        $this->render('services_view');
    }

}
