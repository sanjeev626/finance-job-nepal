<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Employer_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 26, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Employer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_employer($limit,$offset){
    	$this->db->select('id,orgname,email,isCorporate,fname,mname,lname');
    	$query =  $this->db->get('employer',$limit,$offset);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_basket_employer(){ 
        $this->db->select('e.*,e.id as emp_id');
        $this->db->from('employer as e');
        $this->db->join('employer_basket as eb','eb.eid = e.id');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_employer_basket_by_id($empid){
        $this->db->select();
        $this->db->where('id',$empid);
        $query = $this->db->get('employer');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }

    public function remove_employer_basket($eid){
        $this->db->where('eid',$eid);
        $this->db->delete('employer_basket');
    }

    public function delete_employer($eid){
        $this->db->where('eid',$eid);
        $this->db->delete('jobs');

        $this->db->where('id',$eid);
        $this->db->delete('employer');
    }

   /* public function update_password_md5($password,$eid){
        $data =array(
            'password' => $password
            );
        $this->db->where('id',$eid);
        $this->db->update('employer',$data);
    } */ 

    public function update_password($password,$eid){
        $data =array(
            'password' => md5($password)
            );

        $this->db->where('id',$eid);
        $this->db->update('employer',$data);
    }

    public function update_corporate($corporate,$eid){
        $data =array(
            'isCorporate' => $corporate
            );

        $this->db->where('id',$eid);
        $this->db->update('employer',$data);
    }

    public function insert_employer_basket($emp_id){

        $this->db->where('eid',$emp_id);
        $query = $this->db->get('employer_basket');
        if ($query->num_rows() == 0) {
          
            $data = array(
             'eid' => $emp_id
            );
            $this->db->insert('employer_basket',$data);

        } else {
            return TRUE;
        }
    }

    public function get_job_by_employer($emp_id){
        $this->db->select();
        $this->db->where('eid',$emp_id);
        $query = $this->db->get('jobs');
        if($query->num_rows() == 0){ 
            return FALSE;
        }else {
            return $query->result();
        }
    }

    public function update_employer($eid,$logo){
        $data = array(
            'orgname' => $this->input->post('orgname'),
            'email' => $this->input->post('email'),
            'email2' => $this->input->post('email2'),
            'orgdesc' => $this->input->post('orgdesc'),
            'natureoforg' => $this->input->post('natureoforg'),
            'orgtype' => $this->input->post('orgtype'),
            'ownership' => $this->input->post('ownership'),
            'salutation' => $this->input->post('salutation'),
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'designation' => $this->input->post('designation'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'fax' => $this->input->post('fax'),
            'pobox' => $this->input->post('pobox'),
            'website' => $this->input->post('website'),
            'contactperson' => $this->input->post('contactperson'),
            'consalutation' => $this->input->post('consalutation'),
            'confname' => $this->input->post('confname'),
            'conmname' => $this->input->post('conmname'),
            'conlname' => $this->input->post('conlname'),
        );

        if(!empty($logo)){
            $data['logo'] = $logo;
        }

        $this->db->where('id',$eid);
        $this->db->update('employer',$data);
    }

    public function search_employer_by_param($limit='',$offset=''){

        if(!empty($this->input->post('empId')))
        {
            $_SESSION['empId'] = $this->input->post('empId');
            $empId = $_SESSION['empId'];
        }
        else if(!empty($_SESSION['empId'])){
            $empId = $_SESSION['empId'];
        }
        else{
            $empId = '';
        }

        if(!empty($this->input->post('empId2')))
        {
            $_SESSION['empId2'] = $this->input->post('empId2');
            $empId2 = $_SESSION['empId2'];
        }
        else if(!empty($_SESSION['empId2'])){
            $empId2 = $_SESSION['empId2'];
        }
        else{
            $empId2 = '';
        }

        if(!empty($this->input->post('orgname')))
        {
            $_SESSION['orgname'] = $this->input->post('orgname');
            $orgname = $_SESSION['orgname'];
        }
        else if(!empty($_SESSION['orgname'])){
            $orgname = $_SESSION['orgname'];
        }
        else{
            $orgname = '';
        }


        if(!empty($this->input->post('address')))
        {
            $_SESSION['address'] = $this->input->post('address');
            $address = $_SESSION['address'];
        }
        else if(!empty($_SESSION['address'])){
            $address = $_SESSION['address'];
        }
        else{
            $address = '';
        }

        if(!empty($this->input->post('email')))
        {
            $_SESSION['email'] = $this->input->post('email');
            $email = $_SESSION['email'];
        }
        else if(!empty($_SESSION['email'])){
            $email = $_SESSION['email'];
        }
        else{
            $email = '';
        }

        if(!empty($this->input->post('website')))
        {
            $_SESSION['website'] = $this->input->post('website');
            $website = $_SESSION['website'];
        }
        else if(!empty($_SESSION['website'])){
            $website = $_SESSION['website'];
        }
        else{
            $website = '';
        }

        if(!empty($this->input->post('orgtype')))
        {
            $_SESSION['orgtype'] = $this->input->post('orgtype');
            $orgtype = $_SESSION['orgtype'];
        }
        else if(!empty($_SESSION['orgtype'])){
            $orgtype = $_SESSION['orgtype'];
        }
        else{
            $orgtype = '';
        }

        if(!empty($this->input->post('phone')))
        {
            $_SESSION['phone'] = $this->input->post('phone');
            $phone = $_SESSION['phone'];
        }
        else if(!empty($_SESSION['phone'])){
            $phone = $_SESSION['phone'];
        }
        else{
            $phone = '';
        }

        if(!empty($this->input->post('username')))
        {
            $_SESSION['username'] = $this->input->post('username');
            $username = $_SESSION['username'];
        }
        else if(!empty($_SESSION['username'])){
            $username = $_SESSION['username'];
        }
        else{
            $username = '';
        }

        if(!empty($this->input->post('password')))
        {
            $_SESSION['password'] = $this->input->post('password');
            $password = $_SESSION['password'];
        }
        else if(!empty($_SESSION['password'])){
            $password = $_SESSION['password'];
        }
        else{
            $password = '';
        }

        if(!empty($this->input->post('address')))
        {
            $_SESSION['address'] = $this->input->post('address');
            $address = $_SESSION['address'];
        }
        else if(!empty($_SESSION['address'])){
            $address = $_SESSION['address'];
        }
        else{
            $address = '';
        }

        if(!empty($this->input->post('joindate')))
        {
            $_SESSION['joindate'] = $this->input->post('joindate');
            $jdate = $_SESSION['joindate'];
        }
        else if(!empty($_SESSION['joindate'])){
            $jdate = $_SESSION['joindate'];
        }
        else{
            $jdate = '';
        }

        if(!empty($this->input->post('modifieddate')))
        {
            $_SESSION['modifieddate'] = $this->input->post('modifieddate');
            $mdate = $_SESSION['modifieddate'];
        }
        else if(!empty($_SESSION['modifieddate'])){
            $mdate = $_SESSION['modifieddate'];
        }
        else{
            $mdate = '';
        }


        /*$empId = $this->input->post('empId');
        $empId2 = $this->input->post('empId2');
        $orgname = $this->input->post('orgname');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $orgtype = $this->input->post('orgtype');
        $phone = $this->input->post('phone');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $address = $this->input->post('address');*/

        //$jdate = $this->input->post('joindate');
        if($jdate){
            $jsplit1 = explode('-',$jdate);
            $joindate_from = $jsplit1[0].'-'.$jsplit1[1].'-'.$jsplit1[2];
            $joindate_to = $jsplit1[3].'-'.$jsplit1[4].'-'.$jsplit1[5];
        }

        //$mdate = $this->input->post('modifieddate');
        if($mdate){
            $mplit1 = explode('-',$mdate);
            $modifieddate1 = $mplit1[0].'-'.$mplit1[1].'-'.$mplit1[2];
            $modifieddate2 = $mplit1[3].'-'.$mplit1[4].'-'.$mplit1[5];
        }
        
        //print_r($joindate_from.'---'.$joindate_to.'====='.$modifieddate1.'-=-=-=-=-='.$modifieddate2);
        $this->db->select('id,orgname,email,isCorporate,fname,mname,lname');

        if(isset($empId) && !empty($empId) && isset($empId2) && !empty($empId2)){
            $this->db->where("id BETWEEN $empId AND $empId2");
        }

        if(isset($empId) && !empty($empId) && empty($empId2))
        {
           $this->db->where('id',$empId);
        }

        if(isset($orgname) && !empty($orgname)){ 
            $this->db->like('orgname',$orgname);
        }
        if(isset($address) && !empty($address)){
            $this->db->where('address',$address);
        }
        if(isset($email) && !empty($email)){
            $this->db->like('email',$email);
            $this->db->or_like('email2',$email);
        }
        if(isset($website) && !empty($website)){
            $this->db->like('website',$website);
        }
        if(isset($orgtype) && !empty($orgtype)){
            $this->db->where('orgtype',$orgtype);
        }
        if(isset($phone) && !empty($phone)){
            $this->db->like('phone',$phone);
        }
        if(isset($username) && !empty($username)){
            $this->db->like('username',$username);
        }
        if(isset($password) && !empty($password)){
            $this->db->where('password',md5($password));
        }
        if(isset($joindate_from) && !empty($joindate_from) && isset($joindate_to) && !empty($joindate_to)){
            //$this->db->where("joindate BETWEEN $joindate_from AND `$joindate_to`");
            $this->db->where('joindate >=',$joindate_from);
            $this->db->where('joindate <=',$joindate_to);
        }
        if(isset($modifieddate1) && !empty($modifieddate1) && isset($modifieddate2) && !empty($modifieddate2)){
            //$this->db->where("modifieddate BETWEEN $modifieddate1 AND `$modifieddate2`");
            $this->db->where('modifieddate >=',$modifieddate1);
            $this->db->where('modifieddate <=',$modifieddate2);
        }

        $query = $this->db->get('employer',$limit,$offset);   
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

    public function get_video_cv_info($eid){
        $this->db->select();
        $this->db->from('employer_video_cv');
        $this->db->where('eid',$eid);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_single_video_cv_info($video_cv_id){
        $this->db->select();
        $this->db->from('employer_video_cv');
        $this->db->where('id',$video_cv_id);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }

    public function update_video_cv($video_cv_id){   
        $data = array(
            'activated_date' => $this->input->post('activated_date'),
            'start_date' => $this->input->post('start_date'),
            'expiry_date' => $this->input->post('expiry_date')
        );

        $this->db->where('id',$video_cv_id);
        $this->db->update('employer_video_cv',$data);

    }

    public function add_video_cv($emp_id){   
        $data = array(
            'eid' => $emp_id,
            'start_date' => $this->input->post('start_date'),
            'expiry_date' => $this->input->post('expiry_date')
        );
        $this->db->insert('employer_video_cv',$data);

        $data2 = array(
            'video_cv_activated_on' => $this->input->post('activated_date')
        );
        $this->db->where('id', $emp_id);
        $this->db->update('employer',$data2);
    }

    public function delete_video_cv($video_cv_id)
    {
        $this->db->where('id', $video_cv_id);
        $this->db->delete('employer_video_cv');
    }

}

/* End of file Employer_model.php
 * Location: ./application/modules/admin/models/Employer_model.php */