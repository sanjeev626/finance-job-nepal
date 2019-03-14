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
    	$this->db->select('jobcategory_id,title');
        $this->db->where('status',1);
        $this->db->order_by('display_order','ASC');
    	$query =  $this->db->get($this->table_jobc_cat);
    	if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function search_job_by_parameter($catId){
        $this->db->select();
        $this->db->where('jobcategory',$catId);
        $this->db->order_by('displayname','ASC');
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
        
        $jobtype1 = ($this->input->post('jobtype1')) ? $this->input->post('jobtype1') : '';
        $jobtype2 = ($this->input->post('jobtype2')) ? $this->input->post('jobtype2') : '';
        $jobtype3 = ($this->input->post('jobtype3')) ? $this->input->post('jobtype3') : '';
        $jobtype4 = ($this->input->post('jobtype4')) ? $this->input->post('jobtype4') : '';
        $post_date = $this->input->post('pyy').'-'.$this->input->post('pmm').'-'.$this->input->post('pdd');

        $data = array(
            'isNewspaperJob' => $this->input->post('isNewspaperJob'),
            'postedin' => $this->input->post('postedin'),
            'eid' => $eid,
            'orgemail' => $this->input->post('orgemail'),
            'complogo' => $complogo,
            'displayname' => $this->input->post('displayname'),
            'jobtitle' => $jobtitle,
            'slug' => $slug,
            'jobcategory' => $this->input->post('jobcategory'),
            'preferredgender' => $this->input->post('preferredgender'),
            'requiredno' => $this->input->post('requiredno'),
            'pmm' => $this->input->post('pmm'),
            'pdd' => $this->input->post('pdd'),
            'pyy' => $this->input->post('pyy'),
            'post_date' => $post_date,
            'apmm' => $apmm,
            'apdd' => $apdd,
            'apyy' => $apyy,
            'applybefore'=>$applybefore,
            'salaryrange' => $this->input->post('salaryrange'),
            'noexperience' => $this->input->post('noexperience'),
            /*'education' => $this->input->post('education'),*/
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
            'apply_by_faculty' => $this->input->post('apply_by_faculty'),
            'apply_by_age' => $this->input->post('apply_by_age'),
            'post_status' => $this->input->post('post_status'),
            'adminPosted' => $adminPosted
            );

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

        $post_date = $this->input->post('pyy').'-'.$this->input->post('pmm').'-'.$this->input->post('pdd');
        
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
            'post_date' => $post_date,
            'apmm' => $apmm,
            'apdd' => $apdd,
            'apyy' => $apyy,
            'applybefore'=>$applybefore,
            'salaryrange' => $this->input->post('salaryrange'),
            'noexperience' => $this->input->post('noexperience'),
            /*'education' => $this->input->post('education'),*/
            'joblevel' => $this->input->post('joblevel'),
            'jobtype1' => $jobtype1,
            'jobtype2' => $jobtype2,
            'jobtype3' => $jobtype3,
            'jobtype4' => $jobtype4,
            'otherstype' => $this->input->post('otherstype'),
            'joblocation' => $this->input->post('joblocation'),
            'specification' => $this->input->post('specification'),
            'requirements' => $this->input->post('requirements'),
            'howtoapply' => $this->input->post('howtoapply'),
            'onlineap' => $this->input->post('onlineap'),
            'emailap' => $this->input->post('emailap'),
            'postap' => $this->input->post('postap'),
            'pobox' => $this->input->post('pobox'),
            'apply_by_faculty' => $this->input->post('apply_by_faculty'),
            'from_age' => $this->input->post('from_age'),
            'to_age' => $this->input->post('to_age'),
            'apply_by_age' => $this->input->post('from_age').'-'.$this->input->post('to_age'),
            'post_status' => $this->input->post('post_status'),
            'adminPosted' => $adminPosted,
            'required_education' => $this->input->post('required_education'),
            'other_faculty' => $this->input->post('other_faculty'),            
            'slc_docs' =>$this->input->post('slc_docs'),
            'docs_11_12' =>$this->input->post('docs_11_12'),
            'bachelor_docs' =>$this->input->post('bachelor_docs'),
            'masters_docs' =>$this->input->post('masters_docs')
            );

        if(!empty($complogo)){
            $data['complogo'] = $complogo;
        }

    	$this->db->where('id',$id);
    	$this->db->update($this->table_jobs,$data);
        echo $this->db->last_query();exit();
        //echo $this->db->last_query();
        //print_r($data); 
        //exit();
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

}

/* End of file Vacancy_model.php
 * Location: ./application/modules/admin/models/Vacancy_model.php */
