<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_projects($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_delete', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("project_id", "desc");
        return $result = $this->db->get()->result_array();
    }

    public function get_related($limit = NULL, $related = NULL, $id = null) {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_delete', 0);
        $this->db->where('project_filter', $related);
        $this->db->where('project_id !=', $id);
        $this->db->limit($limit);
        $this->db->order_by("project_id", "RANDOM");
        return $result = $this->db->get()->result_array();
    }
    
    public function get_all_main_projects(){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_main', 1);
        $this->db->where('project_is_delete', 0);
        $this->db->order_by("project_id", "desc");
        return $result = $this->db->get()->result_array();
    }
    
    public function get_all_sub_projects(){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_main', 0);
        $this->db->where('project_is_delete', 0);
        $this->db->order_by("project_id", "desc");
        return $result = $this->db->get()->result_array();
    }

    public function count_projects() {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_delete', 0);
        return $result = $this->db->get()->num_rows();
    }
    
    public function count_main_projects(){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_delete', 0);
        $this->db->where('project_is_main', 1);
        return $result = $this->db->get()->num_rows();
    }
    
    public function count_sub_projects(){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_delete', 0);
        $this->db->where('project_is_main', 0);
        return $result = $this->db->get()->num_rows();
    }
    
    public function count_deleted_project(){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_delete', 1);
        return $result = $this->db->get()->num_rows();
    }

    public function get_project_by_id($id) {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('project_is_delete', 0);
        $this->db->where('project_id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    public function insert_project($data) {
        return $this->db->insert('projects', $data);
    }

    public function update_project($id, $data) {
        $this->db->where('project_id', $id);
        return $this->db->update('projects', $data);
    }

    public function delete_project($id, $set_delete) {
        $this->db->where('project_id', $id);
        return $this->db->update('projects', $set_delete);
    }

}
