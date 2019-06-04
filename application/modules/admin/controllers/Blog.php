<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 23/05/2019
 * Time: 11:07 AM
 */
class Blog extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('blog_model');
    }

    public function index(){
        $data['title'] = '.:: Blog ::.';
        $data['page_header'] = 'Blog Manager';
        $data['page_header_icone'] = 'fa-plus';
        $data['nav'] = 'blog';
        $data['panel_title'] = 'Add Blog ';
        $data['blog'] = $this->blog_model->get_all_blog();
        $data['main'] = 'blog/blog_list_view';

        $this->load->view('home', $data);
    }

    public function blogadd(){
        $data['title'] = '.:: ADD Blog ::.';
        $data['page_header'] = 'Blog Manager';
        $data['page_header_icone'] = 'fa-plus';
        $data['nav'] = 'blog';
        $data['panel_title'] = 'Add Blog ';
        $data['categories'] = $this->blog_model->get_all_publish_category();
        //$data['article_detail'] = $this->article_model->get_article_by_id($id);
        $data['main'] = 'blog/add_blog';

        $this->load->view('home', $data);
    }

    public function saveblog(){

        $a = $_FILES['blogImage']['name'];

        if ($a !== "") {
            $config['upload_path'] = './././uploads/blog/';
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '100000'; // 0 = no file size limit
            $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['blogImage']['name']));
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('blogImage');
            $upload_data = $this->upload->data();
            $logoimage = $upload_data['file_name'];
        }

        if(!isset($logoimage))  $logoimage = '';

        $this->blog_model->save_blog($logoimage);
        $this->session->set_flashdata('success', 'Blog Added Successfully...');
        redirect(base_url() . 'admin/blog', 'refresh');
    }

    public function blogedit($id){
        if (!isset($id))
            redirect(base_url() . 'admin/blog');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/blog');

        $data['title'] = '.:: EDIT Blog ::.';
        $data['page_header'] = 'Blog Manager';
        $data['page_header_icone'] = 'fa-edit';
        $data['nav'] = 'blog';
        $data['panel_title'] = 'Edit Blog ';
        $data['blog_detail'] = $this->blog_model->get_blog_by_id($id);
        $data['categories'] = $this->blog_model->get_all_publish_category();
        $data['main'] = 'blog/add_blog';

        $this->load->view('home', $data);
    }

    public function updateblog($id){
        if (!isset($id))
            redirect(base_url() . 'admin/blog');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/blog');

        $a = $_FILES['blogImage']['name'];

        if ($a !== "") {
            $config['upload_path'] = './././uploads/blog/';
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '100000'; // 0 = no file size limit
            $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['blogImage']['name']));
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('blogImage');
            $upload_data = $this->upload->data();
            $logoimage = $upload_data['file_name'];
        }

        if(!isset($logoimage))  $logoimage = '';

        $this->blog_model->update_blog($id,$logoimage);
        $this->session->set_flashdata('success', 'Blog Update Successfully...');
        redirect(base_url() . 'admin/blog', 'refresh');
    }


    /*
     * blog category section
     */

    public function category(){
        $data['title'] = '.:: Blog ::.';
        $data['page_header'] = 'Blog Category Manager';
        $data['page_header_icone'] = 'fa-plus';
        $data['nav'] = 'category';
        $data['panel_title'] = 'Add Category ';
        $data['all_category'] = $this->blog_model->get_all_category();
        $data['main'] = 'blog/category_manager_view';

        $this->load->view('home', $data);
    }

    public  function categoryadd(){
        $data['title'] = '.:: Add Category ::.';
        $data['page_header'] = 'Blog Category Manager';
        $data['page_header_icone'] = 'fa-plus';
        $data['nav'] = 'category';
        $data['panel_title'] = 'Add Category ';

        $data['main'] = 'blog/category_add';
        $this->load->view('home', $data);

    }

    public function categoryedit($id){
        if (!isset($id))
            redirect(base_url() . 'admin/blog/category');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/blog/category');


        $data['title'] = '.:: EDIT Category ::.';
        $data['page_header'] = 'Blog Category Manager';
        $data['page_header_icone'] = 'fa-edit';
        $data['nav'] = 'category';
        $data['panel_title'] = 'Edit Category ';
        $data['category_detail'] = $this->blog_model->get_category_by_id($id);
        $data['main'] = 'blog/category_add';

        $this->load->view('home', $data);
    }

    public function saveCategory(){
        $this->blog_model->add_category();
        $this->session->set_flashdata('success', 'Category Added Successfully...');
        redirect(base_url() . 'admin/blog/category', 'refresh');
    }

    public function updateCategory($id){
        if (!isset($id))
            redirect(base_url() . 'admin/blog/category');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/blog/category');

        $this->blog_model->update_category($id);
        $this->session->set_flashdata('success', 'Category Updated Successfully...');
        redirect(base_url() . 'admin/blog/category', 'refresh');
    }

    public function delete($id){
        $this->blog_model->delete($id);
        $this->session->set_flashdata('success', 'Blog  Deleted Successfully...');
        redirect(base_url() . 'admin/blog', 'refresh');
    }

    public function deletecategory($id){
        $this->blog_model->delete_category($id);
        $this->session->set_flashdata('success', 'Blog Category Deleted Successfully...');
        redirect(base_url() . 'admin/blog/category', 'refresh');
    }

}