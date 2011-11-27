<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }

	public function index() {
	  $data['page'] = 'rent';
	  $this->load->view('master/admin', $data);
	}
	
}