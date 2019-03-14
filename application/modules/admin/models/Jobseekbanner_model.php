<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Jobseekbanner_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Jobseekbanner_model extends CI_Model {

    private $table_jobseek_banner = 'jobseek_banner';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_jobseekBanner(){
    	$this->db->select();
        $this->db->where('publish','1');
    	$query =  $this->db->get($this->table_jobseek_banner);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_jobseekBanner($image){
        $data = array(
            'title' => $this->input->post('title'),
            'link' =>$this->input->post('link'),
            'image'=>$image,
            'publish' => $this->input->post('publish'),
            //'ordering' => $this->input->post('banner_order'),
            );
        $this->db->insert($this->table_jobseek_banner,$data);
    }

    public function get_jobseekBanner_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_jobseek_banner);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_jobseekBanner($id,$image){
    	$data = array(
    		'title' => $this->input->post('title'),
            'link' =>$this->input->post('link'),
            'publish' => $this->input->post('publish'),
            //'ordering' => $this->input->post('banner_order'),
    		);
        
        if($image){
            $data['image'] = $image;
        }
        
    	$this->db->where('id',$id);
    	$this->db->update($this->table_jobseek_banner,$data);
    }

    public function delete_jobseekBanner($id){
        $this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_jobseek_banner);
        
        $final_result = $query->row();
        
        $path = '././uploads/jobseeker_banner/'.$final_result->image;
        
        unlink($path);
        
        $this->db->where('id',$id);
        $this->db->delete($this->table_jobseek_banner);
    }

}

/* End of file Jobseekbanner_model.php
 * Location: ./application/modules/admin/models/Jobseekbanner_model.php */