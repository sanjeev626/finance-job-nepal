<?php defined('BASEPATH') OR exit('No direct script access allowed');



/**
 * Admin Slider_model Model
 * @package Model
 * @subpackage Model
 * Date created:February 16, 2017
 * @author Digital Agency Catmandu <info@dac.com.np>
 */

class Slider_model extends CI_Model {



    private $table_slider = 'slider';



    public function __construct() {

        parent::__construct();

    }



    public function get_slider_details() {

        $this->db->select();

        $this->db->order_by('type', 'DESC');

        $query = $this->db->get($this->table_slider);

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result();

        }

    }



    public function get_slider_details_by_type($type) {

        $this->db->select();

        $this->db->where("type",$type);

        $this->db->order_by('ordering', 'ASC');

        $query = $this->db->get($this->table_slider);

        if ($query->num_rows() == 0) {

            return FALSE;

        } else {

            return $query->result();

        }

    }



    public function insert_slider($image){

        $data = array(

            'title' => $this->input->post('title'),

            'sliderimage' => $image,

            'link' =>$this->input->post('link'),

            'type' => $this->input->post('type'),

            'status' => $this->input->post('status')

            );

        $this->db->insert($this->table_slider,$data);

    }



    public function get_slider_by_id($id){

    	$this->db->select();

    	$this->db->where('id',$id);

    	$query = $this->db->get($this->table_slider);

    	if($query->num_rows() == 0){

    		return FALSE;

    	}else {

    		return $query->row();

    	}

    }



    public function update_slider($id,$image,$sliderimage2,$sliderimage3){



    	$data = array(

            'title' => $this->input->post('title'),

            'link' =>$this->input->post('link'),

            'type' => $this->input->post('type'),

            'status' => $this->input->post('status')

    		);

        if($image){

            $data['sliderimage'] = $image;

        }

        if($sliderimage2){

            $data['sliderimage2'] = $sliderimage2;

        }

        if($sliderimage3){

            $data['sliderimage3'] = $sliderimage3;

        }

    	$this->db->where('id',$id);

    	$this->db->update($this->table_slider,$data);

    }



    public function delete_slider($id){

        $this->db->where('id',$id);

        $this->db->delete($this->table_slider);

    }



}



/* End of file Slider_model.php

 * Location: ./application/modules/admin/models/Slider_model.php */

