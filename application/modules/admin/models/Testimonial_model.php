<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Testimonial_model Model
 * @package Model
 * @subpackage Model
 * Date created:March 06, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Testimonial_model extends CI_Model {

    private $table_testimonial = 'testimonial';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_testimonial(){
    	$this->db->select();
    	$query =  $this->db->get($this->table_testimonial);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_testimonial($image){
        $data = array(
            'name' => $this->input->post('name'),
            'company_name' => $this->input->post('company_name'),
            'position' => $this->input->post('position'),
            'image' => $image,
            'feedback' => $this->input->post('feedback')
            );
        $this->db->insert($this->table_testimonial,$data);
    }

    public function get_testimonial_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_testimonial);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_testimonial($id,$image){
    	$data = array(
    		 'name' => $this->input->post('name'),
            'company_name' => $this->input->post('company_name'),
            'position' => $this->input->post('position'),
            'feedback' => $this->input->post('feedback')
    		);
        if($image){
            $data['image'] = $image;
        }
    	$this->db->where('id',$id);
    	$this->db->update($this->table_testimonial,$data);
    }

    public function delete_testimonial($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_testimonial);
    }

}

/* End of file Testimonial_model.php
 * Location: ./application/modules/admin/models/Testimonial_model.php */
