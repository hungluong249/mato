<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_project extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('register_project_model');
		//Do your magic here
	}

	public function index(){
		$this->temp(0, 'index');
	}

	public function success(){
		$this->temp(1, 'success');
	}

	public function cancel(){
		$this->temp(2, 'cancel');
	}

	protected function temp($status, $action){
		$this->load->library('pagination');
        $config = array();
        $base_url = base_url() . 'admin/register_project/'. $action;
        $total_rows = $this->register_project_model->count($status);
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['result'] = $this->register_project_model->get_all($status, $per_page, $this->data['page']);

        $this->render('admin/register_project/list_register_project_view');
	}

	public function status_success(){
		$id = $this->input->get('id');
		$data = array('status' => 1);
		$update = $this->register_project_model->update($id, $data);
		if($update){
			return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200)));
		}
		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(array('status' => 400)));
	}

	public function status_cancel(){
		$id = $this->input->get('id');
		$data = array('status' => 2);
		$update = $this->register_project_model->update($id, $data);
		if($update){
			return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200)));
		}
		return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(array('status' => 400)));
	}

}

/* End of file Register_project.php */
/* Location: ./application/controllers/admin/Register_project.php */