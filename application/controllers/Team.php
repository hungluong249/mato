<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('teams_model');
    }

    public function index() {

        $teams = $this->teams_model->get_all();
        $this->data['teams'] = $teams;
        $this->render('team_view');
    }

}
