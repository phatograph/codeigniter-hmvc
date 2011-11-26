<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
	public function index() {
	  $data['text'] = $this->db->get('home')->first_row();
	  
		$this->load->view('master/site', $data);
	}
	
}