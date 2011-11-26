<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
	public function index() {
	  $this->load->view('master/site');
	}
	
}