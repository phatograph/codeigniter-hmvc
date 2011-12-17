<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authen extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
	
	public function index() {
	  $data['hide'] = true;
	  $data['page'] = 'authen';
	  $this->load->view('master/admin', $data);
	}
	
	public function login_post() {
    $this->db->where('username', $this->input->post('username', true));
    $this->db->where('password', md5($this->input->post('password', true)));
    
    if($this->db->get('user')->num_rows() == 1) {
	    $data = array(
        'username' => $this->input->post('username', true),
        'is_signed_in' => true
      );
      $this->session->set_userdata($data);
      redirect('admin/home');
    }
    else {
      $this->session->set_flashdata('loginerror', 'Username และ/หรือ Password ไม่ถูกต้อง');
      redirect('admin/authen');
    }
	}
	
	public function logout() {	  
		$this->session->sess_destroy();
		redirect('/');
	}
	
}