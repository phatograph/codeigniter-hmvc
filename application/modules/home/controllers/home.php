<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
	public function index() {
	  $data['test'] = $this->db->get('home');
		$this->load->view('index', $data);
	}
	
}