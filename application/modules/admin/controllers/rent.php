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
	
}