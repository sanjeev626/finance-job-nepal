<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Banner Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Banner extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('banner_model');
    }

    public function index(){

        $data['title'] = '.:: BANNER ::.';
        $data['page_header'] = 'Banner';
        $data['page_header_icone'] = 'fa-image';
        $data['nav'] = 'banner';
        $data['panel_title'] = 'Banner Manager';
        $data['main'] = 'banner/banner_manager_view';
        $data['banner_info']=$this->banner_model->get_all_banner();

        $this->load->view('admin/home', $data);
    }

    public function edit(){

        $data['title'] = '.:: EDIT BANNER ::.';
        $data['page_header'] = 'Banner';
        $data['page_header_icone'] = 'fa-image';
        $data['nav'] = 'banner';
        $data['panel_title'] = 'Edit Banner ';
        $data['banner_detail'] = $this->banner_model->get_banner(); 
        $data['main'] = 'banner/edit-banner';

        $this->load->view('home', $data);
    }

    public function editBanner($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Banner');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Banner');

            $a = $_FILES['leftimage']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = 'leftimage_' . date('m-d-Y-His');
                $config['overwrite'] = false; //print_r($config); 
                $this->load->library('upload', $config);
                $this->upload->do_upload('leftimage');
                $upload_data = $this->upload->data();
                $leftimage = $upload_data['file_name'];
            }
           
            if(!isset($leftimage))  $leftimage = '';  

            $b = $_FILES['rightimage']['name'];  

            if ($b !== "") {
                $config['upload_path'] = './././uploads/banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = 'rightimage_' . date('m-d-Y-His');
                $config['overwrite'] = false; //print_r($config); 
                $this->load->library('upload', $config);
                $this->upload->do_upload('rightimage');
                $upload_data = $this->upload->data();
                $rightimage = $upload_data['file_name'];
            }
           
            if(!isset($rightimage)) $rightimage = '';  

            $c = $_FILES['flashimage']['name'];

            if ($c !== "") {
                $config['upload_path'] = './././uploads/banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif|swf';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = 'flash';
                $config['overwrite'] = true; //print_r($config); 
                $this->load->library('upload', $config);
                $this->upload->do_upload('flashimage');
                $upload_data = $this->upload->data();
                $flashimage = $upload_data['file_name'];
            }
            

            $d = $_FILES['jobseeker']['name'];

            if ($d !== "") {
                $config['upload_path'] = './././uploads/banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = 'jobseeker_' . date('m-d-Y-His');
                $config['overwrite'] = false; //print_r($config); 
                $this->load->library('upload', $config);
                $this->upload->do_upload('jobseeker');
                $upload_data = $this->upload->data();
                $jobseeker = $upload_data['file_name'];
            }
           
            if(!isset($jobseeker)) $jobseeker = '';  

            $e = $_FILES['employer']['name'];

            if ($e !== "") {
                $config['upload_path'] = './././uploads/banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = 'employer_' . date('m-d-Y-His');
                $config['overwrite'] = false; //print_r($config); 
                $this->load->library('upload', $config);
                $this->upload->do_upload('employer');
                $upload_data = $this->upload->data();
                $employer = $upload_data['file_name'];
            }
           
            if(!isset($employer)) $employer = '';  

            $this->banner_model->update_banner($id,$leftimage,$rightimage,$jobseeker,$employer);
            $this->session->set_flashdata('success', 'Banner Update Successfully...');
            redirect(base_url() . 'admin/Banner', 'refresh');
    }

    public function deleteBanner($id){
        if (!isset($id))
            redirect(base_url() . 'admin/Banner');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Banner');

        $this->banner_model->delete_banner($id);
        $this->session->set_flashdata('success', 'Banner Deleted Successfully...');
        redirect(base_url() . 'admin/Banner', 'refresh');
    }

}

/* End of file Banner.php
 * Location: ./application/modules/admin/Banner/v.php */