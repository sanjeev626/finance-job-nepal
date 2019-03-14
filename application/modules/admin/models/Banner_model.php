<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Banner_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Banner_model extends CI_Model {

    private $table_topbanner = 'topbanner';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_banner(){
    	$this->db->select();
    	$query =  $this->db->get($this->table_topbanner);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }

    public function insert_banner(){
        $data = array(
            'servicename' => $this->input->post('servicename'),
            'content' => $this->input->post('content')
            );
        $this->db->insert($this->table_topbanner,$data);
    }

    public function get_banner(){
    	$this->db->select();
    	$query = $this->db->get($this->table_topbanner);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_banner($id,$leftimage,$rightimage,$jobseeker,$employer){

    	$data = array(
    		'leftlink'   =>  $this->input->post('leftlink'),
            'rightlink'  =>  $this->input->post('rightlink')
    		);

        if(!empty($leftimage)){
            $data['leftimage'] = $leftimage;
        }
        if(!empty($rightimage)){
            $data['rightimage'] = $rightimage;
        }
        if(!empty($jobseeker)){
            $data['jobseeker'] = $jobseeker;
        }
        if(!empty($employer)){
            $data['employer'] = $employer;
        }

    	$this->db->where('id',$id);
    	$this->db->update($this->table_topbanner,$data);
    }

    public function delete_banner($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_topbanner);
    }

}

/* End of file Banner_model.php
 * Location: ./application/modules/admin/models/Banner_model.php */