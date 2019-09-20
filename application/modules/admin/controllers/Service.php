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

        $data['title'] = 'SERVICE ';
        $data['page_header'] = 'Service';
        $data['page_header_icone'] = 'fa-cogs';
        $data['nav'] = 'service';
        $data['panel_title'] = 'Service List';
        $data['service'] = $this->service_model->get_all_service();
        $data['main'] = 'service/service_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = 'ADD SERVICE ';
        $data['page_header'] = 'Service';
        $data['page_header_icone'] = 'fa-cogs';
        $data['nav'] = 'service';
        $data['panel_title'] = 'Add Service ';
        $data['main'] = 'service/add-edit-service';

        $this->load->view('home', $data);
    }

    public function addService(){
        $this->form_validation->set_rules('title', 'title', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'service/add-edit-service';
            $this->load->view('home', $data);
        } else {
            /*$a = $_FILES['servicelogo']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/service/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['servicelogo']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('servicelogo');
                $upload_data = $this->upload->data();
                $serviceimage = $upload_data['file_name'];
            }
            if(!isset($serviceimage))*/  $serviceimage = '';

            $this->service_model->insert_service($serviceimage);
            $this->session->set_flashdata('success', 'Service Added Successfully...');
            redirect(base_url() . 'admin/service', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/service');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/service');

        $data['title'] = 'EDIT SERVICE ';
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
            redirect(base_url() . 'admin/service');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/service');

         $this->form_validation->set_rules('title', 'title', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'service/add-edit-service';
            $this->load->view('home', $data);
        } else {

            /*$a = $_FILES['servicelogo']['name'];

            if ($a !== "") {

                $old_banner = $this->input->post('old_servicelogo');
                $oldpath = '././uploads/service/'.$old_banner;

                unlink($oldpath);

                $config['upload_path'] = './././uploads/service/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['servicelogo']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('servicelogo');
                $upload_data = $this->upload->data();
                $serviceimage = $upload_data['file_name'];
            }
            if(!isset($serviceimage)) */ $serviceimage = '';

            $this->service_model->update_service($id,$serviceimage);
            $this->session->set_flashdata('success', 'Service Update Successfully...');
            redirect(base_url() . 'admin/service/edit/'.$id, 'refresh');
        }
    }

    public function deleteService($id){
        if (!isset($id))
            redirect(base_url() . 'admin/service');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/service');

        $this->service_model->delete_service($id);
        $this->session->set_flashdata('success', 'Service Deleted Successfully...');
        redirect(base_url() . 'admin/service', 'refresh');
    }

}

/* End of file Service.php
 * Location: ./application/modules/admin/controllers/Service.php */