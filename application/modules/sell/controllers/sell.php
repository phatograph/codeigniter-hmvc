<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
  var $pageName = 'ราคาซื้อเครื่องจักร';
  
	public function index() {
	  // Pagination
	  $config['base_url'] = base_url() . 'sell/index';
    $config['total_rows'] = $this->db->get('sell')->num_rows();
    $config['per_page'] = 5;
    $config['num_links'] = 5;
    $config['first_link'] = '&lt; หน้าแรก';
    $config['prev_link'] = false;
    $config['next_link'] = false;
    $config['last_link'] = 'หน้าสุดท้าย &gt;';
    $this->pagination->initialize($config);
    $this->db->flush_cache();
    
    $queryPagination = $this->db->get('sell', $config['per_page'], $this->uri->segment($this->uri->total_segments()))->result();
    $arrayOfQueriedId = array();
    foreach($queryPagination as $qp) {
      $arrayOfQueriedId[] = $qp->id;
    }
    
	  $this->db->select('s.id, s.name, s.*, si.id as imgid, si.name as imgname');
	  $this->db->from('sell s');
    $this->db->join('sell_image si', 'si.sell_id = s.id', 'left');
    $this->db->where_in('s.id', $arrayOfQueriedId);
	  $query = $this->db->get()->result();
	  $this->db->flush_cache();
	  
	  $this->db->select('id, name');
	  $this->db->from('sell');
	  $this->db->group_by('name');
	  $data['name'] = $this->db->get();
	  
	  $this->db->select('id, brand');
	  $this->db->from('sell');
	  $this->db->group_by('brand');
	  $data['brand'] = $this->db->get();
	  
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
	  
	  $data['breadcrumb'] = array(
      $this->pageName
    );
	  
		$this->load->view('master/site', $data);
	}
	
	public function category($name) {
	  $this->db->select('s.id, s.name, s.*, si.id as imgid, si.name as imgname');
	  $this->db->from('sell s');
    $this->db->join('sell_image si', 'si.sell_id = s.id', 'left');
    $this->db->where('s.name', urldecode($name));
	  $query = $this->db->get()->result();
	  $this->db->flush_cache();
	  
	  $this->db->select('id, name');
	  $this->db->from('sell');
	  $this->db->group_by('name');
	  $data['name'] = $this->db->get();
	  
	  $this->db->select('id, brand');
	  $this->db->from('sell');
	  $this->db->group_by('brand');
	  $data['brand'] = $this->db->get();
	  
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
	  
	  $data['breadcrumb'] = array(
      array(
        'label' => $this->pageName,
        'link' => 'sell'
      ),
      urldecode($name)
    );
	  
		$this->load->view('master/site', $data);
	}
	
	public function brand($name) {
	  $this->db->select('s.id, s.name, s.*, si.id as imgid, si.name as imgname');
	  $this->db->from('sell s');
    $this->db->join('sell_image si', 'si.sell_id = s.id', 'left');
    $this->db->where('s.brand', urldecode($name));
	  $query = $this->db->get()->result();
	  $this->db->flush_cache();
	  
	  $this->db->select('id, name');
	  $this->db->from('sell');
	  $this->db->group_by('name');
	  $data['name'] = $this->db->get();
	  
	  $this->db->select('id, brand');
	  $this->db->from('sell');
	  $this->db->group_by('brand');
	  $data['brand'] = $this->db->get();
	  
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
	  
	  $data['breadcrumb'] = array(
      array(
        'label' => $this->pageName,
        'link' => 'sell'
      ),
      urldecode($name)
    );
	  
		$this->load->view('master/site', $data);
	}
	
}