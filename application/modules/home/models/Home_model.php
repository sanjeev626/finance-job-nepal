<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Home_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 31, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function get_job_by_type($jobType,$limit){
        $date = date('Y-m-d');
        $this->db->select();
        $this->db->where('`isNewspaperJob` REGEXP','.*;s:[0-9]+:"'.$jobType.'".*');  // regexp for sql search in serialize field
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $where = '(job_display_in="" OR job_display_in = "0")';
        $this->db->where($where);
        if($jobType!="NJob")
            $this->db->where('eid >',0);
        if($jobType=="CJob" || $jobType=="IJob")
            $this->db->group_by('eid');
        $this->db->order_by('post_date','DESC');
        $this->db->limit($limit);
        $query = $this->db->get('jobs');
        //return $this->db->last_query();
        //die();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }



    public function get_job_by_display_in($display_in,$limit){
        $date = date('Y-m-d');
        $this->db->select();
        $this->db->like('job_display_in', $display_in);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->order_by('post_date','DESC');
        $this->db->limit($limit);
        $query = $this->db->get('jobs');
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_hot_job($limit){
        $date = date('Y-m-d');
        $this->db->select();
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->order_by('no_of_views','DESC');
        $this->db->limit($limit);
        $query = $this->db->get('jobs');
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    
    public function count_job_by_type($type,$typeId){
        $date = date('Y-m-d');
        $this->db->select();
        $this->db->where($type,$typeId);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->where('eid >',0);
        if($typeId=="CJob" || $typeId=="IJob")
            $this->db->group_by('eid');
        $query = $this->db->get('jobs');        
        return $query->num_rows();
    }


    public function get_all_corporate_jobs($limit){
        $jobType = 'CJob';
        $date = date('Y-m-d');
        $this->db->select();
        $this->db->where('isNewspaperJob',$jobType);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $where = '(job_display_in="" OR job_display_in = "0")';
        $this->db->where($where);
        $this->db->order_by('post_date','DESC');
        $this->db->limit($limit);
        $query = $this->db->get('jobs');
        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    /*public function count_job_by_type($jobType){
        $date = date('Y-m-d');
        $this->db->select();
        $this->db->where('isNewspaperJob',$jobType);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->where('eid >',0);
        return $query->num_rows();
    }*/

    public function get_corporate_job(){
        $date = date('Y-m-d');
        $this->db->select();
        $this->db->from('jobs as jb');
        $this->db->join('employer as emp','emp.id = jb.eid');
        $this->db->where('jb.isNewspaperJob','CJob');
        $this->db->where('jb.applybefore >=',$date);
        $this->db->where('jb.post_status','public');
        $this->db->group_by('emp.id');
        $this->db->order_by('jb.eid','DESC');
        $this->db->limit(34);
        $query = $this->db->get();  //echo $this->db->last_query(); die;
        if ($query->num_rows() == 0) {
            return FALSE;
        } else { 
            return $query->result();
        }
    }

    public function get_newspaper_job($jobType){
         $date = date('Y-m-d');

        $this->db->select();
        $this->db->where('isNewspaperJob',$jobType);
        $this->db->where('applybefore >=',$date);
        $this->db->order_by('id','DESC');
        $this->db->where('post_status','public');
        $this->db->limit(6);
        $query = $this->db->get('jobs'); 
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    /*public function get_recent_job($jobType){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->from('jobs as jb');
        $this->db->join('employer as emp','emp.id = jb.eid');
        $this->db->where('jb.applybefore >=',$date);
        $this->db->where('jb.isNewspaperJob',$jobType);
        $this->db->order_by('jb.id','DESC');
        $this->db->where('jb.post_status','public');
        $this->db->group_by('emp.id');
        $this->db->limit(6);
        $query = $this->db->get();  
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }*/

    public function get_recent_job($jobtype,$limit){
        $date = date('Y-m-d');

        $this->db->select();
        //$this->db->where('isNewspaperJob',$jobtype);
        $this->db->where('applybefore >=',$date);
        $this->db->order_by('id','DESC');
        $this->db->where('post_status','public');
        $this->db->limit($limit);
        $query = $this->db->get('jobs'); 
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_latest_job(){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->from('jobs as jb');
        $this->db->join('employer as emp','emp.id = jb.eid');
        $this->db->where('jb.applybefore >=',$date);
        $this->db->order_by('jb.id','DESC');
        $this->db->where('jb.post_status','public');
        $this->db->group_by('emp.id');
        $this->db->limit(6);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_related_job_by_id($eid){
        $date = date('Y-m-d');

        $this->db->select('id,jobtitle,slug');
        $this->db->where('eid',$eid);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get('jobs');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_related_corporate_job_by_id($eid){
        $date = date('Y-m-d');

        $this->db->select('id,jobtitle,slug');
        $this->db->where('eid',$eid);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->where('isNewspaperJob','CJob');
        //$this->db->limit($limit);
        $query = $this->db->get('jobs');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_related_top_job_by_id($eid){
        $date = date('Y-m-d');

        $this->db->select('id,jobtitle,slug');
        $this->db->where('eid',$eid);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->where('isNewspaperJob','CJob');
        $this->db->limit(2);
        $query = $this->db->get('jobs');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_related_international_job_by_id($eid){
        $date = date('Y-m-d');

        $this->db->select('id,jobtitle,slug');
        $this->db->where('eid',$eid);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->where('isNewspaperJob','IJob');
        //$this->db->limit($limit);
        $query = $this->db->get('jobs');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function count_job_by_category($catid){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->where('jobcategory',$catid);
        $this->db->where('applybefore >=',$date);
        $query = $this->db->get('jobs');
        
        return $query->num_rows();
    }

    public function count_job_by_city($catid){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->where('joblocation',$catid);
        $this->db->where('applybefore >=',$date);
        $query = $this->db->get('jobs');
        
        return $query->num_rows();
    }

    public function jobseeker_login_check(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('seeker');
        
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }
    
    public function get_all_advertisment(){
        $this->db->select();
        $this->db->where('addstatus','publish');
        $this->db->limit(7);
        $this->db->order_by('id','ASC');
        $query = $this->db->get('advertisement');
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    
    public function get_all_testimonial($limit = NULL){
        $this->db->select();
        $this->db->limit($limit);
        $this->db->order_by('id','ASC');
        $query = $this->db->get('testimonial');
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    
    public function get_all_clients(){
        /*$this->db->select();
        $this->db->order_by('id','ASC');
        $query = $this->db->get('clients');
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }*/
    }

    /**
        Get Job/Vacancy Detail Information with parameter Slug and JobId
    **/
    public function get_job_details($slug,$jobid){
        $this->db->select();
        $this->db->where('slug',$slug);
        $this->db->where('id',$jobid);
        $query = $this->db->get('jobs');
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->row();
        }
    }
    
    /**
        Get Job List according to Employer ID with parameter Slug and Employer Id
    **/
    public function get_job_list_by_employer($slug,$empid){
        $this->db->select();
        $this->db->where('slug',$slug);
        $this->db->where('eid',$empid);
        $query = $this->db->get('jobs');
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    
    /**
        Get Job List according to Job Category/ Job Location with parameter Slug and Job Category or Job Location
    **/
    public function get_job_list_by_category($field,$catId,$limit,$offset){
        $date = date('Y-m-d');
        
        $this->db->select();
        $this->db->where($field,$catId);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get('jobs',$limit,$offset);
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    
    /**
        Get Job List according to Job Category/ Job Location with parameter Slug and Job Category or Job Location
    **/
    public function get_total_job_list_by_category($field,$catId){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->where($field,$catId);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get('jobs');
        return $query->num_rows();

    }


     /**
        Get Job List according to Job Level with parameter Slug and Job Level 
     **/
    public function get_job_list_by_level($level,$limit,$offset){
        $date = date('Y-m-d');
        
        $this->db->select();
        $this->db->where('joblevel',$level);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get('jobs',$limit,$offset);
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    
    /**
        Get Job List according to Job Level with parameter Slug and Job Level
     **/
    public function get_total_job_list_by_level($level){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->where('joblevel',$level);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get('jobs');
        return $query->num_rows();
    }

    /**
        Get Job List according to Job Type with parameter Slug and Job Type 
     **/
    public function get_job_list_by_type($typefield,$type,$limit,$offset){
        $date = date('Y-m-d');
        
        $this->db->select();
        $this->db->where($typefield,$type);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get('jobs',$limit,$offset);
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    
    /**
        Get Job List according to Job Type with parameter Slug and Job Type
     **/
    public function get_total_job_list_by_type($typefield,$type){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->where($typefield,$type);
        $this->db->where('applybefore >=',$date);
        $query = $this->db->get('jobs');
        return $query->num_rows();
    }

    public function get_search_job_by_parameter($limit,$offset,$total =''){
        $date = date('Y-m-d');

        $jobtitle = $this->input->post('job_title');
        $job_category = $this->input->post('job_category');
        $location = $this->input->post('location');

        $this->db->select();

        if($jobtitle)
        {
            $this->db->like('jobtitle',$jobtitle);
            $this->db->order_by("jobtitle", "asc");
        }

        if($job_category)
        {
            $this->db->where('jobcategory',$job_category);
            $this->db->order_by("jobcategory", "asc");
        }

        if($location)
        {
            $this->db->where('joblocation',$location);
            $this->db->order_by("joblocation", "asc");
        }

        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get('jobs',$limit,$offset);
         if($query->num_rows() == 0){
            return FALSE;
        }else{
             if($total){
                 return $query->num_rows();
             }else{
                return $query->result();
             }
        }
    }

    public function get_advance_search_job_by_parameter($limit,$offset,$total =''){
        $curDate = date('Y-m-d');
        $jobcategory = $this->input->post('jobcategory');

       // $sql = "SELECT * FROM jobs as jb WHERE applybefore >= '$curDate'";
       $sql = "SELECT emp.orgname orgname,jb.* FROM jobs jb, employer emp WHERE emp.id=jb.eid AND applybefore >= '$curDate'";
        $jobtitle = trim($this->input->post('jobtitle'));
        if(!empty($jobtitle))
        {
            $sql.=" AND jobtitle LIKE '%".$this->input->post('jobtitle')."%'";
        }

        if($this->input->post('jobcategory')!=0)
        {
            $sql.=" AND jb.jobcategory= '".$this->input->post('jobcategory')."'";
        }
        if($this->input->post('education')!=0)
        {
            $sql.=" AND jb.education= '".$this->input->post('education')."'";
        }

        if($this->input->post('organizationtype')!=0)
        {
            $sql.=" AND emp.orgtype= '".$this->input->post('organizationtype')."'";
        }

        if($this->input->post('salaryrange')!=0)
        {
            $sql.=" AND jb.salaryrange='".$this->input->post('salaryrange')."'";
        }

        if($this->input->post('noexperience')!=0)
        {
            $sql.=" AND jb.noexperience='".$this->input->post('noexperience')."'";
        }

        if($this->input->post('location')!=0)
        {
            $sql.=" AND jb.joblocation='".$this->input->post('location')."'";
        }

        if(!empty($this->input->post('joblevel')) && $this->input->post('joblevel')!='0')
        {
            $sql.=" AND jb.joblevel='".$this->input->post('joblevel')."'";
        }

        if($this->input->post('jobtype1') && !empty($this->input->post('jobtype1')))
        {
            $sql.=" AND jb.jobtype1='".$this->input->post('jobtype1')."'";
        }

        if($this->input->post('jobtype2') && !empty($this->input->post('jobtype2')))
        {
            $sql.=" AND jb.jobtype2='".$this->input->post('jobtype2')."'";
        }

        if($this->input->post('jobtype3') && !empty($this->input->post('jobtype3')))
        {
            $sql.=" AND jb.jobtype3='".$this->input->post('jobtype3')."'";
        }
        $sql .=" ORDER BY applybefore";

        if($limit !== ''){
            $sql .=" limit ".$offset.', '.$limit;
        }

        $query = $this->db->query($sql);
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

    public function get_news_job_list($limit= '', $offset =' ',$type){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->where('isNewspaperJob',$type);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        if($type!="NJob")
            $this->db->where('eid >','0');
        $this->db->order_by('post_date','DESC');
        $query = $this->db->get('jobs',$limit,$offset);
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }
    }

    public function get_display_in_job_list($limit= '', $offset =' ',$display_in){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->like('job_display_in', $display_in);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->order_by('post_date','DESC');
        $query = $this->db->get('jobs',$limit,$offset);

        //echo $this->db->last_query();

        if($query->num_rows() == 0){
            return FALSE;
        }else{
            if($limit=='' && $offset=='')
                return $query->num_rows();
            else
                return $query->result();
        }
    }

    public function get_total_news_job_list($type){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->where('isNewspaperJob',$type);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        if($type!="NJob")
            $this->db->where('eid >','0');
        $query = $this->db->get('jobs');
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->num_rows();
        }
    }

    public function get_content_url($content_id)
    {
        $this->db->select('slug');
        $this->db->where('id',$content_id);
        $query = $this->db->get('content');
        $row = $query->result();
        return base_url().'content/'.$row['0']->slug;        
    }

    public function get_job_url($job_id)
    {
        $this->db->select('id,eid,slug');
        $this->db->where('id',$job_id);
        $query = $this->db->get('jobs');
        $row = $query->result();
        return base_url().'job/'.$row['0']->slug.'/'.$row['0']->id;        
    }

    public function send_job_email_to_jobseeker(){
        //Send Email to related Job Seekers
        //echo "hello";
        $this->load->model('employer_model');
        $this->db->select('id, jobtitle, jobcategory, salaryrange');
        $this->db->from('jobs');
        $this->db->where('isEmailed','0');
        $query = $this->db->get();

        //echo $this->db->last_query();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            $jobs = $query->result();
            foreach($jobs as $key => $job)
            {                
                $jobtitle = $job->jobtitle;
                $jobcategory = $job->jobcategory;
                $salaryrange = $job->salaryrange;
                $job_url = $this->get_job_url($job->id);
                $this->employer_model->sendEmailToJobseeker($jobcategory,$salaryrange,$jobtitle,$job_url);
                /* Upudate job as Sent */
                $dataStatus='';
                $dataStatus['isEmailed'] = '1';
                $this->db->where('id',$job->id);
                $this->db->update('jobs',$dataStatus);
            }
        }
    }

    public function get_similar_jobs($title,$id,$applydate){

        $splittitle = explode (" ", $title);
        $sql = "SELECT * FROM jobs WHERE id !='$id' AND applybefore >= '$applydate'";
        $sql.=" AND (";
        foreach($splittitle as $key=>$st){
            $sql.=($key>0?' OR ':'')." jobtitle LIKE '%".$st."%'";

        }
        $sql .= ') ORDER BY `post_date` DESC LIMIT 6';
        $query = $this->db->query($sql);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }



    public function get_job_by_category($slug,$limit,$offset){
        $date = date('Y-m-d');
        $this->db->from('jobs as jb');
        $this->db->join('dropdown as dp','dp.id = jb.jobcategory');
        $this->db->where('dp.slug',$slug);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->select('jb.*');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_job_count_by_category($slug){
        $date = date('Y-m-d');

        $this->db->select();
        $this->db->from('jobs as jb');
        $this->db->join('dropdown as dp','dp.id = jb.jobcategory');
        $this->db->where('dp.slug',$slug);
        $this->db->where('applybefore >=',$date);
        $this->db->where('post_status','public');
        $query = $this->db->get();
        return $query->num_rows();
    }

}

/* End of file Home_model.php
 * Location: ./application/modules/home/models/Home_model.php */
