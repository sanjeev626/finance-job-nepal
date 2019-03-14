<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Service Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Service extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
    }

    public function index(){

        $data['title'] = '.:: SERVICE ::.';
        $data['page_header'] = 'Service';
        $data['page_header_icone'] = 'fa-cogs';
        $data['nav'] = 'service';
        $data['panel_title'] = 'Service List';
        $data['service'] = $this->service_model->get_all_service();
        $data['main'] = 'service/service_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = '.:: ADD SERVICE ::.';
        $data['page_header'] = 'Service';
        $data['page_header_icone'] = 'fa-cogs';
        $data['nav'] = 'service';
        $data['panel_title'] = 'Add Service ';
        $data['main'] = 'service/add-edit-service';

        $this->load->view('home', $data);
    }

    public function addService(){
        $this->form_validation->set_rules('servicename', 'servicename', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'service/add-edit-service';
            $this->load->view('home', $data);
        } else {
            $this->service_model->insert_service();
            $this->session->set_flashdata('success', 'Service Added Successfully...');
            redirect(base_url() . 'admin/Service', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Service');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Service');

        $data['title'] = '.:: EDIT SERVICE ::.';
        $data['page_header'] = 'Service';
        $data['page_header_icone'] = 'fa-cogs';
        $data['nav'] = 'service';
        $data['panel_title'] = 'Edit Service ';
        $data['service_detail'] = $this->service_model->get_service_by_id($id);
        $data['main'] = 'service/add-edit-service';

        $this->load->view('home', $data);
    }

    public function editService($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Service');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Service');

         $this->form_validation->set_rules('servicename', 'servicename', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'service/add-edit-service';
            $this->load->view('home', $data);
        } else {
            $this->service_model->update_service($id);
            $this->session->set_flashdata('success', 'Service Update Successfully...');
            redirect(base_url() . 'admin/Service', 'refresh');
        }
    }

    public function deleteService($id){
        if (!isset($id))
            redirect(base_url() . 'admin/Service');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Service');

        $this->service_model->delete_service($id);
        $this->session->set_flashdata('success', 'Service Deleted Successfully...');
        redirect(base_url() . 'admin/Service', 'refresh');
    }

}

/* End of file Service.php
 * Location: ./application/modules/admin/controllers/Service.php */