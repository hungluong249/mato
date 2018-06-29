<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_project_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function insert($data){
		return $this->db->insert('register_project', $data);
	}

	public function count($status = 0) {
        $this->db->select('*');
        $this->db->from('register_project');
        $this->db->where('is_deleted', 0);
        $this->db->where('status', $status);
        return $result = $this->db->get()->num_rows();
    }

    public function get_all($status = 0, $limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('register_project');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $this->db->where('status', $status);
        return $result = $this->db->get()->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('register_project', $data);
    }

}

/* End of file Register_project_model.php */
/* Location: ./application/models/Register_project_model.php */