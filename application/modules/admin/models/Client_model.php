<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Client_model Model
 * @package Model
 * @subpackage Model
 * Date created:January 24, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */
class Client_model extends CI_Model {

    private $table_clients = 'clients';

    public function __construct() {
        parent::__construct();
    }

    public function get_client_details($limit = NULL, $offset = NULL) {
        $this->db->select();
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get($this->table_clients);  
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_client($logoimage){
        $data = array(
            'clientname' => $this->input->post('clientname'),
            'url' => $this->input->post('website'),
            'image' => $logoimage
            );
        $this->db->insert($this->table_clients,$data);
    }

    public function get_client_by_id($id){
    	$this->db->select();
    	$this->db->where('id',$id);
    	$query = $this->db->get($this->table_clients);
    	if($query->num_rows() == 0){
    		return FALSE;
    	}else {
    		return $query->row();
    	}
    }

    public function update_client($id,$logoimage){
    	$data = array(
    		'clientname' => $this->input->post('clientname'),
            'url' => $this->input->post('website'),
    		);
        if($logoimage){
            $data['image'] = $logoimage;
        }
    	$this->db->where('id',$id);
    	$this->db->update($this->table_clients,$data);
    }

    public function delete_client($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_clients);
    }

}

/* End of file Client_model.php
 * Location: ./application/modules/admin/models/Client_model.php */