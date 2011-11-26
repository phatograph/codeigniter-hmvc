<?php

class Authen_model extends CI_Model {
  
  function __construct() {
    parent::__construct();
  }
  
  function is_signed_in() {
      $is_signed_in = $this->session->userdata('is_signed_in');
      if(!isset($is_signed_in) || $is_signed_in != TRUE) {
          //$this->session->set_flashdata('message', 'Please Sign in to Administrator area');
          redirect('admin/authen');
      }
  }
  
}