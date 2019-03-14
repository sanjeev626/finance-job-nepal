<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Slider Controller
 * @package Controller
 * @subpackage Controller
 * Date created:February 16, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Slider extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('slider_model');
    }

    public function index(){
        $this->showSlider();
    }

    public function showSlider(){

        $data['slider_info'] = $this->slider_model->get_slider_details();
        $data['title'] = '.:: BANNER ::.';
        $data['page_header'] = 'Banner';
        $data['page_header_icone'] = 'fa-image';
        $data['nav'] = 'banner';
        $data['panel_title'] = 'Banner Manager';
        $data['type'] = '';
        $data['main'] = 'slider/slider_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function listslider($type)
    {

        $data['slider_info'] = $this->slider_model->get_slider_details_by_type($type);
        $data['title'] = '.:: BANNER ::.';
        $data['page_header'] = 'Banner';
        $data['page_header_icone'] = 'fa-image';
        $data['nav'] = 'banner';
        $data['panel_title'] = 'Banner Manager';
        $data['type'] = $type;
        $data['main'] = 'slider/slider_manager_view';

        $this->load->view('admin/home', $data);

    }

    public function add(){
        $data['title'] = '.:: ADD BANNER ::.';
        $data['page_header'] = 'Banner';
        $data['page_header_icone'] = 'fa-image';
        $data['nav'] = 'banner';
        $data['panel_title'] = 'Add Banner ';
        $data['main'] = 'slider/add-edit-slider';

        $this->load->view('home', $data);
    }

    public function addSlider(){
        $a = $_FILES['sliderimage']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/slider/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['sliderimage']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('sliderimage');
                $upload_data = $this->upload->data();
                $sliderimage = $upload_data['file_name'];
            }

            if(!isset($sliderimage))  $sliderimage = '';

            $this->slider_model->insert_slider($sliderimage);
            $this->session->set_flashdata('success', 'Banner Added Successfully...');
            redirect(base_url() . 'admin/Slider', 'refresh');

    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Slider');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Slider');

        $data['title'] = '.:: EDIT BANNER ::.';
        $data['page_header'] = 'Banner';
        $data['page_header_icone'] = 'fa-image';
        $data['nav'] = 'banner';
        $data['panel_title'] = 'Edit Banner ';
        $data['slider_detail'] = $this->slider_model->get_slider_by_id($id);
        $data['main'] = 'slider/add-edit-slider';

        $this->load->view('home', $data);
    }

    public function editSlider($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Slider');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Slider');

            $a = $_FILES['sliderimage']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/slider/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['sliderimage']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('sliderimage');
                $upload_data = $this->upload->data();
                $sliderimage = $upload_data['file_name'];
            }

            if(!isset($sliderimage))  $sliderimage = '';
			
			$sliderimage2 = '';
			if (isset($_FILES['sliderimage2']['name']) && $_FILES['sliderimage2']['name'] !== "") {
				$config['upload_path'] = './././uploads/slider/';
				$config['log_threshold'] = 1;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '100000'; // 0 = no file size limit
				$config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['sliderimage2']['name']));
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->do_upload('sliderimage2');
				$upload_data = $this->upload->data();
				$sliderimage2 = $upload_data['file_name'];
			}
			
			$sliderimage3 = '';
			if (isset($_FILES['sliderimage3']['name']) && $_FILES['sliderimage3']['name'] !== "") {
				$config['upload_path'] = './././uploads/slider/';
				$config['log_threshold'] = 1;
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '100000'; // 0 = no file size limit
				$config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['sliderimage3']['name']));
				$config['overwrite'] = false;
				$this->load->library('upload', $config);
				$this->upload->do_upload('sliderimage3');
				$upload_data = $this->upload->data();
				$sliderimage3 = $upload_data['file_name'];
			}			

            $this->slider_model->update_slider($id,$sliderimage,$sliderimage2,$sliderimage3);
            $this->session->set_flashdata('success', 'Banner Update Successfully...');
            redirect(base_url() . 'admin/Slider/edit/'.$id, 'refresh');

    }

    public function deleteSlider($id){
        if (!isset($id))
            redirect(base_url() . 'admin/Slider');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Slider');

        $this->slider_model->delete_slider($id);
        $this->session->set_flashdata('success', 'Banner Deleted Successfully...');
        redirect(base_url() . 'admin/Slider', 'refresh');
    }

    public function deleteSliderImage($id,$sliderimage){
        if (!isset($id))
            redirect(base_url() . 'admin/Slider');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Slider');

        $row = $this->slider_model->get_slider_by_id($id);
        //print_r($row);
        //echo $id." --- ".$sliderimage;
        if($sliderimage=="sliderimage2"){
            $data['sliderimage2'] = "";
            $imagename = $row->sliderimage2;
        }
        if($sliderimage=="sliderimage3"){
            $data['sliderimage3'] = "";
            $imagename = $row->sliderimage3;
        }
        echo $imagename;
        $unlink_path = './././uploads/slider/'.$imagename;
        @unlink($unlink_path);

        $this->db->where('id',$id);
        $this->db->update('slider',$data);

        //print_r($data);

        //$this->slider_model->remove_slider_image($id,$sliderimage);
        $this->session->set_flashdata('success', 'Image removed Successfully...');
        redirect(base_url() . 'admin/Slider/edit/'.$id, 'refresh');
    }

    function updateordering($type)
    {
        for($i=0;$i<count($this->input->post('ordering'));$i++)
        {         
            $temp_banner_id = $this->input->post("banner_id");
            $temp_ordering = $this->input->post("ordering");
            $id = $temp_banner_id[$i];
            $data="";
            $data['ordering'] = $temp_ordering[$i];
            $this->db->where('id',$id);
            $this->db->update('slider',$data);   
        }

        $this->session->set_flashdata('success', 'Ordering updated Successfully...');
        redirect(base_url() . 'admin/Slider/listslider/'.$type, 'refresh');
    }

}

/* End of file Slider.php
 * Location: ./application/modules/admin/controllers/Slider.php */
