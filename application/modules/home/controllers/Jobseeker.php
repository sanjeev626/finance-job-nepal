<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Jobseeker Controller
 * @package Controller
 * @subpackage Controller
 * Date created:Febuary 09, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Jobseeker extends View_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jobseeker_model');
        $this->load->model('employer_model');
        $this->load->library('multiupload');
        $this->load->helper('view_helper');
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
        /*---------------------------------------------------------*/

        /*---------------------------------------------------------
         Check Seeker Session, if set then redirect to dashboard
        ---------------------------------------------------------*/
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        if(!empty($jobseeker_profile)){
            redirect(base_url() . 'Jobseeker/dashboard');
        }
        /*---------------------------------------------------------
        Check Employer Session, if Set then unset Session of Employer
        ---------------------------------------------------------*/
//        $employer_profile = $this->session->userdata('employer_profile');
//        if(!empty($employer_profile)){
//            $this->session->unset_userdata('employer_profile');
//        }

        $data['menu'] = 'login';
        if($_GET){
            $data['job_id'] = $jobid =  $_GET['jobid'];
            $data['job_detail'] = $this->general_model->getAll('jobs',array('id'=>$jobid));
        }else{
            $data['job_id'] ='';
            $data['job_detail'] = '';
        }
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        //$data['seeker_right_banner']= $this->general_model->getAll('jobseek_banner',array('publish'=>1),'ordering asc');
        //$this->load->view('jobseeker-login',$data);
        $data['main'] = 'jobseeker-login';
        $this->load->view('main',$data);
    }
    
    public function signup(){
        $data['menu'] = 'seeker';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['country'] = $this->general_model->getAll('country2code','','country_name','country_code,country_name');
        $data['job_region'] =$this->general_model->getAll('dropdown','fid = 15','','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
        $data['natureoforg'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
        $data['nationality'] =$this->general_model->getAll('dropdown','fid = 8','','id,dropvalue');
        $data['main'] = 'jobseeker-signup';
        $data['message'] ='';
        $this->load->view('main',$data);
    }
    
    public function jobseekerRegistration(){
    
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        //$this->form_validation->set_rules('phoneres', 'Phone(Res)', 'required');
        //$this->form_validation->set_rules('phonecell', 'Mobile No', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        //$this->form_validation->set_rules('permanentadd', 'Permanent Address', 'required');
        $this->form_validation->set_rules('currentadd', 'Current Address', 'required');
        //$this->form_validation->set_rules('joblocation','Job Location','required');
        //$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
       
        /*----------------------------------------------------------------
                     Form Validation Check and Return if Error Occured
        -----------------------------------------------------------------*/
        if (FALSE == $this->form_validation->run()) {
            $data['message'] ='';

            $data['message'] .= validation_errors();
            
            $data['menu'] = 'home';
            $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
            $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');
            $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
            $data['country'] = $this->general_model->getAll('country2code','','country_name','country_code,country_name');
            $data['job_region'] =$this->general_model->getAll('dropdown','fid = 15','','id,dropvalue');
            $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
            $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
            $data['natureoforg'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
            $data['nationality'] =$this->general_model->getAll('dropdown','fid = 8','','id,dropvalue');
            $data['main'] = 'jobseeker-signup';
            $this->load->view('main',$data);
        }else{
            $username = $this->input->post('username');
		    $email = $this->input->post('email');
            $firstname = $this->input->post('fname');
            $middlename = $this->input->post('mname');
            $lastname = $this->input->post('lname');
            $activation_code = $this->input->post('activation_code');
            $to = $this->input->post('email');
            
		    $checkusername = $this->general_model->countTotal('seeker',array('username' => $username));		
		    $checkemail = $this->general_model->countTotal('seeker',array('email' => $email));
            
            /*----------------------------------------------------------------
                     If Username and Password Doesn't Exist on Database
            -----------------------------------------------------------------*/
            if($checkusername == 0 && $checkemail == 0 ){
                    
            /*----------------------------------------------------------------
                                    Upload Resume on Server
            -----------------------------------------------------------------*/
            $resume = $_FILES['resume']['name'];
            if ($resume !== "") { 
                $config1['upload_path'] = './././uploads/resume/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['resume']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('resume');
                $upload_data1 = $this->upload->data();
                $resume = $upload_data1['file_name'];
            }

            if(!isset($resume))  $resume = '';  

              /*----------------------------------------------------------------
              Upload JobSeeker Picture  on Server
              -----------------------------------------------------------------*/
              if (!empty($_FILES['picture']['name'][0])) {
                  $uploads = $this->multiupload->upload("picture", 'jobseeker');
                  if ($uploads['status'] === true) {
                      $picture = $uploads['images'];
                  }
              }
              if(!isset($picture))  $picture = '';

            /*----------------------------------------------------------------
                              Upload JobSeeker Video Resume
              -----------------------------------------------------------------*/
              /*if (!empty($_FILES['video_resume']['name'][0])) {
                  $uploads = $this->multiupload->upload("video_resume", 'video_resume');
                  if ($uploads['status'] === true) {
                      $video_resume = $uploads['images'];
                  }
              }
             if(!isset($video_resume)) */ $video_resume = '';


            /* ------------------------------ Upload Documents on Server ----------------------------*/
            /*$slc_docs = $_FILES['slc_docs']['name'];
            if ($slc_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['slc_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('slc_docs');
                $upload_data1 = $this->upload->data();
                $slc_docs = $upload_data1['file_name'];
            }
            if(!isset($slc_docs))*/  $slc_docs = '';

            /*$docs_11_12 = $_FILES['docs_11_12']['name'];
            if ($docs_11_12 !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['docs_11_12']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('docs_11_12');
                $upload_data1 = $this->upload->data();
                $docs_11_12 = $upload_data1['file_name'];
            }
            if(!isset($docs_11_12))*/  $docs_11_12 = '';

            /*$bachelor_docs = $_FILES['bachelor_docs']['name'];
            if ($bachelor_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['bachelor_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('bachelor_docs');
                $upload_data1 = $this->upload->data();
                $bachelor_docs = $upload_data1['file_name'];
            }
            if(!isset($bachelor_docs))*/  $bachelor_docs = '';

            /*$masters_docs = $_FILES['masters_docs']['name'];
            if ($masters_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['masters_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('masters_docs');
                $upload_data1 = $this->upload->data();
                $masters_docs = $upload_data1['file_name'];
            }
            if(!isset($masters_docs))*/  $masters_docs = '';

            /*$other_docs = $_FILES['other_docs']['name'];
            if ($other_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['other_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('other_docs');
                $upload_data1 = $this->upload->data();
                $other_docs = $upload_data1['file_name'];
            }
            if(!isset($other_docs))*/  $other_docs = '';

            /* -------------------------- Upload Documents on Server ends here------------------------*/

            /*----------------------------------------------------------------
                        Insert JobSeeker Information on table `seeker`
            -----------------------------------------------------------------*/
            $insertId  = $this->jobseeker_model->insert_jobseeker_info($picture,$resume,$video_resume,$slc_docs,$docs_11_12,$bachelor_docs,$masters_docs,$other_docs);
            
            //Insert Seeker Id in Resume Table
            $data1['sid'] = $insertId; 
            //$this->general_model->insert('resume',$data1);
            
            /*----------------------------------------------------------------
                    Functional Area 1 Insert in table `checkvalue`
            -----------------------------------------------------------------*/
            /*$natureoforg1 = $this->input->post('natureoforg1');
            if(count($natureoforg1)>0){
					$count1 = count($natureoforg1);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $insertId;
                        $data2['attid'] = '1';
                        $data2['chkvalue'] =$natureoforg1[$c];
                        
                        $this->general_model->insert('checkvalue',$data2);
					}
				}*/
                    
            /*----------------------------------------------------------------
                    Functional Area 2 Insert in table `checkvalue`
            -----------------------------------------------------------------*/
            /*$natureoforg2 = $this->input->post('natureoforg2');
            if(count($natureoforg2)>0){
					$count2 = count($natureoforg2);
					for($c=0;$c<$count2;$c++){
                        $data3['sid'] = $insertId;
                        $data3['attid'] = '2';
                        $data3['chkvalue'] =$natureoforg2[$c];

                        $this->general_model->insert('checkvalue',$data3);
					}
				}*/
              
              /*----------------------------------------------------------------
                           Send Mail to JobSeeker for Activation 
              -----------------------------------------------------------------*/
                // multiple recipients
                $toName = $firstname.' '.$middlename.' '.$lastname;
                
                // subject
                $subject = 'Thank you for registering with globaljob.com.np';

                // message
                $mess = '
                <html>
                <head>
                  <title>Thank you for registering with financejobnepal.com</title>
                </head>
                <body>
                  Dear '.$toName.'<br><br>
                  Thank you for registering with financejobnepal.com. Please <a href="'.base_url().'Jobseeker/activate/?code='.$activation_code.'">click here</a> to activate your account.<br><br>
                  financejobnepal.com<br>
                  A COMPLETE HR SOLUTION
                </body>
                </html>
                ';

                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Additional headers
                $headers .= 'To: '.$toName.' <'.$to.'>' . "\r\n";
                $admin_email  = 'info@financejobnepal.com';
                $headers .= 'From: Finance Job Nepal <'.$admin_email.'>' . "\r\n";
                //$headers .= 'From: '.$admin_email;

                // Send Mail 
                if(@mail($to, $subject, $mess, $headers)){            		
                	$this->session->set_flashdata('success',"The username ".$username." has been created Successfully.<br>Please click on the activation link sent to your email address to activate your account.");
                    redirect(base_url() . 'Jobseeker/signup', 'refresh');
                }else{
                    $this->session->set_flashdata('error',"Mail Couldn't be Send. There must be something wrong with mail.");
                    redirect(base_url() . 'Jobseeker/signup', 'refresh');
                }
          }else{
              
              /*----------------------------------------------------------------
                If  Username and Email Exists, Send Message On Flash Messgage
              -----------------------------------------------------------------*/
              if($checkusername > 0){
                  $data['message'] =  "The username <strong>".$username."</strong> is already taken.";     
              }
                
              if($checkemail > 0){
                  $data['message'] = "The email address <strong>".$email."</strong> already exists in our record.<br>If you have forgot your password, please click <a href='http://globaljob.com.np/Jobseeker/seekerforgotpassword'>HERE</a> and enter your email address.<br>GlobalJob administrator will mail you your authentication information.";
              }
              
                $data['menu'] = 'home';
                $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
                $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
                $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
                $data['country'] = $this->general_model->getAll('country2code','','country_name','country_code,country_name');
                $data['job_region'] =$this->general_model->getAll('dropdown','fid = 15','','id,dropvalue');
                $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
                $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
                $data['natureoforg'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
                $data['nationality'] =$this->general_model->getAll('dropdown','fid = 8','','id,dropvalue');
                $data['main'] = 'jobseeker-signup';
                $this->load->view('main',$data);
           }
        }
    }
    
    public function loginCheck(){

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|md5');

        if (FALSE == $this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Username and Password are required fields');
            redirect(base_url() . 'Jobseeker/login');
        }

        $jobseeker_profile = $this->jobseeker_model->login($this->input->post('username'), $this->input->post('password'));
        
        if (isset($jobseeker_profile) && !empty($jobseeker_profile)) { 
            $this->session->set_userdata('jobseeker_profile', $jobseeker_profile);

            /*---------------------------------------------------------
                    If JobId, redirect to Apply job page
            ---------------------------------------------------------*/
            $jobId = $this->input->post('jobId');
            if(is_numeric($jobId)){
                 redirect(base_url() . 'applyJob/'.$jobId, 'refresh');
            }else{
                $seekerId = $jobseeker_profile->id;
                $this->jobseeker_model->last_access($seekerId);
                redirect(base_url() . 'Jobseeker/dashboard', 'refresh');
            }
        } else {

                
             $employer_profile = $this->employer_model->login($this->input->post('username'), $this->input->post('password'));
            
             if (isset($employer_profile) && !empty($employer_profile)) {
                $employerId = $employer_profile->id;
                $this->employer_model->last_access($employerId);
                $this->session->set_userdata('employer_profile', $employer_profile);
                redirect(base_url() . 'Employer/dashboard', 'refresh');
             }else{
            /*-----------------------------------------------------------------
               If JobId valiation error, redirect to login page with parameter
            -----------------------------------------------------------------*/

            if($jobId = $this->input->post('jobId')){
                 $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . 'Jobseeker/login/?jobid='.$jobId);
            }        

            $this->session->set_flashdata('error', 'Invalid Username or Password combination.');
            redirect(base_url(). 'Jobseeker/login/') ;
            }    
        }
    }

    public function seekerloginCheck(){

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|md5');

        if (FALSE == $this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Username and Password are required fields');
            redirect(base_url() . 'Jobseeker/login');
        }
        $jobseeker_profile = $this->jobseeker_model->login($this->input->post('username'), $this->input->post('password'));
        if (isset($jobseeker_profile) && !empty($jobseeker_profile)) {
            $this->session->set_userdata('jobseeker_profile', $jobseeker_profile);

            $jobId = $this->input->post('jobId');
            if(is_numeric($jobId)){
                redirect(base_url() . 'applyJob/'.$jobId, 'refresh');
            }else{
                $seekerId = $jobseeker_profile->id;
                $this->jobseeker_model->last_access($seekerId);
                redirect(base_url() . 'Jobseeker/dashboard', 'refresh');
            }
        }else {
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . 'Jobseeker/login');
        }
    }
    
    public function forgetPassword(){
        $email = $this->input->post('email');
        $mail_to = $email;
        $countRecord = $this->general_model->countTotal('seeker',array('email' => $email));
        if($countRecord > 0){

            $seeker_info = $this->general_model->getById('seeker','email',$email);

            $sid = $seeker_info->id;
            $fullname = $seeker_info->fname.' '.$seeker_info->mname.' '.$seeker_info->lname;
            $token = randomPassword(10);
            $data =array(
                'token'=> $token
            );
            $update_token = $this->general_model->update('seeker',$data, array('id' => $sid));

            $content  = '';
            $content .= "<h2>Don't worry, we all forget sometimes</h2><br>";
            $content .= "Hi <b>".$fullname."</b><br>";
            $content .= "<span>You've recently asked to reset the password for this Globaljob JobSeeker account:</span><br>";
            $content .= $email;
            $content .= "<br><br>To update your password, click the link below<br>";
            $content .= "<a href='".base_url()."Jobseeker/changePassword/?token=".$token."'>Reset my password</a>";
            $content .= "<br><br><br><br>Cheers,<br>";
            $content .= "Global Job Team";


            $adminEmail = 'info@globaljob.com.np';
            $mail_subject = "Forget Password Response from Global Job :: A Complete HR solution";
            $mail_body = $content;
            $mail_header  = 'MIME-Version: 1.0' . "\r\n";
            $mail_header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $mail_header .= 'To: '.$mail_to.' <'.$mail_to.'>' . "\r\n";
            //$mail_header .= $adminEmail;
            $mail_header .= 'From: Global Job <'.$adminEmail.'>' . "\r\n";


            if(@mail($mail_to,$mail_subject,$mail_body,$mail_header)){
                     $this->session->set_flashdata('success', 'Password reset link has been Sent. Please check your Email.');
                }else{
                    $this->session->set_flashdata('error', 'Failed to send Password reset link. Please try again!');
                }
            redirect(base_url() . 'Jobseeker/login');

        }else{
            $this->session->set_flashdata('error', 'The email address provided doesnot exists in our record');
            redirect(base_url() . 'Jobseeker/login');
        }
    }

    public function changePassword(){
        $token = $_GET['token'];
        $countToken = $this->jobseeker_model->countToken($token);
        if($countToken > 0){
            $data['menu'] = 'home';
            $data['token'] = $token;
            $data['seeker_right_banner']= $this->general_model->getAll('jobseek_banner',array('publish'=>1));
            $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
            $this->load->view('jobseeker-changepassword',$data);
        }else{
            $this->session->set_flashdata('error', 'The token provided doesnt exists in our record');
            redirect(base_url() . 'Jobseeker/login');
        }
    }

    public function resetSeekerPassword(){
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
            redirect(base_url() . 'Jobseeker/changePassword/?token='.$token);
        }else{

            $seeker_info = $this->general_model->getById('seeker','token',$token);
            $sid = $seeker_info->id;

            $data =array(
                'password' => md5($this->input->post('password')),
                'token'=> ''
            );
            $this->general_model->update('seeker',$data, array('id' => $sid));
            $this->session->set_flashdata('success', 'Password Update Successfully !!!');
            redirect(base_url() . 'Jobseeker/login');
        }
    }

    /*----------------------------------------------------------------
                    After Clicking Activation link in Email
    -----------------------------------------------------------------*/
    public function activate(){
        $code = $_GET['code'];
        $countCode = $this->general_model->countTotal('seeker',array('activation_code' => $code));
        if($countCode > 0){

            $seeker_info = $this->general_model->getById('seeker','activation_code',$code);
            $sid = $seeker_info->id;

            $data =array(
                'isActivated' => 1,
                'activation_code'=> ''
            );
            $this->general_model->update('seeker',$data, array('id' => $sid));
            $this->session->set_flashdata('success', 'Your Account Activate Successfully !!!');
            redirect(base_url() . 'Jobseeker/login');
        }else{
            $this->session->set_flashdata('error', 'The Activation Code provided doesnt exists in our record');
            redirect(base_url() . 'Jobseeker/login');
        }
    }

    public function dashboard(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'dashboard';
        $data['sidebar'] = 'jobseeker';
        $data['sid']= $sid;
        $data['select']='profile';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'jobseeker-dashboard';
        $this->load->view('main',$data);
    }
    
    public function updateProfilePic(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;

         if (!empty($_FILES['picture']['name'][0])) {
                  $uploads = $this->multiupload->upload("picture", 'jobseeker'); 
                  if ($uploads['status'] === true) {
                      $picture = $uploads['images'];  
                  }
              }
        
//        $a = $_FILES['logo']['name'];
//
//            if ($a !== "") {
//                $config['upload_path'] = './././uploads/jobseeker/';
//                $config['log_threshold'] = 1;
//                $config['allowed_types'] = 'jpg|png|jpeg|gif';
//                $config['max_size'] = '100000'; // 0 = no file size limit
//                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['logo']['name']));
//                $config['overwrite'] = false;
//                $this->load->library('upload', $config);
//                $this->upload->do_upload('logo');
//                $upload_data = $this->upload->data();
//                $piclogo = $upload_data['file_name'];
//            }

        if($picture){

             $data =array(
                    'picture' => $picture
                );
            $this->general_model->update('seeker',$data, array('id' => $sid));
            $this->session->set_flashdata('success', 'Profile Pic Update Successfully !!!');
        }else{
            $this->session->set_flashdata('error', 'Profile Pic not Update Successfully !!!');
        }
        redirect(base_url() . 'Jobseeker/dashboard');
    }

    public function editProfile(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'editProfile';
        $data['sidebar'] = 'jobseeker';
        $data['sid']= $sid;
        $data['select']='editprofile';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue');
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['country'] = $this->general_model->getAll('country2code','','country_name','country_code,country_name');
        $data['job_region'] =$this->general_model->getAll('dropdown','fid = 15','','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
        $data['natureoforg'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
        $data['nationality'] =$this->general_model->getAll('dropdown','fid = 8','','id,dropvalue');
        $data['education'] =$this->general_model->getAll('dropdown','fid = 11','','id,dropvalue');

        $data['personal_detail'] = $this->general_model->getById('seeker','id',$sid);
        $data['education_detail'] = $this->general_model->getAll('seeker_education',array('sid'=>$sid));
        $data['experience_detail'] = $this->general_model->getAll('seeker_experience',array('sid'=>$sid));
        $data['training_detail'] = $this->general_model->getAll('seeker_training',array('sid'=>$sid));
        $data['language_detail'] = $this->general_model->getAll('seeker_language',array('sid'=>$sid));
        $data['reference_detail'] = $this->general_model->getAll('seeker_reference',array('sid'=>$sid));
        $data['main'] = 'jobseeker-edit-profile';
        $this->load->view('main',$data);
    }

    public function updatePersonalDetail($sid){
        $this->jobSeekerSessionCheck();

         /*----------------------------------------------------------------
                                    Upload Resume on Server
            -----------------------------------------------------------------*/
            $resume = $_FILES['resume']['name'];
            if ($resume !== "") {
                $config1['upload_path'] = './././uploads/resume/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['resume']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('resume');
                $upload_data1 = $this->upload->data();
                $resume = $upload_data1['file_name'];
            }

            if(!isset($resume))  $resume = '';

              /*----------------------------------------------------------------
                              Upload JobSeeker Picture  on Server
              -----------------------------------------------------------------*/
              if (!empty($_FILES['picture']['name'][0])) {
                  $uploads = $this->multiupload->upload("picture", 'jobseeker');
                  if ($uploads['status'] === true) {
                      $picture = $uploads['images'];
                  }
              }
             if(!isset($picture))  $picture = '';

            /*----------------------------------------------------------------
                              Upload JobSeeker Video Resume
              -----------------------------------------------------------------*/
              if (!empty($_FILES['video_resume']['name'][0])) {
                  $uploads = $this->multiupload->upload("video_resume", 'video_resume');
                  if ($uploads['status'] === true) {
                      $video_resume = $uploads['images'];
                  }
              }
             if(!isset($video_resume))  $video_resume = '';


             /* ------------------------------ Upload Documents on Server ----------------------------*/
            $slc_docs = $_FILES['slc_docs']['name'];
            if ($slc_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['slc_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('slc_docs');
                $upload_data1 = $this->upload->data();
                $slc_docs = $upload_data1['file_name'];
            }
            if(!isset($slc_docs))  $slc_docs = '';  

            $docs_11_12 = $_FILES['docs_11_12']['name'];
            if ($docs_11_12 !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['docs_11_12']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('docs_11_12');
                $upload_data1 = $this->upload->data();
                $docs_11_12 = $upload_data1['file_name'];
            }
            if(!isset($docs_11_12))  $docs_11_12 = '';

            $bachelor_docs = $_FILES['bachelor_docs']['name'];
            if ($bachelor_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['bachelor_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('bachelor_docs');
                $upload_data1 = $this->upload->data();
                $bachelor_docs = $upload_data1['file_name'];
            }
            if(!isset($bachelor_docs))  $bachelor_docs = '';  

            $masters_docs = $_FILES['masters_docs']['name'];
            if ($masters_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['masters_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('masters_docs');
                $upload_data1 = $this->upload->data();
                $masters_docs = $upload_data1['file_name'];
            }
            if(!isset($masters_docs))  $masters_docs = ''; 

            $other_docs = $_FILES['other_docs']['name'];
            if ($other_docs !== "") { 
                $config1['upload_path'] = './././uploads/documents/';
                $config1['log_threshold'] = 1;
                $config1['allowed_types'] = 'doc|docx|pdf|txt|rtf|jpg|jpeg|bmp|png';
                $config1['max_size'] = '100000'; // 0 = no file size limit
                $config1['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['other_docs']['name']));
                $config1['overwrite'] = false;
                $this->load->library('upload', $config1);
                $this->upload->do_upload('other_docs');
                $upload_data1 = $this->upload->data();
                $other_docs = $upload_data1['file_name'];
            }
            if(!isset($other_docs))  $other_docs = ''; 
            
            /* -------------------------- Upload Documents on Server ends here------------------------*/




            /*----------------------------------------------------------------
                        Update JobSeeker Information on table `seeker`
            -----------------------------------------------------------------*/
            $this->jobseeker_model->update_jobseeker_info($sid,$picture,$resume,$video_resume,$slc_docs,$docs_11_12,$bachelor_docs,$masters_docs,$other_docs);

             /*----------------------------------------------------------------
                 Delete All data in table `checkvalue` with parameter Sid
            -----------------------------------------------------------------*/
            $this->general_model->delete('checkvalue',array('sid'=>$sid));

            /*----------------------------------------------------------------
                    Functional Area 1 Insert in table `checkvalue`
            -----------------------------------------------------------------*/
            $natureoforg1 = $this->input->post('natureoforg1');
            if(count($natureoforg1)>0){
					$count1 = count($natureoforg1);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['attid'] = '1';
                        $data2['chkvalue'] =$natureoforg1[$c];

                        $this->general_model->insert('checkvalue',$data2);
					}
				}

            /*----------------------------------------------------------------
                    Functional Area 2 Insert in table `checkvalue`
            -----------------------------------------------------------------*/
            $natureoforg2 = $this->input->post('natureoforg2');
            if(count($natureoforg2)>0){
					$count2 = count($natureoforg2);
					for($c=0;$c<$count2;$c++){
                        $data3['sid'] = $sid;
                        $data3['attid'] = '2';
                        $data3['chkvalue'] =$natureoforg2[$c];

                        $this->general_model->insert('checkvalue',$data3);
					}
				}
        $this->session->set_flashdata('success',"Personal Information Data update Successfully.");
        redirect(base_url() . 'Jobseeker/editProfile', 'refresh');

    }

    public function updateEducation($sid){
        $this->jobSeekerSessionCheck();

        /*----------------------------------------------------------------
             Delete All data in table `checkvalue` with parameter Sid
        -----------------------------------------------------------------*/
       $this->general_model->delete('seeker_education',array('sid'=>$sid));

        /*----------------------------------------------------------------
            Insert JobSeeker Information on table `seeker_education`
        -----------------------------------------------------------------*/
         $countedu = $this->input->post('degree');
            if(count($countedu)>0){
					$count1 = count($countedu);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['degree'] = $_POST['degree'][$c];
                        $data2['faculty'] = $_POST['faculty'][$c];
                        $data2['graduationyear'] =$_POST['graduationyear'][$c];
                        $data2['instution'] = $_POST['instution'][$c];
                        $data2['board'] = $_POST['board'][$c];
                        $data2['percentage'] = $_POST['percentage'][$c];

                        $this->general_model->insert('seeker_education',$data2);
					}
				}
        $this->session->set_flashdata('success',"Education Information Data update Successfully.");
        redirect(base_url() . 'Jobseeker/editProfile#education', 'refresh');
    }

    public function updateExperience($sid){
        $this->jobSeekerSessionCheck();
//echo '<pre>'; print_r($_POST); die;
        /*----------------------------------------------------------------
             Delete All data in table `seeker_reference` with parameter Sid
        -----------------------------------------------------------------*/
       $this->general_model->delete('seeker_experience',array('sid'=>$sid));

        /*----------------------------------------------------------------
            Insert JobSeeker Information on table `seeker_reference`
        -----------------------------------------------------------------*/
         $countExperience = $this->input->post('company');  //echo'<pre>'; print_r($_POST); die;
            if(count($countExperience)>0){
					$count1 = count($countExperience);
					for($c=0;$c<$count1;$c++){

                        $data2['sid'] = $sid;
                        $data2['company'] = $_POST['company'][$c];
                        $data2['empoyername'] = $_POST['empoyername'][$c];
                        $data2['designation'] =$_POST['designation'][$c];
                        $data2['frommonth'] = $_POST['frommonth'][$c];
                        $data2['fromyear'] = $_POST['fromyear'][$c];
                        $data2['tomonth'] = $_POST['tomonth'][$c];
                        $data2['toyear'] = $_POST['toyear'][$c];
                        $data2['currently_working'] =$_POST['currently_working'][$c];
                        $data2['duties'] = $_POST['duties'][$c];

                        $this->general_model->insert('seeker_experience',$data2);
					}
				}
        $this->session->set_flashdata('success',"Work Experience Information Data update Successfully.");
        redirect(base_url() . 'Jobseeker/editProfile#workexperience', 'refresh');
    }

    public function updateTraining($sid){
        $this->jobSeekerSessionCheck();

        /*----------------------------------------------------------------
             Delete All data in table `seeker_training` with parameter Sid
        -----------------------------------------------------------------*/
       $this->general_model->delete('seeker_training',array('sid'=>$sid));

        /*----------------------------------------------------------------
            Insert JobSeeker Information on table `seeker_education`
        -----------------------------------------------------------------*/
         $counttraining = $this->input->post('institution');
            if(count($counttraining)>0){
					$count1 = count($counttraining);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['institution'] = $_POST['institution'][$c];
                        $data2['course'] = $_POST['course'][$c];
                        $data2['frommonth'] =$_POST['frommonth'][$c];
                        $data2['fromyear'] = $_POST['fromyear'][$c];
                        $data2['tomonth'] = $_POST['tomonth'][$c];
                        $data2['toyear'] = $_POST['toyear'][$c];

                        $this->general_model->insert('seeker_training',$data2);
					}
				}
        $this->session->set_flashdata('success',"Training Information Data update Successfully.");
        redirect(base_url() . 'Jobseeker/editProfile#training', 'refresh');
    }

    public function updateLanguage($sid){
        $this->jobSeekerSessionCheck();

        /*----------------------------------------------------------------
             Delete All data in table `seeker_training` with parameter Sid
        -----------------------------------------------------------------*/
       $this->general_model->delete('seeker_language',array('sid'=>$sid));

        /*----------------------------------------------------------------
            Insert JobSeeker Information on table `seeker_education`
        -----------------------------------------------------------------*/
         $countlanguage = $this->input->post('lang');
            if(count($countlanguage)>0){
					$count1 = count($countlanguage);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['lang'] = $_POST['lang'][$c];
                        $data2['reading'] = $_POST['reading'][$c];
                        $data2['writing'] =$_POST['writing'][$c];
                        $data2['speaking'] = $_POST['speaking'][$c];

                        $this->general_model->insert('seeker_language',$data2);
					}
				}
        $this->session->set_flashdata('success',"Language Information Data update Successfully.");
        redirect(base_url() . 'Jobseeker/editProfile#language', 'refresh');
    }

     public function updateReference($sid){
        $this->jobSeekerSessionCheck();

        /*----------------------------------------------------------------
             Delete All data in table `seeker_reference` with parameter Sid
        -----------------------------------------------------------------*/
       $this->general_model->delete('seeker_reference',array('sid'=>$sid));

        /*----------------------------------------------------------------
            Insert JobSeeker Information on table `seeker_reference`
        -----------------------------------------------------------------*/
         $countReference = $this->input->post('fname');
            if(count($countReference)>0){
					$count1 = count($countReference);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['salutation'] = $_POST['salutation'][$c];
                        $data2['fname'] = $_POST['fname'][$c];
                        $data2['mname'] =$_POST['mname'][$c];
                        $data2['lname'] = $_POST['lname'][$c];
                        $data2['block'] = $_POST['block'][$c];
                        $data2['street'] = $_POST['street'][$c];
                        $data2['city'] = $_POST['city'][$c];
                        $data2['country'] = $_POST['country'][$c];
                        $data2['home'] = $_POST['home'][$c];
                        $data2['office'] = $_POST['office'][$c];
                        $data2['fax'] = $_POST['fax'][$c];
                        $data2['cell'] = $_POST['cell'][$c];
                        $data2['email'] = $_POST['email'][$c];
                        $data2['cname'] = $_POST['cname'][$c];
                        $data2['clocation'] = $_POST['clocation'][$c];
                        $data2['designation'] = $_POST['designation'][$c];
                        $data2['relationship'] = $_POST['relationship'][$c];

                        $this->general_model->insert('seeker_reference',$data2);
					}
				}
        $this->session->set_flashdata('success',"Reference Information Data update Successfully.");
        redirect(base_url() . 'Jobseeker/editProfile#reference', 'refresh');
    }

    public function changeJobSeekerPassword(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;

        $old_password = $this->input->post('oldpassword');
        $chekseeker = $this->general_model->getAll('seeker',array('id' => $sid,'password'=> md5($old_password)));
        if($chekseeker){
            $data =array(
                        'password' => md5($this->input->post('password'))
            );

            $this->general_model->update('seeker',$data, array('id' => $sid));
            $this->session->set_flashdata('success', 'Password Changed Update Successfully !!!');
            $this->session->unset_userdata('jobseeker_profile');
            redirect(base_url() . 'Jobseeker/login');
        }else{
            $this->session->set_flashdata('error', 'Old Password not found in our Database.Please Try Again');
            redirect(base_url() . 'Jobseeker/dashboard');
        }
    }

    public function jobApplied(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;

        $data['applied_job'] = $this->jobseeker_model->get_applied_job($sid);
        $data['menu'] = 'home';
        $data['sidebar'] = 'jobseeker';
        $data['sid']= $sid;
        $data['select']='jobapplied';
        $data['page_title'] = '.:: Global Job :: Complete HR Solution..';
        $data['main'] = 'jobseeker-appliedto';
        $this->load->view('dashboard',$data);
    }


    public function removeAppliedJob($appid){
         $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;

        $this->general_model->delete('application',array('id'=>$appid));
        $this->session->set_flashdata('success', 'Applied Job Removed From the List.');
        redirect(base_url() . 'Jobseeker/dashboard');
    }

     public function logout(){
         $this->session->unset_userdata('jobseeker_profile');
         $this->session->sess_destroy();
         redirect(base_url(), 'refresh');
    }

     /*---------------------------------------------------------------
            Check Whether Employer Session start or Not
    ---------------------------------------------------------------*/
    public function jobSeekerSessionCheck(){
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        if(empty($jobseeker_profile)){
            $this->session->unset_userdata('jobseeker_profile');
            //$this->session->sess_destroy();
            $this->session->set_flashdata('error', 'You are not Loggen. Please login and proceed.');
            redirect(base_url() . 'Jobseeker/login');
        }
    }

    public function appendEducation(){
        $education = $this->general_model->getAll('dropdown','fid = 11','','id,dropvalue');
        $education_html = '';
        $education_html .= '<tr>';
        $education_html .= '<td>';
        $education_html .= '<select class="form-control" name="degree[]" >';
            foreach ($education as $key => $value) {
                $education_html .= '<option value='.$value->id.'>'.$value->dropvalue.'</option>"';
            }
        $education_html .= '</select>';
        $education_html .= '</td>';
        $education_html .= '<td>';
        $education_html .= '<input type="text" class="form-control" name="faculty[]" value="">';
        $education_html .= '</td>';
        $education_html .= '<td>';
        $education_html .= '<select id="currency" class="form-control" name="graduationyear[]">';
        $education_html .= '<option value="0">Year</option>';
        $cyear = date('Y');
        $pyear = $cyear-50;
        for($y=$pyear;$y<$cyear;$y++){
           $education_html .= '<option value='.$y.'>'.$y.'</option>';
        }
         $education_html .= '</select>';
         $education_html .= '</td>';
         $education_html .= '<td>';
         $education_html .= '<input type="text" class="form-control" name="instution[]" value="">';
         $education_html .= '</td>';
         $education_html .= '<td>';
         $education_html .= '<input type="text" class="form-control" name="board[]" value="">';
         $education_html .= '</td>';
         $education_html .= '<td>';
         $education_html .= '<input type="text" class="form-control" name="percentage[]" value="">';
         $education_html .= '</td>';
         $education_html .= '<td><a href="javascript:void(0)" class="btn btn-success remove_edu_row">Remove</a></td>';
         $education_html .= '</tr>';

        echo $education_html;
    }

    public function appendTraining(){
        $training_html = '';
        $training_html .= '<tr>';
        $training_html .= '<td>';
        $training_html .= '<input type="text" class="form-control" name="institution[]" value="">';
        $training_html .= '</td>';
        $training_html .= '<td>';
        $training_html .= '<input type="text" class="form-control" name="course[]" value="">';
        $training_html .= '</td>';
        $training_html .= '<td>';
        $training_html .= '<select id="currency" class="form-control" name="frommonth[]">';
        $training_html .= '<option value="0">Month</option>';
                for($m=0;$m<=12;$m++){
                   $training_html .= '<option value='.$m.'>'.$m.'</option>';
                }
         $training_html .= '</select><br>';
        $training_html .= '<select id="currency" class="form-control" name="fromyear[]">';
        $training_html .= '<option value="0">Year</option>';
                    $cyear = date('Y');
                    $pyear = $cyear-20;
                for($y=$pyear;$y<$cyear;$y++){
                   $training_html .= '<option value='.$y.'>'.$y.'</option>';
                }
         $training_html .= '</select>';
         $training_html .= '</td>';
         $training_html .= '<td>';
         $training_html .= '<select id="currency" class="form-control" name="tomonth[]">';
        $training_html .= '<option value="0">Month</option>';
                    for($m=0;$m<=12;$m++){
                   $training_html .= '<option value='.$m.'>'.$m.'</option>';
                }
         $training_html .= '</select><br>';
        $training_html .= '<select id="currency" class="form-control" name="toyear[]">';
        $training_html .= '<option value="0">Year</option>';
                    $cyear = date('Y');
                    $pyear = $cyear-20;
                for($y=$pyear;$y<$cyear;$y++){
                   $training_html .= '<option value='.$y.'>'.$y.'</option>';
                }
         $training_html .= '</select>';
         $training_html .= '</td>';
         $training_html .= '<td><a href="javascript:void(0)" class="btn btn-success remove_training_row">Remove</a></td>';
         $training_html .= '</tr>';

        echo $training_html;
    }

    public function appendLanguage(){
        $language_html = '';
        $language_html .= '<tr>';
        $language_html .= '<td>';
        $language_html .= '<input type="text" class="form-control" name="lang[]" value="">';
        $language_html .= '</td>';
        $language_html .= '<td>';
        $language_html .= '<select id="currency" class="form-control" name="reading[]">';
        $language_html .= '<option value="Yes">Yes</option>';
        $language_html .= '<option value="No">No</option>';
        $language_html .= '</select>';
        $language_html .= '</td>';
        $language_html .= '<td>';
        $language_html .= '<select id="currency" class="form-control" name="writing[]">';
        $language_html .= '<option value="Yes">Yes</option>';
        $language_html .= '<option value="No">No</option>';
        $language_html .= '</select>';
        $language_html .= '</td>';
        $language_html .= '<td>';
        $language_html .= '<select id="currency" class="form-control" name="speaking[]">';
        $language_html .= '<option value="Yes">Yes</option>';
        $language_html .= '<option value="No">No</option>';
        $language_html .= '</select>';
        $language_html .= '</td>';
        $language_html .= '<td><a href="javascript:void(0)" class="btn btn-success remove_language_row">Remove</a></td>';
        $language_html .= '</tr>';

        echo $language_html;
    }

    public function appendReference(){

        $salutation =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $country = $this->general_model->getAll('country2code','','country_name','country_code,country_name');

        $reference_html = '';
        $reference_html .='<table class="table table-responsive">';
        $reference_html .='<tr>';
        $reference_html .='<th>Name<span class="asterisk">*</span></th>';
        $reference_html .='<td>';
        $reference_html .='<div class="row">';
        $reference_html .='<div class="col-sm-3">';
        $reference_html .='<select id="salutation" class="form-control" name="salutation[]">';
          foreach ($salutation as $key => $value) {
                $reference_html .='<option value='.$value->id.'>'.$value->dropvalue.'</option>';
          }
        $reference_html .='</select>';
        $reference_html .='</div>';
        $reference_html .='<div class="col-md-3">';
        $reference_html .='<input type="text" id="fname" value="" required name="fname[]" placeholder="Full Name" class="form-control" autofocus>';
        $reference_html .='</div>';
        $reference_html .='<div class="col-md-3">';
        $reference_html .='<input type="text" id="mname" value="" name="mname[]" placeholder="Middle Name" class="form-control" autofocus>';
        $reference_html .='</div>';
        $reference_html .='<div class="col-md-3">';
        $reference_html .='<input type="text" id="lname" required value="" name="lname[]" placeholder="Last Name" class="form-control" autofocus>';
        $reference_html .=' </div>';
        $reference_html .='</div>';
        $reference_html .='</td>';
        $reference_html .='</tr>';
        $reference_html .='<tr>';
        $reference_html .='<th>Address <span class="asterisk">*</span></th>';
        $reference_html .='<td>';
        $reference_html .='<div class="row">';
        $reference_html .='<div class="col-md-3">';
        $reference_html .='<input type="text" id="block" value="" name="block[]" placeholder="Block" class="form-control" autofocus>';
        $reference_html .='</div>';
        $reference_html .='<div class="col-md-3">';
        $reference_html .='<input type="text" id="street" value="" name="street[]" placeholder="Street Name" class="form-control" autofocus>';
        $reference_html .='</div>';
        $reference_html .='<div class="col-md-3">';
        $reference_html .='<input type="text" id="city" required value="" name="city[]" placeholder="City" class="form-control" autofocus>';
        $reference_html .='</div>';
        $reference_html .='<div class="col-sm-3">';
        $reference_html .='<select id="country" class="form-control" name="country[]">';
        $reference_html .='<option value="0">-- Select Country --</option>';
            foreach ($country as $key => $value) {
              $reference_html .='<option value='.$value->country_code.'>'.$value->country_name.'</option>';
            }
        $reference_html .='</select>';
        $reference_html .='</div>';
        $reference_html .='</div>';
        $reference_html .='</td>';
        $reference_html .='</tr>';
        $reference_html .='<tr>';
        $reference_html .='<th>Home Phone</th>';
        $reference_html .='<td>';
        $reference_html .='<div class="row">';
        $reference_html .='<div class="col-md-9">';
        $reference_html .='<input type="text" id="home" value="" name="home[]" placeholder="Home Phone" class="form-control" autofocus>';
        $reference_html .='</div>';
        $reference_html .='</div>';
        $reference_html .='</td>';
        $reference_html .='</tr>';
        $reference_html .='<tr>';
        $reference_html .='<th>Office Phone</th>';
        $reference_html .='<td>';
        $reference_html .='<div class="row">';
        $reference_html .='<div class="col-md-9">';
        $reference_html .='<input type="text" id="office" value="" name="office[]" placeholder="Office Phone" class="form-control" autofocus>';
        $reference_html .='</div>';
        $reference_html .='</div>';
        $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<th>Cell No.</th>';
       $reference_html .='<td>';
       $reference_html .='<div class="row">';
       $reference_html .='<div class="col-md-9">';
       $reference_html .=' <input type="text" id="cell" value="" name="cell[]" placeholder="Cell No" class="form-control" autofocus>';
       $reference_html .='</div>';
       $reference_html .='</div>';
       $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<th>Fax</th>';
       $reference_html .='<td>';
       $reference_html .=' <div class="row">';
       $reference_html .='<div class="col-md-9">';
       $reference_html .='<input type="text" id="fax" value="" name="fax[]" placeholder="Fax" class="form-control" autofocus>';
       $reference_html .='</div>';
       $reference_html .='</div>';
       $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<th>Email<span class="asterisk">*</span></th>';
       $reference_html .='<td>';
       $reference_html .='<div class="row">';
       $reference_html .='<div class="col-md-9">';
       $reference_html .='<input type="email" id="email" value="" required name="email[]" placeholder="Email" class="form-control" autofocus>';
       $reference_html .='</div>';
       $reference_html .='</div>';
       $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<th>Company Name<span class="asterisk">*</span></th>';
       $reference_html .='<td>';
       $reference_html .='<div class="row">';
       $reference_html .='<div class="col-md-9">';
       $reference_html .='<input type="text" id="cname" value="" required name="cname[]" placeholder="Company Name" class="form-control" autofocus>';
       $reference_html .='</div>';
       $reference_html .='</div>';
       $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<th>Company Location<span class="asterisk">*</span></th>';
       $reference_html .='<td>';
       $reference_html .='<div class="row">';
       $reference_html .='<div class="col-md-9">';
       $reference_html .='<input type="text" id="clocation" value="" required name="clocation[]" placeholder="Location" class="form-control" autofocus>';
       $reference_html .='</div>';
       $reference_html .='</div>';
       $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<th>Designation<span class="asterisk">*</span></th>';
       $reference_html .='<td>';
       $reference_html .='<div class="row">';
       $reference_html .='<div class="col-md-9">';
       $reference_html .='<input type="text" id="designation" value="" required name="designation[]" placeholder="Designation" class="form-control" autofocus>';
       $reference_html .='</div>';
       $reference_html .='</div>';
       $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<th>Relationship<span class="asterisk">*</span></th>';
       $reference_html .='<td>';
       $reference_html .='<div class="row">';
       $reference_html .='<div class="col-md-9">';
       $reference_html .='<input type="text" id="relationship" value="" required name="relationship[]" placeholder="Relationship" class="form-control" autofocus>';
       $reference_html .='</div>';
       $reference_html .=' </div>';
       $reference_html .='</td>';
       $reference_html .='</tr>';
       $reference_html .='<tr>';
       $reference_html .='<td colspan="2"><a href="javascript:void(0)" class="btn btn-success remove_reference_row">Remove</a></td>';
       $reference_html .='</tr>';
       $reference_html .='</table>';

        echo $reference_html;
    }

    public function appendExperience(){
        $experience_html ='';

        $experience_html .= '<table class="table table-responsive ">';
        $experience_html .= '<tr>';
        $experience_html .= '<th>Company Name<span class="asterisk">*</span></th>';
        $experience_html .= '<td>';
        $experience_html .= '<div class="row">';
        $experience_html .= '<div class="col-md-6">';
        $experience_html .= '<input type="text" id="company" required value="" name="company[]" placeholder="Company Name" class="form-control" autofocus>';
        $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</td>';
        $experience_html .= '</tr>';
        $experience_html .= '<tr>';
        $experience_html .= '<th>Location<span class="asterisk">*</span></th>';
        $experience_html .= '<td>';
        $experience_html .= '<div class="row">';
        $experience_html .= '<div class="col-md-6">';
        $experience_html .= '<input type="text" id="empoyername" required value="" name="empoyername[]" placeholder="Location" class="form-control" autofocus>';
        $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</td>';
        $experience_html .= '</tr>';
        $experience_html .= '<tr>';
        $experience_html .= '<th>Designation<span class="asterisk">*</span></th>';
        $experience_html .= '<td>';
        $experience_html .= '<div class="row">';
        $experience_html .= '<div class="col-md-6">';
        $experience_html .= '<input type="text" id="designation" required value="" name="designation[]" placeholder="Designation" class="form-control" autofocus>';
        $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</td>';
        $experience_html .= '</tr>';
        $experience_html .= '<tr>';
        $experience_html .= '<th>From<span class="asterisk">*</span></th>';
        $experience_html .= '<td>';
        $experience_html .= '<div class="row">';
        $experience_html .= '<div class="col-md-3">';
        $experience_html .= '<select id="currency" class="form-control" name="frommonth[]">';
        $experience_html .= '<option value="0">Month</option>';
            for($m=0;$m<=12;$m++){
               $experience_html .= '<option value='.$m.'>'.$m.'</option>';
             }
        $experience_html .= '</select>';
        $experience_html .= '</div>';
        $experience_html .= '<div class="col-md-3">';
        $experience_html .= '<select id="currency" class="form-control" name="fromyear[]">';
        $experience_html .= '<option value="0">Year</option>';
            $cyear = date('Y');
            $pyear = $cyear-50;
            for($y=$pyear;$y<$cyear;$y++){
               $experience_html .= '<option value='.$y.'>'.$y.'</option>';
            }
        $experience_html .= '</select>';
        $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</td>';
        $experience_html .= '</tr>';
        $experience_html .= '<tr>';
        $experience_html .= '<th>To</th>';
        $experience_html .= '<td>';
        $experience_html .= '<div class="row">';
        $experience_html .= '<div class="col-md-3">';
        $experience_html .= '<select id="currency" class="form-control" name="tomonth[]">';
        $experience_html .= '<option value="0">Month</option>';
            for($m=0;$m<=12;$m++){
               $experience_html .= '<option value='.$m.'>'.$m.'</option>';
            }
        $experience_html .= '</select>';
        $experience_html .= '</div>';
        $experience_html .= '<div class="col-md-3">';
        $experience_html .= '<select id="currency" class="form-control" name="toyear[]">';
        $experience_html .= '<option value="0">Year</option>';
            $cyear = date('Y');
            $pyear = $cyear-50;
            for($y=$pyear;$y<$cyear;$y++){
               $experience_html .= '<option value='.$y.'>'.$y.'</option>';
             }
        $experience_html .= '</select>';
        $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</td>';
        $experience_html .= '</tr>';
        $experience_html .= '<tr>';
        $experience_html .= '<th>Currently Working : </th>';
        $experience_html .= '<td>';
        $experience_html .= '<div class="row">';
        $experience_html .= '<div class="col-sm-2">';
        $experience_html .= '<label>';
        $experience_html .= '<input type="checkbox" class="currently_working" value="1" name="currently_working[]">';
        $experience_html .= '</label>';
            $experience_html .= '<div class="show_currently_work">';
                $experience_html .= '<input type="hidden" value="0"  name="currently_working[]">';
            $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</td>';
        $experience_html .= '</tr>';
        $experience_html .= '<tr>';
        $experience_html .= '<th>My Duties and Responsibilities <span class="asterisk">*</span></th>';
        $experience_html .= '<td>';
        $experience_html .= '<div class="row">';
        $experience_html .= '<div class="col-md-12">';
        $experience_html .= '<textarea class="form-control" name="duties[]" rows="10"></textarea>';
        $experience_html .= '</div>';
        $experience_html .= '</div>';
        $experience_html .= '</td>';
        $experience_html .= '</tr>';
        $experience_html .= '<tr>';
        $experience_html .= '<td colspan="2"><a href="javascript:void(0)" class="btn btn-success remove_experience_row">Remove</a></td>';
        $experience_html .= '</tr>';
        $experience_html .= '</table>';

        echo $experience_html;


    }

}

/* End of file Jobseeker.php
 * Location: ./application/modules/home/controllers/Jobseeker.php */
