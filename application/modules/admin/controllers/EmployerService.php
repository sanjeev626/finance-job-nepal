<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * EmployerService Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class EmployerService extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employerService_model');
    }

    public function index(){

        $data['title'] = '.:: EMPLOYER SERVICE ::.';
        $data['page_header'] = 'Employer Service';
        $data['page_header_icone'] = 'fa-wrench';
        $data['nav'] = 'employer_service';
        $data['panel_title'] = 'Seeker Banner List';
        $data['employer_service'] = $this->employerService_model->get_all_employerService();
        $data['main'] = 'employerService/employerService_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = '.:: ADD EMPLOYER SERVICE ::.';
        $data['page_header'] = 'Employer Service';
        $data['page_header_icone'] = 'fa-wrench';
        $data['nav'] = 'employer_service';
        $data['panel_title'] = 'Add Employer Servicer ';
        $data['main'] = 'employerService/add-edit-employerService';

        $this->load->view('home', $data);
    }

    public function addEmployerService(){
        $this->form_validation->set_rules('title', 'title', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'employerService/add-edit-employerService';
            $this->load->view('home', $data);
        } else {
            
             $a = $_FILES['servicelogo']['name'];

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

            if(!isset($serviceimage))  $serviceimage = '';
            
            $this->employerService_model->insert_employerService($serviceimage);
            $this->session->set_flashdata('success', 'EmployerService Added Successfully...');
            redirect(base_url() . 'admin/EmployerService', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/EmployerService');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/EmployerService');

        $data['title'] = '.:: EDIT EMPLOYER SERVICE ::.';
        $data['page_header'] = 'Employer Service';
        $data['page_header_icone'] = 'fa-wrench';
        $data['nav'] = 'employer_service';
        $data['panel_title'] = 'Edit Employer Service ';
        $data['employerservice_detail'] = $this->employerService_model->get_employerService_by_id($id);
        $data['main'] = 'employerService/add-edit-employerService';

        $this->load->view('home', $data);
    }

    public function editEmployerService($id){

        if (!isset($id))
            redirect(base_url() . 'admin/EmployerService');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/EmployerService');

         $this->form_validation->set_rules('title', 'title', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: EDIT EMPLOYER SERVICE ::.';
            $data['page_header'] = 'Employer Service';
            $data['page_header_icone'] = 'fa-wrench';
            $data['nav'] = 'employer_service';
            $data['panel_title'] = 'Edit Employer Service';
            $data['employerservice_detail'] = $this->employerService_model->get_employerService_by_id($id);
            $data['main'] = 'employerService/add-edit-employerService';
            $this->load->view('home', $data);
        } else {
            
             $a = $_FILES['servicelogo']['name'];

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

            if(!isset($serviceimage))  $serviceimage = '';
            
            
            $this->employerService_model->update_employerService($id,$serviceimage);
            $this->session->set_flashdata('success', 'EmployerService Update Successfully...');
            redirect(base_url() . 'admin/EmployerService/edit'.$id, 'refresh');
        }
    }

    public function deleteEmployerService($id){
        if (!isset($id))
            redirect(base_url() . 'admin/EmployerService');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/EmployerService');

        $this->employerService_model->delete_employerService($id);
        $this->session->set_flashdata('success', 'EmployerService Deleted Successfully...');
        redirect(base_url() . 'admin/EmployerService', 'refresh');
    }

}

/* End of file EmployerService.php
 * Location: ./application/modules/admin/controllers/EmployerService.php */