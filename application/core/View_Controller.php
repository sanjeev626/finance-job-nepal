<?php



class View_Controller extends CI_Controller

{



    function __construct()

    {

        parent::__construct();

        $this->load->model('home_model');

        $this->load->model('admin/general_model','general_model');

        $data['job_category'] = $this->general_model->getAll('dropdown','fid = 9','','id,dropvalue','',36);
        $data['job_organization'] = $this->general_model->getAll('employer','','orgname','id,orgname','','');
        //getAll($table, $where = NULL, $orderBy = NULL, $select = NULL, $group_by = NULL,$limit = NULL) {

        $data['location'] = $this->general_model->getAll('dropdown','fid = 2','','id,dropvalue','',32);

        $data['international_job'] = $this->home_model->get_job_by_type('IJob',10);

        $data['advertisment']= $this->home_model->get_all_advertisment();

        $data['testimonial']= $this->home_model->get_all_testimonial();

        $data['clients']= $this->home_model->get_all_clients();

       // $data['right_banner'] = $this->general_model->getResultById('slider',array('status' => 'Enabled','type'=>'right_portion'),'',1);

        

        $this->load->vars($data);



        //Send the data into the current view

        //http://ellislab.com/codeigniter/user-guide/libraries/loader.html

    }



}

