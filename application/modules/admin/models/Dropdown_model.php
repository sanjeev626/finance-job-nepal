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
        $this->db->order_by("id", "asc");
        $query = $this->db->get($this->table_dropdown);  
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_dropdown(){
        $slug = $this->cleanurl($this->input->post('dropvalue'));
        $data = array(
            'fid' => $this->input->post('fid'),
            'dropvalue' => $this->input->post('dropvalue'),
            'slug'  => $slug
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
        $slug = $this->cleanurl($this->input->post('dropvalue'));
    	$data = array(
    		'fid' => $this->input->post('fid'),
            'dropvalue' => $this->input->post('dropvalue'),
            'slug'  => $slug
    		);
    	$this->db->where('id',$id);
    	$this->db->update($this->table_dropdown,$data);
    }

    public function delete_dropdown($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_dropdown);
    }

    public function cleanurl($string) {
        $string = strtolower(trim($string));
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one
    }

}

/* End of file Dropdown_model.php
 * Location: ./application/modules/admin/models/Dropdown_model.php */