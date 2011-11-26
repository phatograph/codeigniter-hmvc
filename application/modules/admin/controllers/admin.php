<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
	public function home() {
	  $data['page'] = 'home';
	  $this->load->view('master/admin', $data);
	}

	public function rent() {
	  $data['page'] = 'rent';
	  $this->load->view('master/admin', $data);
	}
	
}