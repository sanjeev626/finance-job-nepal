<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin employerService_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class employerService_model extends CI_Model {

    private $table_globaljob_service = 'globaljob_service';

    public function __construct() {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function get_all_employerService(){
    	$this->db->select();
    	$query =  $this->db->get($this->table_globaljob_service);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_employerService($image){
        $title = $this->input->post('title');
        $data = array(
            'urlcode' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            'logo'=>$image,
            'short_description' => $this->input->post('short_description'),
            'content' => $this->input->post('content')
            );
        $this->db->insert($this->table_globaljob_service,$data);
    }

    public function get_employerService_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_globaljob_service);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_employerService($id,$image){
    	$title = $this->input->post('title');
        $data = array(
            'urlcode' => $this->general_model->get_urlcode($title),
    		'title' => $this->input->post('title'),
            'short_description' => $this->input->post('short_description'),
            'content' => $this->input->post('content')
    		);
        
        if($image){
            $data['logo'] = $image;
        }
        
    	$this->db->where('id',$id);
    	$this->db->update($this->table_globaljob_service,$data);
    }

    public function delete_employerService($id){
        $this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_globaljob_service);
        
        $final_result = $query->row();
        
        $path = '././uploads/service/'.$final_result->logo;
        
        unlink($path);
        
        $this->db->where('id',$id);
        $this->db->delete($this->table_globaljob_service);
    }

}

/* End of file employerService_model.php
 * Location: ./application/modules/admin/models/employerService_model.php */