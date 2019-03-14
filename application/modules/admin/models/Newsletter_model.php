<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Newsletter_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 25, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Newsletter_model extends CI_Model {

    private $table_tblnewsletter = 'tblnewsletter';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_functionalarea(){
    	$this->db->select('functionalarea_id,title');
        $this->db->where('status',1);
        $this->db->order_by('display_order','ASC');
    	$query =  $this->db->get('tbl_functionalareas');
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function search_newsletter_by_parameter($catId){
        $this->db->select();
        $this->db->where('cid',$catId);
        $query = $this->db->get($this->table_tblnewsletter);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_newsletter_content($newsid){
        $this->db->select('newstitle, newscontents');
        $this->db->where('newsid',$newsid);
        $query = $this->db->get($this->table_tblnewsletter);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }


    public function insert_newsletter(){
        $newsdate = date('Y-m-d h:i:s');
        $data = array(
            'cid' => $this->input->post('cid'),
            'newstitle' => $this->input->post('newstitle'),
            'newscontents' => $this->input->post('newscontents'),
            'newsdate' => $newsdate,
            'newsstatus' => 'Published'
            );
        $this->db->insert($this->table_tblnewsletter,$data);
    }

    public function get_newsletter_by_id($id){
    	$this->db->select();
    	$this->db->where('newsid',$id);
    	$query = $this->db->get($this->table_tblnewsletter);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_newsletter($id){
    	 $newsdate = date('Y-m-d h:i:s');
         $data = array(
            'cid' => $this->input->post('cid'),
            'newstitle' => $this->input->post('newstitle'),
            'newscontents' => $this->input->post('newscontents'),
            'newsdate' => $newsdate,
            'newsstatus' => 'Published'
            );
    	$this->db->where('newsid',$id);
    	$this->db->update($this->table_tblnewsletter,$data);
    }

    public function get_cid_from_newsid($newsid){
        $this->db->select('cid');
        $this->db->where('newsid',$newsid);
        $query = $this->db->get($this->table_tblnewsletter);
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            return $query->row()->cid;
        }
    }

    public function get_all_email($table,$cid){
        $this->db->select('id,email');
        if($cid){
            $this->db->where('funcarea1',$cid);
            $this->db->or_where('funcarea2',$cid);
        }
        $this->db->group_by('email');
        $this->db->order_by('email');
        $query = $this->db->get($table);
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            return $query->result();
        }
    }

    public function get_all_info_by_id($table,$id){
        $this->db->select('fname,mname,lname,email');
        $this->db->where('id',$id);
        $query = $this->db->get($table);
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            return $query->row();
        }
    }

}

/* End of file Newsletter_model.php
 * Location: ./application/modules/admin/models/Newsletter_model.php */