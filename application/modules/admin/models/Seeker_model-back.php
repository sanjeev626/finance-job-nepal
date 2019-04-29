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

    public function search_seeker_by_param($limit='',$offset=''){
      //print_r($_POST);
      if(isset($_POST['sid']))
      {
          $_SESSION['sid'] = $this->input->post('sid');
          $sid = $_SESSION['sid'];
      }
      else if(!empty($_SESSION['sid']))
          $sid = $_SESSION['sid'];

      if(isset($_POST['sid2']))
      {
          $_SESSION['sid2'] = $this->input->post('sid2');
          $sid2 = $_SESSION['sid2'];
      }
      else if(!empty($_SESSION['sid2']))
          $sid2 = $_SESSION['sid2'];
       
      if(isset($_POST['salutation']))
      {
          $_SESSION['salutation'] = $this->input->post('salutation');
          $salutation = $_SESSION['salutation'];
      }
      else if(!empty($_SESSION['salutation']))
          $salutation = $_SESSION['salutation'];
       
      if(isset($_POST['fname']))
      {
          $_SESSION['fname'] = $this->input->post('fname');
          $fname = $this->input->post('fname');
      }
      else if(!empty($_SESSION['fname'])){
          $fname = $_SESSION['fname'];
      }
      else{
          $fname = '';
      }

      if(isset($_POST['lname']))
      {
          $_SESSION['lname'] = $this->input->post('lname');
          $lname = $_SESSION['lname'];
      }
      else if(!empty($_SESSION['lname']))
          $lname = $_SESSION['lname'];
       
      if(isset($_POST['dob']))
      {
          $_SESSION['dob'] = $this->input->post('dob');
          $dob = $_SESSION['dob'];
          //1990-01-01 - 2017-01-01
          $d = explode(' - ',$dob);
          $dob1 = $d['0'];
          $_SESSION['dob1'] = $dob1;
          $dob2 = $d['1'];
          $_SESSION['dob2'] = $dob2;
      }
      else if(!empty($_SESSION['dob']))
      {
          $dob = $_SESSION['dob'];
          $d = explode(' - ',$dob);
          $dob1 = $d['0'];
          $_SESSION['dob1'] = $dob1;
          $dob2 = $d['1'];
          $_SESSION['dob2'] = $dob2;
      }
       
      if(isset($_POST['address']))
      {
          $_SESSION['address'] = $this->input->post('address');
          $address = $_SESSION['address'];
      }
      else if(!empty($_SESSION['address']))
          $address = $_SESSION['address'];
       
      if(isset($_POST['city']))
      {
          $_SESSION['city'] = $this->input->post('city');
          $city = $_SESSION['city'];
      }
      else if(!empty($_SESSION['city']))
          $city = $_SESSION['city'];
       
      if(isset($_POST['phone']))
      {
          $_SESSION['phone'] = $this->input->post('phone');
          $phone = $_SESSION['phone'];
      }
      else if(!empty($_SESSION['phone']))
          $phone = $_SESSION['phone'];
       
      if(isset($_POST['email']))
      {
          $_SESSION['email2'] = $this->input->post('email');
          $email2 = $_SESSION['email2'];
      }
      else if(!empty($_SESSION['email2']))
          $email2 = $_SESSION['email2'];
       
      if(isset($_POST['funcarea']))
      {
          $_SESSION['funcarea'] = $this->input->post('funcarea');
          $funcarea = $_SESSION['funcarea'];
      }
      else if(!empty($_SESSION['funcarea']))
          $funcarea = $_SESSION['funcarea'];
       
      if(isset($_POST['jid']))
      {
          $_SESSION['jid'] = $this->input->post('jid');
          $jid = $_SESSION['jid'];
      }
      else if(!empty($_SESSION['jid']))
          $jid = $_SESSION['jid'];
       
      if(isset($_POST['appliedposition']))
      {
          $_SESSION['appliedposition'] = $this->input->post('appliedposition');
          $appliedposition = $_SESSION['appliedposition'];
      }
      else if(!empty($_SESSION['appliedposition']))
          $appliedposition = $_SESSION['appliedposition'];
       
      if(isset($_POST['appdate']))
      {
          $_SESSION['appdate'] = $this->input->post('appdate');
          $appdate = $_SESSION['appdate'];
      }
      else if(!empty($_SESSION['appdate']))
          $appdate = $_SESSION['appdate'];
       
      if(isset($_POST['qualification']))
      {
          $_SESSION['qualification'] = $this->input->post('qualification');
          $qualification = $_SESSION['qualification'];
      }
      else if(!empty($_SESSION['qualification']))
          $qualification = $_SESSION['qualification'];
       
      if(isset($_POST['keyskills']))
      {
          $_SESSION['keyskills'] = $this->input->post('keyskills');
          $keyskills = $_SESSION['keyskills'];
      }
      else if(!empty($_SESSION['keyskills']))
          $keyskills = $_SESSION['keyskills'];
       
      if(isset($_POST['cjobposition']))
      {
          $_SESSION['cjobposition'] = $this->input->post('cjobposition');
          $cjobposition = $_SESSION['cjobposition'];
      }
      else if(!empty($_SESSION['cjobposition']))
          $cjobposition = $_SESSION['cjobposition'];
       
      if(isset($_POST['jobtitle']))
      {
          $_SESSION['jobtitle'] = $this->input->post('jobtitle');
          $jobtitle = $_SESSION['jobtitle'];
      }
      else if(!empty($_SESSION['jobtitle']))
          $jobtitle = $_SESSION['jobtitle'];
       
      if(isset($_POST['joblocation']))
      {
        $_SESSION['joblocation'] = $this->input->post('joblocation');
        $joblocation = $_SESSION['joblocation'];
      }
      else if(!empty($_SESSION['joblocation']))
        $joblocation = $_SESSION['joblocation'];
       
      if(isset($_POST['expyrs']))
      {
        $_SESSION['expyrs'] = $this->input->post('expyrs');
        $expyrs = $_SESSION['expyrs'];
      }
      else if(!empty($_SESSION['expyrs']))
        $expyrs = $_SESSION['expyrs'];
       
      if(isset($_POST['expyrs2']))
      {
        $_SESSION['expyrs2'] = $this->input->post('expyrs2');
        $expyrs2 = $_SESSION['expyrs2'];
      }
      else if(!empty($_SESSION['expyrs2']))
        $expyrs2 = $_SESSION['expyrs2'];
       
      if(isset($_POST['expsal']))
      {
        $_SESSION['expsal'] = $this->input->post('expsal');
        $expsal = $_SESSION['expsal'];
      }
      else if(!empty($_SESSION['expsal']))
        $expsal = $_SESSION['expsal'];
       
      if(isset($_POST['apporg']))
      {
        $_SESSION['apporg'] = $this->input->post('apporg');
        $apporg = $_SESSION['apporg'];
      }
      else if(!empty($_SESSION['apporg']))
        $apporg = $_SESSION['apporg'];
       
      if(isset($_POST['registerdate']))
      {
          $_SESSION['registerdate'] = $this->input->post('registerdate');
          $registerdate = $_SESSION['registerdate'];
      }
      elseif(!empty( $_SESSION['registerdate'])){
          $registerdate = $_SESSION['registerdate'];
      }
      else{
        $registerdate = '';
      }
      if(isset($_POST['modifieddate']))
      {
          $_SESSION['modifieddate'] = $this->input->post('modifieddate');
          $modifieddate = $_SESSION['modifieddate'];
      }
      elseif(!empty( $_SESSION['modifieddate'])){
          $modifieddate = $_SESSION['modifieddate'];
      }
      else{
          $modifieddate = '';
      }

      /* $sid = $this->input->post('sid');
      $sid2 = $this->input->post('sid2');
      $salutation = $this->input->post('salutation');
      $fname = $this->input->post('fname');
      $lname = $this->input->post('lname');
      $dob = $this->input->post('dob');
      $address = $this->input->post('address');
      $city = $this->input->post('city');
      $phone = $this->input->post('phone');
      $email = $this->input->post('email');
      $funcarea = $this->input->post('funcarea');
      $jid = $this->input->post('jid');
      $appliedposition = $this->input->post('appliedposition');
      $appdate = $this->input->post('appdate');
      $qualification = $this->input->post('qualification');
      $keyskills = $this->input->post('keyskills');
      $cjobposition = $this->input->post('cjobposition');
      $jobtitle = $this->input->post('jobtitle');
      $joblocation = $this->input->post('joblocation');
      $expyrs = $this->input->post('expyrs');
      $expyrs2 = $this->input->post('expyrs2');
      $expsal = $this->input->post('expsal');
      $apporg = $this->input->post('apporg');
      $registerdate = $this->input->post('registerdate');
      $modifieddate = $this->input->post('modifieddate');*/

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
            
      $sql = "SELECT * FROM seeker skr";
      
      if((isset($apporg) && !empty($apporg)) || (isset($appliedposition) && !empty($appliedposition)) || (isset($jid) && !empty($jid)) || (isset($appdate) && !empty($appdate)))
      {
        $sql .=" INNER JOIN application app ON skr.id=app.sid";
      }
      
      if(isset($apporg) && !empty($apporg))
      {
        $eid = $apporg;
        $sql .=" AND app.eid=".$eid;
      }  
      
      if(isset($appliedposition) && !empty($appliedposition))
      {  
        $jid = $appliedposition;
        $sql .=" AND app.jid=".$jid;
      }
      else if(isset($jid) && !empty($jid))
      {  
        $jid = $jid;
        $sql .=" AND app.jid=".$jid;
      }    
      
      if(isset($qualification) && !empty($qualification))
      {
        $sql .= " INNER JOIN seeker_education skrEdu ON skr.id=skrEdu.sid AND (skrEdu.faculty LIKE '%".$qualification."%')";
      }  
      
      if(empty($apporg) && empty($qualification))
      {
        $sql.=" WHERE 1";
      }
      if(isset($appdate) && !empty($appdate))
      {
        $sql .=" AND app.appdate='".$appdate."'";
      }
      if(isset($sid) && !empty($sid) && isset($sid2) && !empty($sid2))
      {
        $sql .= " AND skr.id BETWEEN '".$sid."' AND  '".$sid2."'";
      }
      if(isset($sid) && !empty($sid) && empty($sid2))
      {
        $sql .= " AND skr.id ='".$sid."'";
      }
      if(isset($salutation) && $salutation>0 && !empty($salutation))
      {
        $sql .= " AND skr.salutation='".$salutation."'";
      }
      if(isset($fname) && !empty($fname))
      {
        $sql .= " AND skr.fname LIKE '".$fname."%'";
      }
      if(isset($lname) && !empty($lname))
      {
        $sql .= " AND skr.lname LIKE '".$lname."%'";
      }
      if(isset($dob1) && !empty($dob1) && isset($dob2) && !empty($dob2))
      {
        $sql .= " AND skr.dob BETWEEN '".$dob1."' AND  '".$dob2."'";
      }
      if(isset($address) && !empty($address))
      {
        $sql .= " AND (skr.currentadd LIKE '%".$address."%' OR skr.permanentadd LIKE '%".$address."%')";
      }
      if(isset($city) && !empty($city))
      {
        $sql .= " AND (skr.currentadd LIKE '%".$city."%' OR skr.permanentadd LIKE '%".$city."%')";
      }
      if(isset($phone) && !empty($phone))
      {
        $sql .= " AND (skr.phoneres='".$phone."' OR skr.phoneoff='".$phone."' OR skr.phonecell='".$phone."')";
      }
      if(isset($email2) && !empty($email2))
      {
        $sql .= " AND (skr.email LIKE '%".$email2."%' OR skr.email2 LIKE '%".$email2."%')";
      }  
      if(isset($funcarea) && !empty($funcarea))
      {
        $sql .= " AND (skr.funcarea1='".$funcarea."' OR skr.funcarea2='".$funcarea."')";
      }
      if(isset($cjobposition) && !empty($cjobposition))
      {
        $sql .= " AND (skr.cjobposiiton LIKE '%".$cjobposition."%')";
      } 
      if(isset($joblocation) && !empty($joblocation))
      {
        $sql .= " AND (skr.joblocation='".$joblocation."' OR skr.joblocation2='".$joblocation."' OR skr.joblocation3='".$joblocation."')";
      } 
      if(!empty($expyrs) && !empty($expyrs2))
      {
        $sql .= " AND (skr.expyrs BETWEEN ".$expyrs." AND ".$expyrs2.")";
      }
      if(isset($expsal) && $expsal !="0")
      {
        $sql .= " AND skr.expsal = ".$expsal;
      }
      if(isset($from) && !empty($from) && isset($to) && !empty($to))
      {
        $sql .= " AND skr.apdate BETWEEN '".$from."' AND '".$to."'";
      }
      if(isset($modifieddate1) && !empty($modifieddate1) && isset($modifieddate2) && !empty($modifieddate2) && $modifieddate1 > '1980-1-1')
      {
        $sql .= " AND skr.modifieddate BETWEEN '".$modifieddate1."' AND '".$modifieddate2."'";
      }
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
        echo $this->db->last_query();
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

}




/* End of file Seeker_model.php
 * Location: ./application/modules/admin/models/Seeker_model.php */