<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }

	public function index() {
	  $data['machines'] = $this->db->get('rent');
    $this->db->flush_cache();
	  $data['rules'] = $this->db->get('rent_rule');
    $this->db->flush_cache();
	  
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
  	    'name' => html_escape($this->input->post('name', true))
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
    $this->db->flush_cache();
	  $data['sizes'] = $this->db->get_where('rent_size', array('rent_id' => $id))->result();
    $this->db->flush_cache();

	  $data['page'] = 'rent/ae_machine';
	  $this->load->view('master/admin', $data);
	}

	public function edit_machine_post($id) {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
      $this->db->update('rent', array(
  	    'name' => html_escape($this->input->post('name', true))
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
  	    'size' => html_escape($this->input->post('size', true)),
  	    'price_daily_fuel' => html_escape($this->input->post('price_daily_fuel', true)),
        'price_daily' => html_escape($this->input->post('price_daily', true)),
        'price_monthly_fuel' => html_escape($this->input->post('price_monthly_fuel', true)),
        'price_monthly' => html_escape($this->input->post('price_monthly', true)),
        'note' => html_escape($this->input->post('note', true)),
        'trans_in' => html_escape($this->input->post('trans_in', true)),
        'trans_ex' => html_escape($this->input->post('trans_ex', true)),
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
  	    'size' => html_escape($this->input->post('size', true)),
  	    'price_daily_fuel' => html_escape($this->input->post('price_daily_fuel', true)),
        'price_daily' => html_escape($this->input->post('price_daily', true)),
        'price_monthly_fuel' => html_escape($this->input->post('price_monthly_fuel', true)),
        'price_monthly' => html_escape($this->input->post('price_monthly', true)),
        'note' => html_escape($this->input->post('note', true)),
        'trans_in' => html_escape($this->input->post('trans_in', true)),
        'trans_ex' => html_escape($this->input->post('trans_ex', true))
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/rent/edit_machine/' . $this->input->post('rent_id', true));
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
	  $data['page'] = 'rent/ae_rent_rule';
	  $this->load->view('master/admin', $data);
  }
  
  public function add_rent_rule_post() {
    $this->set_validation_rules_rule();

    if($this->form_validation->run()) {
	    $this->db->insert('rent_rule', array(
  	    'rule' => html_escape($this->input->post('rule', true))
      ));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/rent');
    }
    else {
  	  $data['page'] = 'rent/ae_rent_rule';
  	  $this->load->view('master/admin', $data);
    }
  }
  
  public function edit_rent_rule($id) {
	  $data['rule'] = $this->db->get_where('rent_rule', array('id' => $id))->first_row();

	  $data['page'] = 'rent/ae_rent_rule';
	  $this->load->view('master/admin', $data);
  }
  
  public function edit_rent_rule_post($id) {    
    $this->set_validation_rules_rule();

    if($this->form_validation->run()) {
	    $this->db->update('rent_rule', array(
  	    'rule' => html_escape($this->input->post('rule', true))
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/rent');
    }
    else {
  	  $data['page'] = 'rent/ae_rent_rule';
  	  $this->load->view('master/admin', $data);
    }
  }
  
  public function delete_rent_rule($id) {
    $this->db->delete('rent_rule', array('id' => $id));
	  redirect('admin/rent/');
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
  
  private function set_validation_rules_rule() {
    $this->form_validation->set_rules('rule','rule','trim|required');
    
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข (มากกว่าศูนย์) เท่านั้น');
  }
	
}