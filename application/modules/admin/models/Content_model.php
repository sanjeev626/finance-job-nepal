<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Content_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Content_model extends CI_Model {

    private $table_content = 'content';

    public function __construct() {
        parent::__construct();
        $this->load->model('general_model');
    }


    public function get_all_content(){
    	$this->db->select('id , title , slug, cr_date , up_date');
    	$query =  $this->db->get($this->table_content);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_content_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_content);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function add_content(){
        $up_date = date('Y-m-d h:i:s');
        $title = $this->input->post('title');
        $data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            'contents' => $this->input->post('contents'),
            'cr_date' =>$up_date,
            'up_date' =>$up_date
            );
        $this->db->insert($this->table_content,$data);
    }

    public function update_content($id){
    	$up_date = date('Y-m-d h:i:s');
        $title = $this->input->post('title');
    	$data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
    		'contents' => $this->input->post('contents'),
    		'up_date' =>$up_date
    		);
    	$this->db->where('id',$id);
    	$this->db->update($this->table_content,$data);
    }

}

/* End of file Content_model.php
 * Location: ./application/modules/admin/models/Content_model.php */