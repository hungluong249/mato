<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('projects_model');
    }
    
    public function index() {
        $this->data['projects'] = $this->projects_model->get_all_projects();
//        echo '<pre>';
//        print_r($this->data['projects']);die;
        $this->render('homepage_view');
    }

}
