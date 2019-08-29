<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Service_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Service_model extends CI_Model {

    private $table_service = 'service';

    public function __construct() {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function get_all_service(){
    	$this->db->select();
    	$query =  $this->db->get($this->table_service);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_service($image){
        $title = $this->input->post('title');
        $data = array(
            'urlcode' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            //'short_description' => $this->input->post('short_description'),
            'content' => $this->input->post('content')
            );
        if($image){
            $data['logo'] = $image;
        }
        $this->db->insert($this->table_service,$data);
    }

    public function get_service_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_service);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_service($id,$image){
        $title = $this->input->post('title');
    	$data = array(
            'urlcode' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            //'short_description' => $this->input->post('short_description'),
            'content' => $this->input->post('content')
    		);
        if($image){
            $data['logo'] = $image;
        }
    	$this->db->where('id',$id);
    	$this->db->update($this->table_service,$data);
    }

    public function delete_service($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_service);
    }

}

/* End of file Service_model.php
 * Location: ./application/modules/admin/models/Service_model.php */