<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Newsletter Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 25, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Newsletter extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('newsletter_model');
        $this->load->model('general_model');
    }

    public function index(){

        if(isset($_POST) && !empty($_POST) || !empty($_POST['category'])){
          $cat = $this->input->post('category');

          if($cat != ""){
            $data['newsletter_info'] = $this->newsletter_model->search_newsletter_by_parameter($cat);
        }

        $data['category'] = $cat;    
    }else{
        $data['category'] = '';
    }

        $data['title'] = '.:: NEWSLETTER ::.';
        $data['page_header'] = 'Newsletter';
        $data['page_header_icone'] = 'fa fa-envelope-o';
        $data['nav'] = 'newsletter';
        $data['panel_title'] = 'Newsletter Manager';
        //$data['functionalarea'] = $this->newsletter_model->get_all_functionalarea(); 

        $data['functionalarea'] =$this->general_model->getAll('dropdown','fid = 9','dropvalue','id,dropvalue'); 
      
        $data['main'] = 'newsletter/newsletter_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function view(){
        $news_id = $this->input->post('news_id');
        $content = $this->newsletter_model->get_newsletter_content($news_id);
        $array_content =array('newsletter'=> $content);
        $encode_content = json_encode($array_content);

        echo $encode_content; 
    }

    public function add(){
        $data['title'] = '.:: ADD NEWSLETTER ::.';
        $data['page_header'] = 'Newsletter';
        $data['page_header_icone'] = 'fa fa-envelope-o';
        $data['nav'] = 'newsletter';
        $data['panel_title'] = 'Add Newsletter ';
        $data['functionalarea'] =$this->general_model->getAll('dropdown','fid = 9','dropvalue','id,dropvalue');
        $data['main'] = 'newsletter/add-edit-newsletter';

        $this->load->view('home', $data);
    }

    public function addNewsletter(){
        $this->form_validation->set_rules('newstitle', 'newstitle', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'service/add-edit-newsletter';
            $this->load->view('home', $data);
        } else {
            $this->newsletter_model->insert_newsletter();
            $this->session->set_flashdata('success', 'Newsletter Added Successfully...');
            redirect(base_url() . 'admin/Newsletter', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Newsletter');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Newsletter');

        $data['title'] = '.:: EDIT NEWSLETTER ::.';
        $data['page_header'] = 'Newsletter';
        $data['page_header_icone'] = 'fa fa-envelope-o';
        $data['nav'] = 'newsletter';
        $data['panel_title'] = 'Edit Newsletter ';
        $data['newsletter_detail'] = $this->newsletter_model->get_newsletter_by_id($id);
        $data['functionalarea'] =$this->general_model->getAll('dropdown','fid = 9','dropvalue','id,dropvalue');
        $data['main'] = 'newsletter/add-edit-newsletter';

        $this->load->view('home', $data);
    }

    public function editNewsletter($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Newsletter');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Newsletter');

        $this->form_validation->set_rules('newstitle', 'newstitle', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['main'] = 'service/add-edit-service';
            $this->load->view('home', $data);
        } else {
            $this->newsletter_model->update_newsletter($id);
            $this->session->set_flashdata('success', 'Newsletter Update Successfully...');
            redirect(base_url() . 'admin/Newsletter', 'refresh');
        }
    }

    public function newssend(){


        $newsletterfor = $_GET['sendfor'];
        $news_id = $_GET['newsid'];

        $cid = $this->newsletter_model->get_cid_from_newsid($news_id);  

        if($newsletterfor == 'jobseeker'){
            $subscriber = $this->newsletter_model->get_all_email('seeker',$cid);
        }
        else{
            $subscriber = $this->newsletter_model->get_all_email('employer','');
        }

        $data['title'] = '.:: SEND NEWSLETTER ::.';
        $data['page_header'] = 'Newsletter';
        $data['page_header_icone'] = 'fa fa-envelope-o';
        $data['nav'] = 'newsletter';
        $data['panel_title'] = 'Send Newsletter For ';
        $data['main'] = 'newsletter/list-newsletter-subscriber';
        $data['subscriber_email'] = $subscriber;
        $data['news_id'] = $news_id;
        $data['newsfor'] = $newsletterfor;

        $this->load->view('home', $data);
    }

    public function sendMail(){

        $newsletterfor = $this->input->post('newsfor');
        $newsid = $this->input->post('news_id');
        $checkbox = $this->input->post('checkbox');

        if(empty($checkbox)){
            $this->session->set_flashdata('error', 'Please Select Atleast One Subscriber.');
            redirect(base_url() . 'admin/Newsletter/newssend/?sendfor='.$newsletterfor.'&newsid='.$newsid, 'refresh');
        }else{

            for($i=0;$i<count($checkbox);$i++){
                $id = $checkbox[$i];
                
                if($newsletterfor == 'jobseeker'){
                    $info = $this->newsletter_model->get_all_info_by_id('seeker',$id);
                }
                else{
                    $info = $this->newsletter_model->get_all_info_by_id('employer',$id);
                }

                $name= $info->fname." ".$info->mname." ".$info->lname;
                $email= $info->email;

            $newsletter_info = $this->newsletter_model->get_newsletter_by_id($newsid);    
                /* send mail to each selected memebers */

        $to  = $email; // note the comma
        $subject = $newsletter_info->newstitle; //Modify the mail subject here
        $newstitle = $newsletter_info->newstitle;
        $newsdate = $newsletter_info->newsdate;
        $newscontents=str_replace("\r\n", "<br/>",$newsletter_info->newscontents);
        $message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <title>GlobalJob : A Complete HR Solution - Newsletter</title>
        </head>
        <body>
            <table  width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#542C08" >
                <tr><td>
                    <table width="100%" cellpadding="2" cellspacing="0"  style="font:Arial, Helvetica, sans-serif; font-size:12px; border:1px solid #FFFFFF">
                        <tr>
                          <td><img src="https://globaljob.com.np/images/logo.jpg" alt="Global Jobs :: A complete HR Solution" /></td>
                      </tr>
                      <tr>
                          <td>Hello '.$name .', </td>
                      </tr>

                      <tr>
                          <td style="padding-bottom:20px; padding-top:20px;color:#582E08;"><strong>'.$newstitle.'</strong></td>
                      </tr>
                      <tr>
                          <td>'.$newscontents.'</td>
                      </tr>
                      <tr>
                          <td align="right">'.$newsdate.'</td>
                      </tr>
                  </td>
              </tr>
          </table>
      </table>
  </body>
  </html>';
// To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
  $headers .= 'From: GlobalJob : A Complete HR Solution <info@globaljob.com.np>'. "\r\n";
  $headers .= 'To: '.$name.' <'.$email.'>'. "\r\n";

// Replace apostrophe character
  $message = str_replace("\'","'",$message);
// Mail it now
  if(mail($to, $subject, $message, $headers))
  {
        $this->session->set_flashdata('success', 'Mail Send Successfully');
       
  }
  else
  {
        $this->session->set_flashdata('success', 'Can not send Mail to :'.$email);
      
  }

  usleep(2000000);

/* end of sending mail */
 
    }
    redirect(base_url() . 'admin/Newsletter', 'refresh');
  }

 }

}

/* End of file Newsletter.php
 * Location: ./application/modules/admin/controllers/Newsletter.php */