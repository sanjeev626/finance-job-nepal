<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Advertisement Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Advertisement extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('advertisement_model');
    }

    public function index(){
        $this->showAdvertisement();
    }

    public function showAdvertisement(){

        $config['base_url'] = base_url() . 'admin/Advertisement';
        $config['uri_segment'] = 3;
        $config['per_page'] = 50;

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

        
        $config['total_rows'] = $this->db->count_all('advertisement');
        $data['advertisement_info'] = $this->advertisement_model->get_advertisement_details($config['per_page'], $page);
        

        $this->pagination->initialize($config);

        $data['title'] = '.:: ADVERTISEMENT ::.';
        $data['page_header'] = 'Advertisement';
        $data['page_header_icone'] = 'fa-hand-o-right';
        $data['nav'] = 'advertisement';
        $data['panel_title'] = 'Advertisement Manager';
        $data['main'] = 'advertisement/advertisement_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = '.:: ADD ADVERTISEMENT ::.';
        $data['page_header'] = 'Advertisement';
        $data['page_header_icone'] = 'fa-hand-o-right';
        $data['nav'] = 'advertisement';
        $data['panel_title'] = 'Add Advertisement ';
        $data['main'] = 'advertisement/add-edit-advertisement';

        $this->load->view('home', $data);
    }

    public function addAdvertisement(){
        $this->form_validation->set_rules('addtitle', 'addtitle', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: ADD ADVERTISEMENT ::.';
            $data['page_header'] = 'Advertisement';
            $data['page_header_icone'] = 'fa-hand-o-right';
            $data['nav'] = 'advertisement';
            $data['panel_title'] = 'Add Advertisement ';
            $data['main'] = 'advertisement/add-edit-advertisement';
            $this->load->view('home', $data);
        } else {
            $this->advertisement_model->insert_advertisement();
            $this->session->set_flashdata('success', 'Advertisement Added Successfully...');
            redirect(base_url() . 'admin/Advertisement', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Advertisement');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Advertisement');

        $data['title'] = '.:: EDIT ADVERTISEMENT ::.';
        $data['page_header'] = 'Advertisement';
        $data['page_header_icone'] = 'fa-hand-o-right';
        $data['nav'] = 'advertisement';
        $data['panel_title'] = 'Edit Advertisement ';
        $data['advertisement_detail'] = $this->advertisement_model->get_advertisement_by_id($id);
        $data['main'] = 'advertisement/add-edit-advertisement';

        $this->load->view('home', $data);
    }

    public function editAdvertisement($id){

        if (!isset($id))
            redirect(base_url() . 'admin/Advertisement');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Advertisement');

         $this->form_validation->set_rules('addtitle', 'addtitle', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: EDIT ADVERTISEMENT ::.';
            $data['page_header'] = 'Advertisement';
            $data['page_header_icone'] = 'fa-hand-o-right';
            $data['nav'] = 'advertisement';
            $data['panel_title'] = 'Edit Advertisement ';
            $data['advertisement_detail'] = $this->advertisement_model->get_advertisement_by_id($id);
            $data['main'] = 'advertisement/add-edit-advertisement';
            $this->load->view('home', $data);
        } else {
            $this->advertisement_model->update_advertisement($id);
            $this->session->set_flashdata('success', 'Advertisement Update Successfully...');
            redirect(base_url() . 'admin/Advertisement', 'refresh');
        }
    }

    public function deleteAdvertisement($id){
        if (!isset($id))
            redirect(base_url() . 'admin/Advertisement');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Advertisement');

        $this->advertisement_model->delete_advertisement($id);
        $this->session->set_flashdata('success', 'Advertisement Deleted Successfully...');
        redirect(base_url() . 'admin/Advertisement', 'refresh');
    }

}

/* End of file Advertisement.php
 * Location: ./application/modules/admin/Advertisement/v.php */