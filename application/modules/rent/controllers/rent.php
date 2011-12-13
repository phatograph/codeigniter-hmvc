<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
  var $pageName = 'ราคาเช่าเครื่องจักร';
  
	public function index() {
	  $data['breadcrumb'] = array(
      $this->pageName
    );
    
	  $this->load->view('master/site', $data);
	}
	
}