<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Service Controller
 * @package Controller
 * @subpackage Controller
 * Date created:February 07, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Service extends View_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('admin/general_model','general_model');
    }

    function index() {   
        //Do nothing with this function
    }
    
    /**
        Interview Preparation Techniques Page
    **/
    public function interviewPreparation(){
        $data['menu'] = 'home';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Interview Preparation Techniques';
        $data['content'] = $this->general_model->getById('content','id','8')->contents;
        $data['main'] = 'page-view';
        $this->load->view('main',$data);
    }
    
     /**
        Plus 2 and Bachelor Capsule
    **/
    public function bachelorCapsule(){
        $data['menu'] = 'home';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Plus 2 and bachelor capsule';
        $data['content'] = $this->general_model->getById('content','id','10')->contents;
        $data['main'] = 'page-view';
        $this->load->view('main',$data);
    }
    
    public function industrialExperties(){
        $data['menu'] = 'home';
        $data['page_title'] = 'Finance Job Nepal';
        $data['title'] ='Interview Experties';
        //$data['content'] = $this->general_model->getById('content','id','8')->contents;
        $data['main'] = 'industrail-experties-view';
        $this->load->view('main',$data);
    }
    
    public function submitExperties(){
        $to = "info@searchglobaljobs.com";
        $toname = "Finance Job-Complete HR Solution";
        $from = $this->input->post('email');
        $fromname = $this->input->post('name');

        /*---------------------------------------------------------------
                        Email Content Goes here
        ---------------------------------------------------------------*/
        $name = $this->input->post('name');
        $company_name = $this->input->post('company_name');
        $designation = $this->input->post('designation');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $requirement = $this->input->post('requirement');


        $message = '';
        $message .='<table border="0" align="center" cellpadding="0" cellspacing="0">';
        $message .='<tr>';
        $message .='<td colspan="2"><h2 style="font-family:Arial, Helvetica, sans-serif; font-size:18px;">Post Requirement</h2></td>';
        $message .='</tr>';
        $message .='<tr>';
        $message .='<td>  Name : </td>';
        $message .='<td>'.$name.'</td>';
        $message .='</tr>';
        $message .='<tr>';
        $message .='<td> Company  : </td>';
        $message .='<td>'.$company_name.'</td>';
        $message .='</tr>';
        $message .='<tr>';
        $message .='<td>Designation : </td>';
        $message .='<td>'.$designation.'</td>';
        $message .='</tr>';
        $message .='<tr>';
        $message .='<td> Email : </td>';
        $message .='<td>'.$email.'</td>';
        $message .='</tr>';
        $message .='<tr>';
        $message .='<td>Address : </td>';
        $message .='<td>'.$address.'</td>';
        $message .='</tr>';
        $message .='<tr>';
        $message .='<td> Phone : </td>';
        $message .='<td>'.$phone.'</td>';
        $message .='</tr>';
        $message .='<tr>';
        $message .='<td>  Requirement : </td>';
        $message .='<td>'.$requirement.'</td>';
        $message .='</tr>';
        $message .='</table>';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: '.$toname.' <'.$to.'>' . "\r\n";
        $headers .= 'From: '.$fromname.' <'.$from.'>' . "\r\n";

        // Mail it
        if(@mail($to, $subject, $message, $headers))
        {
            $this->session->set_flashdata('success', 'Your information has been sent to '.$toname);
            redirect(base_url() . 'service/industrialExperties');
        }
        else
        {
            $this->session->set_flashdata('error', 'ERROR! failed to send Your information.');
            redirect(base_url() . 'service/industrialExperties');
        }
    }
    

}

/* End of file Service.php
 * Location: ./application/modules/home/controllers/Service.php */
