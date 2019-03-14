<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Vacancy Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 26, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Vacancy extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vacancy_model');
        $this->load->model('general_model');
    }

    public function index(){

        if(isset($_POST) && !empty($_POST) || !empty($_POST['category'])){
          $cat = $this->input->post('category');

          if($cat != ""){
            $data['job_info'] = $this->vacancy_model->search_job_by_parameter($cat);
        }

        $data['category'] = $cat;    
        }else{
        $data['category'] = '';
        }

      $data['title'] = '.:: VACANCY ::.';
      $data['page_header'] = 'Vacancy';
      $data['page_header_icone'] = 'fa fa-bullhorn';
      $data['nav'] = 'vacancy';
      $data['panel_title'] = 'Job Manager';
      $data['jobcategory'] = $this->vacancy_model->get_all_jobcategory();   
      $data['main'] = 'vacancy/vacancy_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = '.:: ADD VACANCY ::.';
        $data['page_header'] = 'Vacancy';
        $data['page_header_icone'] = 'fa fa-bullhorn';
        $data['nav'] = 'vacancy';
        $data['panel_title'] = 'Add Vacancy ';
        $data['jobcategory'] = $this->vacancy_model->get_all_jobcategory(); 
        $data['employer'] =$this->general_model->getAll('employer','','orgname');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue'); 
        $data['education'] =$this->general_model->getAll('dropdown','fid = 3','','id,dropvalue'); 
        $data['job_location'] =$this->general_model->getAll('dropdown','fid = 2','','id,dropvalue'); 
        $data['main'] = 'vacancy/add-edit-vacancy';

        $this->load->view('home', $data);
    }

    public function addVacancy(){
        $this->form_validation->set_rules('jobtitle', 'jobtitle', 'required');
        $this->form_validation->set_rules('requiredno', 'requiredno', 'required');
        $this->form_validation->set_rules('background', 'background', 'required');

        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: ADD VACANCY ::.';
            $data['page_header'] = 'Vacancy';
            $data['page_header_icone'] = 'fa fa-bullhorn';
            $data['nav'] = 'vacancy';
            $data['panel_title'] = 'Add Vacancy ';
            $data['jobcategory'] = $this->vacancy_model->get_all_jobcategory(); 
            $data['employer'] =$this->general_model->getAll('employer','','orgname');
            $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue'); 
            $data['education'] =$this->general_model->getAll('dropdown','fid = 3','','id,dropvalue'); 
            $data['job_location'] =$this->general_model->getAll('dropdown','fid = 2','','id,dropvalue'); 
            $data['main'] = 'vacancy/add-edit-vacancy';
            $this->load->view('home', $data);
        } else {

            $a = $_FILES['complogo']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/employer/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['complogo']['name']));
                $config['overwrite'] = false;  
                $this->load->library('upload', $config);
                $this->upload->do_upload('complogo');
                $upload_data = $this->upload->data();
                $complogo = $upload_data['file_name'];
            }
           
            if(!isset($complogo))  $complogo = '';  

            $this->vacancy_model->insert_vacancy($complogo);
            $this->session->set_flashdata('success', 'Job Added Successfully...');
            redirect(base_url() . 'admin/Vacancy', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Vacancy');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Vacancy');

        $data['title'] = '.:: EDIT Vacancy ::.';
        $data['page_header'] = 'Vacancy';
        $data['page_header_icone'] = 'fa fa-bullhorn';
        $data['nav'] = 'vacancy';
        $data['panel_title'] = 'Edit Vacancy ';

        $data['job_detail'] = $this->vacancy_model->get_job_by_id($id);
        $data['jobcategory'] = $this->vacancy_model->get_all_jobcategory(); 
        $data['employer'] =$this->general_model->getAll('employer','','orgname');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue'); 
        $data['education'] =$this->general_model->getAll('dropdown','fid = 3','','id,dropvalue'); 
        $data['job_location'] =$this->general_model->getAll('dropdown','fid = 2','','id,dropvalue');
        $data['main'] = 'vacancy/add-edit-vacancy';

        $this->load->view('home', $data);
    }

    public function editVacancy($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Vacancy');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Vacancy');

        $this->form_validation->set_rules('jobtitle', 'jobtitle', 'required');
        $this->form_validation->set_rules('requiredno', 'requiredno', 'required');
        //$this->form_validation->set_rules('background', 'background', 'required');

        if (FALSE == $this->form_validation->run()) {
            $data['job_detail'] = $this->vacancy_model->get_job_by_id($id);
            $data['jobcategory'] = $this->vacancy_model->get_all_jobcategory(); 
            $data['employer'] =$this->general_model->getAll('employer','','orgname');
            $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue'); 
            $data['education'] =$this->general_model->getAll('dropdown','fid = 3','','id,dropvalue'); 
            $data['job_location'] =$this->general_model->getAll('dropdown','fid = 2','','id,dropvalue');
            $data['main'] = 'vacancy/add-edit-vacancy';
            $this->load->view('home', $data);
        } else {

            $a = $_FILES['complogo']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/employer/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['complogo']['name']));
                $config['overwrite'] = false;  
                $this->load->library('upload', $config);
                $this->upload->do_upload('complogo');
                $upload_data = $this->upload->data();
                $complogo = $upload_data['file_name'];
            }
           
            if(!isset($complogo))  $complogo = '';  

            $this->vacancy_model->update_vacancy($id,$complogo);
            $this->session->set_flashdata('success', 'Job Update Successfully...');
            

            //redirect(base_url() . 'admin/Vacancy/edit/'.$id, 'refresh');
        }
    }

    public function deleteVacancy($id){

      if (!isset($id))
            redirect(base_url() . 'admin/Vacancy');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Vacancy');

        $this->vacancy_model->delete_vacancy($id);
        $this->session->set_flashdata('success', 'Job Deleted Successfully...');
        redirect(base_url() . 'admin/Vacancy', 'refresh');
    }

    public function jobtitleSlug(){

        $job_info = $this->general_model->getAll('jobs');
        foreach ($job_info as $key => $value) {
            $jid = $value->id;
            $jobtitle = $value->jobtitle;
            $this->vacancy_model->update_job_slug($jobtitle,$jid);

            echo $key.' Job Slug updated.<br>';
        }
    }

}

/* End of file Vacancy.php
 * Location: ./application/modules/admin/controllers/Vacancy.php */
