<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Search Controller
 * @package Controller
 * @subpackage Controller
 * Date created:February 14, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Search extends View_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('admin/general_model','general_model');
    }

    function index() {
        //Do nothing with this function
    }

    public function jobSearch(){
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

        $config['uri_segment'] = 3;
        $config['per_page'] = 25;

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url() . 'Search/jobSearch';

        $data['job_list']= $this->home_model->get_search_job_by_parameter($config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->home_model->get_search_job_by_parameter('','','total');

        $this->pagination->initialize($config);
        $data['menu'] = 'searchjob';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Job List';
        $data['job_info'] = $data['job_list'];
        $data['total_job'] = $data['total'];

        $data['main'] = 'job-list';
        $this->load->view('main',$data);
    }

    /*---------------------------------------------------------
                    Job Search  Page
    ---------------------------------------------------------*/
    public function job(){
        

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

        $config['uri_segment'] = 4;
        $config['per_page'] = 30;

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $config['base_url'] = base_url() . 'search/job';
        $config['total_rows'] = $this->home_model->get_search_job_by_parameter('', $page,'total');
        $config["cur_page"] = $page;
        $this->pagination->initialize($config);

        $data['menu'] = 'searchjob';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Search Job';
        $data['job_title'] = $this->input->post('job_title');
        $data['job_category'] = $this->input->post('job_category');
        $data['job_location'] = $this->input->post('location');
        $data['job_type'] = $this->input->post('job_type');
        $data['job_level'] =$this->input->post('job_level');
        

        $data['joblists']= $this->home_model->get_search_job_by_parameter($config['per_page'], $page);
        //echo $this->db->last_query();
        $data['main'] = 'job-by-category';
        $this->load->view('main',$data);
    }

    public function searchResult(){
       /* Bootstrap Pagination  */
        $per_page = 25;
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

        $config['uri_segment'] = 3;
        $config['per_page'] = $per_page;

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url() . 'Search/searchResult';

        $data['job_result']= $this->home_model->get_advance_search_job_by_parameter($config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->home_model->get_advance_search_job_by_parameter('','','total');

        $this->pagination->initialize($config);

        $data['menu'] = 'searchjob';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Search Job';
        $data['job_category'] = $this->general_model->getAll('dropdown','fid = 1','','id,dropvalue');
        $data['job_location'] = $this->general_model->getAll('dropdown','fid = 2','','id,dropvalue');
        $data['job_education'] = $this->general_model->getAll('dropdown','fid = 3','','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');
        $data['per_page'] = $per_page;
        $data['page'] = $page;

        $data['main'] = 'job-search';
        $this->load->view('main',$data);
    }

    public function searchByJobType($type){
        $data['job_list'] = '';
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

        $config['uri_segment'] = 3;
        $config['per_page'] = 25;

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url() . 'viewJobsType/'.$type;

        $data['job_list']= $this->home_model->get_news_job_list($config['per_page'], $page,$type);
        $config['total_rows'] = $data['total'] =$this->home_model->get_total_news_job_list($type);


        $this->pagination->initialize($config);
        $data['menu'] = 'searchjob';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Job List';
        $data['job_info'] = $data['job_list'];
        $data['total_job'] = $data['total'];

        $data['type'] = $type;

        $data['main'] = 'job-list';
        $this->load->view('main',$data);
    }



    public function getBydisplayIn($display_in){

        $display_in_id = $this->uri->segment(3);
        $title = $this->uri->segment(2);
        $title = str_replace('_',' ',$title);
        $title = str_replace('Jobs','',$title);
        $title = str_replace('jobs','',$title);
        $data['job_list'] = '';
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

        $config['uri_segment'] = 4;
        $config['per_page'] = 25;

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $config['base_url'] = base_url() . 'viewjobs/'.$this->uri->segment(2).'/'.$this->uri->segment(3);


        //$data['display_in'] = $this->home_model->get_job_by_display_in($id,100);

        $job_list = $this->home_model->get_display_in_job_list($config['per_page'], $page, $display_in_id);
        $config['total_rows'] = $data['total'] =$this->home_model->get_display_in_job_list('','',$display_in_id);


        $this->pagination->initialize($config);
        $data['menu'] = 'searchjob';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Job List';
        $data['job_info'] = $job_list;
        $data['total_job'] = $data['total'];

        $data['type'] = $title;

        $data['main'] = 'job-list';
        $this->load->view('main',$data);
    }

}

/* End of file Search.php
 * Location: ./application/modules/home/controllers/Search.php */
