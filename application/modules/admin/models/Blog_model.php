<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Blog_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Blog_model extends CI_Model
{
    private $table_blog = 'blog';
    private $table_category = 'category';

    public function __construct() {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function get_all_blog(){
        $this->db->select('*');
        $query =  $this->db->get($this->table_blog);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function save_blog($image){
        $up_date = date('Y-m-d h:i:s');
        $title = $this->input->post('title');
        $data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            'cat_id' => $this->input->post('category'),
            'articles' => $this->input->post('articles'),
            'cr_date' =>$up_date,
            'up_date' =>$up_date,
            'stat' => $this->input->post('status'),
            'image' => $image
        );
        $this->db->insert($this->table_blog,$data);
    }

    public function update_blog($id,$image){
        $up_date = date('Y-m-d h:i:s');
        $title = $this->input->post('title');
        $data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            'articles' => $this->input->post('articles'),
            'cat_id' => $this->input->post('category'),
            'up_date' =>$up_date,
            'stat' => $this->input->post('status'),
        );
        if($image){
            $data['image'] = $image;
        }
        $this->db->where('id',$id);
        $this->db->update($this->table_blog,$data);
    }

    public function get_blog_by_id($id)
    {
        $this->db->select();
        $this->db->where('id',$id);
        $query = $this->db->get($this->table_blog);
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            return $query->row();
        }
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_blog);
    }



    //    blog category section
    public function get_all_publish_category(){
        $this->db->select('*');
        $this->db->where('status','Y');
        $query =  $this->db->get($this->table_category);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    public function get_all_category(){
        $this->db->select('*');
        $query =  $this->db->get($this->table_category);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_category_by_id($id){
        $this->db->select();
        $this->db->where('id',$id);
        $query = $this->db->get($this->table_category);
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            return $query->row();
        }
    }

    public function add_category(){
        $title = $this->input->post('title');
        $data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            'status' => $this->input->post('status'),
        );

        $this->db->insert($this->table_category,$data);

    }

    public function update_category($id){

        $title = $this->input->post('title');
        $data = array(
            'slug' => $this->general_model->get_urlcode($title),
            'title' => $this->input->post('title'),
            'status' => $this->input->post('status'),
        );
        $this->db->where('id',$id);
        $this->db->update($this->table_category,$data);
    }

    public function delete_category($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_category);
    }

    //    blog category section

}