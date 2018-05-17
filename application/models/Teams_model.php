<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    public function get_all($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        return $result = $this->db->get()->result_array();
    }
    public function count() {
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->num_rows();
    }
    public function insert($data) {
        return $this->db->insert('team', $data);
    }

    public function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('is_deleted', 0);
        $this->db->where('id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('team', $data);
    }

    public function delete($id, $set_delete) {
        $this->db->where('id', $id);
        return $this->db->update('team', $set_delete);
    }

}

/* End of file team_model.php */
/* Location: ./application/models/team_model.php */