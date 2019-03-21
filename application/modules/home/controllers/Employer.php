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
         Check Seeker Session, if set then redirect to dashboard
        ---------------------------------------------------------*/
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        if(!empty($jobseeker_profile)){
            redirect(base_url() . 'Jobseeker/dashboard');
        }
        /*---------------------------------------------------------*/

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

        $data['menu'] = 'employer';
        $data['page_title'] = 'Employer Login - Global Job :: A complete HR Solution';
        //$data['clients'] = $this->general_model->getAll('clients','image!=""','','id,clientname,image','',30);
        //$data['services']=  $this->general_model->getAll('globaljob_service','','','id,title,urlcode,logo,short_description');

        $data['main'] = 'employer-login';
        $this->load->view('main',$data);
    }
    
    public function signup(){
        $data['menu'] = 'employer';
        $data['page_title'] = 'Employer Registration - Global Job :: A complete HR Solution';
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
        $data['ownship'] =$this->general_model->getAll('dropdown','fid = 5','','id,dropvalue'); 
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['nature_of_organisation'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
        $data['main'] = 'employer-signup';
        $data['message'] ='';
        $this->load->view('main',$data);
    }
    
    public function employerRegistration(){
    
        $this->form_validation->set_rules('orgname', 'Organisation Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        
        if (FALSE == $this->form_validation->run()) {
            $data['message'] ='';
            $data['message'] = validation_errors();
            $data['menu'] = 'home';
            $data['page_title'] = 'Employer Registration - Finance Job Nepal';
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
                $complogo = '';
            }
            echo "complogo = ".$complogo;


            
            $employerInsert = $this->employer_model->insert_employer_info($complogo);    
            $this->session->set_flashdata('message', 'Employer Successfully Register. ');
            redirect(base_url() . 'Employer/signup', 'refresh');
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
                     $this->session->set_flashdata('success', 'Password reset link has been Sent. Please check your Email.');
                }else{
                    $this->session->set_flashdata('error', 'Failed to send Password reset link. Please try again!');
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
        if(!isset($code) || empty($code) || !isset($eid) || empty($eid))
        {
            redirect(base_url(), 'refresh');
        }
        
        $data['menu'] = 'home';
        $applydate = date('Y-m-d');
        $data['employer_info'] = $employer_info = $this->general_model->getById('employer','id',$eid);
        $data['job_detail'] = $job_details = $this->general_model->getAll('jobs',array('eid'=>$eid,'applybefore >='=>$applydate));
        //print_r($job_details);
        
        $jobs = '';
        foreach($job_details as $job_detail)
        {
            $jobs.=$job_detail->jobtitle.', ';
        }
        $data['page_title'] = $ogtitle = 'List of Jobs posted by '.$employer_info->orgname.' on Global Job :: A complete HR Solution';
        $data['page_keywords'] = $jobs.' posted by '.$employer_info->orgname.' on Global Job :: A complete HR Solution';
        $data['page_description'] = $ogdescription = $jobs.' posted by '.$employer_info->orgname.' on Global Job :: A complete HR Solution';
        
        $ogurl = base_url().'Employer/jobList/'.$employer_info->orgcode.'/'.$employer_info->id;

        if(!empty($employer_info->logo))       
            $ogimage = base_url() . 'uploads/employer/' . $employer_info->logo;
        else if(!empty($employer_info->banner_image))
            $ogimage = base_url() . 'uploads/employer/' . $employer_info->banner_image;
        else            
            $ogimage = "";

        $data['ogurl'] = $ogurl;
        $data['ogwebsite'] = 'http://globaljob.com.np';
        $data['ogtitle'] = $ogtitle;
        $data['ogdescription'] = $ogdescription;
        $data['ogimage'] = $ogimage;
        $banner_image = $employer_info->banner_image;
        if((isset($banner_image)) && ($banner_image != NULL)){
            $this->load->view('employer-job-list-banner',$data);
        }else{
            $this->load->view('employer-job-detail',$data);
        }
    }

    public function dashboard(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);  
        $data['post_job'] = $this->general_model->getAll('jobs',array('eid'=>$eid));
        $data['menu'] = 'dashboard';
        $data['sidebar'] = 'employer';
        $data['select'] = '';
        $data['page_title'] = 'Employer Dashboard - Global Job :: A complete HR Solution';
        $data['main'] = 'employer-dashboard';
        $this->load->view('main',$data);
    }

    public function profile(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'profile';
        $data['page_title'] = 'My Profile - Global Job :: A complete HR Solution';
        $data['main'] = 'employer-profile';
        $this->load->view('dashboard',$data);
    }

    public function employerJobList(){
        $this->employerSessionCheck();





        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;

        $config['base_url'] = base_url() . 'Employer/employerJobList';
        $config['uri_segment'] = 3;
        $config['per_page'] = 10;

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


        $config['total_rows'] = $this->general_model->countTotal('jobs',array('eid'=>$eid));

        $this->pagination->initialize($config);



        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'jobList';
        $data['sidebar'] = 'employer';
        $data['select'] = 'listjob';
        $data['list_job'] = $this->general_model->getAll('jobs',array('eid'=>$eid),'','','',$config['per_page'],$page);
        $data['page_title'] = 'List of Jobs Posted - Global Job :: A complete HR Solution';
        $data['main'] = 'employer-job-list';
        $this->load->view('main',$data);
    }

    public function postJob(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'postJob';
        $data['sidebar'] = 'employer';
        $data['select'] = 'postjob';
        $data['jobcategory'] = $this->general_model->getAll('dropdown','fid = 9','dropvalue','id,dropvalue');
        $data['joblocation'] = $this->general_model->getAll('dropdown','fid = 2','dropvalue','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','dropvalue','id,dropvalue');
        $data['education'] =$this->general_model->getAll('dropdown','fid = 3','dropvalue','id,dropvalue');
        $data['jobtype'] = $this->general_model->getAll('dropdown','fid = 16','dropvalue','id,dropvalue');
        $data['joblevel'] = $this->general_model->getAll('dropdown','fid = 17','dropvalue','id,dropvalue');
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'add-edit-postjob';
        $this->load->view('main',$data);
    }

    public function addPostJob(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);

        /*$a = $_FILES['logo']['name'];

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

            if(!isset($complogo))  */$complogo = '';


        $this->employer_model->insertPostJob($complogo,$eid);
        $this->session->set_flashdata('success', 'Job Post Added Successfully !!!');
        redirect(base_url() . 'Employer/postJob');
    }

    public function editPostJob($jid){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);

        /*$a = $_FILES['logo']['name'];

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

            if(!isset($complogo))*/  $complogo = '';

        $this->employer_model->updatePostJob($complogo,$eid,$jid);
        $this->session->set_flashdata('success', 'Job detail updated Successfully !!!');
        redirect(base_url() . 'Employer/update/'.$jid);
    }

    public function update($id){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'postjob';
        $data['jobcategory'] = $this->general_model->getAll('dropdown','fid = 9','dropvalue','id,dropvalue');
        $data['joblocation'] = $this->general_model->getAll('dropdown','fid = 2','dropvalue','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['education'] =$this->general_model->getAll('dropdown','fid = 3','dropvalue','id,dropvalue');
        $data['jobtype'] = $this->general_model->getAll('dropdown','fid = 16','dropvalue','id,dropvalue');
        $data['joblevel'] = $this->general_model->getAll('dropdown','fid = 17','dropvalue','id,dropvalue');
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['jobpost_detail'] = $this->general_model->getById('jobs','id',$id);
        $data['main'] = 'add-edit-postjob';
        $this->load->view('main',$data);
    }

    public function deleteJob($jid){
        $this->employerSessionCheck();
        $this->general_model->delete('jobs',array('id'=>$jid));
        $this->session->set_flashdata('success', 'Job Deleted From the List.');
        redirect(base_url() . 'Employer/employerJobList');
    }

    public function showApplicants($jid){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = '';
        $data['page_title'] = 'List of Job Applicants - Global Job :: A complete HR Solution';
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

        $data['applicants'] = $this->employer_model->get_applicants_by_jid($jid,'',$config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->employer_model->get_applicants_by_jid($jid,'','','','total');

        $this->pagination->initialize($config);
        $data['main'] = 'employer-job-applicants';
        $this->load->view('dashboard',$data);

        if(isset($_POST['btnShortlist']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('shortlisted',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicants/'.$jid.'#'.$application_id, 'refresh');
        }

        if(isset($_POST['btnReject']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('rejected',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicants/'.$jid.'#'.$application_id, 'refresh');
        }
    }

    public function showRejectedApplicants($jid){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'rejected';
        $data['page_title'] = 'Rejected Applicants - Global Job :: A complete HR Solution';
        $data['title'] = 'List of Rejected Applicants'; 
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

        $data['applicants'] = $this->employer_model->get_applicants_by_jid($jid,'rejected',$config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->employer_model->get_applicants_by_jid($jid,'rejected','','','total');

        $this->pagination->initialize($config);
        $data['main'] = 'employer-job-applicants';
        $this->load->view('dashboard',$data);

        if(isset($_POST['btnShortlist']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('shortlisted',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicants/'.$jid.'#'.$application_id, 'refresh');
        }

        if(isset($_POST['btnReject']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('rejected',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicants/'.$jid.'#'.$application_id, 'refresh');
        }
    }

    public function showShortlistedApplicants($jid){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = '';
        $data['page_title'] = 'Shortlisted Applicants - Global Job :: A complete HR Solution';
        $data['title'] = 'List of Shortlisted Applicants'; 
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

        $data['applicants'] = $this->employer_model->get_applicants_by_jid($jid,'shortlisted',$config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->employer_model->get_applicants_by_jid($jid,'shortlisted','','','total');

        $this->pagination->initialize($config);
        $data['main'] = 'employer-job-applicants';
        $this->load->view('dashboard',$data);

        if(isset($_POST['btnShortlist']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('shortlisted',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicants/'.$jid.'#'.$application_id, 'refresh');
        }

        if(isset($_POST['btnReject']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('rejected',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicants/'.$jid.'#'.$application_id, 'refresh');
        }
    }

    public function showApplicantsShortlisted(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'shortlisted';
        $data['page_title'] = 'Shortlisted Applicants - Global Job :: A complete HR Solution..';
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
        $config['base_url'] = base_url() . 'Employer/showApplicantsShortlisted/';

        $data['applicants'] = $this->employer_model->get_applicants_by_eid($eid,'shortlisted',$config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->employer_model->get_applicants_by_eid($eid,'shortlisted','','','total');

        $this->pagination->initialize($config);
        $data['main'] = 'employer-shortlisted';
        $this->load->view('dashboard',$data);

        if(!isset($jid)) $jid='';
        if(isset($_POST['btnShortlist']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('shortlisted',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicantsShortlisted/'.$jid.'#'.$application_id, 'refresh');
        }

        if(isset($_POST['btnReject']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('rejected',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicantsShortlisted/'.$jid.'#'.$application_id, 'refresh');
        }
    }

    public function showApplicantsRejected(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['sidebar'] = 'employer';
        $data['select'] = 'rejected';
        $data['page_title'] = 'Rejected Applicants - Global Job :: A complete HR Solution';
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
        $config['base_url'] = base_url() . 'Employer/showApplicantsRejected/';

        $data['applicants'] = $this->employer_model->get_applicants_by_eid($eid,'rejected',$config['per_page'], $page);
        $config['total_rows'] = $data['total'] =$this->employer_model->get_applicants_by_eid($eid,'rejected','','','total');

        $this->pagination->initialize($config);
        $data['main'] = 'employer-rejected';
        $this->load->view('dashboard',$data);

        if(!isset($jid)) $jid='';
        if(isset($_POST['btnShortlist']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('shortlisted',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicantsRejected/'.$jid.'#'.$application_id, 'refresh');
        }

        if(isset($_POST['btnReject']))
        {
            $application_id = $this->input->post('application_id');
            $remarks = $this->input->post('remarks');
            $this->employer_model->updateStatus('rejected',$application_id, $remarks);
            redirect(base_url() . 'Employer/showApplicantsRejected/'.$jid.'#'.$application_id, 'refresh');
        }
    }

    public function showApplicantsUpdate(){
        $jid = $this->uri->segment(3);
        for($i=0;$i<count($_POST['application_id']);$i++) 
        {
            $application_id = $_POST['application_id'][$i];
            $status = $_POST['status'][$i];
            $this->employer_model->updateApplicationStatus($application_id,$status);
            //echo $this->db->last_query();
        }
        $this->session->set_flashdata('success', 'Applicant Status Updated Successfully !!!');
        redirect(base_url() . 'Employer/showApplicants/'.$jid);
    }


    public function editEmployerProfile(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['employerInfo']= $this->general_model->getById('employer','id',$eid);
        $data['menu'] = 'companyprofile';
        $data['sidebar'] = 'employer';
        $data['select'] = 'editprofile';
        $data['page_title'] = 'Profile Edit - Global Job :: Complete HR Solution';
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');
        $data['ownship'] =$this->general_model->getAll('dropdown','fid = 5','','id,dropvalue');
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['nature_of_organisation'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
        $data['main'] = 'employer-edit-profile';
        $this->load->view('main',$data);
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
        $data['page_title'] = 'Job Seeker Details - Global Job :: A complete HR Solution';
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
        if ($b != "") {
            $config['upload_path'] = './././uploads/employer/';
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '100000'; // 0 = no file size limit
            $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['banner']['name']));
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('banner');
            $upload_data = $this->upload->data();
            $banner = $upload_data['file_name'];
        }
        if(!isset($banner))  $banner = '';

        $a = $_FILES['logo']['name'];
        if ($a != "") {
           //echo "Upload Employer Logo";
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
        //echo "complogo = ".$complogo.", banner = ".$banner.", eid = ".$eid;

        $this->employer_model->updateEmployerProfile($complogo,$banner,$eid);
        $this->session->set_flashdata('success', 'Profile Update Successfully !!!');
        redirect(base_url() . 'Employer/editEmployerProfile');
    }

    public function editPassword(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;

        $data['menu'] = 'editPassword';
        $data['page_title'] = 'Edit Password - Global Job :: Complete HR Solution';
        $data['main'] = 'employer-edit-password';
        $this->load->view('main',$data);
    }

    public function changeEmployerPassword(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;

        $this->form_validation->set_rules('oldpassword', 'oldpassword', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_pass', 'Password Confirmation', 'trim|required|matches[password]');

        if(TRUE == $this->form_validation->run()){
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
    }


    public function employerChangePassword(){
        $this->employerSessionCheck();
        $employer_profile = $this->session->userdata('employer_profile');
        $eid = $employer_profile->id;
        $data['menu'] = 'home';
        $data['page_title'] = 'Change Password - Global Job :: A complete HR Solution';
        $this->employer_model->change_pasword($eid);
        $this->session->set_flashdata('success', 'Your Password has been changed. Please login and proceed');
        redirect(base_url() . 'Employer/login', 'refresh');
    }
    


     public function logout(){
         $this->session->unset_userdata('employer_profile');
         $this->session->sess_destroy();
         redirect(base_url(), 'refresh');
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
