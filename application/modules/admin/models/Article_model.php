<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Article_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Article_model extends CI_Model {

    private $table_article = 'article';

    public function __construct() {
        parent::__construct();
        $this->load->model('general_model');
    }


    public function get_all_article(){
        $this->db->select('id , title , slug, cr_date , up_date');
        $query =  $this->db->get($this->table_article);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_article_by_id($id){
        $this->db->select();
        $this->db->where('id',$id);
        $query = $this->db->get($this->table_article);
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            return $query->row();
        }
    }

    public function add_article(){
        $up_date = date('Y-m-d h:i:s');
        $title = $this->input->post('title');
        $data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            'articles' => $this->input->post('articles'),
            'cr_date' =>$up_date,
            'up_date' =>$up_date
            );
        $this->db->insert($this->table_article,$data);
    }

    public function update_article($id){
        $up_date = date('Y-m-d h:i:s');
        $title = $this->input->post('title');
        $data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'articles' => $this->input->post('articles'),
            'up_date' =>$up_date
            );
        $this->db->where('id',$id);
        $this->db->update($this->table_article,$data);
    }

}

/* End of file Article_model.php
 * Location: ./application/modules/admin/models/Article_model.php */