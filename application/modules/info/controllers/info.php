<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends MX_Controller {
  
  function __construct() {
    parent::__construct();
  }
  
  var $pageName = 'ข้อมูลเครื่องจักร';
  
	public function index() {
	  // Pagination
	  $config['base_url'] = base_url() . 'info/index';
    $config['total_rows'] = $this->db->get('info')->num_rows();
    $config['per_page'] = 10;
    $config['num_links'] = 5;
    $config['first_link'] = '&lt; หน้าแรก';
    $config['prev_link'] = false;
    $config['next_link'] = false;
    $config['last_link'] = 'หน้าสุดท้าย &gt;';
    $this->pagination->initialize($config);
    $this->db->flush_cache();
    
	  $data['posts'] = $this->db->get('info', $config['per_page'], $this->uri->segment($this->uri->total_segments()));
    $this->db->flush_cache();
    
    $this->db->select('id, topic, views');
    $this->db->order_by('views', 'desc');
    $data['posts_sort'] = $this->db->get('info');
    $this->db->flush_cache();
	  
    $data['breadcrumb'] = array(
      $this->pageName
    );
    
	  $data['page'] = 'master';
	  $data['control'] = 'index';
	  $this->load->view('master/site', $data);
	}
	
	public function post($id) {
	  $data['posts'] = $this->db->get('info');
	  $this->db->flush_cache();
	  
	  $this->db->select('id, topic, views');
    $this->db->order_by('views', 'desc');
    $data['posts_sort'] = $this->db->get('info');
    $this->db->flush_cache();
	  
    $data['post'] = $this->db->get_where('info', array('id' => $id))->first_row();
    $this->db->flush_cache();
	  
	  // Check User Session and increase views count
	  if(!$this->session->userdata('current_sid_post' . $id)) {
	    
	    $this->db->update('info', array(
  	    'views' => $data['post']->views + 1
      ), array('id' => $id));
      
  	  $this->session->set_userdata(array(
  	    'current_sid_post' . $id => $this->session->userdata('session_id')
      ));
      
      $data['post']->views += 1;
    }

    $data['breadcrumb'] = array(
      array(
        'label' => $this->pageName,
        'link' => 'info'
      ),
      $data['post']->topic
    );
    
	  $data['page'] = 'master';
	  $data['control'] = 'post';
	  $this->load->view('master/site', $data);
	}
	
	public function search() {
	  $data['posts'] = $this->db->get('info');
	  $this->db->flush_cache();
	  
	  $this->db->select('id, topic, views');
    $this->db->order_by('views', 'desc');
    $data['posts_sort'] = $this->db->get('info');
    $this->db->flush_cache();
    
    $queryString = $this->input->post('text');
    
	  $this->db->select('*');
	  $this->db->like('topic', $queryString);
	  $this->db->or_like('content', $queryString);
	  $data['result'] = $this->db->get('info');
	  
	  $data['queryString'] = html_escape($queryString);

    $data['breadcrumb'] = array(
      array(
        'label' => $this->pageName,
        'link' => 'info'
      ),
      'ค้นหา'
    );
	  
	  $data['page'] = 'master';
	  $data['control'] = 'search';
	  $this->load->view('master/site', $data);
	}
	
}