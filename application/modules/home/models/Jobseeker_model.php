<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home Jobseeker_model Model
 * @package Model
 * @subpackage Model
 * Date created:Febuary 08, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Jobseeker_model extends CI_Model {

    private $table_seeker = 'seeker';
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function insert_jobseeker_info($picture,$resume,$videoresume,$slc_docs,$docs_11_12,$bachelor_docs,$masters_docs,$other_docs){
        
        $yy = $this->input->post('yy');
        $mm = $this->input->post('mm');
        $dd = $this->input->post('dd');
        $dob = $yy."-".$mm."-".$dd;
        
        $joindate = date('Y-m-d');
        
        $seeker_data =array(
            'username' =>$this->input->post('username'),
            'password' =>md5($this->input->post('password')),
            'email' =>$this->input->post('email'),
            'profile_picture' =>$picture,
            'resume' =>$resume,
            'fname' =>$this->input->post('fname'),
            'mname' =>$this->input->post('mname'),
            'lname' =>$this->input->post('lname'),
            'gender' =>$this->input->post('gender'),
            'dob' =>$dob,
            'phone_cell' =>$this->input->post('phonecell'),
            'address_current' =>$this->input->post('currentadd'),
            'faculty' =>$this->input->post('faculty'),
            'experience_years' =>$this->input->post('expyrs'),
            'cjobposiiton' =>$this->input->post('cjobposiiton'),
            'desired_expected_salary' =>$this->input->post('expsal'),
            /*
            'email2' =>$this->input->post('email2'),
            'video_resume'=> $videoresume,
            'slc_docs'=> $slc_docs,
            'docs_11_12'=> $docs_11_12,
            'bachelor_docs'=> $bachelor_docs,
            'masters_docs'=> $masters_docs,
            'other_docs'=> $other_docs,
            'summary' =>$this->input->post('summary'),
            'salutation' =>$this->input->post('salutation'),
            'nationality' =>$this->input->post('nationality'),
            'phoneres' =>$this->input->post('phoneres'),
            'phoneoff' =>$this->input->post('phoneoff'),

            'phonecell2' =>$this->input->post('phonecell2'),
            'maritalstatus' =>$this->input->post('maritalstatus'),

            'currentcon' =>$this->input->post('currentcon'),
            'permanentadd' =>$this->input->post('permanentadd'),
            'permanentcon' =>$this->input->post('permanentcon'),

            'other_faculty' =>$this->input->post('other_faculty'),
            'workexp' =>$this->input->post('workexp'),

            'expmths' =>$this->input->post('expmths'),

            'keyskills' =>$this->input->post('keyskills'),
            'preunit' =>$this->input->post('preunit'),
            'presal' =>$this->input->post('presal'),
            'expunit' =>$this->input->post('expunit'),
            'exptype' =>$this->input->post('exptype'),

            'funcarea1' =>$this->input->post('funcarea1'),
            'natureoforg1' =>$this->input->post('natureoforg1'),
            'funcarea2' =>$this->input->post('funcarea2'),
            'natureoforg2' =>$this->input->post('natureoforg2'),
            'job_region' =>$this->input->post('job_region'),
            'joblocation' =>$this->input->post('joblocation'),
            'education_details' =>$this->input->post('education_details'),
            'latest_education_qualification' =>$this->input->post('latest_education_qualification'),*/

            'isActivated' => '0',
            'activation_code' =>$this->input->post('activation_code'),
            'facebook' =>$this->input->post('facebook'),
            'linkedin' =>$this->input->post('linkedin'),
            'date_created' => $joindate
        );
        /*echo '<pre>';
        print_r($seeker_data);
        echo '</pre>';
        die();*/
        $this->db->insert($this->table_seeker,$seeker_data);
        return $this->db->insert_id();
    }
    
    public function update_jobseeker_info($sid,$picture,$resume,$videoresume,$slc_docs,$docs_11_12,$bachelor_docs,$masters_docs,$other_docs){
         $yy = $this->input->post('yy');
        $mm = $this->input->post('mm');
        $dd = $this->input->post('dd');
        $dob = $yy."-".$mm."-".$dd;

        $modifieddate = date('Y-m-d');

        $other_faculty = $this->input->post('other_faculty');

        $seeker_data =array(
            'email' =>$this->input->post('email'),
            'email2' =>$this->input->post('email2'),
            'summary' =>$this->input->post('summary'),
            'salutation' =>$this->input->post('salutation'),
            'fname' =>$this->input->post('fname'),
            'mname' =>$this->input->post('mname'),
            'lname' =>$this->input->post('lname'),
            'gender' =>$this->input->post('gender'),
            'mm' =>$mm,
            'dd' =>$dd,
            'yy' =>$yy,
            'dob' =>$dob,
            'nationality' =>$this->input->post('nationality'),
            'phoneres' =>$this->input->post('phoneres'),
            'phoneoff' =>$this->input->post('phoneoff'),
            'phonecell' =>$this->input->post('phonecell'),
            'phonecell2' =>$this->input->post('phonecell2'),
            'maritalstatus' =>$this->input->post('maritalstatus'),
            'currentadd' =>$this->input->post('currentadd'),
            'currentcon' =>$this->input->post('currentcon'),
            'permanentadd' =>$this->input->post('permanentadd'),
            'permanentcon' =>$this->input->post('permanentcon'),
            'workexp' =>$this->input->post('workexp'),
            'expyrs' =>$this->input->post('expyrs'),
            'expmths' =>$this->input->post('expmths'),
            'cjobposiiton' =>$this->input->post('cjobposiiton'),
            'faculty'=>$this->input->post('faculty'),
            'other_faculty'=>$other_faculty,
            'keyskills' =>$this->input->post('keyskills'),
            'preunit' =>$this->input->post('preunit'),
            'presal' =>$this->input->post('presal'),
            'expunit' =>$this->input->post('expunit'),
            'exptype' =>$this->input->post('exptype'),
            'salrange' =>$this->input->post('salrange'),
            'expsal' =>$this->input->post('expsal'),
            'funcarea1' =>$this->input->post('funcarea1'),
            'funcarea2' =>$this->input->post('funcarea2'),
            'job_region' =>$this->input->post('job_region'),
            'joblocation' =>$this->input->post('joblocation'),
            'video_resume_youtube' =>$this->input->post('video_resume_youtube'),
            'modifieddate' => $modifieddate
            );
        if($picture){
            $seeker_data['picture'] = $picture;
        }

        if($resume){
            $seeker_data['resume'] = $resume;
        }

        if($videoresume){
            $seeker_data['video_resume'] = $videoresume;
        }
        
        if($slc_docs){
            $seeker_data['slc_docs'] = $slc_docs;
        }
        if($docs_11_12){
            $seeker_data['docs_11_12'] = $docs_11_12;
        }
        if($bachelor_docs){
            $seeker_data['bachelor_docs'] = $bachelor_docs;
        }
        if($masters_docs){
            $seeker_data['masters_docs'] = $masters_docs;
        }
        if($other_docs){
            $seeker_data['other_docs'] = $other_docs;
        }

        //print_r($seeker_data); exit();
        $this->db->where('id',$sid);
        $this->db->update($this->table_seeker,$seeker_data);
    }

    public function login($username,$password){
        
         if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
             $this->db->where('username',$username);
            }else{
              $this->db->where('email',$username);
         }
        //$this->db->where(array('username' => $username, 'password' => $password,'isActivated' => 1));
        $this->db->where('password',$password);
        $this->db->where('isActivated',1);
        $query = $this->db->get($this->table_seeker);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }
    
    public function get_applied_job($sid){
        $this->db->select('j.jobtitle,j.id,j.displayname,j.slug,a.appdate,a.id as appid');
        $this->db->from('jobs as j');
        $this->db->join('application as a','a.jid = j.id');
        $this->db->where('a.sid',$sid);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }

    }

    public function last_access($seekerId){
        $last_access = date('Y-m-d H:i:s');
        $data =array(
            'lastaccess' =>$last_access
        );
        $this->db->where('id',$seekerId);
        $this->db->update($this->table_seeker,$data);
    }

    public function countToken($token)
    {
        $this->db->select('id');
        $this->db->from('seeker');
        $this->db->where('token', $token);
        $num_results = $this->db->count_all_results();
        //echo $this->db->last_query();
        return $num_results;
    }

    
}

/* End of file Jobseeker_model.php
 * Location: ./application/modules/home/models/Jobseeker_model.php */
