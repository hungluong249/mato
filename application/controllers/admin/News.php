<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Admin_Controller {
    
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

    	$this->render('admin/news/list_news_view');
    }

    public function create(){
    	$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('news_title', 'News name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/news/create_news_view');
        } else {
            if ($this->input->post()) {

                // Upload single image
                $description_image = $this->upload_image('news_description_picture', $_FILES['news_description_picture']['name'], 'assets/upload/news', 'assets/upload/news/thumbs');

                $news_data = array(
                    'news_title' => $this->input->post('news_title'),
                    'news_description_image' => $description_image,
                    'news_description' => $this->input->post('news_description'),
                    'news_content' => $this->input->post('news_content'),
                    'news_created' => $this->author_info['created'],
                    'news_created_by' => $this->author_info['created_by'],
                    'news_modified' => $this->author_info['modified'],
                    'news_modified_by' => $this->author_info['modified_by']
                );

                try {
                    $this->news_model->insert_news($news_data);
                    $this->session->set_flashdata('message', 'News added successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error inserting news: ' . $e->getMessage());
                }

                redirect('admin/news', 'refresh');
            }
        }
    }

    public function edit($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('news_title', 'News name', 'trim|required');

        $news_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $this->data['news'] = $this->news_model->get_news_by_id($news_id);

        if (!$this->data['news']) {
            redirect('admin/news', 'refresh');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/news/edit_news_view');
        }  else {
            if ($this->input->post()) {

                // Upload single image
                $description_image = $this->upload_image('news_description_picture', $_FILES['news_description_picture']['name'], 'assets/upload/news', 'assets/upload/news/thumbs');

                $news_data = array(
                    'news_title' => $this->input->post('news_title'),
                    'news_description_image' => $description_image,
                    'news_description' => $this->input->post('news_description'),
                    'news_content' => $this->input->post('news_content'),
                    'news_modified' => $this->author_info['modified'],
                    'news_modified_by' => $this->author_info['modified_by']
                );

                $converted_data = $this->convert_data_for_edit($news_data);

                try {
                    $this->news_model->update_news($news_id, $converted_data);
                    $this->session->set_flashdata('message', 'News update successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating the news: ' . $e->getMessage());
                }
                
                redirect('admin/news', 'refresh');
            }
        }
    }

    public function delete($id = NULL){
    	$news_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $news = $this->news_model->get_news_by_id($news_id);

        if (!$news) {
            redirect('admin/news', 'refresh');
        }

        $set_delete = array('news_is_delete' => 1);
        try {
            $this->news_model->delete_news($news_id, $set_delete);
            $this->session->set_flashdata('message', 'Item has deleted successful.');
        } catch (Exception $e) {
            $this->session->set_flashdata('message', 'Have error while delete item: ' . $e->getMessage());
        }
        
        redirect('admin/news', 'refresh');
    }

    public function convert_data_for_edit($data = array()) {
        if ($data['news_description_image'] == '') {
            unset($data['news_description_image']);
        }

        return $data;
    }
}
