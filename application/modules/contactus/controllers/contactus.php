<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
  var $pageName = 'ติดต่อเรา';
  
	public function index() {
	  $data['maps'] = $this->db->get('contactus');
	  
    $data['breadcrumb'] = array(
      $this->pageName
    );
	  
		$this->load->view('master/site', $data);
	}
	
}