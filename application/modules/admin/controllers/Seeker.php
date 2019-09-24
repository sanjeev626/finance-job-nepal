<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Seeker Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 30, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Seeker extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('seeker_model');
        $this->load->model('general_model');
        $this->load->model('vacancy_model');
        $this->load->model('dropdown_model');
    }
 
    public function index(){

        $config['base_url'] = base_url() . 'admin/seeker';
        $config['uri_segment'] = 3;
        $config['per_page'] = 25;

        /* Bootstrap Pagination  */

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        /* End of Bootstrap Pagination */

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $config['total_rows'] = $this->db->count_all('seeker');
        $data['seeker'] = $this->seeker_model->get_all_seeker_limited($config['per_page'], $page);
        $this->pagination->initialize($config);
        $data['title'] = 'JOB SEEKER LIST';
        $data['page_header'] = 'Job Seeker';
        $data['page_header_icone'] = 'fa-user';
        $data['nav'] = 'seeker';
        $data['panel_title'] = 'Job Seeker List';
        $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
        $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
        $data['job_title'] =$this->general_model->getAll('jobs','','jobtitle ASC','id,jobtitle,eid,displayname');
        $data['location'] =$this->general_model->getAll('dropdown','fid = 2','','id,dropvalue');
        $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
        $data['applied_organisation'] =$this->general_model->getAll('employer','','','id,orgname');

        $data['main'] = 'seeker/seeker_list';

        $this->load->view('admin/home', $data);
    }

    public function viewJobSekeerBasket(){
        $data['title'] = 'VIEW BASKET';
        $data['page_header'] = 'View Job Seeker Basket';
        $data['page_header_icone'] = 'fa-user';
        $data['nav'] = 'seeker';
        $data['panel_title'] = 'View Job Seeker Basket ';
        $data['main'] = 'seeker/view_seeker_basket';
        $data['basket_seeker'] =  $this->seeker_model->get_basket_seeker();

        $this->load->view('home', $data);
    }

    public function SeekerBasket(){
        $job_id = $this->input->post('job_id');
        $job_info = $this->seeker_model->get_seeker_basket_by_id($job_id);

        $seeker_edu_info = $this->seeker_model->get_seeker_education_by_id($job_id);
        $seeker_edu = '';
        $counter = 0;
        if(!empty($seeker_edu_info)){
            $seeker_edu .= "<table border='0' class='table table-striped mb30' cellpadding='0' cellspacing='0' >";   

            foreach ($seeker_edu_info as $key => $value) {
                $degree_val = $this->general_model->getById('dropdown','id',$value->degree)->dropvalue;
                $seeker_edu .="<tr class='success'>";
                $seeker_edu .=  "<td>Education :</td>";
                $seeker_edu .=  "<td>".$key++."</td>";
                $seeker_edu .="</tr>";
                $seeker_edu .="<tr class='success'>";
                $seeker_edu .=  "<td width='170px;'>Degree : </td>";
                $seeker_edu .=  "<td>".$degree_val."</td>";
                $seeker_edu .="</tr>";
                $seeker_edu .="<tr class='success'>";
                $seeker_edu .=  "<td>Name of Degree : </td>";
                $seeker_edu .=  "<td>".$value->faculty."</td>";
                $seeker_edu .="</tr>";
                $seeker_edu .="<tr class='success'>";
                $seeker_edu .=  "<td>Graduation Year : </td>";
                $seeker_edu .=  "<td>".$value->graduationyear."</td>";
                $seeker_edu .="</tr>";
                $seeker_edu .="<tr class='success'>";
                $seeker_edu .=  "<td>Collage/ School : </td>";
                $seeker_edu .=  "<td>".$value->instution."</td>";
                $seeker_edu .="</tr>";
                $seeker_edu .="<tr class='success'>";
                $seeker_edu .=  "<td>Board/ University : </td>";
                $seeker_edu .=  "<td>".$value->board."</td>";
                $seeker_edu .="</tr>";
                $seeker_edu .="<tr class='success'>";
                $seeker_edu .=  "<td>Percentage : </td>";
                $seeker_edu .=  "<td>".$value->percentage."</td>";
                $seeker_edu .= "</tr>";
                $seeker_edu .="<tr>";
                $seeker_edu .="<td colspan='2'></td>";
                $seeker_edu .="</tr>";            
            }   
             $seeker_edu .="</table>";       
        }

        $email = '';
        $email .= $job_info->email;
        if(!empty($job_info->email2)){
            $email .= ','.$job_info->email2;
        }

        $pre_job = '';
        if(!empty($job_info->funcarea1)){
            $prejob1 = $this->general_model->getById('dropdown','id',$job_info->funcarea1);
            if($prejob1){
                $pre_job .= $prejob1->dropvalue;
            }
        }  
        if(!empty($job_info->funcarea2)){
            $pre_job .= ", ";
            $prejob2 = $this->general_model->getById('dropdown','id',$job_info->funcarea2);
            if($prejob2){
                $pre_job .= $prejob2->dropvalue;
            }
        }

        $job_location = '';
        if(!empty($job_info->joblocation)){
            $jobloc1 =  $this->general_model->getById('dropdown','id',$job_info->joblocation);
            if($jobloc1){
                $job_location .=$jobloc1->dropvalue;
            }
        }  
        if(!empty($job_info->joblocation2)){
            $job_location .= ", ";
            $jobloc2 = $this->general_model->getById('dropdown','id',$job_info->joblocation2);
            if($jobloc2){
                $job_location .= $jobloc2->dropvalue;
            }
        }
    
        $total_job = $this->seeker_model->get_applied_job_by_seeker($job_id,'count');
        if($total_job > 0){
          $view_list = $total_job."<a href=".base_url(). "admin/Seeker/seekerJobList/".$job_id."> [View List]</a>";
        }else{
          $view_list = 0;
        }

              $html ='';
              $html .= "<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>";
              $html .= "<thead>";
              $html .= " <tr>";
              $html .= "<th width='30%'></th>";
              $html .= "<th width='70%'></th>";
              $html .= "</tr>";
              $html .= "</thead>";
              $html .= "<tbody>";

              $html .= "<tr>";
              $html .= "<td class='green'>Employee Ref No : </td>";
              $html .= "<td>Globaljob ".$job_info->id."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td colspan='2'><h3 class='green'>Personal Information </h3></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Name : </td>";
              $html .= "<td>".$job_info->fname.''.$job_info->lname."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Date of Birth : </td>";
              $html .= "<td>".$job_info->dd.'-'.$job_info->mm.'-'.$job_info->yy."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Address : </td>";
              $html .= "<td><span class='green-bold'>Current: </span> ".$job_info->currentadd."<br><span class='green-bold'>Permanent: </span> ".$job_info->permanentadd."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Marital Status : </td>";
              $html .= "<td>".$job_info->maritalstatus."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td colspan='2'><h3 class='green'>Login Information </h3></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Username :</td>";
              $html .= "<td>".$job_info->username."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td colspan='2'><h3 class='green'>Contact Information </h3></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>E-Mail :</td>";
              $html .= "<td>".$email."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Contact No :</td>";
              $html .= "<td><span class='green-bold'>(Res): </span> ".$job_info->phoneres."<br><span class='green-bold'>(Cell): </span> ".$job_info->phonecell."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td colspan='2'><h3 class='green'>Educational qualification </h3></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Education Detail :</td>";
              $html .="<td>".$seeker_edu."</td>";  
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td colspan='2'><h3 class='green'>Job Preference </h3></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Preferred Job Titles :</td>";
              $html .= "<td>".$pre_job."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Current Job Title :</td>";
              $html .= "<td></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Key Skills :</td>";
              $html .= "<td>".$job_info->keyskills."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Personal summary :</td>";
              $html .= "<td>".$job_info->summary."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Preferred Location :</td>";
              $html .= "<td>".$job_location."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Present Salary :</td>";
              $html .= "<td>".$job_info->preunit.' '.$job_info->presal.' '."per month (Gross)</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Expected Salary :</td>";
              $html .= "<td>".$job_info->expunit.' '.$job_info->expsal.' '."per month (Gross)</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Job Type :</td>";
              $html .= "<td>".$job_info->keyskills."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td colspan='2'><h3 class='green'>Work Experience </h3></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Years of experience :</td>";
              $html .= "<td>".$job_info->expyrs.' Years'.$job_info->expmths."Months</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Work experience Details :</td>";
              $html .= "<td>".$job_info->keyskills."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Industry Sector :</td>";
              $html .= "<td>".$job_info->keyskills."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Current job title :</td>";
              $html .= "<td>".$job_info->keyskills."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Type of position :</td>";
              $html .= "<td>".$job_info->cjobposiiton."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td></td>";
              $html .= "<td></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Is Locked : </td>";
              $html .= "<td>No</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Is Registered</td>";
              $html .= "<td>Yes</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Last Access : </td>";
              $html .= "<td>".$job_info->modifieddate."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Membership Date</td>";
              $html .= "<td>".$job_info->apdate."</td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>In Basket : </td>";
              $html .= "<td></td>";
              $html .= "</tr>";
              $html .= "<tr>";
              $html .= "<td class='green'>Applied Time(s)</td>";
              $html .= "<td>".$view_list."</td>";
              $html .= "</tr>";
              $html .= "</tbody>";
              $html .= "</table>";

        echo $html;
    }

    public function removeBasket($eid){

        if (!isset($eid))
            redirect(base_url() . 'admin/Seeker');

        if (!is_numeric($eid))
            redirect(base_url() . 'admin/Seeker');


        $this->seeker_model->remove_seeker_basket($eid);
        $this->session->set_flashdata('success', 'Job Seeker Removed From Basket Successfully...');
        redirect(base_url() . 'admin/Seeker/viewJobSekeerBasket', 'refresh');
    }

    public function delete($jobid){

        if (!isset($jobid))
            redirect(base_url() . 'admin/Seeker');

        if (!is_numeric($jobid))
            redirect(base_url() . 'admin/Seeker');

        //Delete related Applications
        $this->general_model->delete('application','sid='.$jobid);
        
        //Delete from checkvalue
        $this->general_model->delete('checkvalue','sid='.$jobid);
        
        //Delete from seeker_basket
        //$this->general_model->delete('seeker_basket','sid='.$jobid);
        
        //Delete from seeker_education
        $this->general_model->delete('seeker_education','sid='.$jobid);
        
        //Delete from seeker_experience
        $this->general_model->delete('seeker_experience','sid='.$jobid);
        
        //Delete from seeker_language
        $this->general_model->delete('seeker_language','sid='.$jobid);
        
        //Delete from seeker_reference
        $this->general_model->delete('seeker_reference','sid='.$jobid);
        
        //Delete from seeker_training
        $this->general_model->delete('seeker_training','sid='.$jobid);

        //Delete From Seeker
        $this->seeker_model->delete_job_seeker($jobid);

        $this->session->set_flashdata('success', 'Job Seeker Deleted Successfully...');
        redirect(base_url() . 'admin/seeker', 'refresh');
    }

    public function view($eid){

        if (!isset($eid))
            redirect(base_url() . 'admin/seeker');

        if (!is_numeric($eid))
            redirect(base_url() . 'admin/seeker');

        $data['title'] = 'VIEW JOB SEEKER';
        $data['page_header'] = 'View Job Seeker ';
        $data['page_header_icone'] = 'fa-user';
        $data['nav'] = 'seeker';
        $data['panel_title'] = 'View Job Seeker  ';
        $data['main'] = 'seeker/view_job_seeker';
        $data['job_seeker_info'] = $this->general_model->getById('seeker','id',$eid);

        $this->load->view('home', $data);
    }

    public function changeSeekerPassword(){
        $job_id = $this->input->post('job_id');
        $new_password = $this->input->post('password');

        $this->seeker_model->update_seeker_password($new_password,$job_id);
        $this->session->set_flashdata('success', 'Job Seeker Password Updated Successfully...');
        redirect(base_url() . 'admin/seeker/view/'.$job_id, 'refresh');
    }

    public function changeActivation($job_id,$activated){

        if (!isset($job_id))
            redirect(base_url() . 'admin/seeker');

        if (!is_numeric($job_id))
            redirect(base_url() . 'admin/seeker');

        $this->seeker_model->update_activation($activated,$job_id);
        $this->session->set_flashdata('success', 'Employer Activation Changed.');
        redirect(base_url() . 'admin/seeker/view/'.$job_id, 'refresh');
    }

    public function moveJobToBasket($job_id){

        if (!isset($job_id))
            redirect(base_url() . 'admin/seeker');

        if (!is_numeric($job_id))
            redirect(base_url() . 'admin/seeker');


        $result = $this->seeker_model->insert_seeker_basket($job_id);
        if($result == TRUE){
            $this->session->set_flashdata('success', 'Job Seeker already Move To Basket');
        }else{
            $this->session->set_flashdata('success', 'Job Seeker has been Move To Basket');
        }   
        redirect(base_url() . 'admin/seeker/view/'.$job_id, 'refresh');
    }

    public function seekerJobList($job_id){
        if (!isset($job_id))
            redirect(base_url() . 'admin/seeker');

        if (!is_numeric($job_id))
            redirect(base_url() . 'admin/seeker');

        $data['title'] = 'APPLIED JOB LIST';
        $data['page_header'] = 'Applied Job List';
        $data['page_header_icone'] = 'fa-user';
        $data['nav'] = 'seeker';
        $data['panel_title'] = 'Applied Job List  ';
        $data['main'] = 'seeker/seeker_applied_job_list';
        $data['applied_job_info'] = $this->seeker_model->get_applied_job_by_seeker($job_id);

        $this->load->view('home', $data);
    }

     public function search(){
         
             $data['total_job_seeker'] = $this->seeker_model->search_seeker_by_param();

             $config['base_url'] = base_url() . 'admin/seeker/search';
             $config['uri_segment'] = 4;
             //$config['per_page'] = 100;
             $config['per_page'] = 10;
             /* Bootstrap Pagination  */
             $config['full_tag_open'] = "<ul class='pagination'>";
             $config['full_tag_close'] ="</ul>";
             $config['num_tag_open'] = '<li>';
             $config['num_tag_close'] = '</li>';
             $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
             $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
             $config['next_tag_open'] = "<li>";
             $config['next_tagl_close'] = "</li>";
             $config['prev_tag_open'] = "<li>";
             $config['prev_tagl_close'] = "</li>";
             $config['first_tag_open'] = "<li>";
             $config['first_tagl_close'] = "</li>";
             $config['last_tag_open'] = "<li>";
             $config['last_tagl_close'] = "</li>";
             /* End of Bootstrap Pagination */

             $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

             $data['seeker'] = $this->seeker_model->search_seeker_by_param($config['per_page'], $page);
             $config['total_rows'] = $data['total_job_seeker'];

             $this->pagination->initialize($config);

             $data['title'] = 'SEARCH RESULT JOB SEEKER';
             $data['page_header'] = 'Search Result Job Seeker';
             $data['page_header_icone'] = 'fa-user';
             $data['nav'] = 'seeker';
             $data['panel_title'] = 'Search Result Job Seeker ';
             $data['salutation'] =$this->general_model->getAll('dropdown','fid = 7','','id,dropvalue');
             $data['functional_area'] =$this->general_model->getAll('dropdown','fid = 9','','id,dropvalue');
             $data['job_title'] =$this->general_model->getAll('jobs','','jobtitle ASC','id,jobtitle,eid,displayname');
             $data['location'] =$this->general_model->getAll('dropdown','fid = 2','dropvalue','id,dropvalue');
             $data['salary_range'] =$this->general_model->getAll('dropdown','fid = 4','','id,dropvalue');
             $data['applied_organisation'] =$this->general_model->getAll('employer','','orgname','id,orgname');
             $data['main'] = 'seeker/search_result_job_seeker';

             $data['fname'] = $this->input->post('fname');
             $data['mname'] = $this->input->post('mname');
             $data['lname'] = $this->input->post('lname');
             $data['dobfrom'] = $this->input->post('dobfrom');
             $data['dobto'] = $this->input->post('dobto');
             $data['address'] = $this->input->post('address');
             $data['phone'] = $this->input->post('phone');
             $data['email'] = $this->input->post('email');
             $data['gender'] = $this->input->post('gender');
             $data['keyskills'] = $this->input->post('keyskills');
             $data['qualification'] = $this->input->post('qualification');
             $data['expyrs'] = $this->input->post('experience_years');
             $data['expsal'] = $this->input->post('expsal');
             $data['apporg'] = $this->input->post('apporg');
             $data['jid'] = $this->input->post('jid');
             $data['registeredfrom'] = $this->input->post('registeredfrom');
             $data['registeredto'] = $this->input->post('registeredto');

             $this->load->view('home', $data);
        

         if(!empty($_POST['excel'])){
             $this->export_to_excel();
         }

    }
    public function export_to_excel(){
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);
        $table_columns = array("Jobseeker Name", "Gender", "DOB",
            "Mobile Number", "Email Address", "Marital Status", "Current Address",
            "Work Experience", "Experience Years",
            "Salary Range", "Job Position",
            "Faculty", "Latest Education Qualification", "Previous Company Associated With",
            "Current Company Associated With");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $jobseeker_data = $this->seeker_model->search_seeker_by_param_for_export();

        $excel_row = 2;
        foreach($jobseeker_data as $row)
        {
            $expsal = $this->general_model->getfieldById('dropdown', 'dropvalue', $row->desired_expected_salary);
            if($expsal==FALSE)
                $expsal = 'N/A';
            $fullname = $row->fname.' '.$row->mname.' '.$row->lname;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $fullname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->gender);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->dob);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->phone_cell);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->marital_status);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->address_current);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->have_work_experience);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->experience_years);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $expsal);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->cjobposiiton);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->faculty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->highest_qualification);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->past_employer);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->current_employer);
            $excel_row++;
        }
        /*print_r($object);
        die();*/
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Jobseeker Data exported on '.date('Y-m-d H:i:s').'.xls"');
        $object_writer->save('php://output');



    }


    public function seeker_applied_job_list($seeker_id){
        if (!isset($seeker_id))
            redirect(base_url() . 'admin/seeker');

        if (!is_numeric($seeker_id))
            redirect(base_url() . 'admin/seeker');

        $data['title'] = 'Applied Job List';
        $data['page_header'] = 'Applied Job List';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'seeker';
        $data['panel_title'] = 'Applied Job List';
        $data['main'] = 'seeker/seeker_applied_job_list';
        $data['applied_job_info'] = $this->seeker_model->get_applied_job_by_seeker($seeker_id);

        $this->load->view('home', $data);
    }

    public function check_login()
    {
        $data['title'] = 'Check Login';
        $data['page_header'] = 'Check Login';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'seeker';
        $data['panel_title'] = 'Check Login';
        $data['main'] = 'core/second_login';
        $this->load->view('home', $data);

    }

    public function not_authorized()
    {
        $data['title'] = 'You are not Authorized';
        $data['page_header'] = 'You are not Authorized';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'dashboard';
        $data['panel_title'] = 'You are not Authorized';
        $data['main'] = 'common/not_authorized';
        $this->load->view('home', $data);      
    }

    /* 
    public function convert_seek_password(){
        $job_info = $this->general_model->getAll('seeker');
        foreach ($job_info as $key => $value) {
            $eid = $value->id;
            $password = $value->password;
            $this->seeker_model->findmeifyoucan($password,$eid);

            echo $key.' Job Seeker password updated.<br>';
        }
    } */
}

/* End of file Seeker.php
 * Location: ./application/modules/admin/controllers/Seeker.php */