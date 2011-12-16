<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }

	public function index() {
	  $data['maps'] = $this->db->get('contactus');
	  
	  $data['page'] = 'contactus/index';
	  $this->load->view('master/admin', $data);
	}
	
	public function add_map () {
	  $data['page'] = 'contactus/ae_map';
	  $this->load->view('master/admin', $data);
	}
	
	public function add_map_post () {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
	    $this->db->insert('contactus', array(
  	    'info' => $this->input->post('info')
      ));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/contactus');
    }
    else {
  	  $data['page'] = 'contactus/ae_map';
  	  $this->load->view('master/admin', $data);
    }
	}
	
	public function edit_map_info ($id) {
	  $data['map'] = $this->db->get_where('contactus', array('id' => $id))->first_row();
	  
	  fb($data);
	  $data['page'] = 'contactus/ae_map';
	  $this->load->view('master/admin', $data);
	}
	
	public function edit_map_info_post ($id) {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
	    $this->db->update('contactus', array(
  	    'info' => $this->input->post('info')
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/contactus');
    }
    else {
  	  $data['page'] = 'contactus/ae_map';
  	  $this->load->view('master/admin', $data);
    }
	}
	
	public function edit_map_image ($id) {
	  $data['map'] = $this->db->get_where('contactus', array('id' => $id))->first_row();
	  
	  $data['page'] = 'contactus/ae_map_image';
	  $this->load->view('master/admin', $data);
	}
	
	public function edit_map_image_post ($id) {
	  $result = $this->image_model->add_image();

    if($result['success'] == 1) {  
      $map = $this->db->get_where('contactus', array('id' => $id))->first_row();
      if($map->image) {
        if(file_exists('./' . $this->image_model->upload_path . $map->image)) {
          unlink('./' . $this->image_model->upload_path . $map->image); 
        }
        if(file_exists('./' . $this->image_model->upload_path . 'thumb_120x120/' . $map->image)) {
          unlink('./' . $this->image_model->upload_path . 'thumb_120x120/' . $map->image);
        }
      }
        
	    $this->db->update('contactus', array(
  	    'image' => $result['image_data']['file_name']
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
    }
    else {
      $this->session->set_flashdata('message', $result['error']['error']);
    }  
    redirect('admin/contactus/edit_map_image/' . $id);
	}
	
	public function delete_map ($id) {
	  $this->db->delete('contactus', array('id' => $id));
	  redirect('admin/contactus/');
	}

  private function set_validation_rules() {
    $this->form_validation->set_rules('info','info','trim|required');

    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข (มากกว่าศูนย์) เท่านั้น');
  }
	
}