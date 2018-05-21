<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('partners_model');
        $this->load->model('teams_model');
    }
    
    public function index() {
    	$partners = $this->partners_model->get_all();
    	$teams = $this->teams_model->get_all();
    	$this->data['partners'] = $partners;
    	$this->data['teams'] = $teams;
        $this->render('about_view');
    }

}
