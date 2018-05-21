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

    public function detail($id = null){
        $detail = $this->projects_model->get_project_by_id($id);
        if(!$detail){
            redirect('homepage', 'refresh');
        }
        $this->data['detail'] = $detail;
        $this->data['projects'] = $this->projects_model->get_related(3, $detail['project_filter'], $detail['project_id']);
        $this->render('detail_portfolio_view');
    }

}