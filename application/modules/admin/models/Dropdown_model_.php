<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Dropdown_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Dropdown_model extends CI_Model {

    private $table_dropdown = 'dropdown';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_dropdown_field() {
        $this->db->select();    
        $query = $this->db->get('fields');  
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_all_field($id){
        $this->db->select();
        $this->db->where('fid',$id);
        $query = $this->db->get($this->table_dropdown);  
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_dropdown(){
        $data = array(
            'fid' => $this->input->post('fid'),
            'dropvalue' => $this->input->post('dropvalue')
            );
        $this->db->insert($this->table_dropdown,$data);
    }

    public function get_dropdown_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_dropdown);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_dropdown($id){
    	$data = array(
    		'fid' => $this->input->post('fid'),
            'dropvalue' => $this->input->post('dropvalue')
    		);
    	$this->db->where('id',$id);
    	$this->db->update($this->table_dropdown,$data);
    }

    public function delete_dropdown($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_dropdown);
    }

}

/* End of file Dropdown_model.php
 * Location: ./application/modules/admin/models/Dropdown_model.php */