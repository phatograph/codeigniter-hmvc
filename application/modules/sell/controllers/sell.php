<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
	public function index() {
	  //$this->db->distinct();
	  $this->db->select('s.name, si.name as siname');
	  $this->db->from('sell s');
	  //$this->db->group_by("name"); 
    $this->db->join('sell_image si', 'si.sell_id = s.id');
	  $data['machines'] = $this->db->get()->result();
	  
	  fb($data);
	  
	  //$q = $this->db->query('SELECT l.id AS l__id, l.name AS l__name, t.id AS t__id, t.name AS t__name FROM sell l LEFT JOIN sell_image t ON l.id = t.sell_id');
    //fb($q->result());
	  
		//$this->load->view('master/site', $data);
	}
	
}