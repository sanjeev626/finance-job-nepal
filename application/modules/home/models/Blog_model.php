<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 24/05/2019
 * Time: 02:26 PM
 */
class Blog_model extends CI_Model
{

    private $table_blog = 'blog';

    public function __construct() {

        parent::__construct();

    }

    public function get_blog_by_slug($slug)
    {
        $this->db->select();
        $this->db->where('slug',$slug);
        $query = $this->db->get($this->table_blog);
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            return $query->row();
        }
    }
}