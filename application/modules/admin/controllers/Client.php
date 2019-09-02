<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Client Controller
 * @package Controller
 * @subpackage Controller
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Client extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
    }

    public function index(){
        $this->showClient();
    }

    public function showClient(){

        $config['base_url'] = base_url() . 'admin/client';
        $config['uri_segment'] = 3;
        $config['per_page'] = 50 ;

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

        
        //$config['total_rows'] = $this->db->count_all('clients');
        $data['client_info'] = $this->client_model->get_client_details($config['per_page'], $page);
        

        $this->pagination->initialize($config);

        $data['title'] = 'CLIENT';
        $data['page_header'] = 'Client';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'client';
        $data['panel_title'] = 'Client Manager';
        $data['main'] = 'client/client_manager_view';

        $this->load->view('admin/home', $data);
    }

    public function add(){
        $data['title'] = 'ADD CLIENT';
        $data['page_header'] = 'Client';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'client';
        $data['panel_title'] = 'Add Client ';
        $data['main'] = 'client/add-edit-client';

        $this->load->view('home', $data);
    }

    public function addClient(){
        $this->form_validation->set_rules('clientname', 'clientname', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = 'ADD CLIENT';
            $data['page_header'] = 'Client';
            $data['page_header_icone'] = 'fa-user-secret';
            $data['nav'] = 'client';
            $data['panel_title'] = 'Add Client ';
            $data['main'] = 'client/add-edit-client';
            $this->load->view('home', $data);
        } else {
            
            $a = $_FILES['clientImage']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/clients/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['clientImage']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('clientImage');
                $upload_data = $this->upload->data();
                $logoimage = $upload_data['file_name'];
            }

            if(!isset($logoimage))  $logoimage = '';
            
            $this->client_model->insert_client($logoimage);
            $this->session->set_flashdata('success', 'Client Added Successfully...');
            redirect(base_url() . 'admin/client', 'refresh');
        }
    }

    public function edit($id){

        if (!isset($id))
            redirect(base_url() . 'admin/client');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/client');

        $data['title'] = 'EDIT CLIENT';
        $data['page_header'] = 'Client';
        $data['page_header_icone'] = 'fa-user-secret';
        $data['nav'] = 'client';
        $data['panel_title'] = 'Edit Client ';
        $data['client_detail'] = $this->client_model->get_client_by_id($id);
        $data['main'] = 'client/add-edit-client';

        $this->load->view('home', $data);
    }

    public function editClient($id){

        if (!isset($id))
            redirect(base_url() . 'admin/client');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/client');

         $this->form_validation->set_rules('clientname', 'clientname', 'required');
        if (FALSE == $this->form_validation->run()) {
            $data['title'] = 'EDIT CLIENT';
            $data['page_header'] = 'Client';
            $data['page_header_icone'] = 'fa-user-secret';
            $data['nav'] = 'client';
            $data['panel_title'] = 'Edit Client ';
            $data['client_detail'] = $this->client_model->get_client_by_id($id);
            $data['main'] = 'client/add-edit-client';
            $this->load->view('home', $data);
        } else {
            
            $a = $_FILES['clientImage']['name'];

            if ($a !== "") {
                $config['upload_path'] = './././uploads/clients/';
                $config['log_threshold'] = 1;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '100000'; // 0 = no file size limit
                $config['file_name'] = rand(1111,9999).str_replace(" ","_",strtolower($_FILES['clientImage']['name']));
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('clientImage');
                $upload_data = $this->upload->data();
                $logoimage = $upload_data['file_name'];
            }

            if(!isset($logoimage))  $logoimage = '';
            
            $this->client_model->update_client($id,$logoimage);
            $this->session->set_flashdata('success', 'Client Update Successfully...');
            redirect(base_url() . 'admin/client', 'refresh');
        }
    }

    public function deleteClient($id){
        if (!isset($id))
            redirect(base_url() . 'admin/Client');

        if (!is_numeric($id))
            redirect(base_url() . 'admin/Client');

        $this->client_model->delete_client($id);
        $this->session->set_flashdata('success', 'Client Deleted Successfully...');
        redirect(base_url() . 'admin/client', 'refresh');
    }

    public function changeorderno(){
        $id = $_POST['id'];
        $orderno = $_POST['orderno'];
        $this->client_model->editorderno($id,$orderno);
        exit;
    }

}

/* End of file Client.php
 * Location: ./application/modules/admin/controllers/v.php */
