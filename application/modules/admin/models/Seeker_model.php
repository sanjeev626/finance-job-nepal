<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Seeker_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 30, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Seeker_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_seeker($limit,$offset){
    	$this->db->select();
      $this->db->order_by("fname","ASC");
    	//echo $this->db->last_query();
      $query =  $this->db->get('seeker',$limit,$offset);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        } 
    }

    public function get_all_seeker_limited($limit,$offset){
      //$this->db->select('id','email','summary','salutation','fname','mname','lname','mm','dd','yy','nationality','phoneres','phonecell','maritalstatus','currentadd','permanentadd','preunit','presal','expunit','exptype','salrange','expsal','resume','modifieddate','faculty','lastaccess','isActivated','slc_docs','docs_11_12','bachelor_docs','masters_docs','other_docs');
      $this->db->select();
      $this->db->order_by("fname","ASC");
      $query =  $this->db->get('seeker',$limit,$offset);
      $this->db->last_query();
      if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        } 
    }

    public function get_basket_seeker(){ 
        $this->db->select('s.*,s.id as job_id');
        $this->db->from('seeker as s');
        $this->db->join('seeker_basket as sb','sb.sid = s.id');
        $query = $this->db->get(); 
        if ($query->num_rows() == 0) { 
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_seeker_basket_by_id($jobid){
        $this->db->select();
        $this->db->where('id',$jobid);
        $query = $this->db->get('seeker');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }

    public function get_seeker_education_by_id($jobid){
        $this->db->select();
        $this->db->where('sid',$jobid);
        $query = $this->db->get('seeker_education');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function remove_seeker_basket($eid){
        $this->db->where('sid',$eid);
        $this->db->delete('seeker_basket');
    }

    public function delete_job_seeker($jobid){

        $this->db->select('resume,profile_picture');
        $this->db->where('id',$jobid);
        $query = $this->db->get('seeker');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $result =  $query->row();

            $resume = $result->resume;
            $unlink_resume = base_url().'uploads/resume/'.$resume;
            @unlink($unlink_resume);

            $picture = $result->profile_picture;
            $unlink_picture = base_url().'uploads/jobseeker/'.$picture;
            @unlink($unlink_picture);

             $this->db->where('id',$jobid);
             $this->db->delete('seeker');   
        }
    }

    public function update_seeker_password($password,$jobid){
        $data =array(
            'password' => md5($password)
            );

        $this->db->where('id',$jobid);
        $this->db->update('seeker',$data);
    }

    public function update_activation($activate,$jobid){
        if($activate == 1){
                $data['activation_code'] = rand(1111111111,9999999990);
                $data['isActivated'] = '0';

        }else{
           $data['isActivated'] = '1';
        }

        $this->db->where('id',$jobid);
        $this->db->update('seeker',$data);
    }

    public function insert_seeker_basket($job_id){

        $this->db->where('sid',$job_id);
        $query = $this->db->get('seeker_basket');
        if ($query->num_rows() == 0) {
          
            $data = array(
             'sid' => $job_id
            );
            $this->db->insert('seeker_basket',$data);

        } else {
            return TRUE;
        }
    }

    public function get_applied_job_by_seeker($job_id,$total =''){
        $this->db->select('jb.*, app.appdate');
        $this->db->from('jobs as jb');
        $this->db->join('application as app','app.jid = jb.id','INNER');
        $this->db->where('app.sid',$job_id);
        $query = $this->db->get();  
        if($query->num_rows() == 0){ 
            return FALSE;
        }else {
          if($total){
            return $query->num_rows();
          }else{
            return $query->result();
          
          }
        }
    }

    public function search_seeker_by_param_back($limit='',$offset=''){
      //print_r($_POST);

      $fname = $this->input->post('fname');
      $mname = $this->input->post('mname');
      $lname = $this->input->post('lname');
      $dobfrom = $this->input->post('dobfrom');
      $dobto = $this->input->post('dobto');
      $address = $this->input->post('address');
      $phone = $this->input->post('phone');
      $email = $this->input->post('email');
      $gender = $this->input->post('gender');
      $keyskills = $this->input->post('keyskills');
      $qualification = $this->input->post('qualification');
      $expyrs = $this->input->post('experience_years');
      $expsal = $this->input->post('expsal');
      $apporg = $this->input->post('apporg');
      $jid = $this->input->post('jid');
      $registeredfrom = $this->input->post('registeredfrom');
      $registeredto = $this->input->post('registeredto');

      /*$appliedposition = $this->input->post('appliedposition');
      $appdate = $this->input->post('appdate');
      $qualification = $this->input->post('qualification');
      $keyskills = $this->input->post('keyskills');
      $cjobposition = $this->input->post('cjobposition');
      $joblocation = $this->input->post('joblocation');
      $expyrs2 = $this->input->post('expyrs2');
      $expsal = $this->input->post('expsal');
      $registerdate = $this->input->post('registerdate');
      $modifieddate = $this->input->post('modifieddate');

      if(isset($registerdate) && !empty($registerdate)){
          $jsplit1 = explode('-',$registerdate);
          $joindate_from = $jsplit1[0].'-'.$jsplit1[1].'-'.$jsplit1[2];
          $joindate_to = $jsplit1[3].'-'.$jsplit1[4].'-'.$jsplit1[5];
      }

      if(isset($modifieddate) && !empty($modifieddate)){
          $mplit1 = explode('-',$modifieddate);
          $modifieddate1 = $mplit1[0].'-'.$mplit1[1].'-'.$mplit1[2];
          $modifieddate2 = $mplit1[3].'-'.$mplit1[4].'-'.$mplit1[5];
      }
      */
            
      $sql = "SELECT * FROM seeker skr";
      
      /*if((isset($apporg) && !empty($apporg)) || (isset($appliedposition) && !empty($appliedposition)) || (isset($jid) && !empty($jid)) || (isset($appdate) && !empty($appdate)))
      {
        $sql .=" INNER JOIN application app ON skr.id=app.sid";
      }*/
      
      if(isset($apporg) && !empty($apporg))
      {
        $eid = $apporg;
        $sql .=" AND app.eid=".$eid;
      }  
      
      /*if(isset($appliedposition) && !empty($appliedposition))
      {  
        $jid = $appliedposition;
        $sql .=" AND app.jid=".$jid;
      }
      else if(isset($jid) && !empty($jid))
      {  
        $jid = $jid;
        $sql .=" AND app.jid=".$jid;
      } */
      
      if(isset($qualification) && !empty($qualification))
      {
        $sql .= " INNER JOIN seeker_education skrEdu ON skr.id=skrEdu.sid AND (skrEdu.education_program LIKE '%".$qualification."%')";
      }  
      
      if(empty($apporg) && empty($qualification))
      {
        $sql.=" WHERE 1";
      }
      if(isset($appdate) && !empty($appdate))
      {
        $sql .=" OR app.appdate='".$appdate."'";
      }
      if(isset($sid) && !empty($sid) && isset($sid2) && !empty($sid2))
      {
        $sql .= " OR skr.id BETWEEN '".$sid."' AND  '".$sid2."'";
      }
      if(isset($sid) && !empty($sid) && empty($sid2))
      {
        $sql .= " OR skr.id ='".$sid."'";
      }

      if(isset($fname) && !empty($fname))
      {
        $sql .= " OR skr.fname LIKE '%".$fname."%'";
      }
      if(isset($lname) && !empty($lname))
      {
        $sql .= " OR skr.lname LIKE '%".$lname."%'";
      }
      if(isset($dobfrom) && !empty($dobfrom) && isset($dobto) && !empty($dobto))
      {
        $sql .= " OR (skr.dob BETWEEN '".$dobfrom."' AND  '".$dobto."')";
      }
      if(isset($address) && !empty($address))
      {
        $sql .= " OR (skr.address_current LIKE '%".$address."%' )";
      }

      if(isset($phone) && !empty($phone))
      {
        $sql .= " OR (skr.phoneres='".$phone."' OR skr.phoneoff='".$phone."' OR skr.phonecell='".$phone."')";
      }
      if(isset($email) && !empty($email))
      {
        $sql .= " OR (skr.email LIKE '%".$email."%' )";
      }  
      if(isset($funcarea) && !empty($funcarea))
      {
        $sql .= " OR (skr.desired_functional_area='".$funcarea."' )";
      }
      if(isset($cjobposition) && !empty($cjobposition))
      {
        $sql .= " OR (skr.desired_role LIKE '%".$cjobposition."%')";
      } 
      if(isset($joblocation) && !empty($joblocation))
      {
        $sql .= " OR (skr.desired_job_location='".$joblocation."' OR skr.joblocation2='".$joblocation."' OR skr.joblocation3='".$joblocation."')";
      } 
      if(!empty($expyrs) )
      {
        $sql .= " OR (skr.expyrs >= ".$expyrs." )";
      }
      if(isset($expsal) && $expsal !="0")
      {
        $sql .= " OR skr.desired_expected_salary = ".$expsal;
      }
      /*if(isset($from) && !empty($from) && isset($to) && !empty($to))
      {
        $sql .= " AND skr.apdate BETWEEN '".$from."' AND '".$to."'";
      }*/
      /*if(isset($modifieddate1) && !empty($modifieddate1) && isset($modifieddate2) && !empty($modifieddate2) && $modifieddate1 > '1980-1-1')
      {
        $sql .= " AND skr.modifieddate BETWEEN '".$modifieddate1."' AND '".$modifieddate2."'";
      }*/
      if(isset($keyskills) && !empty($keyskills))
      {
        $aa = explode(",",$keyskills);
        $count = count($aa);
        for($i=0;$i<$count;$i++)
        {
          $keyskills=trim($aa[$i]);
          if($i==0)
              $operator = " AND (";
          else
              $operator = " OR ";
          $sql .=  $operator." skr.keyskills LIKE '%".$keyskills."%'";
        }
        $sql .=")";
      }
      $sql .= " GROUP BY skr.id ORDER BY skr.fname"; 

      if($limit !== ''){
        $sql .=" limit ".$offset.', '.$limit;
      }
      //echo $sql;
      $query = $this->db->query($sql);
        //echo $this->db->last_query(); die();
      if ($query->num_rows() == 0) {
              return FALSE;
          } else {
             if($limit == ''){
                  return $query->num_rows();
              }else{
                  return $query->result(); 
              }
          }
      }

      /*public function update_seek_password_md5($password,$eid){
          $data =array(
              'password' => $password
              );
          $this->db->where('id',$eid);
          $this->db->update('seeker',$data);
      } */

    public function search_seeker_by_param($limit='',$offset='')
    {
        //print_r($_POST);

        $fname = $this->input->post('fname');
        $mname = $this->input->post('mname');
        $lname = $this->input->post('lname');
        $dobfrom = $this->input->post('dobfrom');
        $dobto = $this->input->post('dobto');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
        $keyskills = $this->input->post('keyskills');
        $qualification = $this->input->post('qualification');
        $expyrs = $this->input->post('experience_years');
        $expsal = $this->input->post('expsal');
        $apporg = $this->input->post('apporg');
        $jid = $this->input->post('jid');
        $registeredfrom = $this->input->post('registeredfrom');
        $registeredto = $this->input->post('registeredto');


        $this->db->select("*");

        /*if(isset($qualification) && !empty($qualification)) {
            $this->db->join("seeker_education skrEdu", "skrEdu.sid = skr.id");

            $this->db->where('skrEdu.education_program',$qualification);
        }*/
        if(isset($fname) && !empty($fname)){
            $this->db->like('skr.fname', $fname);
        }
        if(isset($mname) && !empty($mname)){
            $this->db->or_like('skr.mname', $mname);
        }
        if(isset($lname) && !empty($lname)){
            $this->db->or_like('skr.lname', $lname);
        }
        if(isset($qualification) && !empty($qualification)) {
            $this->db->or_like('skr.highest_qualification', $qualification);
        }

        if(isset($dobfrom) && !empty($dobfrom) && isset($dobto) && !empty($dobto))
        {
            $this->db->where("skr.dob BETWEEN '$dobfrom' AND '$dobto'");

        }
        if(isset($address) && !empty($address))
        {
            $this->db->or_like('skr.address_current', $address);

        }
        if(isset($phone) && !empty($phone))
        {
            $this->db->or_like('skr.phoneres', $phone);
            $this->db->or_like('skr.phoneoff', $phone);
            $this->db->or_like('skr.phonecell', $phone);

        }
        if(isset($email) && !empty($email))
        {
            $this->db->or_like('skr.email', $email);

        }
        if(isset($funcarea) && !empty($funcarea))
        {
            $this->db->or_like('skr.desired_functional_area', $funcarea);

        }
        if(isset($cjobposition) && !empty($cjobposition))
        {
            $this->db->or_like('skr.desired_role', $cjobposition);

        }
        if(isset($joblocation) && !empty($joblocation))
        {
            $this->db->or_like('skr.desired_job_location', $joblocation);

        }
        if(!empty($expyrs) )
        {
            $this->db->or_like('skr.expyrs >=', $expyrs);

        }
        if(isset($expsal) && $expsal !="0")
        {
            $this->db->or_like('skr.desired_expected_salary', $expsal);

        }
        if(isset($keyskills) && !empty($keyskills))
        {
            $aa = explode(",",$keyskills);
            $count = count($aa);
            for($i=0;$i<$count;$i++)
            {
                $keyskills=trim($aa[$i]);

                $this->db->or_like('skr.keyskills', $keyskills);

            }

        }


        $this->db->group_by('skr.id','asc');
        $this->db->order_by('skr.fname','asc');




        $query = $this->db->get('seeker skr',$limit,$offset);
        //echo $this->db->last_query();
        //die();
        if($query->num_rows() == 0){
            return FALSE;
        }else {
            if($limit == ''){
                return $query->num_rows();
            }else{
                return $query->result();
            }
        }

    }

}




/* End of file Seeker_model.php
 * Location: ./application/modules/admin/models/Seeker_model.php */