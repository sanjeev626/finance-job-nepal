<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Content Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Content extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('content_model');
    }

    public function index(){

        $data['title'] = '.:: CONTENT ::.';
        $data['page_header'] = 'Content Manager';
        $data['page_header_icone'] = 'fa-edit';
        $data['nav'] = 'content';
        $data['panel_title'] = 'Content Manager';
        $data['content'] = $this->content_model->get_all_content();
        $data['main'] = 'content/content_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){

        $data['title'] = '.:: ADD CONTENT ::.';
        $data['page_header'] = 'Content Manager';
        $data['page_header_icone'] = 'fa-plus';
        $data['nav'] = 'content';
        $data['panel_title'] = 'Add Content ';
        //$data['content_detail'] = $this->content_model->get_content_by_id($id);
        $data['main'] = 'content/add-content';

        $this->load->view('home', $data);
    }

    public function addContent(){

        $this->content_model->add_content();
        $this->session->set_flashdata('success', 'Content Added Successfully...');
        redirect(base_url() . 'admin/Content', 'refresh');
    }

    public function edit($id){
            
        if (!isset($id))
            redirect(base_url() . 'admin/Content');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Content');

        $data['title'] = '.:: EDIT CONTENT ::.';
        $data['page_header'] = 'Content Manager';
        $data['page_header_icone'] = 'fa-edit';
        $data['nav'] = 'content';
        $data['panel_title'] = 'Edit Content ';
        $data['content_detail'] = $this->content_model->get_content_by_id($id);
        $data['main'] = 'content/edit-content';

        $this->load->view('home', $data);
    }

    public function editContent($id){

        if (!isset($id))
        redirect(base_url() . 'admin/Content');

        if (!is_numeric($id))
        redirect(base_url() . 'admin/Content');

        $this->content_model->update_content($id);
        $this->session->set_flashdata('success', 'Content Updated Successfully...');
        redirect(base_url() . 'admin/Content', 'refresh');
    }

}

/* End of file Content.php
 * Location: ./application/modules/admin/controllers/Content.php */
   