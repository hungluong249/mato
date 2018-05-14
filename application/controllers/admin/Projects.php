<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('projects_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/projects/index';
        $total_rows = $this->projects_model->count_projects();
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['projects'] = $this->projects_model->get_all_projects($per_page, $this->data['page']);

        $this->render('admin/projects/list_projects_view');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('project_title', 'Project name', 'trim|required');

        $this->data['over_main'] = 0;
        $number_main_projects = $this->projects_model->count_main_projects();

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/projects/create_project_view');
        } else if ($this->input->post('project_ismain') == 1 && $number_main_projects == 3) {
            $this->data['over_main'] = 1;
            $this->render('admin/projects/create_project_view');
        } else {
            if ($this->input->post()) {

                // Upload single image
                $description_image = $this->upload_image('project_description_picture', $_FILES['project_description_picture']['name'], 'assets/upload/projects', 'assets/upload/projects/thumbs');

                $project_data = array(
                    'project_title' => $this->input->post('project_title'),
                    'project_customer' => $this->input->post('project_customer'),
                    'project_location' => $this->input->post('project_location'),
                    'project_type' => $this->input->post('project_type'),
                    'project_description_image' => $description_image,
                    'project_description' => $this->input->post('project_description'),
                    'project_content' => $this->input->post('project_content'),
                    'project_filter' => $this->input->post('project_filter'),
                    'project_secondary_filter' => $this->input->post('project_secondary_filter'),
                    'project_created' => $this->author_info['created'],
                    'project_created_by' => $this->author_info['created_by'],
                    'project_modified' => $this->author_info['modified'],
                    'project_modified_by' => $this->author_info['modified_by']
                );

                try {
                    $this->projects_model->insert_project($project_data);
                    $this->session->set_flashdata('message', 'Project added successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error inserting project: ' . $e->getMessage());
                }

                redirect('admin/projects', 'refresh');
            }
        }
    }

    public function edit($id = NULL) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('project_title', 'Project name', 'trim|required');

        $project_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $this->data['project'] = $this->projects_model->get_project_by_id($project_id);

        if (!$this->data['project']) {
            redirect('admin/projects', 'refresh');
        }

        $this->data['over_main'] = 0;
        $number_main_projects = $this->projects_model->count_main_projects();

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/projects/edit_project_view');
        } else if ($this->input->post('project_ismain') == 1 && $number_main_projects == 3 && $this->data['project']['project_is_main'] == 0) {
            $this->data['over_main'] = 1;
            $this->session->set_flashdata('message', 'Over 3 main projects');
            $this->render('admin/projects/edit_project_view');
        } else {
            if ($this->input->post()) {

                // Upload single image
                $description_image = $this->upload_image('project_description_picture', $_FILES['project_description_picture']['name'], 'assets/upload/projects', 'assets/upload/projects/thumbs');

                $project_data = array(
                    'project_title' => $this->input->post('project_title'),
                    'project_customer' => $this->input->post('project_customer'),
                    'project_location' => $this->input->post('project_location'),
                    'project_type' => $this->input->post('project_type'),
                    'project_description_image' => $description_image,
                    'project_description' => $this->input->post('project_description'),
                    'project_content' => $this->input->post('project_content'),
                    'project_filter' => $this->input->post('project_filter'),
                    'project_secondary_filter' => $this->input->post('project_secondary_filter'),
                    'project_modified' => $this->author_info['modified'],
                    'project_modified_by' => $this->author_info['modified_by']
                );

                $converted_data = $this->convert_data_for_edit($project_data);
                try {
                    $this->projects_model->update_project($project_id, $converted_data);
                    $this->session->set_flashdata('message', 'Project update successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating the project: ' . $e->getMessage());
                }
                
                redirect('admin/projects', 'refresh');
            }
        }
    }

    public function delete($id = NULL) {
        $project_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $project = $this->projects_model->get_project_by_id($project_id);

        if (!$project) {
            redirect('admin/projects', 'refresh');
        }

        $set_delete = array('project_is_delete' => 1);
        try {
            $this->projects_model->delete_project($id, $set_delete);
            $this->session->set_flashdata('message', 'Item has deleted successful.');
        } catch (Exception $e) {
            $this->session->set_flashdata('message', 'Have error while delete item: ' . $e->getMessage());
        }
        
        redirect('admin/projects', 'refresh');
    }

    public function convert_data_for_edit($data = array()) {
        if ($data['project_description_image'] == '') {
            unset($data['project_description_image']);
        }

        return $data;
    }

}