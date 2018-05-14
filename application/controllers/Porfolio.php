<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Porfolio extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('projects_model');
    }
    
    public function index() {
    	$this->data['projects'] = $this->projects_model->get_all_projects();
        $this->render('porfolio_view');
    }

}