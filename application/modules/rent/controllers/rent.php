<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
  var $pageName = 'ราคาเช่าเครื่องจักร';
  
	public function index() {
	  $this->db->select('r.id, r.name, rs.id as rsid, rs.size, rs.price_daily_fuel, rs.price_daily, rs.price_monthly_fuel, rs.price_monthly, rs.note, rs.trans_in, rs.trans_ex');
	  $this->db->from('rent r');
    $this->db->join('rent_size rs', 'rs.rent_id = r.id', 'left');
	  $query = $this->db->get()->result();
	  
	  $data['sizes'] = array();
	  
	  
	  foreach($query as $m) {
	    $data['machines'][$m->id]->id = $m->id;
	    $data['machines'][$m->id]->name = $m->name;
	    if($m->size) {
	      $data['machines'][$m->id]->sizes[$m->rsid]->rsid = $m->rsid;
	      $data['machines'][$m->id]->sizes[$m->rsid]->size = $m->size;
	      $data['machines'][$m->id]->sizes[$m->rsid]->price_daily_fuel = $m->price_daily_fuel;
	      $data['machines'][$m->id]->sizes[$m->rsid]->price_daily = $m->price_daily;
	      $data['machines'][$m->id]->sizes[$m->rsid]->price_monthly_fuel = $m->price_monthly_fuel;
	      $data['machines'][$m->id]->sizes[$m->rsid]->price_monthly = $m->price_monthly;
	      $data['machines'][$m->id]->sizes[$m->rsid]->note = $m->note;
	      $data['machines'][$m->id]->sizes[$m->rsid]->trans_in = $m->trans_in;
	      $data['machines'][$m->id]->sizes[$m->rsid]->trans_ex = $m->trans_ex;
      }
	  }
	  
	  fb($query);
	  
	  $data['breadcrumb'] = array(
      $this->pageName
    );
    
	  $this->load->view('master/site', $data);
	}
	
}