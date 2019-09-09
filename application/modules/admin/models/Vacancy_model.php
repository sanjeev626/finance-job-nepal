<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Vacancy_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 26, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Vacancy_model extends CI_Model {

        private $table_jobc_cat = 'tbl_jobcategory';
        private $table_jobs = 'jobs';
        private $table_employer = 'employer';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_jobcategory(){
    	$this->db->select('id,dropvalue');
        $this->db->where('fid','9');
        $this->db->order_by('dropvalue','ASC');
    	$query =  $this->db->get('dropdown');
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function search_job_by_parameter($catId){
        $this->db->select();
        $this->db->where('jobcategory',$catId);
        $this->db->order_by('applybefore','DESC');
        $query = $this->db->get($this->table_jobs); 
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_organisation_by_eid($eid){
        $this->db->select('orgname');
        $this->db->where('id',$eid);
        $query = $this->db->get($this->table_employer);
         if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row()->orgname;
        }
    }


    public function insert_vacancy($complogo){
        
        $jobtitle = $this->input->post('jobtitle');
        $folder_name = url_title($jobtitle, '-', true);
        $slug = substr($folder_name, 0, 30);
            
        $apyy =$this->input->post('apyy');
        $apmm =$this->input->post('apmm');
        $apdd =$this->input->post('apdd');
        $applybefore = $apyy."-".$apmm."-".$apdd;

        $eid = $this->input->post('eid');
        if($eid != '0'){
            $adminPosted = 0;
        }else{
            $adminPosted = 1;
        }



        $isNewspaperJob = array();
        if(isset($_POST['isNewspaperJob']) && count($_POST['isNewspaperJob'])>0)
        {
            for($i=0;$i<count($_POST['isNewspaperJob']);$i++){
                $isNewspaperJob[] = $_POST['isNewspaperJob'][$i];
            }
        }
        else{
            $isNewspaperJob = '';
        }
        
        $joblocation=array();
        if(isset($_POST['joblocation'])&& count($_POST['joblocation'])>0)
        {
            for($i=0;$i<count($_POST['joblocation']);$i++)
            {
                $joblocation[] =$_POST['joblocation'][$i];
            }
        }
        else{
            $joblocation = '';
        }


        $jobtype = array();
        if(isset($_POST['jobtype']) && count($_POST['jobtype'])>0)
        {
            for($i=0;$i<count($_POST['jobtype']);$i++){
                $jobtype[] = $_POST['jobtype'][$i];
            }
        }
        else{
            $jobtype = '';
        }


        $data = array(
            'isNewspaperJob' => serialize($isNewspaperJob),
            'eid' => $eid,
            'displayname' => $this->input->post('displayname'),
            'jobtitle' => $jobtitle,
            'slug' => $slug,
            'jobcategory' => $this->input->post('jobcategory'),
            'preferredgender' => $this->input->post('preferredgender'),
            'requiredno' => $this->input->post('requiredno'),
            'post_date' => $this->input->post('post_date'),
            'applybefore'=>$this->input->post('applybefore'),
            'salaryrange' => $this->input->post('salaryrange'),
            'noexperience' => $this->input->post('noexperience'),
            'joblevel' => $this->input->post('joblevel'),
            'jobtype' => serialize($jobtype),
            'joblocation' => serialize($joblocation),
            'specification' => $this->input->post('specification'),
            'requirements' => $this->input->post('requirements'),
            'post_status' => $this->input->post('post_status'),
            'adminPosted' => $adminPosted,
            'required_education' => $this->input->post('required_education'),
            'expected_faculty' => $this->input->post('expected_faculty'),            
            'other_faculty' => $this->input->post('other_faculty'),
            );
        if(!empty($complogo)){
            $data['complogo'] = $complogo;
        }
            $this->db->insert($this->table_jobs,$data);

    }

    public function get_job_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_jobs);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_vacancy($id,$complogo){
        //print_r($_POST);
        $jobtitle = $this->input->post('jobtitle');
        $folder_name = url_title($jobtitle, '-', true);
        $slug = substr($folder_name, 0, 30);
        
    	$apyy =$this->input->post('apyy');
        $apmm =$this->input->post('apmm');
        $apdd =$this->input->post('apdd');
        $applybefore = $apyy."-".$apmm."-".$apdd;

        $eid = $this->input->post('eid');
        if($eid != '0'){
            $adminPosted = 0;
        }else{
            $adminPosted = 1;
        }

        $isNewspaperJob = array();
        if(isset($_POST['isNewspaperJob']) && count($_POST['isNewspaperJob'])>0)
        {
            for($i=0;$i<count($_POST['isNewspaperJob']);$i++){
                $isNewspaperJob[] = $_POST['isNewspaperJob'][$i];
            }
        }
        else{
            $isNewspaperJob = '';
        }

        $joblocation=array();
        if(isset($_POST['joblocation'])&& count($_POST['joblocation'])>0)
        {
            for($i=0;$i<count($_POST['joblocation']);$i++)
            {
                $joblocation[] =$_POST['joblocation'][$i];
            }
        }
        else{
            $joblocation = '';
        }


        $jobtype = array();
        if(isset($_POST['jobtype']) && count($_POST['jobtype'])>0)
        {
            for($i=0;$i<count($_POST['jobtype']);$i++){
                $jobtype[] = $_POST['jobtype'][$i];
            }
        }
        else{
            $jobtype = '';
        }

        $data = array(
            'isNewspaperJob' => serialize($isNewspaperJob),
            'eid' => $eid,
            'displayname' => $this->input->post('displayname'),
            'jobtitle' => $jobtitle,
            'slug' => $slug,
            'jobcategory' => $this->input->post('jobcategory'),
            'preferredgender' => $this->input->post('preferredgender'),
            'requiredno' => $this->input->post('requiredno'),
            'post_date' => $this->input->post('post_date'),
            'applybefore'=>$this->input->post('applybefore'),
            'salaryrange' => $this->input->post('salaryrange'),
            'noexperience' => $this->input->post('noexperience'),
            'joblevel' => $this->input->post('joblevel'),
            'jobtype' => serialize($jobtype),
            'joblocation' => serialize($joblocation),
            'specification' => $this->input->post('specification'),
            'requirements' => $this->input->post('requirements'),
            'post_status' => $this->input->post('post_status'),
            'adminPosted' => $adminPosted,
            'required_education' => $this->input->post('required_education'),
            'expected_faculty' => $this->input->post('expected_faculty'),
            'other_faculty' => $this->input->post('other_faculty'),
            );

        if(!empty($complogo)){
            $data['complogo'] = $complogo;
        }

    	$this->db->where('id',$id);
    	$this->db->update($this->table_jobs,$data);

    }

   public function delete_vacancy($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_jobs);
   }

   public function update_job_slug($title,$id){

        $folder_name = url_title($title, '-', true);
        $dirname = substr($folder_name, 0, 30);

         $data =array(
            'slug' => $dirname
            );
        $this->db->where('id',$id);
        $this->db->update($this->table_jobs,$data);
   }

   public function update_post_date($post_date,$id){        
            $data =array(
                'post_date' => $post_date
                );
            $this->db->where('id',$id);
            $this->db->update($this->table_jobs,$data);
            echo $this->db->last_query().';'; echo "<br>";
   }

   public function update_applybefore($applybefore,$id){        
            $data =array(
                'applybefore' => $applybefore
                );
            $this->db->where('id',$id);
            $this->db->update($this->table_jobs,$data);
            echo $this->db->last_query().';'; echo "<br>";
   }
}

/* End of file Vacancy_model.php
 * Location: ./application/modules/admin/models/Vacancy_model.php */
