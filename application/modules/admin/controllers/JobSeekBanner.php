<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * JobSeekBanner Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class JobSeekBanner extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jobseekbanner_model');
    }

    public function index(){

        $data['title'] = '.:: JOB SEEKER BANNER ::.';
        $data['page_header'] = 'Seeker Banner';
        $data['page_header_icone'] = 'fa-file-image-o';
        $data['nav'] = 'jobseek_right';
        $data['panel_title'] = 'Seeker Banner List';
        $data['jobseekBanner'] = $this->jobseekbanner_model->get_all_jobseekBanner();
        $data['main'] = 'jobseekBanner/jobseekBanner_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = '.:: ADD JOB SEEKER BANNER ::.';
        $data['page_header'] = 'Seeker Banner';
        $data['page_header_icone'] = 'fa-file-image-o';
        $data['nav'] = 'jobseek_right';
        $data['panel_title'] = 'Add Seeker Banner ';
        $data['main'] = 'jobseekBanner/add-edit-jobseekBanner';

        $this->load->view('home', $data);
    }

    public function addJobSeekBanner(){
        $this->form_validation->set_rules('title', 'title', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'jobseekBanner/add-edit-jobseekBanner';
            $this->load->view('home', $data);
        } else {
            
             $a = $_FILES['bannerImage']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/jobseeker_banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['bannerImage']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('bannerImage');
                $upload_data = $this->upload->data();
                $bannerimage = $upload_data['file_name'];
            }

            if(!isset($bannerimage))  $bannerimage = '';
            
            $this->jobseekbanner_model->insert_jobseekBanner($bannerimage);
            $this->session->set_flashdata('success', 'JobSeekBanner Added Successfully...');
            redirect(base_url() . 'admin/JobSeekBanner', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/JobSeekBanner');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/JobSeekBanner');

        $data['title'] = '.:: EDIT JOB SEEKER BANNER ::.';
        $data['page_header'] = 'Seeker Banner';
        $data['page_header_icone'] = 'fa-file-image-o';
        $data['nav'] = 'jobseek_right';
        $data['panel_title'] = 'Edit Seeker Banner ';
        $data['jobseekBanner_detail'] = $this->jobseekbanner_model->get_jobseekBanner_by_id($id);
        $data['main'] = 'jobseekBanner/add-edit-jobseekBanner';

        $this->load->view('home', $data);
    }

    public function editJobSeekBanner($id){

        if (!isset($id))
            redirect(base_url() . 'admin/JobSeekBanner');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/JobSeekBanner');

         $this->form_validation->set_rules('title', 'title', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: EDIT JOB SEEKER BANNER ::.';
            $data['page_header'] = 'Seeker Banner';
            $data['page_header_icone'] = 'fa-file-image-o';
            $data['nav'] = 'jobseek_right';
            $data['panel_title'] = 'Edit Seeker Banner ';
            $data['jobseekBanner_detail'] = $this->jobseekbanner_model->get_jobseekBanner_by_id($id);
            $data['main'] = 'jobseekBanner/add-edit-jobseekBanner';
            $this->load->view('home', $data);
        } else {
            
             $a = $_FILES['bannerImage']['name'];

            if ($a !== "") {
                
                $old_banner = $this->input->post('old_bannerImage');
                $oldpath = '././uploads/jobseeker_banner/'.$old_banner;
                
                unlink($oldpath);
                
                $config['upload_path'] = './././uploads/jobseeker_banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['bannerImage']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('bannerImage');
                $upload_data = $this->upload->data();
                $bannerimage = $upload_data['file_name'];
            }

            if(!isset($bannerimage))  $bannerimage = '';
            
            
            $this->jobseekbanner_model->update_jobseekBanner($id,$bannerimage);
            $this->session->set_flashdata('success', 'JobSeekBanner Update Successfully...');
            redirect(base_url() . 'admin/JobSeekBanner', 'refresh');
        }
    }

    public function deleteJobSeekBanner($id){
        if (!isset($id))
            redirect(base_url() . 'admin/JobSeekBanner');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/JobSeekBanner');

        $this->jobseekbanner_model->delete_jobseekBanner($id);
        $this->session->set_flashdata('success', 'JobSeekBanner Deleted Successfully...');
        redirect(base_url() . 'admin/JobSeekBanner', 'refresh');
    }

}

/* End of file JobSeekBanner.php
 * Location: ./application/modules/admin/controllers/JobSeekBanner.php */