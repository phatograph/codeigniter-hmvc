<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }
  
	public function home() {
	  $data['text'] = $this->db->get('home')->first_row();
	  
	  $data['page'] = 'home';
	  $this->load->view('master/admin', $data);
	}
	
	public function home_post() {
	  $this->form_validation->set_rules('text','ข้อความ','trim|required');
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
	  
    if($this->form_validation->run()) {
	    $this->db->update('home', array(
  	    'text' => html_escape($this->input->post('text', TRUE))
      ));
      $this->session->set_flashdata('message', 'done');
    }
    else {
      $this->session->set_flashdata('message', validation_errors());
    }
	  redirect('admin/home');
	}

	public function rent() {
	  $data['page'] = 'rent';
	  $this->load->view('master/admin', $data);
	}
	
	public function authen() {
	  $data['page'] = 'authen';
	  $this->load->view('master/admin', $data);
	}
	
}