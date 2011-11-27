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
	
	public function post() {
    $result = $this->image_model->add_image();

    if($result['success'] == 1) {
      $this->session->set_flashdata('message', 'HUYA');
      redirect('admin/rent');
    }
    else {
      $this->session->set_flashdata('message', $result['error']['error']);
      redirect('admin/rent');
    }
	}
	
}