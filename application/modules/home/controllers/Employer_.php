<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Employer Controller
 * @package Controller
 * @subpackage Controller
 * Date created:Febuary 08, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Employer extends View_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employer_model');
        $this->load->helper('view_helper');
        $this->load->library('multiupload');
        $this->load->model('admin/general_model','general_model');
    }

    public function index(){
    /*---------------------------------------------------------
                        Do nothing
    ---------------------------------------------------------*/
    }
    
    public function login(){
        /*---------------------------------------------------------
         Check Employer Session, if set then redirect to dashboard
        ---------------------------------------------------------*/
        $employer_profile = $this->session->userdata('employer_profile');
        if(!empty($employer_profile)){
            redirect(base_url() . 'Employer/dashboard');
        }

        /*---------------------------------------------------------
        Check JobSeeker Session, if Set then unset Session of Seeker
        ---------------------------------------------------------*/
//        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
//        if(!empty($jobseeker_profile)){
//            $this->session->unset_userdata('jobseeker_profile');
//        }

        $data['menu'] = 'home';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['clients'] = $this->general_model->getAll('clients','','','id,clientname,image','',30);
        //$data['services']=  $this->general_model->getAll('service','','','id,title,logo,short_description');
        $data['services']=  $this->general_model->getAll('service','','','id,servicename,content');
         
        $this->load->view('employer-login',$data);
    }
    
    public function signup(){
        $data['menu'] = 'employer';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
        $data['ownship'] =$this->general_model->getAll('dropdown','fid = 5','','id,dropvalue'); 
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['main'] = 'employer-signup';
        $data['message'] ='';
        $this->load->view('main',$data);
    }
    
    public function employerRegistration(){
    
        $this->form_validation->set_rules('orgname', 'Organisation Name', 'required');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('contactperson', 'Contact Person', 'required');
        $this->form_validation->set_rules('confname', 'confname', 'required');
        $this->form_validation->set_rules('conlname', 'conlname', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        
        if (FALSE == $this->form_validation->run()) {
            $data['message'] ='';
            /*$data['message'] .= 'Organisation Name is Required<br>';
            $data['message'] .= 'First Name is Required<br>';
            $data['message'] .= 'Last Name is Required<br>';
            $data['message'] .= 'Address is Required<br>';
            $data['message'] .= 'Phone is Required<br>';
            $data['message'] .= 'Email is Required and must be valid email<br>';
            $data['message'] .= 'Contact Person is Required<br>';
            $data['message'] .= 'Organisation First Name is Required<br>';
            $data['message'] .= 'Organisation Last Name is Required<br>';
            $data['message'] .= 'UserName is Required and Minimum legth must be 5 and Maximum length is 12<br>';
            $data['message'] .= 'Password is Required and Minimum length must be 8<br>';  
            */
            $data['message'] = validation_errors();
            $data['menu'] = 'home';
            $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
            $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
            $data['ownship'] =$this->general_model->getAll('dropdown','fid = 5','','id,dropvalue'); 
            $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
            $data['main'] = 'employer-signup';
            $this->load->view('main',$data);
            
        }else{ 
            
            $picture = resize_image_upload('logo','employer');
            
            if ($picture['status'] === true) {
                $complogo = $picture['images'];  
            }else{
                $picture = '';
            }
        
//            if ($a !== "") { 
//                $config['upload_path'] = './././uploads/employer/';
//                $config['log_threshold'] = 1;
//                $config['allowed_types'] = 'jpg|png|jpeg|gif';
//                $config['max_size'] = '100000'; // 0 = no file size limit
//                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['logo']['name']));
//                $config['overwrite'] = false;  
//                $this->load->library('upload', $config);
//                $this->upload->do_upload('logo');
//                $upload_data = $this->upload->data();
//                $complogo = $upload_data['file_name'];
//            }
//           
//            if(!isset($complogo))  $complogo = '';  
            
            $employerInsert = $this->employer_model->insert_employer_info($complogo);    
            $this->session->set_flashdata('success', 'Employer Successfully Register. ');
            redirect(base_url() . 'home', 'refresh');   
        }
    }
    
    public function loginCheck(){
        
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|md5');
        
        if (FALSE == $this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Username and Password are required fields');
            redirect(base_url() . 'Employer/login');
        }
            
        $employer_profile = $this->employer_model->login($this->input->post('username'), $this->input->post('password'));
        
        if (isset($employer_profile) && !empty($employer_profile)) {
                $employerId = $employer_profile->id;
                $this->employer_model->last_access($employerId);
                $this->session->set_userdata('employer_profile', $employer_profile);
                redirect(base_url() . 'Employer/dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . 'Employer/login');
        }
    }

    public function forgetPassword(){
        $email = $this->input->post('email');
        $mail_to = $email;
        $countRecord = $this->general_model->countTotal('employer',array('email' => $email));
        if($countRecord > 0){

            $employer_info = $this->general_model->getById('employer','email',$email);

            $sid = $employer_info->id;
            $fullname = $employer_info->fname.' '.$employer_info->mname.' '.$employer_info->lname;
            $token = randomPassword(10);
            $data =array(
                'token'=> $token
            );
            $update_token = $this->general_model->update('employer',$data, array('id' => $sid));

            $content  = '';
            $content .= "<h2>Don't worry, we all forget sometimes</h2><br>";
            $content .= "Hi <b>".$fullname."</b><br>";
            $content .= "<span>You've recently asked to reset the password for this Globaljob Employer account:</span><br>";
            $content .= $email;
            $content .= "<br><br>To update your password, click the link below<br>";
            $content .= "<a href='".base_url()."Employer/changePassword/?token=".$token."'>Reset my password";
            $content .= "<br><br><br><br>Cheers,<br>";
            $content .= "Global Job Team";


            $adminEmail = 'info@globaljob.com.np';
            $mail_subject = "Forget Password Response from Global Job :: A Complete HR solution";
            $mail_body = $content;
            $mail_header  = 'MIME-Version: 1.0' . "\r\n";
            $mail_header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $mail_header .= 'To: '.$mail_to.' <'.$mail_to.'>' . "\r\n";
            $mail_header .= 'From: Global Job :: Complete HR solution <'.$adminEmail.'>' . "\r\n";

            if(@mail($mail_to,$mail_subject,$mail_body,$mail_header)){
                     $this->session->set_flashdata('success', 'User authentication has been Sent. Please check your Email.');
                }else{
                    $this->session->set_flashdata('error', 'Failed to send User authentication. Please try again!');
                }
            redirect(base_url() . 'Employer/login');

        }else{
            $this->session->set_flashdata('error', 'The email address provided doesnot exists in our record');
            redirect(base_url() . 'Employer/login');
        }
    }

    public function changePassword(){
        $token = $_GET['token'];
        $countToken = $this->general_model->countTotal('employer',array('token' => $token));
        if($countToken > 0){
                 $data['menu'] = 'home';
                 $data['token'] = $token;
                 $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
                 $this->load->view('employer-changepassword',$data);
        }else{
            $this->session->set_flashdata('error', 'The token provided doesnt exists in our record');
            redirect(base_url() . 'Employer/login');
        }
    }

    public function resetEmployerPassword(){
        $token = $this->input->post('token');

        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
         /*----------------------------------------------------------------
                     Form Validation Check and Return if Error Occured
        -----------------------------------------------------------------*/
        if (FALSE == $this->form_validation->run()) {
            $data['message'] ='';
            $data['message'] .= 'Password is Required and Minimum length must be 8<br>';
            $data['message'] .= 'Confirm Password must match with Password';

            $this->session->set_flashdata('error', 'Password and Confirm Password are required and should match. Minimum length password must be 8');
            redirect(base_url() . 'Employer/changePassword/?token='.$token);
        }else{

            $seeker_info = $this->general_model->getById('employer','token',$token);
            $sid = $seeker_info->id;

            $data =array(
                'password' => md5($this->input->post('password')),
                'token'=> ''
            );
            $this->general_model->update('employer',$data, array('id' => $sid));
            $this->session->set_flashdata('success', 'Password Update Successfully !!!');
            redirect(base_url() . 'Employer/login');
        }
    }
    
    /*---------------------------------------------------------------
        Employer Detail Information with paramater slug and job Id
    ---------------------------------------------------------------*/
    public function jobList($code,$eid){
        $data['menu'] = 'home';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['employer_info'] = $this->general_model->getById('employer','id',$eid);
        $applydate = date('Y-m-d');
        $data['job_detail'] = $this->general_model->getAll('jobs',array('eid'=>$eid,'applybefore >='=>$applydate));
        $this->load->view('employer-job-detail',$data);
    }

    public function dashboard(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);  
        $data['post_job'] = $this->general_model->getAll('jobs',array('eid'=>$eid));
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = '';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'employer-dashboard';
        $this->load->view('dashboard',$data);
    }

    public function profile(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'profile';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'employer-profile';
        $this->load->view('dashboard',$data);
    }

    public function employerJobList(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'listjob';
        $data['list_job'] = $this->general_model->getAll('jobs',array('eid'=>$eid));
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'employer-job-list';
        $this->load->view('dashboard',$data);
    }

    public function postJob(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'postjob';
        $data['jobcategory'] = $this->general_model->getAll('dropdown','fid = 1','','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['education'] =$this->general_model->getAll('dropdown','fid = 3','','id,dropvalue');
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'add-edit-postjob';
        $this->load->view('dashboard',$data);
    }

    public function addPostJob(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);

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


        $this->employer_model->insertPostJob($complogo,$eid);
        $this->session->set_flashdata('success', 'Job Post Added Successfully !!!');
        redirect(base_url() . 'Employer/dashboard');
    }

    public function editPostJob($jid){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);

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

        $this->employer_model->updatePostJob($complogo,$eid,$jid);
        $this->session->set_flashdata('success', 'Job Post Added Successfully !!!');
        redirect(base_url() . 'Employer/dashboard');
    }

    public function update($id){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'postjob';
        $data['jobcategory'] = $this->general_model->getAll('dropdown','fid = 1','','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['education'] =$this->general_model->getAll('dropdown','fid = 3','','id,dropvalue');
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['jobpost_detail'] = $this->general_model->getById('jobs','id',$id);
        $data['main'] = 'add-edit-postjob';
        $this->load->view('dashboard',$data);
    }

    public function deleteJob($jid){
        $this->employerSessionCheck();
        $this->general_model->delete('jobs',array('id'=>$jid));
        $this->session->set_flashdata('success', 'Job Deleted From the List.');
        redirect(base_url() . 'Employer/dashboard');
    }

    public function showApplicants($jid){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = '';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);

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
        $config['base_url'] = base_url() . 'Employer/showApplicants/'.$jid.'/';

        $data['applicants'] = $this->employer_model->get_applicants_by_jid($jid,$config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->employer_model->get_applicants_by_jid($jid,'','','total');

        $this->pagination->initialize($config);
        $data['main'] = 'employer-job-applicants';
        $this->load->view('dashboard',$data);
    }



    public function editEmployerProfile(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'editprofile';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');
        $data['ownship'] =$this->general_model->getAll('dropdown','fid = 5','','id,dropvalue');
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['main'] = 'employer-edit-profile';
        $this->load->view('dashboard',$data);
    }

     public function viewSeekerDetail($sid){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['sid']= $sid;
        $data['select'] = '';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'view-seeker-details';
        $this->load->view('dashboard',$data);
    }

    public function updateEmployerProfile(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        
        //$emp_logo = $_FILES['logo']['name'];
            
            $picture = resize_image_upload('logo','employer');
            if ($picture['status'] === true) {
                $complogo = $picture['images'];  
            }else{
                $picture = '';
            }
        
          /*----------------------------------------------------------------
                              Upload JobSeeker banner  on Server
              -----------------------------------------------------------------*/
        $b = $_FILES['banner']['name'];

            if ($b !== "") {
                $config['upload_path'] = './././uploads/top_banner/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['logo']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('banner');
                $upload_data = $this->upload->data();
                $banner = $upload_data['file_name'];
            }

            if(!isset($banner))  $banner = '';

//            $a = $_FILES['logo']['name'];
//
//            if ($a !== "") {
//                $config['upload_path'] = './././uploads/employer/';
//                $config['log_threshold'] = 1;
//                $config['allowed_types'] = 'jpg|png|jpeg|gif';
//                $config['max_size'] = '100000'; // 0 = no file size limit
//                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['logo']['name']));
//                $config['overwrite'] = false;
//                $this->load->library('upload', $config);
//                $this->upload->do_upload('logo');
//                $upload_data = $this->upload->data();
//                $complogo = $upload_data['file_name'];
//            }
//
//            if(!isset($complogo))  $complogo = '';

        $this->employer_model->updateEmployerProfile($complogo,$banner,$eid);
        $this->session->set_flashdata('success', 'Profile Update Successfully !!!');
        redirect(base_url() . 'Employer/dashboard');
    }

    public function changeEmployerPassword(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;

        $old_password = $this->input->post('oldpassword');
        $chekseeker = $this->general_model->getAll('employer',array('id' => $eid,'password'=> md5($old_password)));
        if($chekseeker){
            $data =array(
                        'password' => md5($this->input->post('password'))
            );

            $this->general_model->update('employer',$data, array('id' => $eid));
            $this->session->set_flashdata('success', 'Password Changed Update Successfully !!!');
            $this->session->unset_userdata('employer_profile');
            redirect(base_url() . 'Employer/login');
        }else{
            $this->session->set_flashdata('error', 'Old Password not found in our Database.Please Try Again');
            redirect(base_url() . 'Employer/dashboard');
        }
    }


    public function employerChangePassword(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $this->employer_model->change_pasword($eid);
        $this->session->set_flashdata('success', 'Your Password has been changed. Please login and proceed');
        redirect(base_url() . 'Employer/login', 'refresh');
    }
    


     public function logout(){
         $this->session->unset_userdata('employer_profile');
         $this->session->sess_destroy();
         redirect(base_url() . 'home', 'refresh');
    }

    /*---------------------------------------------------------------
            Check Whether Employer Session start or Not
    ---------------------------------------------------------------*/
    public function employerSessionCheck(){
        $employer_profile = $this->session->userdata('employer_profile');
        if(empty($employer_profile)){
            $this->session->unset_userdata('employer_profile');
            //$this->session->sess_destroy();
            $this->session->set_flashdata('error', 'You are not Loggen. Please login and proceed.');
            redirect(base_url() . 'Employer/login');
        }
    }
}

/* End of file Employer.php
 * Location: ./application/modules/home/controllers/Employer.php */
