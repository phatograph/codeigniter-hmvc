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
  	    'name' => html_escape($this->input->post('name'))
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
	  $data['sizes'] = $this->db->get_where('rent_size', array('rent_id' => $id))->result();

	  $data['page'] = 'rent/ae_machine';
	  $this->load->view('master/admin', $data);
	}

	public function edit_machine_post($id) {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
      $this->db->update('rent', array(
  	    'name' => html_escape($this->input->post('name'))
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
  
  public function add_machine_size($id) {
    $data['machine_id'] = $id;
    
    $data['page'] = 'rent/ae_machine_size';
	  $this->load->view('master/admin', $data);
  }
  
  public function add_machine_size_post($id) {
	  $this->set_validation_rules_size();

    if($this->form_validation->run()) {
	    $this->db->insert('rent_size', array(
  	    'size' => html_escape($this->input->post('size')),
  	    'price_daily_fuel' => html_escape($this->input->post('price_daily_fuel')),
        'price_daily' => html_escape($this->input->post('price_daily')),
        'price_monthly_fuel' => html_escape($this->input->post('price_monthly_fuel')),
        'price_monthly' => html_escape($this->input->post('price_monthly')),
        'note' => html_escape($this->input->post('note')),
        'trans_in' => html_escape($this->input->post('trans_in')),
        'trans_ex' => html_escape($this->input->post('trans_ex')),
        'rent_id' => $id
      ));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/rent/edit_machine/' . $id);
    }
    else {
      $data['machine_id'] = $id;
  	  $data['page'] = 'rent/ae_machine_size';
  	  $this->load->view('master/admin', $data);
    }
  }
	
	public function edit_machine_size($id) {
	  $data['size'] = $this->db->get_where('rent_size', array('id' => $id))->first_row();

	  $data['page'] = 'rent/ae_machine_size';
	  $this->load->view('master/admin', $data);
	}
	
	public function edit_machine_size_post($id) {	  
	  $this->set_validation_rules_size();

    if($this->form_validation->run()) {
	    $this->db->update('rent_size', array(
  	    'size' => html_escape($this->input->post('size')),
  	    'price_daily_fuel' => html_escape($this->input->post('price_daily_fuel')),
        'price_daily' => html_escape($this->input->post('price_daily')),
        'price_monthly_fuel' => html_escape($this->input->post('price_monthly_fuel')),
        'price_monthly' => html_escape($this->input->post('price_monthly')),
        'note' => html_escape($this->input->post('note')),
        'trans_in' => html_escape($this->input->post('trans_in')),
        'trans_ex' => html_escape($this->input->post('trans_ex'))
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/rent/edit_machine/' . $this->input->post('rent_id'));
    }
    else {
      $data['machine_id'] = $id;
  	  $data['page'] = 'rent/ae_machine_size';
  	  $this->load->view('master/admin', $data);
    }
  }
  
  public function delete_machine_size($id) {    
    $size = $this->db->get_where('rent_size', array('id' => $id))->first_row();

    $this->db->delete('rent_size', array('id' => $id));
	  redirect('admin/rent/edit_machine/' . $size->rent_id);
  }
  
  public function add_rent_rule() {
    
  }
  
  public function add_rent_rule_post($id) {
  }
  
  public function edit_rent_rule($id) {
  }
  
  public function edit_rent_rule_post($id) {
  }
  
  public function delete_rent_rule($id) {
  }
	
  private function set_validation_rules() {
    $this->form_validation->set_rules('name','name','trim|required');
    
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข (มากกว่าศูนย์) เท่านั้น');
  }
  
  private function set_validation_rules_size() {
    $this->form_validation->set_rules('size','size','trim|required');
    $this->form_validation->set_rules('price_daily_fuel','price_daily_fuel','trim');
    $this->form_validation->set_rules('price_daily','price_daily','trim');
    $this->form_validation->set_rules('price_monthly_fuel','price_monthly_fuel','trim');
    $this->form_validation->set_rules('price_monthly','price_monthly','trim');
    $this->form_validation->set_rules('note','note','trim');
    $this->form_validation->set_rules('trans_in','trans_in','trim');
    $this->form_validation->set_rules('trans_ex','trans_ex','trim');
    
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข (มากกว่าศูนย์) เท่านั้น');
  }
	
}