<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
	public function index() {
	  $this->db->select('s.id, s.name, s.*, si.id as imgid, si.name as imgname');
	  $this->db->from('sell s');
    $this->db->join('sell_image si', 'si.sell_id = s.id', 'left');
	  $query = $this->db->get()->result();
	  
	  $data['machines'] = array();
	  
	  foreach($query as $m) {
	    $data['machines'][$m->id]->id = $m->id;
	    $data['machines'][$m->id]->name = $m->name;
	    $data['machines'][$m->id]->brand = $m->brand;
	    $data['machines'][$m->id]->serial = $m->serial;
	    $data['machines'][$m->id]->hour = $m->hour;
	    $data['machines'][$m->id]->price = $m->price;
	    $data['machines'][$m->id]->note = $m->note;
	    if($m->imgname) {
	      $data['machines'][$m->id]->img[$m->imgid]->imgid = $m->imgid;
	      $data['machines'][$m->id]->img[$m->imgid]->imgname = $m->imgname;
      }
	  }
	  
		$this->load->view('master/site', $data);
	}
	
}