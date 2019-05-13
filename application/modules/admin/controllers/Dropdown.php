<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dropdown Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Dropdown extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dropdown_model');
    }

    public function index(){

        $data['title'] = '.:: DROPDOWN FIELD ::.';
        $data['page_header'] = 'Dropdown Field';
        $data['page_header_icone'] = 'fa-caret-square-o-down';
        $data['nav'] = 'dropdown';
        $data['panel_title'] = 'Dropdown Field ';
        $data['main'] = 'dropdown/dropdown_manager_view';
        $data['dropdown'] = $this->dropdown_model->get_all_dropdown_field();
        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = '.:: ADD DROPDOWN FIELD ::.';
        $data['page_header'] = 'Dropdown Field';
        $data['page_header_icone'] = 'fa-caret-square-o-down';
        $data['nav'] = 'dropdown';
        $data['panel_title'] = 'Add Dropdown Field ';
        $data['main'] = 'dropdown/add-edit-dropdown';
        $data['dropdown'] = $this->dropdown_model->get_all_dropdown_field();

        $this->load->view('home', $data);
    }

    public function addDropdown(){
        $this->form_validation->set_rules('dropvalue', 'dropvalue', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: ADD DROPDOWN FIELD ::.';
            $data['page_header'] = 'Dropdown Field';
            $data['page_header_icone'] = 'fa-caret-square-o-down';
            $data['nav'] = 'dropdown';
            $data['panel_title'] = 'Add Dropdown Field ';
            $data['main'] = 'dropdown/add-edit-dropdown';
            $data['dropdown'] = $this->dropdown_model->get_all_dropdown_field();
            $this->load->view('home', $data);
        } else {
            $this->dropdown_model->insert_dropdown();
            $this->session->set_flashdata('success', 'Dropdown Field Added Successfully...');
            redirect(base_url() . 'admin/dropdown', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/dropdown');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/dropdown');

        $data['title'] = '.:: EDIT DROPDOWN FIELD ::.';
        $data['page_header'] = 'Dropdown';
        $data['page_header_icone'] = 'fa-caret-square-o-down';
        $data['nav'] = 'dropdown';
        $data['panel_title'] = 'Edit Dropdown Field ';
        $data['dropdown_detail'] = $this->dropdown_model->get_dropdown_by_id($id);
        $data['main'] = 'dropdown/add-edit-dropdown';
        $data['dropdown'] = $this->dropdown_model->get_all_dropdown_field();

        $this->load->view('home', $data);
    }

    public function editDropdown($id){

        if (!isset($id))
            redirect(base_url() . 'admin/dropdown');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/dropdown');

         $this->form_validation->set_rules('dropvalue', 'dropvalue', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = '.:: EDIT DROPDOWN FIELD ::.';
            $data['page_header'] = 'Dropdown';
            $data['page_header_icone'] = 'fa-caret-square-o-down';
            $data['nav'] = 'dropdown';
            $data['panel_title'] = 'Edit Dropdown Field ';
            $data['dropdown_detail'] = $this->dropdown_model->get_dropdown_by_id($id);
            $data['main'] = 'dropdown/add-edit-dropdown';
            $this->load->view('home', $data);
        } else {
            $this->dropdown_model->update_dropdown($id);
            $this->session->set_flashdata('success', 'Dropdown Field Update Successfully...');
            redirect(base_url() . 'admin/dropdown', 'refresh');
        }
    }

    public function deleteDropdown($id){
        if (!isset($id))
            redirect(base_url() . 'admin/dropdown');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/dropdown');

        $this->dropdown_model->delete_dropdown($id);
        $this->session->set_flashdata('success', 'Dropdown Field Deleted Successfully...');
        redirect(base_url() . 'admin/dropdown', 'refresh');
    }

}

/* End of file Dropdown.php
 * Location: ./application/modules/admin/Dropdown/v.php */