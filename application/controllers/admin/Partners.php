<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends Admin_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('partners_model');
    }

	public function index(){
		$this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/partners/index';
        $total_rows = $this->partners_model->count();
        $per_page = 1;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['result'] = $this->partners_model->get_all($per_page, $this->data['page']);

        $this->render('admin/partners/list_partners_view');
	}

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');
    	if ($this->input->post()) {
    		$check_upload = true;
    		if ($_FILES['image']['size'] > 1228800) {
    			$check_upload = false;
    		}
    		if ($check_upload == true) {
    			if(!empty($_FILES['image']['name'])){
	        		$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/partners', 'assets/upload/partners/thumbs');
	        		$data = array(
	        			'title' => $this->input->post('title'),
	        			'image' => $image,
	        			'created' => $this->author_info['created'],
	                    'created_by' => $this->author_info['created_by'],
	                    'modified' => $this->author_info['modified'],
	                    'modified_by' => $this->author_info['modified_by']
	        		);

	        		try {
	        			$this->partners_model->insert($data);
	        			$this->session->set_flashdata('message_success', 'Thêm mới thành công!');
	        		} catch (Exception $e) {
	        			$this->session->set_flashdata('message_error', 'There was an error inserting news: ' . $e->getMessage());
	        		}
	        		redirect('admin/partners', 'refresh');
	        	}else{
	        		$this->session->set_flashdata('message_error', 'Vui lòng chọn ảnh upload!');
                	redirect('admin/partners/create');
	        	}
        	}else{
                $this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                redirect('admin/partners');
            }
    	}
    	$this->render('admin/partners/create_partners_view');
	}

	public function edit($id){
		$this->load->helper('form');
        $this->load->library('form_validation');
        if(!isset($id) || !is_numeric($id)){
        	$this->session->set_flashdata('message_error', 'No such partner!');
        	redirect('admin/partners', 'refresh');
        }
        $detail = $this->partners_model->get_by_id($id);
        $this->data['detail'] = $detail;

        if ($this->input->post()) {
    		$check_upload = true;
    		if ($_FILES['image']['size'] > 1228800) {
    			$check_upload = false;
    		}
    		if ($check_upload == true) {
        		$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/partners', 'assets/upload/partners/thumbs');
        		$data = array(
        			'title' => $this->input->post('title'),
        			'created' => $this->author_info['created'],
                    'created_by' => $this->author_info['created_by'],
                    'modified' => $this->author_info['modified'],
                    'modified_by' => $this->author_info['modified_by']
        		);
        		if($image){
        			$data['image'] = $image;
        		}
        		try {
        			$upload = $this->partners_model->update($id, $data);
                    if($upload){
                        if($image != $detail['image']){
                            if (file_exists('assets/upload/partners/'. $detail['image'])){
                                unlink('assets/upload/partners/'. $detail['image']);
                            }
                            $unlink_image = explode('.', $detail['image']);
                            if (count($unlink_image) == 2) {
                                if (file_exists('assets/upload/partners/thumbs/'. $unlink_image[0] .'_thumb.'. $unlink_image[1])){
                                    unlink('assets/upload/partners/thumbs/'. $unlink_image[0] .'_thumb.'. $unlink_image[1]);
                                }
                            }
                        }
                    }
        			$this->session->set_flashdata('message_success', 'Cập nhật thành công!');
        		} catch (Exception $e) {
        			$this->session->set_flashdata('message_error', 'There was an error inserting news: ' . $e->getMessage());
        		}
        		redirect('admin/partners', 'refresh');
        	}else{
                $this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                redirect('admin/partners');
            }
    	}

		$this->render('admin/partners/edit_partners_view');
	}

	public function delete($id) {
        $detail = $this->partners_model->get_by_id($id);

        if (!$detail) {
            redirect('admin/partners', 'refresh');
        }

        $set_delete = array('is_deleted' => 1);
        try {
            $delete = $this->partners_model->delete($id, $set_delete);
            if($delete){
                if (file_exists('assets/upload/partners/'. $detail['image'])){
                    unlink('assets/upload/partners/'. $detail['image']);
                }
            }
            $this->session->set_flashdata('message', 'Item has deleted successful.');
        } catch (Exception $e) {
            $this->session->set_flashdata('message', 'Have error while delete item: ' . $e->getMessage());
        }
        
        redirect('admin/partners', 'refresh');
    }
}

/* End of file Partner.php */
/* Location: ./application/controllers/admin/Partner.php */