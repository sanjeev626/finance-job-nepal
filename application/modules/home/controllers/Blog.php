<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 24/05/2019
 * Time: 02:24 PM
 */
class Blog extends View_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('view_helper');
        $this->load->library('multiupload');
        $this->load->model('admin/general_model','general_model');
    }

    public function singlepage($slug){

        $blogdetail = $this->blog_model->get_blog_by_slug($slug);

        $data['blogdetail'] = $blogdetail;
        $data['menu'] = 'blog';
        $data['page_title'] = $blogdetail->title.' - Finance Job Nepal';
        $data['main'] = 'blog/single-blog';
        $this->load->view('main',$data);
    }

    public function index(){
        $bloglists = $this->blog_model->get_all_blog();

        $data['bloglists'] = $bloglists;


        $data['menu'] = 'blog';
        $data['page_title'] = 'Blog - Finance Job Nepal ';
        $data['main'] = 'blog/list-blog';
        $this->load->view('main',$data);
    }
}