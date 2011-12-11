<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
	public function index() {
	  $this->db->select('s.id, s.name, si.id as imgid, si.name as imgname');
	  $this->db->from('sell s');
    $this->db->join('sell_image si', 'si.sell_id = s.id', 'left');
	  $query = $this->db->get()->result();
	  
	  $data['machines'] = array();
	  
	  foreach($query as $m) {
	    $data['machines'][$m->id]->id = $m->id;
	    $data['machines'][$m->id]->name = $m->name;
	    if($m->imgname) {
	      $data['machines'][$m->id]->img[$m->imgid]->imgid = $m->imgid;
	      $data['machines'][$m->id]->img[$m->imgid]->imgname = $m->imgname;
      }
	  }
	  
	  fb($data);
	  
		$this->load->view('master/site', $data);
	}
	
}