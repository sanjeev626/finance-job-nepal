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

        $data['title'] = 'CONTENT ';
        $data['page_header'] = 'Content Manager';
        $data['page_header_icone'] = 'fa-edit';
        $data['nav'] = 'content';
        $data['panel_title'] = 'Content Manager';
        $data['content'] = $this->content_model->get_all_content();
        $data['main'] = 'content/content_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){

        $data['title'] = 'ADD CONTENT ';
        $data['page_header'] = 'Content Manager';
        $data['page_header_icone'] = 'fa-plus';
        $data['nav'] = 'content';
        $data['panel_title'] = 'Add Content ';
        //$data['content_detail'] = $this->content_model->get_content_by_id($id);
        $data['main'] = 'content/add-content';

        $this->load->view('home', $data);
    }

    public function addContent(){

        $a = $_FILES['contentImage']['name'];

        if ($a !== "") {
            $config['upload_path'] = './././uploads/content/';
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '100000'; // 0 = no file size limit
            $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['contentImage']['name']));
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('contentImage');
            $upload_data = $this->upload->data();
            $image = $upload_data['file_name'];
        }

        if(!isset($image))  $image = '';

        $this->content_model->add_content($image);
        $this->session->set_flashdata('success', 'Content Added Successfully...');
        redirect(base_url() . 'admin/content', 'refresh');
    }

    public function edit($id){
            
        if (!isset($id))
            redirect(base_url() . 'admin/content');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/content');

        $data['title'] = 'EDIT CONTENT ';
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
        redirect(base_url() . 'admin/content');

        if (!is_numeric($id))
        redirect(base_url() . 'admin/content');

        $a = $_FILES['contentImage']['name'];

        if ($a !== "") {
            $config['upload_path'] = './././uploads/content/';
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '100000'; // 0 = no file size limit
            $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['contentImage']['name']));
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('contentImage');
            $upload_data = $this->upload->data();
            $image = $upload_data['file_name'];
        }

        if(!isset($image))  $image = '';

        $this->content_model->update_content($id,$image);
        $this->session->set_flashdata('success', 'Content Updated Successfully...');
        redirect(base_url() . 'admin/content/edit/'.$id, 'refresh');
    }

    public function delete($id){
        $this->content_model->delete($id);
        $this->session->set_flashdata('success', 'Content Field Deleted Successfully...');
        redirect(base_url() . 'admin/content', 'refresh');
    }



}

/* End of file Content.php
 * Location: ./application/modules/admin/controllers/Content.php */
   