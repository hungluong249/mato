<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('news_model');
    }
    
    public function index() {
    	$this->load->library('pagination');
    	$config = array();
        $base_url = base_url() . 'admin/projects/index';
        $total_rows = $this->news_model->count_news();
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['news'] = $this->news_model->get_all_news($per_page, $this->data['page']);

        $this->render('news_view');
    }

    public function detail($id = NULL){
    	$news_id = isset($id) ? (int) $id : (int) $this->input->post('id');
    	$this->data['news'] = $this->news_model->get_news_by_id($news_id);

        if (!$this->data['news']) {
            redirect('admin/news', 'refresh');
        }

    	$this->render('detail_news_view');
    }

}
