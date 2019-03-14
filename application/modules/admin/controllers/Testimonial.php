<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Testimonial Controller
 * @package Controller
 * @subpackage Controller
 * Date created:March 06, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Testimonial extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('testimonial_model');
    }

    public function index(){

        $data['title'] = '.:: TESTIMONIAL ::.';
        $data['page_header'] = 'Testimonial';
        $data['page_header_icone'] = 'fa-comments-o';
        $data['nav'] = 'testimonial';
        $data['panel_title'] = 'Testimonial List';
        $data['testimonial'] = $this->testimonial_model->get_all_testimonial();
        $data['main'] = 'testimonial/testimonial_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = '.:: ADD TESTIMONIAL ::.';
        $data['page_header'] = 'Testimonial';
        $data['page_header_icone'] = 'fa-comments-o';
        $data['nav'] = 'testimonial';
        $data['panel_title'] = 'Add Testimonial ';
        $data['main'] = 'testimonial/add-edit-testimonial';

        $this->load->view('home', $data);
    }

    public function addTestimonial(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'testimonial/add-edit-testimonial';
            $this->load->view('home', $data);
        } else {

            $a = $_FILES['image']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/testimonial/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['image']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];
            }

            if(!isset($image))  $image = '';

            $this->testimonial_model->insert_testimonial($image);
            $this->session->set_flashdata('success', 'Testimonial Added Successfully...');
            redirect(base_url() . 'admin/Testimonial', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Testimonial');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Testimonial');

        $data['title'] = '.:: EDIT TESTIMONIAL ::.';
        $data['page_header'] = 'Testimonial';
        $data['page_header_icone'] = 'fa-comments-o';
        $data['nav'] = 'testimonial';
        $data['panel_title'] = 'Edit Testimonial ';
        $data['testimonial_detail'] = $this->testimonial_model->get_testimonial_by_id($id);
        $data['main'] = 'testimonial/add-edit-testimonial';

        $this->load->view('home', $data);
    }

    public function editTestimonial($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Testimonial');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Testimonial');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'testimonial/add-edit-testimonial';
            $this->load->view('home', $data);
        } else {

            $a = $_FILES['image']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/testimonial/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['image']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];
            }

            if(!isset($image))  $image = '';

            $this->testimonial_model->update_testimonial($id,$image);
            $this->session->set_flashdata('success', 'Testimonial Update Successfully...');
            redirect(base_url() . 'admin/Testimonial', 'refresh');
        }
    }

    public function deleteTestimonial($id){
        if (!isset($id))
            redirect(base_url() . 'admin/Testimonial');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Testimonial');

        $this->testimonial_model->delete_testimonial($id);
        $this->session->set_flashdata('success', 'Testimonial Deleted Successfully...');
        redirect(base_url() . 'admin/Testimonial', 'refresh');
    }

}

/* End of file Testimonial.php
 * Location: ./application/modules/admin/controllers/Testimonial.php */
