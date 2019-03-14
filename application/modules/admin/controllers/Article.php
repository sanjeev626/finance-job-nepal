<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Article Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
    }

    public function index(){

        $data['title'] = '.:: ARTICLE ::.';
        $data['page_header'] = 'Article Manager';
        $data['page_header_icone'] = 'fa-edit';
        $data['nav'] = 'article';
        $data['panel_title'] = 'Article Manager';
        $data['article'] = $this->article_model->get_all_article();
        $data['main'] = 'article/article_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){

        $data['title'] = '.:: ADD ARTICLE ::.';
        $data['page_header'] = 'Article Manager';
        $data['page_header_icone'] = 'fa-plus';
        $data['nav'] = 'article';
        $data['panel_title'] = 'Add Article ';
        //$data['article_detail'] = $this->article_model->get_article_by_id($id);
        $data['main'] = 'article/add-article';

        $this->load->view('home', $data);
    }

    public function addArticle(){

        $this->article_model->add_article();
        $this->session->set_flashdata('success', 'Article Added Successfully...');
        redirect(base_url() . 'admin/Article', 'refresh');
    }

    public function edit($id){
            
        if (!isset($id))
            redirect(base_url() . 'admin/Article');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Article');

        $data['title'] = '.:: EDIT ARTICLE ::.';
        $data['page_header'] = 'Article Manager';
        $data['page_header_icone'] = 'fa-edit';
        $data['nav'] = 'article';
        $data['panel_title'] = 'Edit Article ';
        $data['article_detail'] = $this->article_model->get_article_by_id($id);
        $data['main'] = 'article/edit-article';

        $this->load->view('home', $data);
    }

    public function editArticle($id){

        if (!isset($id))
        redirect(base_url() . 'admin/Article');

        if (!is_numeric($id))
        redirect(base_url() . 'admin/Article');

        $this->article_model->update_article($id);
        $this->session->set_flashdata('success', 'Article Updated Successfully...');
        redirect(base_url() . 'admin/Article', 'refresh');
    }

}

/* End of file Article.php
 * Location: ./application/modules/admin/controllers/Article.php */