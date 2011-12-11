<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }

	public function index() {
	  $data['machines'] = $this->db->get('rent');
	  
	  $data['page'] = 'rent/index';
	  $this->load->view('master/admin', $data);
	}

	public function add_machine() {
	  $data['page'] = 'rent/ae_machine';
	  $this->load->view('master/admin', $data);
	}

	public function add_machine_post() {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
	    $this->db->insert('rent', array(
  	    'name' => html_escape($this->input->post('name')),
  	    'price_daily_fuel' => html_escape($this->input->post('price_daily_fuel')),
  	    'price_daily' => html_escape($this->input->post('price_daily')),
  	    'price_monthly_fuel' => html_escape($this->input->post('price_monthly_fuel')),
  	    'price_monthly' => html_escape($this->input->post('price_monthly')),
  	    'note' => html_escape($this->input->post('note'))
      ));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/rent');
    }
    else {
  	  $data['page'] = 'rent/ae_machine';
  	  $this->load->view('master/admin', $data);
    }
	}
	
	public function edit_machine($id) {
	  $data['machine'] = $this->db->get_where('rent', array('id' => $id))->first_row();

	  $data['page'] = 'rent/ae_machine';
	  $this->load->view('master/admin', $data);
	}

	public function edit_machine_post($id) {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
      $this->db->update('rent', array(
  	    'name' => html_escape($this->input->post('name')),
  	    'price_daily_fuel' => html_escape($this->input->post('price_daily_fuel')),
  	    'price_daily' => html_escape($this->input->post('price_daily')),
  	    'price_monthly_fuel' => html_escape($this->input->post('price_monthly_fuel')),
  	    'price_monthly' => html_escape($this->input->post('price_monthly')),
  	    'note' => html_escape($this->input->post('note'))
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
  	  //redirect('admin/sell/edit_machine/' . $id);
  	  redirect('admin/rent');
    }
    else {
  	  $data['machine']->id = $id;

  	  $data['page'] = 'rent/ae_machine';
  	  $this->load->view('master/admin', $data);
    }
  }

  public function delete_machine($id) {
    $this->db->delete('rent', array('id' => $id));
	  redirect('admin/rent/');
  }
	
  private function set_validation_rules() {
    $this->form_validation->set_rules('name','name','trim|required');
    $this->form_validation->set_rules('price_daily_fuel','price_daily_fuel','trim|required|is_natural');
    $this->form_validation->set_rules('price_daily','price_daily','trim|required|is_natural');
    $this->form_validation->set_rules('price_monthly_fuel','price_monthly_fuel','trim|required|is_natural');
    $this->form_validation->set_rules('price_monthly','price_monthly','trim|required|is_natural');
    $this->form_validation->set_rules('note','note','trim');
    
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข (มากกว่าศูนย์) เท่านั้น');
  }
	
}