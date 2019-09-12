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

        $this->load->library('facebook');
        $this->load->library('google');
        $this->load->model('jobseeker_model');
        $this->load->model('employer_model');
        $this->load->library('multiupload');
        $this->load->helper('view_helper');
        $this->load->model('admin/general_model','general_model');


        require_once APPPATH.'third_party/google-api-client/Google_Client.php';
        require_once APPPATH.'third_party/google-api-client/contrib/Google_Oauth2Service.php';

        // Load linkedin config
        $this->load->config('linkedin');
        //Include the linkedin api php libraries
        include_once APPPATH."libraries/linkedin-oauth-client/http.php";
        include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";
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
            redirect(base_url() . 'employer/dashboard');
        }
        /*---------------------------------------------------------*/

        /*---------------------------------------------------------
         Check Seeker Session, if set then redirect to dashboard
        ---------------------------------------------------------*/
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        if(!empty($jobseeker_profile)){
            redirect(base_url() . 'jobseeker/dashboard');
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
        $data['page_title'] = 'Finance Job Nepal';
        //$data['seeker_right_banner']= $this->general_model->getAll('jobseek_banner',array('publish'=>1),'ordering asc');
        //$this->load->view('jobseeker-login',$data);
        $data['main'] = 'jobseeker-login';
        $this->load->view('main',$data);
    }
    
    public function signup(){
        $data['menu'] = 'seeker';
        $data['page_title'] = 'Finance Job Nepal';
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

        /*facebook login */
        $data['authURL'] =  $this->facebook->login_url();
        /*facebook login */
        /*linked in login*/
        $data['oauthURL'] = base_url().$this->config->item('linkedin_redirect_url').'?oauth_init=1';
        /*linked in login*/

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
            $data['page_title'] = 'Finance Job Nepal';
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
        else{
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
                $a = $_FILES['picture']['name'];
                if ($a != "") {
                    //echo "Upload Employer Logo";
                    $config['upload_path'] = './././uploads/jobseeker/';
                    $config['log_threshold'] = 1;
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['max_size'] = '100000'; // 0 = no file size limit
                    $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['picture']['name']));
                    $config['overwrite'] = false;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('picture');
                    $upload_data = $this->upload->data();
                    $picture = $upload_data['file_name'];
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
                $subject = 'Thank you for registering with financejobnepal.com';

                // message
                $mess = '
                <html>
                <head>
                  <title>Thank you for registering with financejobnepal.com</title>
                </head>
                <body>
                  Dear '.$toName.'<br><br>
                  Thank you for registering with financejobnepal.com. Please <a href="'.base_url().'jobseeker/activate/?code='.$activation_code.'">click here</a> to activate your account.<br><br>
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
                    redirect(base_url() . 'jobseeker/signup', 'refresh');
                }else{
                    $this->session->set_flashdata('error',"Mail Couldn't be Send. There must be something wrong with mail.");
                    redirect(base_url() . 'jobseeker/signup', 'refresh');
                }
          }else{
              
              /*----------------------------------------------------------------
                If  Username and Email Exists, Send Message On Flash Messgage
              -----------------------------------------------------------------*/
              if($checkusername > 0){
                  $data['message'] =  "The username <strong>".$username."</strong> is already taken.";     
              }
                
              if($checkemail > 0){
                  $data['message'] = "The email address <strong>".$email."</strong> already exists in our record.<br>If you have forgot your password, please click <a href='".base_url()."jobseeker/login#forgotpassword'>HERE</a> and enter your email address.<br>Finance Job administrator will mail you your authentication information.";
              }
              
                $data['menu'] = 'seeker';
                $data['page_title'] = 'Finance Job Nepal';
                $data['org_type'] =$this->general_model->getAll('dropdown','fid = 6','','id,dropvalue'); 
                $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
                $data['country'] = $this->general_model->getAll('country2code','','country_name','country_code,country_name');
                $data['job_region'] =$this->general_model->getAll('dropdown','fid = 15','','id,dropvalue');
                $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
                $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
                $data['natureoforg'] =$this->general_model->getAll('dropdown','fid = 10','','id,dropvalue');
                $data['nationality'] =$this->general_model->getAll('dropdown','fid = 8','','id,dropvalue');
                /*facebook login */
                $data['authURL'] =  $this->facebook->login_url();
                /*facebook login */
                /*linked in login*/
                $data['oauthURL'] = base_url().$this->config->item('linkedin_redirect_url').'?oauth_init=1';
                /*linked in login*/

                $data['main'] = 'jobseeker-signup';
                $this->load->view('main',$data);
           }
        }
    }

    public function jobseekercv(){

        $this->load->library('email');

        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $contact_number = $this->input->post('contact_number');
        //$cv_file = $this->input->post('cv_file');


            //echo "Upload Employer Logo";
            $config['upload_path'] = './././uploads/jobseeker/';
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size'] = '100000'; // 0 = no file size limit
            $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['attachment']['name']));
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('attachment');
            $upload_data = $this->upload->data();
            $cv_file = $upload_data['file_name'];

        $checkuser = $this->general_model->countTotal('seeker','email ="'.$email.'"');
        if($checkuser >0){
            $cv_data = array(
                'resume' =>$cv_file,
                'user_type' => 'cv_only',
                'date_modified' => date("Y-m-d H:i:s"),
            );
            $this->general_model->update('seeker',$cv_data, array('email' => $email));
        }
        else{
            $cv_data = array(
                'username' =>$email,
                'password' =>md5($contact_number),
                'phone_cell' => $contact_number,
                'email' =>$email,
                'resume' =>$cv_file,
                'fname' =>$first_name,
                'lname' =>$last_name,
                'user_type' => 'cv_only',
                'date_modified' => date("Y-m-d H:i:s"),
                'isActivated' => '1',
            );



            $this->general_model->insert('seeker',$cv_data);
        }



        //$attachment = $upload_data['full_path'];
        $fromName = $first_name.' '.$last_name;
        //$toemail = 'info@financejobnepal.com';
        $toemail = 'binaya619@gmail.com';
        // subject
        $subject = 'CV Received';

        // message
        $mess = '
                <html>
                <head>
                  <title>CV received </title>
                </head>
                <body>
                    <table>
                        <tr>
                            <td>Full Name</td><td>'.$fromName.'</td>
                        </tr>
                        <tr>
                            <td>Email</td><td>'.$email.'</td>
                        </tr>
                        <tr>
                            <td>Contact Number</td><td>'.$contact_number.'</td>
                        </tr>
                    </table>
                </body>
                </html>
                ';

        // To send HTML mail, the Content-type header must be set


        $this->email->attach($upload_data['full_path']);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from($email,$fromName); // change it to yours
        $this->email->to($toemail); // change it to yours
        $this->email->subject($subject);
        $this->email->message($mess);
        if ($this->email->send()) {
            $this->session->set_flashdata('success',"Cv Received. We will get back to you soon .");
            redirect(base_url() . 'jobseeker/signup', 'refresh');
        } else {
            $this->session->set_flashdata('error',"Something went wrong.");
            redirect(base_url() . 'jobseeker/signup', 'refresh');
        }

        // Send Mail
    }
    
    public function loginCheck(){

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|md5');

        if (FALSE == $this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Username and Password are required fields');
            redirect(base_url() . 'jobseeker/login');
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
                redirect(base_url() . 'jobseeker/dashboard', 'refresh');
            }
        } else {

                
             $employer_profile = $this->employer_model->login($this->input->post('username'), $this->input->post('password'));
            
             if (isset($employer_profile) && !empty($employer_profile)) {
                $employerId = $employer_profile->id;
                $this->employer_model->last_access($employerId);
                $this->session->set_userdata('employer_profile', $employer_profile);
                redirect(base_url() . 'employer/dashboard', 'refresh');
             }else{
            /*-----------------------------------------------------------------
               If JobId valiation error, redirect to login page with parameter
            -----------------------------------------------------------------*/

            if($jobId = $this->input->post('jobId')){
                 $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . 'jobseeker/login/?jobid='.$jobId);
            }        

            $this->session->set_flashdata('error', 'Invalid Username or Password combination.');
            redirect(base_url(). 'jobseeker/login/') ;
            }    
        }
    }

    public function seekerloginCheck(){

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|md5');

        if (FALSE == $this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Username and Password are required fields');
            redirect(base_url() . 'jobseeker/login');
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
                redirect(base_url() . 'jobseeker/dashboard', 'refresh');
            }
        }else {
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . 'jobseeker/login');
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
            $content .= "<span>You've recently asked to reset the password for this Finance Job JobSeeker account:</span><br>";
            $content .= $email;
            $content .= "<br><br>To update your password, click the link below<br>";
            $content .= "<a href='".base_url()."jobseeker/changepassword/?token=".$token."'>Reset my password</a>";
            $content .= "<br><br><br><br>Cheers,<br>";
            $content .= "Finance Job Nepal Team";


            $adminEmail = 'info@financejobnepal.com';
            $mail_subject = "Forget Password Response from Finance Job Nepal";
            $mail_body = $content;
            $mail_header  = 'MIME-Version: 1.0' . "\r\n";
            $mail_header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $mail_header .= 'To: '.$mail_to.' <'.$mail_to.'>' . "\r\n";
            //$mail_header .= $adminEmail;
            $mail_header .= 'From: Finance Job Nepal <'.$adminEmail.'>' . "\r\n";


            if(@mail($mail_to,$mail_subject,$mail_body,$mail_header)){
                     $this->session->set_flashdata('success', 'Password reset link has been Sent. Please check your Email.');
                }else{
                    $this->session->set_flashdata('error', 'Failed to send Password reset link. Please try again!');
                }
            redirect(base_url() . 'jobseeker/login');

        }else{
            $this->session->set_flashdata('error', 'The email address provided doesnot exists in our record');
            redirect(base_url() . 'jobseeker/login');
        }
    }

    public function changePassword(){
        $token = $_GET['token'];
        $countToken = $this->jobseeker_model->countToken($token);
        if($countToken > 0){
            $data['menu'] = 'changepassword';
            $data['token'] = $token;
            //$data['seeker_right_banner']= $this->general_model->getAll('jobseek_banner',array('publish'=>1));
            $data['page_title'] = 'Finance Job Nepal';
            $data['main'] = 'jobseeker-changepassword';
            $this->load->view('main',$data);
        }else{
            $this->session->set_flashdata('error', 'The token provided doesnt exists in our record');
            redirect(base_url() . 'jobseeker/login');
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
            redirect(base_url() . 'jobseeker/changePassword/?token='.$token);
        }else{

            $seeker_info = $this->general_model->getById('seeker','token',$token);
            $sid = $seeker_info->id;

            $data =array(
                'password' => md5($this->input->post('password')),
                'token'=> ''
            );
            $this->general_model->update('seeker',$data, array('id' => $sid));
            $this->session->set_flashdata('success', 'Password Update Successfully !!!');
            redirect(base_url() . 'jobseeker/login');
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
            redirect(base_url() . 'jobseeker/login');
        }else{
            $this->session->set_flashdata('error', 'The Activation Code provided doesnt exists in our record');
            redirect(base_url() . 'jobseeker/login');
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
        $data['appliedjobs'] = $this->jobseeker_model->get_applied_job($sid);
        $data['page_title'] = 'Finance Job Nepal';
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
        redirect(base_url() . 'jobseeker/dashboard');
    }
    /*-----------------------------------------------------------------------
            Added by binaya for finance job
    -----------------------------------------------------------------------*/
    public function basicInformation(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'basicInformation';
        $data['sid']= $sid;
        $data['page_title'] = 'Finance Job Nepal';
        $data['basicInfo'] = $this->general_model->getById('seeker','id',$sid);
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['main'] = 'jobseeker-edit-profile';
        $this->load->view('main',$data);
    }

    public function updateInformation($sid){
        $this->jobSeekerSessionCheck();

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

        $a = $_FILES['picture']['name'];
        if ($a != "") {
            //echo "Upload Employer Logo";
            $config['upload_path'] = './././uploads/jobseeker/';
            $config['log_threshold'] = 1;
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '100000'; // 0 = no file size limit
            $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['picture']['name']));
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('picture');
            $upload_data = $this->upload->data();
            $picture = $upload_data['file_name'];
        }

        if(!isset($picture))  $picture = '';


        $video_resume = '';$slc_docs = '';$other_docs = ''; $masters_docs = ''; $bachelor_docs = ''; $docs_11_12 = '';

        $this->jobseeker_model->update_jobseeker_info($sid,$picture,$resume,$video_resume,$slc_docs,$docs_11_12,$bachelor_docs,$masters_docs,$other_docs);

        $this->session->set_flashdata('success', 'Personal Information Data update Successfully.');
        redirect(base_url() . 'jobseeker/basicInformation');
    }

    public function education(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'education';
        $data['sid']= $sid;
        $data['page_title'] = 'Finance Job Nepal';
        $data['education'] =$this->general_model->getAll('dropdown','fid = 11','','id,dropvalue');
        $data['education_detail'] = $this->general_model->getAll('seeker_education',array('sid'=>$sid),'id');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['main'] = 'jobseeker-education';
        $this->load->view('main',$data);
    }

    public function training(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'training';
        $data['sid']= $sid;
        $data['page_title'] = 'Finance Job Nepal';
        $data['training_detail'] = $this->general_model->getAll('seeker_training',array('sid'=>$sid),'id');
        $data['main'] = 'jobseeker-training';
        $this->load->view('main',$data);
    }

    public function workExperience(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'workExperience';
        $data['sid']= $sid;
        $data['page_title'] = 'Finance Job Nepal';
        $data['experience_detail'] = $this->general_model->getAll('seeker_experience',array('sid'=>$sid),'id');
        $data['main'] = 'jobseeker-work-experience';
        $this->load->view('main',$data);
    }

    public function language(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'language';
        $data['sid']= $sid;
        $data['page_title'] = 'Finance Job Nepal';
        $data['language_detail'] = $this->general_model->getAll('seeker_language',array('sid'=>$sid),'id');
        $data['main'] = 'jobseeker-language';
        $this->load->view('main',$data);
    }

    public function reference(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'reference';
        $data['sid']= $sid;
        $data['page_title'] = 'Finance Job Nepal';
        $data['reference_detail'] = $this->general_model->getAll('seeker_reference',array('sid'=>$sid),'id');
        $data['main'] = 'jobseeker-reference';
        $this->load->view('main',$data);
    }

    /*-----------------------------------------------------------------------
            Added by binaya for finance job
    -----------------------------------------------------------------------*/

    public function editProfile(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;
        $data['menu'] = 'editProfile';
        $data['sidebar'] = 'jobseeker';
        $data['sid']= $sid;
        $data['select']='editprofile';
        $data['page_title'] = 'Finance Job Nepal';
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
        redirect(base_url() . 'jobseeker/editProfile', 'refresh');

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
        $count = $this->input->post('educount');
        $data = array();
        for($c=0;$c<=$count;$c++){
            if(isset($_POST['degree'][$c])){
                $data2['sid'] = $sid;
                $data2['degree'] = $_POST['degree'][$c];
                $data2['education_program'] = $_POST['education_program'][$c];
                $data2['board'] = $_POST['education_board'][$c];
                $data2['instution'] = $_POST['name_of_institute'][$c];
                if(!empty($_POST['currently_studying'][$c])){
                    $data2['current_studying'] = $_POST['currently_studying'][$c];
                    $data2['started_year'] = $_POST['started_year'][$c];
                    $data2['started_month'] = $_POST['started_month'][$c];
                }
                else{
                    $data2['current_studying'] = 0;
                    $data2['marks_secured_in'] = $_POST['marks_secured_in'][$c];
                    $data2['marks_secured'] = $_POST['marks_secured'][$c];
                    $data2['graduationyear'] =$_POST['graduation_year'][$c];
                    $data2['graduation_month'] =$_POST['graduation_month'][$c];
                }


                $data[] = $data2;
                $this->general_model->insert('seeker_education',$data2);
            }
        }
            /*if(count($countedu)>0){
					$count1 = count($countedu);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['degree'] = $_POST['degree'][$c];
                        $data2['education_program'] = $_POST['education_program'][$c];
                        $data2['board'] = $_POST['education_board'][$c];
                        $data2['instution'] = $_POST['name_of_institute'][$c];
                        if(!empty($_POST['currently_studying'][$c]))
                        $data2['current_studying'] = $_POST['currently_studying'][$c];
                        else
                            $data2['current_studying'] = 0;
                        $data2['marks_secured_in'] = $_POST['marks_secured_in'][$c];
                        $data2['marks_secured'] = $_POST['marks_secured'][$c];
                        $data2['graduationyear'] =$_POST['graduation_year'][$c];
                        $data2['graduation_month'] =$_POST['graduation_month'][$c];
                        $data[] = $data2;
                        $this->general_model->insert('seeker_education',$data2);
					}
				}*/

        //echo '<pre>'; print_r($data);echo '</pre>';die();
        $this->session->set_flashdata('success',"Education Information Data update Successfully.");
        redirect(base_url() . 'jobseeker/education', 'refresh');
    }

    public function updateExperience($sid){
        $this->jobSeekerSessionCheck();

        /*----------------------------------------------------------------
             Delete All data in table `seeker_reference` with parameter Sid
        -----------------------------------------------------------------*/
       $this->general_model->delete('seeker_experience',array('sid'=>$sid));

        /*----------------------------------------------------------------
            Insert JobSeeker Information on table `seeker_reference`
        -----------------------------------------------------------------*/
         $countExperience = $this->input->post('company');  //echo'<pre>'; print_r($_POST); die;
         $count = $this->input->post('expcount');
            $data =array();
            for($c=0;$c<=$count;$c++){
                if(isset($_POST['company'][$c])){
                    $data2['sid'] = $sid;
                    $data2['company'] = $_POST['company'][$c];
                    $data2['location'] = $_POST['location'][$c];
                    $data2['title'] =$_POST['title'][$c];
                    $data2['position'] =$_POST['position'][$c];
                    $data2['frommonth'] = $_POST['frommonth'][$c];
                    $data2['fromyear'] = $_POST['fromyear'][$c];
                    $data2['tomonth'] = $_POST['tomonth'][$c];
                    $data2['toyear'] = $_POST['toyear'][$c];
                    if(!empty($_POST['currently_working'][$c]))
                        $data2['currently_working'] = $_POST['currently_working'][$c];
                    else
                        $data2['currently_working'] = 0;
                    $data2['roles_and_responsibilities'] = $_POST['duties'][$c];
                    $data[] = $data2;
                    $this->general_model->insert('seeker_experience',$data2);
                }
            }
        //echo '<pre>'; print_r($data);echo '</pre>';die();
        $this->session->set_flashdata('success',"Work Experience Information Data update Successfully.");
        redirect(base_url() . 'jobseeker/workExperience', 'refresh');
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
          $data = array();
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
                        //$data[] = $data2;
                        $this->general_model->insert('seeker_training',$data2);
					}
				}
            //echo '<pre>';print_r($data); echo '</pre>';die();
        $this->session->set_flashdata('success',"Training Information Data update Successfully.");
        redirect(base_url() . 'jobseeker/training', 'refresh');
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
         $countlanguage = $this->input->post('language');
        $data = array();
            if(count($countlanguage)>0){
					$count1 = count($countlanguage);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['lang'] = $_POST['language'][$c];
                        $data2['reading'] = $_POST['reading'][$c];
                        $data2['writing'] =$_POST['writing'][$c];
                        $data2['speaking'] = $_POST['speaking'][$c];
                        $data2['listening'] = $_POST['listening'][$c];
                        //$data[] = $data2;
                        $this->general_model->insert('seeker_language',$data2);
					}
				}
//        echo '<pre>';print_r($data);echo '</pre>'; die();
        $this->session->set_flashdata('success',"Language Information Data update Successfully.");
        redirect(base_url() . 'jobseeker/language', 'refresh');
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
         $data = array();
         $countReference = $this->input->post('reference_name');
            if(count($countReference)>0){
					$count1 = count($countReference);
					for($c=0;$c<$count1;$c++){
                        $data2['sid'] = $sid;
                        $data2['reference_name'] = $_POST['reference_name'][$c];
                        $data2['position'] = $_POST['position'][$c];
                        $data2['organization_name'] = $_POST['organization_name'][$c];
                        $data2['email'] = $_POST['email'][$c];
                        $data2['mobile_number'] = $_POST['mobile_number'][$c];
                        $data2['other_number'] = $_POST['other_number'][$c];
                        //$data[] =$data2;
                        $this->general_model->insert('seeker_reference',$data2);
					}
				}
//                 echo '<pre>';print_r($data);echo '</pre>'; die();
        $this->session->set_flashdata('success',"Reference Information Data update Successfully.");
        redirect(base_url() . 'jobseeker/reference', 'refresh');
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
            redirect(base_url() . 'jobseeker/login');
        }else{
            $this->session->set_flashdata('error', 'Old Password not found in our Database.Please Try Again');
            redirect(base_url() . 'jobseeker/dashboard');
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
        $data['page_title'] = 'Finance Job Nepal';
        $data['main'] = 'jobseeker-appliedto';
        $this->load->view('dashboard',$data);
    }


    public function removeAppliedJob($appid){
         $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;

        $this->general_model->delete('application',array('id'=>$appid));
        $this->session->set_flashdata('success', 'Applied Job Removed From the List.');
        redirect(base_url() . 'jobseeker/dashboard');
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
            redirect(base_url() . 'jobseeker/login');
        }
    }

    public function appendEducation(){
        $count = $_POST['count']+1;
        $education = $this->general_model->getAll('dropdown','fid = 11','','id,dropvalue');
        $education_html = '';
        $education_html .= '<div class="appendedu">';
        /*------------------------------------------------------*/
        $education_html .= '<div class="single-resume-feild feild-flex-2">'; // degree and program
        $education_html .= '<div class="single-input">'; // degree
        $education_html .= '<select name="degree['.$count.']" id="degree">';
        $education_html .= '<option value="">--Select Degree--</option>';
        if($education) {
            foreach ($education as $key => $value) {
                $education_html .= '<option value=' . $value->id . '>' . $value->dropvalue . '</option>"';
            }
        }
        $education_html .= '</select>';
        $education_html .= '</div>';//degree
        $education_html .= '<div class="single-input">'; // program
        $education_html .= '<input type="text" required="" name="education_program['.$count.']" value="" class="form-control" placeholder="Education Program">';
        $education_html .= '</div>';//program
        $education_html .= '</div>';//degree and program
        /*------------------------------------------------------*/
        $education_html .= '<div class="single-resume-feild feild-flex-2">'; //education board and name of institute
        $education_html .= '<div class="single-input">';//education board
        $education_html .= '<select name="education_board['.$count.']" id="education_board">
                                <option value="">Select Education Board</option>
                                <option value="HSEB">HSEB</option>
                                <option value="Kathmandu University">Kathmandu University</option>
                                <option value="Tribhuvan University">Tribhuvan University</option>
                                <option value="Pokhara University">Pokhara University</option>
                                <option value="Purbanchal University">Purbanchal University</option>
                            </select>';
        $education_html .= '</div>'; //education board
        $education_html .= '<div class="single-input">
                                <input type="text" value="" name="name_of_institute['.$count.']"
                                       id="name_of_institute" placeholder="Name of Institute">
                            </div>'; //name of institiute
        $education_html .= '</div>'; //education board and name of institute
        /*------------------------------------------------------*/
        $education_html .='<div class="single-job-sidebar sidebar-type">
                            <div class="job-sidebar-box checkbox section_0">
                                <input class="" type="checkbox" id="currently_studying_'.$count.'" onchange="currentlystudy('.$count.')" name="currently_studying['.$count.']" value="1"/>
                                <label for="currently_studying" class="currently_studying"><span></span>Currently
                                    studying here?</label>
                            </div>
                        </div>'; //currently studying
        /*------------------------------------------------------*/
        $education_html .= '<div class="graduation" id="graduation_'.$count.'">'; //graduation

        $education_html .= '<div class="single-resume-feild feild-flex-2">'; //degree and program
        $education_html .= '<div class="single-input">
                                <select id="marks_secured_in" name="marks_secured_in['.$count.']">
                                    <option value="">Marks secured in</option>
                                    <option value="Percentage">Percentage</option>
                                    <option value="CGPA">CGPA</option>
                                </select>
                            </div>
                            <div class="single-input">
                                <input type="text" value="" id="marks_secured" name="marks_secured['.$count.']"
                                       placeholder="Marks Secured">
                            </div>';
        $education_html .= '</div>';//degree and program

        $education_html .= '<div class="single-resume-feild feild-flex-2">';//graduation year and month
        $education_html .= '<div class="single-input">'; //graduation year
        $education_html .= '<select id="graduation_year" name="graduation_year['.$count.']">
                                    <option value="">Select Graduation Year</option>';
        $cyear = date('Y');
        $pyear = $cyear - 50;
        for ($y = $pyear; $y <= $cyear; $y++) {
            $education_html .= '<option value="'.$y.'">'.$y.'</option>';
        }
        $education_html .= '</select>';
        $education_html .= '</div>'; //graduation year
        $education_html .= '<div class="single-input">'; //graduation month
        $education_html .= '<select id="graduation_month" name="graduation_month['.$count.']">
                                <option value="">Select Graduation Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>';
        $education_html .= '</div>';//graduation month
        $education_html .= '</div>'; //graduation year and month

        $education_html .= '</div>'; //graduation
        $education_html .= '<div class="currentgrad hide" id="currentgrad_'.$count.'" style="">
                                 <div class="single-resume-feild feild-flex-2 started" >
                                     <div class="single-input">
                                         <select id="started_year" name="started_year[]">
                                             <option value="">Select Started Year</option>';
        $cyear = date('Y');
        $pyear = $cyear - 5;
        for ($y = $pyear; $y <= $cyear; $y++) {
            $education_html .= '<option value="'.$y.'">'.$y.'</option>';
        }
        $education_html .=               '</select>
                                     </div>
                                     <div class="single-input">
                                         <select id="started_month" name="started_month[]">
                                             <option value="">Select Started Month</option>
                                             <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>';
        /*------------------------------------------------------*/
        $education_html .='<div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" class="removebutton" id="remove_edu"><i class="fa fa-minus"                                                                                                     aria-hidden="true"></i>
                                            Remove Education
                                        </a>
                                    </div>
                                </div>';
        $education_html .= '</div>'; //appendedu

        echo $education_html;
    }

    public function appendTraining(){
        $training_html = '';
        $training_html .= '<div class="appendtraining">'; //appendtraining
        /*------------------------------------------------------*/
        $training_html .= '<div class="single-resume-feild feild-flex-2">';
        $training_html .= '<div class="single-input">'; //Training/Course
        $training_html .= '<input type="text" required="" name="course[]" value="" class="form-control" placeholder="Training/Course">';
        $training_html .= '</div>';//Training/Course
        $training_html .= '<div class="single-input">';//Company / Institute Name
        $training_html .= '<input type="text" required="" name="institution[]" value="" class="form-control" placeholder="Company/Institute Name">';
        $training_html .= '</div>';//Company / Institute Name
        $training_html .= '</div>';
        /*------------------------------------------------------*/
        $training_html .= '<div class="single-resume-feild feild-flex-2">';
        $training_html .= '<div class="single-input">'; //From month
        $training_html .= '<select name="frommonth[]" id="frommonth">
                                <option>From Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>';
        $training_html .= '</div>';//From month
        $training_html .= '<div class="single-input">';//From Year
        $training_html .= '<select name="fromyear[]" id="fromyear">
                                <option>From Year</option>';
        $cyear = date('Y');
        $pyear = $cyear-50;
        for($y=$pyear;$y<=$cyear;$y++){
            $training_html .= '<option value="'.$y.'">'.$y.'</option>';;
        }
        $training_html .= '</select>';
        $training_html .= '</div>';//From year
        $training_html .= '</div>';
        /*------------------------------------------------------*/
        $training_html .= '<div class="single-resume-feild feild-flex-2">';
        $training_html .= '<div class="single-input">'; //To month
        $training_html .= '<select name="tomonth[]" id="tomonth">
                                <option>To Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>';
        $training_html .= '</div>';//To month
        $training_html .= '<div class="single-input">';//To Year
        $training_html .= '<select name="toyear[]" id="toyear">
                                <option>To Year</option>';
        $cyear = date('Y');
        $pyear = $cyear-50;
        for($y=$pyear;$y<=$cyear;$y++){
            $training_html .= '<option value="'.$y.'">'.$y.'</option>';;
        }
        $training_html .= '</select>';
        $training_html .= '</div>';//to year
        $training_html .= '</div>';
        /*------------------------------------------------------*/
        $training_html .='<div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" class="removebutton" id="remove_training"><i class="fa fa-minus"                                                                                                aria-hidden="true"></i>
                                            Remove Training
                                        </a>
                                    </div>
                                </div>';
        $training_html .= '</div>'; //appendtraining

        echo $training_html;
    }

    public function appendLanguage(){
        $language_html = '';
        $language_html .= '<div class="appendlanguage">'; //appendlanguage

        /*------------------------------------------------------*/
        $language_html .= '<div class="single-resume-feild feild-flex-2">
                                <div class="single-input">
                                    <input type="text" required="" name="language[]" value="" class="form-control" placeholder="Language">
                                </div>
                                <div class="single-input">
                                    <select name="reading[]" id="reading">
                                        <option value="">Reading</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </div>
                                <div class="single-input">
                                    <select name="writing[]" id="writing">
                                        <option value="">Writing</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </div>
                                <div class="single-input">
                                    <select name="speaking[]" id="speaking">
                                        <option value="">Speaking</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </div>
                                <div class="single-input">
                                    <select name="listening[]" id="listening">
                                        <option value="">Listening</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </div>
                            </div>';
        /*------------------------------------------------------*/
        $language_html .='<div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" class="removebutton" id="remove_language"><i class="fa fa-minus"                                                                                                     aria-hidden="true"></i>
                                            Remove Education
                                        </a>
                                    </div>
                                </div>';

        $language_html .= '</div>'; // appendlanguage

        echo $language_html;
    }

    public function appendReference(){
        $reference_html = '';
        $reference_html .='<div class="appendreference">';
        /*------------------------------------------------------*/
        $reference_html .= '<div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="text" required="" name="reference_name[]" value="" class="form-control" placeholder="Reference\'s Name">
                                            </div>
                                            <div class="single-input">
                                                <input type="text" required="" name="position[]" value="" class="form-control" placeholder="Position">
                                            </div>
                                        </div>
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="text" required="" name="organization_name[]" value="" class="form-control" placeholder="Organization name">
                                            </div>
                                            <div class="single-input">
                                                <input type="text" required="" name="email[]" value="" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="single-resume-feild feild-flex-2">
                                            <div class="single-input">
                                                <input type="number" required="" name="mobile_number[]" value="" class="form-control" placeholder="Mobile Number">
                                            </div>
                                            <div class="single-input">
                                                <input type="number"  name="other_number[]" value="" class="form-control" placeholder="Other Number">
                                            </div>
                                        </div>';
        /*------------------------------------------------------*/
        $reference_html .='<div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" class="removebutton" id="remove_reference"><i class="fa fa-minus"                                                                                                     aria-hidden="true"></i>
                                            Remove Reference
                                        </a>
                                    </div>
                                </div>';
        $reference_html .='</div>';
        echo $reference_html;
    }

    public function appendExperience(){
        $count = $_POST['count']+1;
        $experience_html ='';
        $experience_html .='<div class="appendexperience">'; //appendexperience
        /*------------------------------------------------------*/
        $experience_html .= '<div class="single-resume-feild feild-flex-2">
                                <div class="single-input">
                                    <input type="text" required="" name="company['.$count.']" value="" class="form-control" placeholder="Organization name">
                                </div>
                                <div class="single-input">
                                    <input type="text" name="location['.$count.']" value="" class="form-control" placeholder="Job location">
                                </div>
                            </div>';
        /*------------------------------------------------------*/
        $experience_html .= '<div class="single-resume-feild feild-flex-2">
                                        <div class="single-input">
                                            <input type="text"  name="title['.$count.']" value="" class="form-control" placeholder="Job Title">
                                        </div>
                                        <div class="single-input">
                                            <select name="position['.$count.']" id="position">
                                                <option>Job level</option>
                                                <option>Top Level</option>
                                                <option>Senior Level</option>
                                                <option>Mid Level</option>
                                                <option>Entry Level</option>
                                            </select>
                                        </div>
                                    </div>';
        /*------------------------------------------------------*/
        $experience_html .= '<div class="single-job-sidebar sidebar-type">
                                        <div class="job-sidebar-box checkbox section_0">
                                            <input value="1" class="" type="checkbox" id="currently_working_'.$count.'" onchange="currentlyworking('.$count.')" name="currently_working['.$count.']" />
                                            <label for="currently_working" class="currently_working"><span></span>Currently working here?</label>
                                        </div>
                                    </div>';
        /*------------------------------------------------------*/
        $experience_html .= '<div class="single-resume-feild feild-flex-2">';
        $experience_html .= '<div class="single-input">';//from month
        $experience_html .= '<select name="frommonth['.$count.']" id="frommonth">
                                    <option>Start Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>';
        $experience_html .= '</div>';//from month
        $experience_html .= '<div class="single-input">';//from year
        $experience_html .= '<select name="fromyear['.$count.']" id="fromyear">
                                <option>Start Year</option>';
        $cyear = date('Y');
        $pyear = $cyear - 50;
        for ($y = $pyear; $y <= $cyear; $y++) {
            $experience_html .='<option value="'.$y.'">'.$y.'</option>';
        }
        $experience_html .= '</select>';
        $experience_html .= '</div>';//from year
        $experience_html .= '</div>';
        /*------------------------------------------------------*/

        $experience_html .= '<div class="single-resume-feild feild-flex-2" id="endmonthyear_'.$count.'">';
        $experience_html .= '<div class="single-input">'; //to month
        $experience_html .= '<select name="tomonth['.$count.']" id="tomonth">
                                    <option>End Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>';
        $experience_html .= '</div>';//to month
        $experience_html .= '<div class="single-input">';//to year
        $experience_html .= '<select name="toyear['.$count.']" id="toyear">
                                <option>End Year</option>';
        $cyear = date('Y');
        $pyear = $cyear - 50;
        for ($y = $pyear; $y <= $cyear; $y++) {
            $experience_html .='<option value="'.$y.'">'.$y.'</option>';
        }
        $experience_html .= '</select>';
        $experience_html .= '</div>';//to year
        $experience_html .= '</div>';
        /*------------------------------------------------------*/
        $experience_html .= '<div class="single-resume-feild">
                                <div class="single-input">
                                    <textarea class="textarea duties" id="duties" name="duties['.$count.']"  placeholder="Duties &amp; Responsibilities Here..."></textarea>
                                </div>
                            </div>';
        /*------------------------------------------------------*/
        $experience_html .='<div class="single-resume-feild">
                                    <div class="single-input text-center">
                                        <a href="javascript:void(0)" class="removebutton" id="remove_experience"><i class="fa fa-minus"                                                                                                     aria-hidden="true"></i>
                                            Remove Experience
                                        </a>
                                    </div>
                                </div>';
        $experience_html .='</div>'; //appendexperience


        echo $experience_html;


    }

    /*-----------------------------------------------------------------
            Social Media Login
    ------------------------------------------------------------------*/
    public function loginFacebook(){
        $userData = array();
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';;
            $userData['fname']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            $userData['lname']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:'';
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:'';
            //$userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'';
            $userData['isActivated']        = 1;
            $userData['user_type'] = 'registered';

            // Insert or update user data
            $userID = $this->jobseeker_model->checkUser($userData);
            //$userData['id'] = $userID;
            // Check user data insert or update status
            if(!empty($userID)){
                //$data['userData'] = $userData;
                $jobseeker_profile= $this->general_model->getById('seeker','id',$userID);

                $this->session->set_userdata('jobseeker_profile', $jobseeker_profile);
            }else{
                $data['userData'] = array();
            }

            // Get logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
        }
        else{
            // Get login URL
            $data['authURL'] =  $this->facebook->login_url();
        }
        redirect(base_url() . 'jobseeker/dashboard', 'refresh');

    }

    public function loginLinkedin(){
        //echo $_GET["oauth_init"];
        $userData = array();
        //Get status and user info from session
        $oauthStatus = $this->session->userdata('oauth_status');
        $sessUserData = $this->session->userdata('jobseeker_profile');
        if(isset($oauthStatus) && $oauthStatus == 'verified'){
            //User info from session
            $userData = $sessUserData;
        }
        elseif((isset($_GET["oauth_init"]) && $_GET["oauth_init"] == 1) || (isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])))
        {

            $client = new oauth_client_class;
            $client->client_id = $this->config->item('linkedin_api_key');
            $client->client_secret = $this->config->item('linkedin_api_secret');
            $client->redirect_uri = base_url().$this->config->item('linkedin_redirect_url');
            $client->scope = $this->config->item('linkedin_scope');
            $client->debug = false;
            $client->debug_http = true;
            $application_line = __LINE__;

            //If authentication returns success
            if($success = $client->Initialize()){
                if(($success = $client->Process())){
                    if(strlen($client->authorization_error)){
                        $client->error = $client->authorization_error;
                        $success = false;
                    }elseif(strlen($client->access_token)){
                        $success = $client->CallAPI('https://api.linkedin.com/v2/me?projection=(id,firstName,lastName,profilePicture(displayImage~:playableStreams))',
                            'GET',
                            array('format'=>'json'),
                            array('FailOnAccessError'=>true), $userInfo);


                    }
                }
                $success = $client->Finalize($success);
            }

            if($client->exit) {echo 'exit';}

            if($success){
                //Preparing data for database insertion
                $first_name = !empty($userInfo->firstName)?$userInfo->firstName:'';
                $last_name = !empty($userInfo->lastName)?$userInfo->lastName:'';
                $userData = array(
                    'oauth_provider'=> 'linkedin',
                    'oauth_uid'     => $userInfo->id,
                    'fname'     => $first_name,
                    'lname'     => $last_name,
                    'email'         => $userInfo->emailAddress,
                    'locale'         => $userInfo->location->name,
                    'isActivated'   =>  1
                );


                //Insert or update user data
                $userID = $this->user->checkUser($userData);
                $jobseeker_profile= $this->general_model->getById('seeker','id',$userID);

                $this->session->set_userdata('jobseeker_profile', $jobseeker_profile);

                //Store status and user profile info into session
                $this->session->set_userdata('oauth_status','verified');
                //$this->session->set_userdata('userData',$userData);

                //Redirect the user back to the same page
                redirect(base_url() . 'jobseeker/dashboard', 'refresh');

            }else{
                echo $data['error_msg'] = $client->error;
            }
        }
        elseif(isset($_GET["oauth_problem"]) && $_GET["oauth_problem"] <> ""){
            echo $data['error_msg'] = $_GET["oauth_problem"];
        }else{
            $data['oauthURL'] = base_url().$this->config->item('linkedin_redirect_url').'?oauth_init=1';
        }

    }

    public function loginGoogle(){
        $clientId = '182146452582-0dra8qi9co61ft2ol6qmppd5djbogqnd.apps.googleusercontent.com'; //Google client ID
        $clientSecret = 'n_DfFYNnTfNHbFnhmjK49iY0'; //Google client secret
        $redirectURL = base_url() .'jobseeker/logingoogle';

        //https://curl.haxx.se/docs/caextract.html

        //Call Google API
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if(isset($_GET['code']))
        {
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token']))
        {
            $gClient->setAccessToken($_SESSION['token']);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $userProfile['id'];
            $userData['fname']     = $userProfile['given_name'];
            $userData['lname']      = $userProfile['family_name'];
            $userData['email']          = $userProfile['email'];
            $userData['gender']         = !empty($userProfile['gender'])?$userProfile['gender']:'';
            $userData['locale']         = !empty($userProfile['locale'])?$userProfile['locale']:'';
            $userData['link']           = !empty($userProfile['link'])?$userProfile['link']:'';
            //$userData['picture']        = !empty($userProfile['picture'])?$userProfile['picture']:'';
            $userData['isActivated']        = 1;
            $userData['user_type'] = 'registered';
            $userID = $this->jobseeker_model->checkUser($userData);

            if(!empty($userID)){
                //$data['userData'] = $userData;
                $jobseeker_profile= $this->general_model->getById('seeker','id',$userID);

                $this->session->set_userdata('jobseeker_profile', $jobseeker_profile);
            }else{
                $data['userData'] = array();
            }

            // Get logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
        }
        else
        {
            $url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;
        }
        redirect(base_url() . 'jobseeker/dashboard', 'refresh');
    }

    /*-----------------------------------------------------------------
            Social Media Login
    ------------------------------------------------------------------*/


    public function downloadresume(){
        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;





        //now pass the data//
        $data['title']=$jobseeker_profile->fname.'_'.$jobseeker_profile->lname;

        //$this->data['description']=$this->official_copies;
        //now pass the data //

        $data['basicInfo'] = $this->general_model->getById('seeker','id',$sid);

        $data['education_detail'] = $this->general_model->getAll('seeker_education',array('sid'=>$sid));
        $data['experience_detail'] = $this->general_model->getAll('seeker_experience',array('sid'=>$sid));
        $data['training_detail'] = $this->general_model->getAll('seeker_training',array('sid'=>$sid));
        $data['language_detail'] = $this->general_model->getAll('seeker_language',array('sid'=>$sid));
        $data['reference_detail'] = $this->general_model->getAll('seeker_reference',array('sid'=>$sid));


        $html =  $this->load->view('resume/pdf_download',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.

        //this the the PDF filename that user will get to download

        $pdfFilePath =$jobseeker_profile->fname.'_'.$jobseeker_profile->lname.'_'.time().'_resume.pdf';


        //actually, you can pass mPDF parameter on this load() function

        //load mPDF library
        $this->load->library('m_pdf');
        //load mPDF library
        //generate the PDF!
        $this->m_pdf->pdf->WriteHTML($html);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    public  function resume(){

        $this->jobSeekerSessionCheck();
        $jobseeker_profile = $this->session->userdata('jobseeker_profile');
        $sid = $jobseeker_profile->id;


        $data['title']=$jobseeker_profile->fname.' '.$jobseeker_profile->lname;

        $data['basicInfo'] = $this->general_model->getById('seeker','id',$sid);

        $data['education_detail'] = $this->general_model->getAll('seeker_education',array('sid'=>$sid));
        $data['experience_detail'] = $this->general_model->getAll('seeker_experience',array('sid'=>$sid));
        $data['training_detail'] = $this->general_model->getAll('seeker_training',array('sid'=>$sid));
        $data['language_detail'] = $this->general_model->getAll('seeker_language',array('sid'=>$sid));
        $data['reference_detail'] = $this->general_model->getAll('seeker_reference',array('sid'=>$sid));



        $this->load->view('resume/pdf',$data);
    }

}

/* End of file Jobseeker.php
 * Location: ./application/modules/home/controllers/Jobseeker.php */
