<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 23, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('general_model');
    }
   
    function index() {
        $date = date('Y-m-d');
        $data['title'] = 'Finance Job Nepal';
        $data['page_header'] = 'Dashboard';
        $data['page_header_icone'] = 'fa-home';
        $data['main'] = 'dashboard_view';
        $data['parent_nav'] = '';
        $data['nav'] = 'dashboard';
        //$data['total_clients'] = $this->general_model->countTotal('clients');
        $data['total_employer'] = $this->general_model->countTotal('employer');
        $data['total_job_seeker'] = $this->general_model->countTotal('seeker');
        $data['total_job'] = $this->general_model->countTotal('jobs',"applybefore >= '".$date."'",'applybefore DESC');
        //print_r($this->session->all_userdata());
        
        $user_id = $this->session->userdata('user_id');
        if($user_id<4)
            $this->load->view('home', $data);
        else if($user_id==4)
        {
            $this->load->model("seeker_model");
            $config['base_url'] = base_url() . 'admin/Seeker';
            $config['uri_segment'] = 3;
            $config['per_page'] = 25;

            /* Bootstrap Pagination  */

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";

            /* End of Bootstrap Pagination */

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


            $config['total_rows'] = $this->db->count_all('seeker');
            $data['seeker'] = $this->seeker_model->get_all_seeker_limited($config['per_page'], $page);
            $this->pagination->initialize($config);
            $data['title'] = 'RECRUITER for Global Job';
            $data['page_header'] = 'Job Seeker';
            $data['page_header_icone'] = 'fa-user';
            $data['nav'] = 'seeker';
            $data['panel_title'] = 'Job Seeker List';
            $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
            $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
            $data['job_title'] =$this->general_model->getAll('jobs','','jobtitle ASC','id,jobtitle,eid,displayname');
            $data['location'] =$this->general_model->getAll('dropdown','fid = 2','','id,dropvalue');
            $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
            $data['applied_organisation'] =$this->general_model->getAll('employer','','','id,orgname');

            $data['main'] = 'seeker/seeker_manager_view';

            $this->load->view('admin/home', $data);
        }
        else
        {
            $this->load->model("seeker_model");
            $config['base_url'] = base_url() . 'admin/Seeker';
            $config['uri_segment'] = 3;
            $config['per_page'] = 25;

            /* Bootstrap Pagination  */

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";

            /* End of Bootstrap Pagination */

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


            $config['total_rows'] = $this->db->count_all('seeker');
            $data['seeker'] = $this->seeker_model->get_all_seeker_limited($config['per_page'], $page);
            $this->pagination->initialize($config);
            $data['title'] = 'RECRUITER for Global Job';
            $data['page_header'] = 'Job Seeker';
            $data['page_header_icone'] = 'fa-user';
            $data['nav'] = 'seeker';
            $data['panel_title'] = 'Job Seeker List';
            $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
            $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
            $data['job_title'] =$this->general_model->getAll('jobs','','jobtitle ASC','id,jobtitle,eid,displayname');
            $data['location'] =$this->general_model->getAll('dropdown','fid = 2','','id,dropvalue');
            $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
            $data['applied_organisation'] =$this->general_model->getAll('employer','','','id,orgname');

            $data['main'] = 'seeker/seeker_manager_view';

            $this->load->view('admin/home', $data);
        }
    }

}

/* End of file dashboard.php
 * Location: ./application/modules/admin/controllers/dashboard.php */