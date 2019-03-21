<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Advertisement_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Advertisement_model extends CI_Model {

    private $table_advertisement = 'advertisement';

    public function __construct() {
        parent::__construct();
    }

    public function get_advertisement_details($limit = NULL, $offset = NULL) {
        $this->db->select();
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get($this->table_advertisement);  
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_advertisement(){
        $data = array(
            'addtitle' => $this->input->post('addtitle'),
            'addstatus' => $this->input->post('addstatus'),
            'website' => $this->input->post('website')
            );
        $this->db->insert($this->table_advertisement,$data);
        return $this->db->insert_id();
    }

    public function get_advertisement_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_advertisement);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_advertisement($id){
    	$data = array(
    		'addtitle' => $this->input->post('addtitle'),
            'addstatus' => $this->input->post('addstatus'),
            'website' => $this->input->post('website')
    		);
    	$this->db->where('id',$id);
    	$this->db->update($this->table_advertisement,$data);
    }

    public function delete_advertisement($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_advertisement);
    }

}

/* End of file Advertisement_model.php
 * Location: ./application/modules/admin/models/Advertisement_model.php */