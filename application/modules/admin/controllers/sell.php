<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }

	public function index() {
	  $data['machines'] = $this->db->get('sell');
	  
	  $data['page'] = 'sell/index';
	  $this->load->view('master/admin', $data);
	}
	
	public function add() {
	  $data['page'] = 'sell/add';
	  $this->load->view('master/admin', $data);
	}
	
	public function post() {
    $result = $this->image_model->add_image();

    if($result['success'] == 1) {
      $this->session->set_flashdata('message', 'HUYA');
      redirect('admin/sell/add');
    }
    else {
      $this->session->set_flashdata('message', $result['error']['error']);
      redirect('admin/sell/add');
    }
	}
	
	public function add_machine() {
	  $data['page'] = 'sell/ae_machine';
	  $this->load->view('master/admin', $data);
	}
	
	public function add_machine_post() {
	  $this->set_validation_rules();
	  
    if($this->form_validation->run()) {
	    $this->db->insert('sell', array(
  	    'name' => html_escape($this->input->post('name')),
  	    'price' => html_escape($this->input->post('price'))
      ));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/sell');
    }
    else {
  	  $data['page'] = 'sell/ae_machine';
  	  $this->load->view('master/admin', $data);
    }
	}
	
	public function edit_machine($id) {
	  $data['machine'] = $this->db->get_where('sell', array('id' => $id))->first_row();

	  $data['page'] = 'sell/ae_machine';
	  $this->load->view('master/admin', $data);
	}
	
	public function edit_machine_post($id) {
	  $this->set_validation_rules();
    
    if($this->form_validation->run()) {
      $this->db->update('sell', array(
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price')
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
  	  //redirect('admin/sell/edit_machine/' . $id);
  	  redirect('admin/sell');
    }
    else {
  	  $data['machine']->id = $id;
  	  
  	  $data['page'] = 'sell/ae_machine';
  	  $this->load->view('master/admin', $data);
    }
  }
  
  public function delete_machine($id) {
    $this->db->delete('sell', array('id' => $id));
	  redirect('admin/sell/');
  }
  
  private function set_validation_rules() {
    $this->form_validation->set_rules('name','name','trim|required');
    $this->form_validation->set_rules('price','price','trim|required|is_natural');
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข (มากกว่าศูนย์) เท่านั้น');
  }
	
}