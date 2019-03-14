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
            'username' =>$this->input->post('username'),
            'password' =>md5($this->input->post('password')),
            'email' =>$this->input->post('email'),
            'email2' =>$this->input->post('email2'),
            'orgcode' =>$orgcode,
            'orgname' =>$orgname,  
            'orgdesc' =>$this->input->post('orgdesc'),
            'natureoforg' =>$this->input->post('natureoforg'),
            'orgtype' =>$this->input->post('orgtype'),
            'ownership' =>$this->input->post('ownership'),
            'logo' => $logo,
            'salutation' =>$this->input->post('salutation'),
            'fname' =>$this->input->post('fname'),
            'mname' =>$this->input->post('mname'),
            'lname' =>$this->input->post('lname'),
            'designation' =>$this->input->post('designation'),
            'address' =>$this->input->post('address'),
            'phone' =>$this->input->post('phone'),
            'fax' =>$this->input->post('fax'),
            'pobox' =>$this->input->post('pobox'),
            'website' =>$this->input->post('website'),
            'contactperson' =>$this->input->post('contactperson'),
            'consalutation' =>$this->input->post('consalutation'),
            'confname' =>$this->input->post('confname'),
            'conmname' =>$this->input->post('conmname'),
            'conlname' =>$this->input->post('conlname'),
            'joindate'=> $joindate,
            'isCorporate' => 'No'            
        );
        
        $this->db->insert($this->table_employer,$employer_data);
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
            'lastaccess' =>$last_access
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
            'email' =>$this->input->post('email'),
            'email2' =>$this->input->post('email2'),
            'orgcode' =>$orgcode,
            'orgname' =>$orgname,
            'no_of_employees' =>$this->input->post('no_of_employees'),
            'orgdesc' =>$this->input->post('orgdesc'),
            'natureoforg' =>$this->input->post('natureoforg'),
            'orgtype' =>$this->input->post('orgtype'),
            'ownership' =>$this->input->post('ownership'),
            'salutation' =>$this->input->post('salutation'),
            'fname' =>$this->input->post('fname'),
            'mname' =>$this->input->post('mname'),
            'lname' =>$this->input->post('lname'),
            'designation' =>$this->input->post('designation'),
            'address' =>$this->input->post('address'),
            'phone' =>$this->input->post('phone'),
            'fax' =>$this->input->post('fax'),
            'pobox' =>$this->input->post('pobox'),
            'website' =>$this->input->post('website'),
            'contactperson' =>$this->input->post('contactperson'),
            'consalutation' =>$this->input->post('consalutation'),
            'confname' =>$this->input->post('confname'),
            'conmname' =>$this->input->post('conmname'),
            'conlname' =>$this->input->post('conlname'),
            'isCorporate' => 'No'
        );

         if(!empty($logo)){
            $employer_data['logo'] = $logo;
        }
        
         if($banner){
            $data['banner_image'] = $banner;
        }
        
        $this->db->where('id',$eid);
        $this->db->update($this->table_employer,$employer_data);
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

    public function get_applicants_by_jid($jid,$limit= NULL,$offset=NULL,$total=NULL){
         $this->db->select();
        $this->db->from('application as app');
        $this->db->join('seeker as s','s.id = app.sid');
        $this->db->where('app.jid',$jid);
        $this->db->group_by('s.id');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
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

    public function insertPostJob($complogo,$eid){
        $jobtitle = $this->input->post('jobtitle');
        $folder_name = url_title($jobtitle, '-', true);
        $slug = substr($folder_name, 0, 30);

        $apyy =$this->input->post('apyy');
        $apmm =$this->input->post('apmm');
        $apdd =$this->input->post('apdd');
        $applybefore = $apyy."-".$apmm."-".$apdd;

        if($eid != '0'){
            $adminPosted = 0;
        }else{
            $adminPosted = 1;
        }

        $jobtype1 = ($this->input->post('jobtype1')) ? $this->input->post('jobtype1') : '';
        $jobtype2 = ($this->input->post('jobtype2')) ? $this->input->post('jobtype2') : '';
        $jobtype3 = ($this->input->post('jobtype3')) ? $this->input->post('jobtype3') : '';
        $jobtype4 = ($this->input->post('jobtype4')) ? $this->input->post('jobtype4') : '';

        $data = array(
            'isNewspaperJob' => $this->input->post('isNewspaperJob'),
            'postedin' => $this->input->post('postedin'),
            'eid' => $eid,
            'orgemail' => $this->input->post('orgemail'),
            'complogo' => $complogo,
            //'banner_image' => $banner,
            'displayname' => $this->input->post('displayname'),
            'jobtitle' => $jobtitle,
            'slug' => $slug,
            'jobcategory' => $this->input->post('jobcategory'),
            'preferredgender' => $this->input->post('preferredgender'),
            'requiredno' => $this->input->post('requiredno'),
            'pmm' => $this->input->post('pmm'),
            'pdd' => $this->input->post('pdd'),
            'pyy' => $this->input->post('pyy'),
            'apmm' => $apmm,
            'apdd' => $apdd,
            'apyy' => $apyy,
            'applybefore'=>$applybefore,
            'salaryrange' => $this->input->post('salaryrange'),
            'noexperience' => $this->input->post('noexperience'),
            'education' => $this->input->post('education'),
            'joblevel' => $this->input->post('joblevel'),
            'jobtype1' => $jobtype1,
            'jobtype2' => $jobtype2,
            'jobtype3' => $jobtype3,
            'jobtype4' => $jobtype4,
            'otherstype' => $this->input->post('otherstype'),
            'joblocation' => $this->input->post('joblocation'),
            'background' => $this->input->post('background'),
            'specification' => $this->input->post('specification'),
            'requirements' => $this->input->post('requirements'),
            'howtoapply' => $this->input->post('howtoapply'),
            'onlineap' => $this->input->post('onlineap'),
            'emailap' => $this->input->post('emailap'),
            'postap' => $this->input->post('postap'),
            'pobox' => $this->input->post('pobox'),
            'post_status' => $this->input->post('post_status'),
            'apply_by_faculty' => $this->input->post('apply_by_faculty'),
            'apply_by_age' => $this->input->post('apply_by_age'),
            'adminPosted' => $adminPosted
            );

            $this->db->insert('jobs',$data);
    }

    public function updatePostJob($logo,$eid,$jid){
        $jobtitle = $this->input->post('jobtitle');
        $folder_name = url_title($jobtitle, '-', true);
        $slug = substr($folder_name, 0, 30);

        $updatedate = date('Y-m-d');

        $apyy =$this->input->post('apyy');
        $apmm =$this->input->post('apmm');
        $apdd =$this->input->post('apdd');
        $applybefore = $apyy."-".$apmm."-".$apdd;

        if($eid != '0'){
            $adminPosted = 0;
        }else{
            $adminPosted = 1;
        }

        $jobtype1 = ($this->input->post('jobtype1')) ? $this->input->post('jobtype1') : '';
        $jobtype2 = ($this->input->post('jobtype2')) ? $this->input->post('jobtype2') : '';
        $jobtype3 = ($this->input->post('jobtype3')) ? $this->input->post('jobtype3') : '';
        $jobtype4 = ($this->input->post('jobtype4')) ? $this->input->post('jobtype4') : '';

        $data = array(
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
            'pmm' => $this->input->post('pmm'),
            'pdd' => $this->input->post('pdd'),
            'pyy' => $this->input->post('pyy'),
            'apmm' => $apmm,
            'apdd' => $apdd,
            'apyy' => $apyy,
            'applybefore'=>$applybefore,
            'updatedate' =>$updatedate,
            'salaryrange' => $this->input->post('salaryrange'),
            'noexperience' => $this->input->post('noexperience'),
            'education' => $this->input->post('education'),
            'joblevel' => $this->input->post('joblevel'),
            'jobtype1' => $jobtype1,
            'jobtype2' => $jobtype2,
            'jobtype3' => $jobtype3,
            'jobtype4' => $jobtype4,
            'otherstype' => $this->input->post('otherstype'),
            'joblocation' => $this->input->post('joblocation'),
            'background' => $this->input->post('background'),
            'specification' => $this->input->post('specification'),
            'requirements' => $this->input->post('requirements'),
            'howtoapply' => $this->input->post('howtoapply'),
            'onlineap' => $this->input->post('onlineap'),
            'emailap' => $this->input->post('emailap'),
            'postap' => $this->input->post('postap'),
            'pobox' => $this->input->post('pobox'),
            'post_status' => $this->input->post('post_status'),
            'apply_by_faculty' => $this->input->post('apply_by_faculty'),
            'apply_by_age' => $this->input->post('apply_by_age'),
            'adminPosted' => $adminPosted
            );

        if($logo){
            $data['complogo'] = $logo;
        }

        $this->db->where('id',$jid);
        $this->db->update('jobs',$data);
    }

}
/* End of file Employer_model.php
 * Location: ./application/modules/home/models/Employer_model.php */
