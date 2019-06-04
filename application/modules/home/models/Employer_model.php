<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Home Employer_model Model
 * @package Model
 * @subpackage Model
 * Date created:Febuary 08, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */

class Employer_model extends CI_Model {

    private $table_employer = 'employer';

    public function __construct() {

        parent::__construct();

    }

    

    public function insert_employer_info($logo){

        $joindate = date('Y-m-d');

        $orgname = $this->input->post('orgname');

        $folder_name = url_title($orgname, '-', true);

        $orgcode = substr($folder_name, 0, 30);

        

        $employer_data =array(

            'username' =>$this->input->post('email'),

            'password' =>md5($this->input->post('password')),

            'email' =>$this->input->post('email'),

            'organization_code' =>$orgcode,

            'organization_name' =>$orgname,

            'organization_type' =>$this->input->post('orgtype'),

            /*'orgdesc' =>$this->input->post('orgdesc'),

            'natureoforg' =>$this->input->post('natureoforg'),

            'orgtype' =>$this->input->post('orgtype'),

            'ownership' =>$this->input->post('ownership'),

            'logo' => $logo,

            'salutation' =>$this->input->post('salutation'),

            'fname' =>$this->input->post('fname'),

            'mname' =>$this->input->post('mname'),

            'lname' =>$this->input->post('lname'),

            'designation' =>$this->input->post('designation'),

            'address' =>$this->input->post('address'),*/

            'organization_phone' =>$this->input->post('phone'),

            /*'fax' =>$this->input->post('fax'),

            'pobox' =>$this->input->post('pobox'),

            'website' =>$this->input->post('website'),

            'contactperson' =>$this->input->post('contactperson'),

            'consalutation' =>$this->input->post('consalutation'),

            'confname' =>$this->input->post('confname'),

            'conmname' =>$this->input->post('conmname'),

            'conlname' =>$this->input->post('conlname'),*/

            'joindate'=> $joindate,

            'isActivated' => 'Yes'

        );


        $this->db->insert($this->table_employer,$employer_data);
        $insert_id = $this->db->insert_id();
        $data['organization_code'] = $orgcode.'-'.$insert_id;
        $this->db->update($this->table_employer,$data);

    }

    

    public function login($username,$password){

         if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {

             $this->db->where('username',$username);

            }else{

              $this->db->where('email',$username);

         }

        $this->db->where('password',$password);

        

        

        //$this->db->where(array('username' => $username, 'password' => $password));

        $query = $this->db->get($this->table_employer);

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->row();

        }

    }

    

    public function last_access($empId){

        $last_access = date('Y-m-d H:i:s');

        $data =array(

            'last_accessed' =>$last_access

        );

        $this->db->where('id',$empId);

        $this->db->update($this->table_employer,$data);

    }

    

    public function get_post_job_eid($eid){

        $this->db->select();

        $this->db->where('eid',$eid);

        $query = $this->db->get('jobs');

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result();

        }

    }



    public function change_pasword($eid){

        $password = md5($this->input->post('password'));

        $data = array(

        'password' => $password

        );

        $this->db->where('id',$eid);

        $this->db->update($this->table_employer,$data);

    }



    public function updateEmployerProfile($logo,$banner,$eid){
        $joindate = date('Y-m-d');
        $orgname = $this->input->post('orgname');
        $folder_name = url_title($orgname, '-', true);
        $orgcode = substr($folder_name, 0, 30);
        $employer_data =array(
            //'username' =>$this->input->post('email'),
            //'email' =>$this->input->post('email'),
            //'email2' =>$this->input->post('email2'),
            'orgname' =>$orgname,
            'organization_code' =>$orgcode.'-'.$eid,
            'organization_size' =>$this->input->post('no_of_employees'),
            'organization_description' =>$this->input->post('orgdesc'),
            'organization_type' =>$this->input->post('natureoforg'),

            'organization_address' =>$this->input->post('address'),
            'organization_phone' =>$this->input->post('phone'),
            'organization_fax' =>$this->input->post('fax'),
            'organization_pobox' =>$this->input->post('pobox'),
            'organization_website' =>$this->input->post('website'),
            'organization_facebook' =>$this->input->post('facebook'),
            'organization_linkedin' =>$this->input->post('twitter'),
            'contact_name' =>$this->input->post('contact_name'),
            'contact_designation' =>$this->input->post('contact_designation'),
            'contact_email' =>$this->input->post('contact_email'),
            'contact_mobile' =>$this->input->post('contact_mobile'),
            'alternate_contact_name' =>$this->input->post('alternate_contact_name'),
            'isActivated' => 'Yes'
        );
        if(!empty($logo)){
            $employer_data['organization_logo'] = $logo;
        }
        if($banner){
            $employer_data['organization_banner'] = $banner;
        } 
        $this->db->where('id',$eid);
        $this->db->update($this->table_employer,$employer_data);
        //echo $this->db->last_query();
    }



    public function total_received_job($jid){

        $this->db->select();

        $this->db->from('application as app');

        $this->db->join('seeker as s','s.id = app.sid');

        $this->db->where('app.jid',$jid);

        $this->db->group_by('s.id');

        $query = $this->db->get();

        if ($query->num_rows() == 0) {

            return 0;

        } else {

            return $query->num_rows();

        }

    }



    public function get_applicants_by_jid($jid,$status,$limit= NULL,$offset=NULL,$total=NULL){

        $this->db->select('app.id application_id, j.jobtitle, app.*,s.*');

        $this->db->from('application as app');
        $this->db->join('jobs as j','j.id = app.jid','inner');
        $this->db->join('seeker as s','s.id = app.sid');

        $this->db->where('app.jid',$jid);

        if(!empty($status))
            $this->db->where('app.status',$status);

        $this->db->group_by('s.id');
        $this->db->order_by('app.status','ASC');
        $this->db->order_by('app.appdate','DESC');


        $this->db->limit($limit,$offset);

        $query = $this->db->get();

        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            if($total){

                return $query->num_rows();

            }else{

                return $query->result();

            }

        }

    }

    public function get_applicants_by_eid($eid,$type,$limit= NULL,$offset=NULL,$total=NULL){

        $this->db->select('app.id application_id, j.jobtitle, app.*,s.*');
        $this->db->from('application as app');
        $this->db->join('seeker as s','s.id = app.sid','inner');
        $this->db->join('jobs as j','j.id = app.jid','inner');
        $this->db->where('app.status',$type);
        $this->db->where('app.eid',$eid);
        $this->db->order_by('app.jid','ASC');
        $this->db->order_by('app.status','ASC');
        $this->db->order_by('app.appdate','DESC');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            if($total){
                return $query->num_rows();
            }else{
                return $query->result();
            }
        }

    }

    public function get_field_by_eid($field,$eid){

        $this->db->select($field);
        $this->db->from('employer');
        $this->db->where('id',$eid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $qq = $query->result();
            return $qq['0']->$field;
        }

    }

    public function is_video_cv_activated($eid){

        $this->db->select();

        $this->db->from('employer_video_cv');

        $this->db->where('eid',$eid);

        $this->db->limit('1');

        $this->db->order_by('id','desc');

        $query = $this->db->get();

        if ($query->num_rows() == 0) {

            $video['service'] = "Not Activated";

            $video['expiry_date'] = "";

            return $video;

        } else {

            $ras = $query->result();

            $expiry_date = $ras[0]->expiry_date;

            $now = date('Y-m-d');

            if( strtotime($expiry_date) >= strtotime($now) )                 

                $video['service'] = "Activated";

            else                

                $video['service'] = "Expired";

        //return $query->num_rows();

            $video['expiry_date'] = $expiry_date;

        }

        return $video;

    }



    public function insertPostJob($complogo,$eid){
        $jobtitle = $this->input->post('jobtitle');
        $folder_name = url_title($jobtitle, '-', true);
        $slug = substr($folder_name, 0, 30);

        $abdate = $this->input->post('applybefore');
        $abdatebreak = explode('-',$abdate);
        $apyy =$abdatebreak[0];
        $apmm =$abdatebreak[1];
        $apdd =$abdatebreak[2];
        $apyy = $apyy;
        $apmm = $apmm;
        $apdd = $apdd;
        //$applybefore = $apyy."-".$apmm."-".$apdd;
        $pdate = $this->input->post('post_date');
        $pdatebreak =explode('-',$pdate);
        $pmm = $pdatebreak[1];
        $pdd = $pdatebreak[2];
        $pyy = $pdatebreak[0];

        if($eid != '0'){
            $adminPosted = 0;
        }else{
            $adminPosted = 1;
        }

        $jobtype1 = ($this->input->post('jobtype1')) ? $this->input->post('jobtype1') : '';
        $jobtype2 = ($this->input->post('jobtype2')) ? $this->input->post('jobtype2') : '';
        $jobtype3 = ($this->input->post('jobtype3')) ? $this->input->post('jobtype3') : '';
        $jobtype4 = ($this->input->post('jobtype4')) ? $this->input->post('jobtype4') : '';

        $onlineap = 'No';
        $emailap = 'No';
        $postap = 'No';
        $video_cv = 'No';
        if($this->input->post('onlineap'))
            $onlineap = 'Yes';
        if($this->input->post('emailap'))
            $emailap = 'Yes';
        if($this->input->post('postap'))
            $postap = 'Yes';
        if($this->input->post('video_cv'))
            $video_cv = 'Yes';

        /*$job_display_in = '';
        if(count($_POST['job_display_in'])>0)
        {
            for($i=0;$i<count($_POST['job_display_in']);$i++){
                $job_display_in .= $_POST['job_display_in'][$i].',';
            }
        }*/
        
        $joblocation='';
        for($i=0;$i<count($_POST['joblocation']);$i++)
        {
            $joblocation.=$_POST['joblocation'][$i].",";
        }
        $joblocation = substr($joblocation, 0, -1);

        $data = array(
            //'job_display_in' => $job_display_in,
            //'isNewspaperJob' => $this->input->post('isNewspaperJob'),
            'postedin' => date('Y-m-d'),
            'eid' => $eid,
            //'orgemail' => $this->input->post('orgemail'),
            //'complogo' => $complogo,
            //'banner_image' => $banner,
            //'displayname' => $this->input->post('displayname'),
            'jobtitle' => $jobtitle,
            'slug' => $slug,
            'jobcategory' => $this->input->post('jobcategory'),
            'preferredgender' => $this->input->post('preferredgender'),
            'requiredno' => $this->input->post('requiredno'),
            'pmm' => $pmm,
            'pdd' => $pdd,
            'pyy' => $pyy,
            'apmm' => $apmm,
            'apdd' => $apdd,
            'apyy' => $apyy,            
            'post_date'=>$this->input->post('post_date'),
            'applybefore'=>$this->input->post('applybefore'),
            'salaryrange' => $this->input->post('salaryrange'),
            'exprequire' => $this->input->post('exprequire'),
            'noexperience' => $this->input->post('noexperience'),
            //'education' => $this->input->post('education'),
            'joblevel' => $this->input->post('joblevel'),
            'jobtype' => $this->input->post('jobtype'),
            /*'jobtype2' => $jobtype2,
            'jobtype3' => $jobtype3,
            'jobtype4' => $jobtype4,
            'otherstype' => $this->input->post('otherstype'),*/
            'joblocation' => $joblocation,
            //'background' => $this->input->post('background'),
            'specification' => $this->input->post('specification'),
            'requirements' => $this->input->post('requirements'),
            'post_status' => $this->input->post('post_status'),
            /*'howtoapply' => $this->input->post('howtoapply'),
            'onlineap' => $onlineap,
            'emailap' => $emailap,
            'postap' => $postap,
            'video_cv' => $video_cv,
            'pobox' => $this->input->post('pobox'),

            'apply_by_faculty' => $this->input->post('apply_by_faculty'),
            'from_age' => $this->input->post('from_age'),
            'to_age' => $this->input->post('to_age'),
            'apply_by_age' => $this->input->post('from_age').'-'.$this->input->post('to_age'),
            'adminPosted' => $adminPosted,*/
            'required_education' => $this->input->post('required_education'),
            /*'other_faculty' => $this->input->post('other_faculty'),
            'expected_faculty' => $this->input->post('expected_faculty'),          
            'slc_docs' =>$this->input->post('slc_docs'),
            'docs_11_12' =>$this->input->post('docs_11_12'),
            'bachelor_docs' =>$this->input->post('bachelor_docs'),
            'masters_docs' =>$this->input->post('masters_docs')*/
            );

            $this->db->insert('jobs',$data);
    }

    public function updateApplicationStatus($application_id,$status)
    {
        $data = array(
            'status' => "$status"
        );
        $this->db->where('id', $application_id);
        $this->db->update('application', $data); 
        //echo $this->db->last_query();
    }

    public function updatePostJob($logo,$eid,$jid){
        $jobtitle = $this->input->post('jobtitle');
        $folder_name = url_title($jobtitle, '-', true);
        $slug = substr($folder_name, 0, 30);
        $updatedate = date('Y-m-d');
        $abdate = $this->input->post('applybefore');
        $abdatebreak = explode('-',$abdate);
        $apyy =$abdatebreak[0];
        $apmm =$abdatebreak[1];
        $apdd =$abdatebreak[2];
        // $applybefore = $apyy."-".$apmm."-".$apdd;
        $pdate = $this->input->post('post_date');
        $pdatebreak =explode('-',$pdate);
        $pmm = $pdatebreak[1];
        $pdd = $pdatebreak[2];
        $pyy = $pdatebreak[0];
        if($eid != '0'){
            $adminPosted = 0;
        }else{
            $adminPosted = 1;
        }
        $jobtype1 = ($this->input->post('jobtype1')) ? $this->input->post('jobtype1') : '';
        $jobtype2 = ($this->input->post('jobtype2')) ? $this->input->post('jobtype2') : '';
        $jobtype3 = ($this->input->post('jobtype3')) ? $this->input->post('jobtype3') : '';
        $jobtype4 = ($this->input->post('jobtype4')) ? $this->input->post('jobtype4') : '';
        $onlineap = 'No';
        $emailap = 'No';
        $postap = 'No';
        $video_cv = 'No';
        if($this->input->post('onlineap'))
            $onlineap = 'Yes';
        if($this->input->post('emailap'))
            $emailap = 'Yes';
        if($this->input->post('postap'))
            $postap = 'Yes';
        if($this->input->post('video_cv'))
            $video_cv = 'Yes';

        //print_r($_POST);
        $job_display_in = '';
        if(isset($_POST['job_display_in']) && count($_POST['job_display_in'])>0)
        {
            for($i=0;$i<count($_POST['job_display_in']);$i++){
                $job_display_in .= $_POST['job_display_in'][$i].',';
            }
        }
        //echo $job_display_in;
        //print_r($_POST['joblocation']);
        $joblocation='';
        for($i=0;$i<count($_POST['joblocation']);$i++)
        {
            $joblocation.=$_POST['joblocation'][$i].",";
        }
        $joblocation = substr($joblocation, 0, -1);

        $data = array(
            'job_display_in' => $job_display_in,
            'isNewspaperJob' => $this->input->post('isNewspaperJob'),
            'postedin' => $this->input->post('postedin'),
            'eid' => $eid,
            'orgemail' => $this->input->post('orgemail'),
            'displayname' => $this->input->post('displayname'),
            'jobtitle' => $jobtitle,
            'slug' => $slug,
            'jobcategory' => $this->input->post('jobcategory'),
            'preferredgender' => $this->input->post('preferredgender'),
            'requiredno' => $this->input->post('requiredno'),
            'pmm' => $pmm,
            'pdd' => $pdd,
            'pyy' => $pyy,
            'apmm' => $apmm,
            'apdd' => $apdd,
            'apyy' => $apyy,
            // 'applybefore'=>$applybefore,
            'post_date'=>$this->input->post('post_date'),
            'applybefore'=>$this->input->post('applybefore'),
            'updatedate' =>$updatedate,
            'salaryrange' => $this->input->post('salaryrange'),
            'noexperience' => $this->input->post('noexperience'),
            'education' => $this->input->post('education'),
            'joblevel' => $this->input->post('joblevel'),
            'jobtype' => $this->input->post('jobtype'),
            'jobtype2' => $jobtype2,
            'jobtype3' => $jobtype3,
            'jobtype4' => $jobtype4,
            'otherstype' => $this->input->post('otherstype'),
            'joblocation' => $joblocation,
            'background' => $this->input->post('background'),
            'specification' => $this->input->post('specification'),
            'requirements' => $this->input->post('requirements'),
            'howtoapply' => $this->input->post('howtoapply'),
            'onlineap' => $onlineap,
            'emailap' => $emailap,
            'postap' => $postap,
            'video_cv' => $video_cv,
            'pobox' => $this->input->post('pobox'),
            'post_status' => $this->input->post('post_status'),
            'apply_by_faculty' => $this->input->post('apply_by_faculty'),
            'from_age' => $this->input->post('from_age'),
            'to_age' => $this->input->post('to_age'),
            'apply_by_age' => $this->input->post('from_age').'-'.$this->input->post('to_age'),
            'adminPosted' => $adminPosted,
            'required_education' => $this->input->post('required_education'),
            'other_faculty' => $this->input->post('other_faculty'), 
            'expected_faculty' => $this->input->post('expected_faculty'),             
            'slc_docs' =>$this->input->post('slc_docs'),
            'docs_11_12' =>$this->input->post('docs_11_12'),
            'bachelor_docs' =>$this->input->post('bachelor_docs'),
            'masters_docs' =>$this->input->post('masters_docs')
            );
        if($logo){
            $data['complogo'] = $logo;
        }
        $this->db->where('id',$jid);
        $this->db->update('jobs',$data);
    }

    function sendemailtojobseekersofnewjobposted()
    {
        //Send Email to related Job Seekers isEmailed=0
        $this->db->select();
        $this->db->where('isEmailed','2');
        $query = $this->db->get('jobs');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $jobs = $query->result();
            foreach($jobs as $key=>$job){
                //echo $this->db->last_query();
                //print_r($job);
                $jobtitle = $job->jobtitle;
                $jobcategory = $job->jobcategory;
                $salaryrange = $job->salaryrange;
                //$employer_name = $job->employer_name;
                $jid = $job->id;
                $employer_name = '';
                $employer_name = $this->get_field_by_eid('orgname',$job->eid);
                $job_url = $this->home_model->get_job_url($jid);

                //echo $jobtitle." - ".$jobcategory." - ".$salaryrange." - ".$employer_name." - ".$jid." - ".$job_url;
                $this->sendEmailToJobseeker($jobcategory,$salaryrange,$employer_name,$jobtitle,$job_url);
            }
        }
    }

    function sendEmailToJobseeker($jobcategory,$salaryrange,$employer_name,$jobtitle,$job_url){
        $limit = 10;
        $this->db->select('fname, mname, lname, email, lastaccess');
        $this->db->from('seeker');
        //$this->db->where('funcarea1',$jobcategory);
        //$this->db->or_where('funcarea2',$jobcategory);
        $this->db->where("(funcarea1='".$jobcategory."' OR funcarea2='".$jobcategory."')", NULL, FALSE);
        $this->db->where('expsal',$salaryrange);
        $this->db->group_by('id');
        $this->db->order_by('lastaccess','DESC');
        $this->db->limit($limit);

        $query = $this->db->get();

        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {

            return FALSE;

        } else {
            $jobseekers = $query->result();
            foreach($jobseekers as $key => $jobseeker)
            {
                //print_r($jobseeker);
                //echo $jobseeker->fname.' '.$jobseeker->mname.' '.$jobseeker->lname.' '.$jobseeker->email.'<br>';
                $from = 'info@globaljob.com.np';
                $fromName = "Global Job Pvt. Ltd.";
                $to = $jobseeker->email;
                $toName = $jobseeker->fname.' '.$jobseeker->mname.' '.$jobseeker->lname;
                $subject = "Job Alert from ".$fromName." for ".$jobtitle;
                $message = '
                <html>
                <head>
                  <title>'.$subject.'</title>
                </head>
                <body>
                  Dear '.$toName.',<br>
                    Thank you for subscribing to our regular job updates!!<br><br>
                    GlobalJobs is actively seeking relevant candidate for following position <br>
                    '.$jobtitle.', '.$employer_name.'<br>
                    <a href="'.$job_url.'">APPLY NOW</a><br>
                    <p>Few Important considerations for Job alerts</p>
                    <ul>
                        <li>Job alert should be neither too specific ( risk of no application ) nor too vague/generalized( excess & irrelevant application)</li>
                        <li>Minimal information need to be given in email so that user routes to job portal for detail info</li>
                        <li>Use of moderate Graphics (Apply icon should be easily visible and noticeable)</li>
                        <li>Unsubscribe (opt out ) options should be provided somewhere at the last section of email</li>
                    </ul>
                    Cheers,<br>
                    Global Job Team
                </body>
                </html>
                ';
                $this->sendEmail($from,$fromName,$to,$toName,$subject,$message);
            }

        }
    }

    function sendEmail($from,$fromName,$to,$toName,$subject,$message){
        //echo $message;
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($from, $fromName);
        $this->email->to($to, $toName);
        $this->email->subject($subject);
        $this->email->message($message);
        if($this->email->send())
            echo "Email has been sent to ".$to." -- ".$toName,".<br>";
    }

    function updateStatus($status,$application_id, $remarks)
    {
        $dataStatus=array();
        $dataStatus['status'] = $status;
        $dataStatus['remarks'] = $remarks;
        $this->db->where('id',$application_id);
        $this->db->update('application',$dataStatus);
    }


}

/* End of file Employer_model.php

 * Location: ./application/modules/home/models/Employer_model.php */

