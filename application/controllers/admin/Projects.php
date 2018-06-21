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
        $project_class = array('lg' => 'Large', 'md' => 'Middle', 'sm' => 'Small');

        $this->data['project_class'] = $project_class;
        $this->data['over_main'] = 0;
        $number_main_projects = $this->projects_model->count_main_projects();

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/projects/create_project_view');
        } else if ($this->input->post('project_ismain') == 1 && $number_main_projects == 3) {
            $this->data['over_main'] = 1;
            $this->render('admin/projects/create_project_view');
        } else {
            if ($this->input->post()) {

                // Upload multiple image
                // $description_image = $this->upload_image('project_description_picture', $_FILES['project_description_picture']['name'], 'assets/upload/projects', 'assets/upload/projects/thumbs');
                $description_image = $this->upload_multiple_image('./assets/upload/projects', 'project_description_picture', 'assets/upload/projects/thumb');
                $image_json = json_encode($description_image);
                $project_data = array(
                    'project_title' => $this->input->post('project_title'),
                    'project_color' => $this->input->post('project_color'),
                    'project_customer' => $this->input->post('project_customer'),
                    'project_year' => $this->input->post('project_year'),
                    'project_location' => $this->input->post('project_location'),
                    'project_type' => $this->input->post('project_type'),
                    'project_description_image' => $image_json,
                    'project_avatar' => $description_image[0],
                    'project_description' => $this->input->post('project_description'),
                    'project_content' => $this->input->post('project_content'),
                    'project_filter' => $this->input->post('project_filter'),
                    'project_secondary_filter' => $this->input->post('project_secondary_filter'),
                    'project_class' => $this->input->post('project_class'),
                    'project_created' => $this->author_info['created'],
                    'project_created_by' => $this->author_info['created_by'],
                    'project_modified' => $this->author_info['modified'],
                    'project_modified_by' => $this->author_info['modified_by']
                );
                if($this->input->post('is_special') == 1){
                    $project_image_special = $this->upload_image('project_image_special', $_FILES['project_image_special']['name'], 'assets/upload/projects', 'assets/upload/projects/thumbs');
                    $project_data['project_image_special'] = $project_image_special;
                    $project_data['project_is_special'] = $this->input->post('is_special');
                }

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
        $detail = $this->projects_model->get_project_by_id($project_id);
        $this->data['project'] = $detail;
        if (!$this->data['project']) {
            redirect('admin/projects', 'refresh');
        }
        $project_class = array('lg' => 'Large', 'md' => 'Middle', 'sm' => 'Small');

        $this->data['project_class'] = $project_class;
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
                $description_image = $this->upload_multiple_image('./assets/upload/projects', 'project_description_picture', 'assets/upload/projects/thumb');
                if($description_image){
                    $old_images = json_decode($detail['project_description_image']);
                    $new_images = array_merge($old_images, $description_image);
                    $new_images = json_encode($new_images);
                }

                $project_data = array(
                    'project_title' => $this->input->post('project_title'),
                    'project_color' => $this->input->post('project_color'),
                    'project_customer' => $this->input->post('project_customer'),
                    'project_year' => $this->input->post('project_year'),
                    'project_location' => $this->input->post('project_location'),
                    'project_type' => $this->input->post('project_type'),
                    'project_description' => $this->input->post('project_description'),
                    'project_content' => $this->input->post('project_content'),
                    'project_filter' => $this->input->post('project_filter'),
                    'project_secondary_filter' => $this->input->post('project_secondary_filter'),
                    'project_class' => $this->input->post('project_class'),
                    'project_modified' => $this->author_info['modified'],
                    'project_modified_by' => $this->author_info['modified_by']
                );
                if($this->input->post('is_special') == 1){
                    $project_image_special = $this->upload_image('project_image_special', $_FILES['project_image_special']['name'], 'assets/upload/projects', 'assets/upload/projects/thumbs');
                    $project_data['project_image_special'] = $project_image_special;
                    $project_data['project_is_special'] = $this->input->post('is_special');
                }
                if($description_image){
                    $project_data['project_description_image'] = $new_images;
                }
                // $converted_data = $this->convert_data_for_edit($project_data);
                try {
                    $this->projects_model->update_project($project_id, $project_data);
                    $this->session->set_flashdata('message', 'Project update successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating the project: ' . $e->getMessage());
                }
                
                redirect('admin/projects', 'refresh');
            }
        }
    }

    public function detail($id = null){
        $project_id = isset($id) ? (int) $id : (int) $this->input->post('id');
        $detail = $this->projects_model->get_project_by_id($project_id);
        $this->data['detail'] = $detail;
        // print_r($detail);die;
        $this->render('admin/projects/detail_project_view');
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


    public function remove_image(){
        $id = $this->input->get('id');
        $image = $this->input->get('image');
        $detail = $this->projects_model->get_project_by_id($id);
        if ($image == $detail['project_avatar']) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => "Ảnh này đang được chọn làm Avatar. Không thể xóa!")));
        }else{
            $old_images = json_decode($detail['project_description_image']);
            $key = array_search($image, $old_images);
            unset($old_images[$key]);
            $new_images = [];
            foreach ($old_images as $key => $value) {
                $new_images[] = $value;
            }
            $image_json = json_encode($new_images);
            $data = array('project_description_image' => $image_json);
            $update = $this->projects_model->update_project($id, $data);
            if($update){
                if($image != '' && file_exists('assets/upload/projects/'.$image)){
                    unlink('assets/upload/projects/'.$image);
                }
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => '')));
            }
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(array('status' => 400)));
        }
    }

    public function active_image(){
        $id = $this->input->get('id');
        $image = $this->input->get('image');
        $data = array('project_avatar' => $image);
        $update = $this->projects_model->update_project($id, $data);
        if($update){
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => '')));
            }
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(array('status' => 400)));
    }

}