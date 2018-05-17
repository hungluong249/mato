<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends Admin_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('teams_model');
    }

	public function index(){
		$this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/teams/index';
        $total_rows = $this->teams_model->count();
        $per_page = 1;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['result'] = $this->teams_model->get_all($per_page, $this->data['page']);

        $this->render('admin/team/list_team_view');
	}

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('image', 'Image', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/team/create_team_view');
        } else {
        	if ($this->input->post()) {
        		$check_upload = true;
        		if ($_FILES['image']['size'] > 1228800) {
        			$check_upload = false;
        		}
        		if ($check_upload == true) {
        			if(!empty($_FILES['image']['name'])){
        				$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/teams', 'assets/upload/teams/thumbs');
        				$data = array(
        					'name' => $this->input->post('name'),
        					'image' => $image,
        					'position' => $this->input->post('position'),
        					'facebook' => $this->input->post('facebook'),
        					'instagram' => $this->input->post('instagram'),
        					'created' => $this->author_info['created'],
        					'created_by' => $this->author_info['created_by'],
        					'modified' => $this->author_info['modified'],
        					'modified_by' => $this->author_info['modified_by']
        				);

        				try {
        					$this->teams_model->insert($data);
        					$this->session->set_flashdata('message_success', 'Thêm mới thành công!');
        				} catch (Exception $e) {
        					$this->session->set_flashdata('message_error', 'There was an error inserting news: ' . $e->getMessage());
        				}
        				redirect('admin/teams', 'refresh');
        			}else{
        				$this->session->set_flashdata('message_error', 'Vui lòng chọn ảnh upload!');
        				redirect('admin/teams/create');
        			}
        		}else{
        			$this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
        			redirect('admin/teams');
        		}
        	}
        }
	}

	public function edit($id){
		$this->load->helper('form');
        $this->load->library('form_validation');
        if(!isset($id) || !is_numeric($id)){
        	$this->session->set_flashdata('message_error', 'No such partner!');
        	redirect('admin/teams', 'refresh');
        }
        $detail = $this->teams_model->get_by_id($id);
        $this->data['detail'] = $detail;

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/team/edit_team_view');
        } else {
        	if ($this->input->post()) {
        		$check_upload = true;
        		if ($_FILES['image']['size'] > 1228800) {
        			$check_upload = false;
        		}
        		if ($check_upload == true) {
        			$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/teams', 'assets/upload/teams/thumbs');
        			$data = array(
        				'name' => $this->input->post('name'),
        				'position' => $this->input->post('position'),
        				'facebook' => $this->input->post('facebook'),
        				'instagram' => $this->input->post('instagram'),
        				'created' => $this->author_info['created'],
        				'created_by' => $this->author_info['created_by'],
        				'modified' => $this->author_info['modified'],
        				'modified_by' => $this->author_info['modified_by']
        			);
        			if($image){
        				$data['image'] = $image;
        			}
        			try {
        				$upload = $this->teams_model->update($id, $data);
        				if ($upload) {
        					if($image != $detail['image']){
        						if (file_exists('assets/upload/teams/'. $detail['image'])){
        							unlink('assets/upload/teams/'. $detail['image']);
        						}
        						$unlink_image = explode('.', $detail['image']);
        						if (count($unlink_image) == 2) {
        							if (file_exists('assets/upload/teams/thumbs/'. $unlink_image[0] .'_thumb.'. $unlink_image[1])){
        								unlink('assets/upload/teams/thumbs/'. $unlink_image[0] .'_thumb.'. $unlink_image[1]);
        							}
        						}
        					}
        				}
        				$this->session->set_flashdata('message_success', 'Cập nhật thành công!');
        			} catch (Exception $e) {
        				$this->session->set_flashdata('message_error', 'There was an error inserting news: ' . $e->getMessage());
        			}
        			redirect('admin/teams', 'refresh');
        		}else{
        			$this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
        			redirect('admin/teams');
        		}
        	}
        }
	}

	public function delete($id) {
        $detail = $this->teams_model->get_by_id($id);

        if (!$detail) {
            redirect('admin/teams', 'refresh');
        }

        $set_delete = array('is_deleted' => 1);
        try {
            $delete = $this->teams_model->delete($id, $set_delete);
            if($delete){
            	if (file_exists('assets/upload/teams/'. $detail['image'])){
            		unlink('assets/upload/teams/'. $detail['image']);
            	}
            }
            $this->session->set_flashdata('message', 'Item has deleted successful.');
        } catch (Exception $e) {
            $this->session->set_flashdata('message', 'Have error while delete item: ' . $e->getMessage());
        }
        
        redirect('admin/teams', 'refresh');
    }

}

/* End of file Team.php */
/* Location: ./application/controllers/admin/Team.php */