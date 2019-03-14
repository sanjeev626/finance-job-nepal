<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Employer Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 26, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Employer extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->model('general_model');
        $this->load->model('vacancy_model');
    }

    public function index(){

        $config['base_url'] = base_url() . 'admin/Employer';
        $config['uri_segment'] = 3;
        $config['per_page'] = 100;

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

        
        $config['total_rows'] = $this->db->count_all('employer');
        $data['employer'] = $this->employer_model->get_all_employer($config['per_page'], $page);
        

        $this->pagination->initialize($config);

        $data['title'] = '.:: EMPLOYER ::.';
        $data['page_header'] = 'Employer';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'Employer List';
        $data['main'] = 'employer/employer_manager_view';
        $data['organisation_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');

        $this->load->view('admin/home', $data);
    }

    public function viewEmployerBasket(){
        $data['title'] = '.:: VIEW BASKET ::.';
        $data['page_header'] = 'View Employer Basket';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'View Employer Basket ';
        $data['main'] = 'employer/view_employer_basket';
        $data['basket_employer'] =  $this->employer_model->get_basket_employer();

        $this->load->view('home', $data);
    }

    public function employerBasket(){
        $emp_id = $this->input->post('emp_id');
        $empl_info = $this->employer_model->get_employer_basket_by_id($emp_id);
        $consaturation = '';

        $saturation = $this->general_model->getById('dropdown','id',$empl_info->salutation)->dropvalue;
        $orga_head = $saturation." ". $empl_info->fname." ".$empl_info->mname." ".$empl_info->lname;

        $consaturation_data = $this->general_model->getById('dropdown','id',$empl_info->consalutation);
        if(isset($consaturation_data) && !empty($consaturation_data))
            $consaturation = $consaturation_data->dropvalue;

        $conc_person = $consaturation." ".$empl_info->confname." ".$empl_info->conmname." ".$empl_info->conlname;

        $orgn_type = $this->general_model->getById('dropdown','id',$empl_info->orgtype)->dropvalue;

        $email = ($empl_info->email) ? $empl_info->email : $empl_info->email2;

        $html ='';
         $html .= "<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>";
              $html .= "<thead>";
                $html .= " <tr>";
                   $html .= "<th width='25%'></th>";
                   $html .= "<th width='30%'></th>";
                   $html .= "<th width='25%'></th>";
                   $html .= "<th width='30%'></th>";
                 $html .= "</tr>";
               $html .= "</thead>";
               $html .= "<tbody>";
                 $html .= "<tr>";
                   $html .= "<td colspan='4'><h4 style='color: green;'>".$empl_info->orgname."</h4></td>";  
                 $html .= "</tr>";
                   $html .= "<tr>";
                     $html .= "<td class='green-bold'>Employer Ref No : </td>";
                     $html .= "<td>Globaljob ".$empl_info->id."</td>";
                     $html .= "<td></td>";
                     $html .= "<td></td>";
                   $html .= "</tr>";
                   $html .= "<tr>";
                    $html .= "<td class='green-bold' >Company Name : </td>";
                    $html .= "<td>".$empl_info->orgname."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Address : </td>";
                    $html .= "<td>".$empl_info->address."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Email ID : </td>";
                    $html .= "<td>".$email."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Contact No : </td>";
                    $html .= "<td>".$empl_info->phone."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Fax No. :</td>";
                    $html .= "<td>".$empl_info->fax."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Organization Type </td>";
                    $html .= "<td>".$orgn_type."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Organization Head : </td>";
                    $html .= "<td>".$orga_head."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Designation : </td>";
                    $html .= "<td>".$empl_info->designation."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Concerned Person : </td>";
                    $html .= "<td>".$conc_person."</td>";
                    $html .= "<td></td>";
                    $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                  $html .= "<td></td>";
                  $html .= "<td></td>";
                  $html .= "<td></td>";
                  $html .= "<td></td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Is Locked : </td>";
                    $html .= "<td>No</td>";
                    $html .= "<td class='green-bold'>Is Registered</td>";
                    $html .= "<td>Yes</td>";
                  $html .= "</tr>";
                  $html .= "<tr>";
                    $html .= "<td class='green-bold'>Last Access : </td>";
                    $html .= "<td>".$empl_info->modifieddate."</td>";
                    $html .= "<td class='green-bold'>Membership Date</td>";
                    $html .= "<td>".$empl_info->joindate."</td>";
                  $html .= "</tr>";

                $html .= "</tbody>";
              $html .= "</table>";

              echo $html;
    }

    public function removeBasket($eid){

        if (!isset($eid))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($eid))
            redirect(base_url() . 'admin/Employer');


        $this->employer_model->remove_employer_basket($eid);
        $this->session->set_flashdata('success', 'Employer Removed From Basket Successfully...');
        redirect(base_url() . 'admin/Employer/viewEmployerBasket', 'refresh');
    }

    public function deleteEmployer($eid){

        if (!isset($eid))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($eid))
            redirect(base_url() . 'admin/Employer');


        $this->employer_model->delete_employer($eid);
        $this->session->set_flashdata('success', 'Employer Deleted Successfully...');
        redirect(base_url() . 'admin/Employer', 'refresh');
    }

    /*public function convert_password(){
        $employer_info = $this->general_model->getAll('employer');
        foreach ($employer_info as $key => $value) {
            $eid = $value->id;
            $password = $value->password;
            $this->employer_model->update_password_md5($password,$eid);

            echo $key.' employer password updated.<br>';
        }
    } */

    public function view($eid){

        if (!isset($eid))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($eid))
            redirect(base_url() . 'admin/Employer');

        $data['title'] = '.:: VIEW EMPLOYER ::.';
        $data['page_header'] = 'View Employer ';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'View Employer  ';
        $data['main'] = 'employer/view_employer';
        $data['employer_info'] = $this->general_model->getById('employer','id',$eid);

        $this->load->view('home', $data);
    }

    public function changeEmployerPassword(){
        $emp_id = $this->input->post('emp_id');
        $new_password = $this->input->post('password');

        $this->employer_model->update_password($new_password,$emp_id);
        $this->session->set_flashdata('success', 'Employer Password Updated Successfully...');
        redirect(base_url() . 'admin/Employer/view/'.$emp_id, 'refresh');
    }

    public function changeCorporate($emp_id,$is_corporate){

        if (!isset($emp_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($emp_id))
            redirect(base_url() . 'admin/Employer');

        if($is_corporate == 'Yes'){
            $make_corporate = 'NO';
        }else{
            $make_corporate = 'Yes';
        }
        $this->employer_model->update_corporate($make_corporate,$emp_id);
        $this->session->set_flashdata('success', 'Employer Status Changed');
        redirect(base_url() . 'admin/Employer/view/'.$emp_id, 'refresh');   
    }

    public function moveToBasket($emp_id){

        if (!isset($emp_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($emp_id))
            redirect(base_url() . 'admin/Employer');


        $result = $this->employer_model->insert_employer_basket($emp_id);
        if($result == TRUE){
            $this->session->set_flashdata('success', 'Employer already Move To Basket');
        }else{
            $this->session->set_flashdata('success', 'Employer has been Move To Basket');
        }   
        redirect(base_url() . 'admin/Employer/view/'.$emp_id, 'refresh');  
    }

    public function employerJobList($emp_id){
        if (!isset($emp_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($emp_id))
            redirect(base_url() . 'admin/Employer');

        $data['title'] = '.:: EMPLOYER JOB LIST ::.';
        $data['page_header'] = 'Employer Job List';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'Employer Job List  ';
        $data['main'] = 'employer/employer_job_list';
        $data['employer_job_info'] = $this->employer_model->get_job_by_employer($emp_id);

        $this->load->view('home', $data);
    }

   

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Employer');

        $data['title'] = '.:: EDIT EMPLOYER ::.';
        $data['page_header'] = 'Employer';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'Edit Employer ';
        $data['employer_detail'] = $this->general_model->getById('employer','id',$id);
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
        $data['ownship'] =$this->general_model->getAll('dropdown','fid = 5','','id,dropvalue'); 
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['nature_of_organization'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
        $data['main'] = 'employer/edit-employer';

        $this->load->view('home', $data);
    }

    public function editEmployer($e_id){

        if (!isset($e_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($e_id))
            redirect(base_url() . 'admin/Employer');

        $this->form_validation->set_rules('orgname', 'orgname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('orgdesc', 'orgdesc', 'required');
        $this->form_validation->set_rules('designation', 'designation', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('contactperson', 'contactperson', 'required');

        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: EDIT EMPLOYER ::.';
            $data['page_header'] = 'Employer';
            $data['page_header_icone'] = 'fa-user-secret';
            $data['nav'] = 'employer';
            $data['panel_title'] = 'Edit Employer ';
            $data['employer_detail'] = $this->general_model->getById('employer','id',$e_id);
            $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
            $data['ownship'] =$this->general_model->getAll('dropdown','fid = 5','','id,dropvalue'); 
            $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
            $data['main'] = 'employer/edit-employer';

            $this->load->view('home', $data);

        } else {

            $a = $_FILES['logo']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/employer/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['logo']['name']));
                $config['overwrite'] = false;  
                $this->load->library('upload', $config);
                $this->upload->do_upload('logo');
                $upload_data = $this->upload->data();
                $complogo = $upload_data['file_name'];
            }
           
            if(!isset($complogo))  $complogo = '';  

            $this->employer_model->update_employer($e_id,$complogo);
            $this->session->set_flashdata('success', 'Employer Update Successfully...');
            redirect(base_url() . 'admin/Employer', 'refresh');
        }
    }

     public function searchEmployer(){

        $data['total_employer'] = $this->employer_model->search_employer_by_param();

        $config['base_url'] = base_url() . 'admin/Employer/searchEmployer';
        $config['uri_segment'] = 4;
        $config['per_page'] = 100;

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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['employer'] = $this->employer_model->search_employer_by_param($config['per_page'], $page);
        $config['total_rows'] = $data['total_employer'];
        
        $this->pagination->initialize($config);

        $data['title'] = '.:: SEARCH RESULT EMPLOYER ::.';
        $data['page_header'] = 'Search Result Employer';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'Search Result Employer ';
        $data['main'] = 'employer/search_result_employer';
        $data['organisation_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');

        $this->load->view('home', $data);

    }

    public function employerVideocv($emp_id)
    {
        if (!isset($emp_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($emp_id))
            redirect(base_url() . 'admin/Employer');

        $data['title'] = '.:: EMPLOYER Video CV ::.';
        $data['page_header'] = 'Employer Video CV';
        $data['page_header_icone'] = 'fa-video-camera';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'Employer Video CV  ';
        $data['main'] = 'employer/employer_video_cv';
        $data['employer_video_cv_info'] = $this->employer_model->get_video_cv_info($emp_id);

        $this->load->view('home', $data);

    }

    public function videocvAdd($emp_id)
    {
        if (!isset($emp_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($emp_id))
            redirect(base_url() . 'admin/Employer');

        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: ADD VIDEO CV ::.';
            $data['page_header'] = 'Add Video CV';
            $data['page_header_icone'] = 'fa-video-camera';
            $data['nav'] = 'Video CV';
            $data['panel_title'] = 'Add Video CV ';            
            $data['main'] = 'employer/employer_video_cv_add_edit';

            $this->load->view('home', $data);

        } else {
        $data['title'] = '.:: ADD Video CV ::.';
        $data['page_header'] = 'Add Video CV';
        $data['page_header_icone'] = 'fa-video-camera';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'Add Video CV  ';
        $data['main'] = 'employer/employer_video_cv_add_edit';
        $this->load->view('home', $data);
        }

    }

    public function addVideo_cv($emp_id){

        if (!isset($emp_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($emp_id))
            redirect(base_url() . 'admin/Employer');

        $this->form_validation->set_rules('activated_date', 'activated_date', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('expiry_date', 'expiry_date', 'required');

        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: ADD VIDEO CV ::.';
            $data['page_header'] = 'Add Video CV';
            $data['page_header_icone'] = 'fa-video-camera';
            $data['nav'] = 'employer';
            $data['panel_title'] = 'Add Video CV ';            
            $data['main'] = 'employer/employer_video_cv_add_edit';
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('home', $data);

        } else {
            $data['title'] = '.:: Employer Video CV ::.';
            $data['page_header'] = 'Employer Video CV';
            $data['page_header_icone'] = 'fa-video-camera';
            $data['nav'] = 'employer';
            $data['panel_title'] = 'Employer Video CV ';
            
            $this->employer_model->add_video_cv($emp_id);
            $this->session->set_flashdata('success', 'Video CV Added Successfully...');
            redirect(base_url() . 'admin/Employer/employerVideocv/'.$emp_id, 'refresh');
        }
    }

    public function videocvEdit($video_cv_id)
    {
        if (!isset($video_cv_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($video_cv_id))
            redirect(base_url() . 'admin/Employer');

        $data['title'] = '.:: EMPLOYER Video CV ::.';
        $data['page_header'] = 'Employer Video CV';
        $data['page_header_icone'] = 'fa-video-camera';
        $data['nav'] = 'employer';
        $data['panel_title'] = 'Employer Video CV  ';
        $data['main'] = 'employer/employer_video_cv_add_edit';
        $data['video_cv_info'] = $this->employer_model->get_single_video_cv_info($video_cv_id);

        $this->load->view('home', $data);

    }

    public function editVideo_cv($video_cv_id){

        if (!isset($video_cv_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($video_cv_id))
            redirect(base_url() . 'admin/Employer');

            $data['title'] = '.:: EDIT EMPLOYER ::.';
            $data['page_header'] = 'Employer';
            $data['page_header_icone'] = 'fa-user-secret';
            $data['nav'] = 'employer';
            $data['panel_title'] = 'Edit Employer ';
            
            $this->employer_model->update_video_cv($video_cv_id);
            $this->session->set_flashdata('success', 'Video CV Updated Successfully...');
            redirect(base_url() . 'admin/Employer/videocvEdit/'.$video_cv_id, 'refresh');
    }

    public function deleteVideoCv($emp_id, $video_cv_id){

        if (!isset($video_cv_id))
            redirect(base_url() . 'admin/Employer');

        if (!is_numeric($video_cv_id))
            redirect(base_url() . 'admin/Employer');
        echo $emp_id.$video_cv_id;
            
        $this->employer_model->delete_video_cv($video_cv_id);
        $this->session->set_flashdata('success', 'Video CV deleted Successfully...');
        redirect(base_url() . 'admin/Employer/employerVideocv/'.$emp_id, 'refresh');
    }

    public function updateJobs(){
            
        $this->employer_model->updatejob();
    }
}

/* End of file Employer.php
 * Location: ./application/modules/admin/controllers/Employer.php */