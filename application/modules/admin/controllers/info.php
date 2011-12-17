<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }

	public function index() {
	  $data['posts'] = $this->db->get('info');
	  
	  $data['page'] = 'info/index';
	  $this->load->view('master/admin', $data);
	}

	public function add_post() {
	  $data['page'] = 'info/ae_post';
	  $this->load->view('master/admin', $data);
	  fb(standard_date('DATE_W3C', time()));
	}

	public function add_post_post() {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
	    $this->db->insert('info', array(
  	    'topic' => html_escape($this->input->post('topic', true)),
  	    'content' => $this->input->post('content'),
  	    'created_date' => standard_date('DATE_W3C', time()),
  	    'updated_date' => standard_date('DATE_W3C', time())
      ));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/info');
    }
    else {
  	  $data['page'] = 'info/ae_post';
  	  $this->load->view('master/admin', $data);
    }
	}
	
	public function edit_post($id) {
	  $data['post'] = $this->db->get_where('info', array('id' => $id))->first_row();

	  $data['page'] = 'info/ae_post';
	  $this->load->view('master/admin', $data);
	}

	public function edit_post_post($id) {
	  $this->set_validation_rules();

    if($this->form_validation->run()) {
	    $this->db->update('info', array(
  	    'topic' => html_escape($this->input->post('topic', true)),
  	    'content' => $this->input->post('content'),
  	    'updated_date' => standard_date('DATE_W3C', time())
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
  	  redirect('admin/info');
    }
    else {
  	  $data['page'] = 'info/ae_post';
  	  $this->load->view('master/admin', $data);
    }
	}

  public function delete_post($id) {
    $post = $this->db->get_where('info', array('id' => $id))->first_row();
    if($post->image) {
      if(file_exists('./' . $this->image_model->upload_path . $post->image)) {
        unlink('./' . $this->image_model->upload_path . $post->image); 
      }
      if(file_exists('./' . $this->image_model->upload_path . 'thumb_120x120/' . $post->image)) {
        unlink('./' . $this->image_model->upload_path . 'thumb_120x120/' . $post->image);
      }
    }
    
    $this->db->delete('info', array('id' => $id));
	  redirect('admin/info/');
  }

	public function edit_post_image($id) {
	  $data['post'] = $this->db->get_where('info', array('id' => $id))->first_row();

	  $data['page'] = 'info/ae_post_image';
	  $this->load->view('master/admin', $data);
	}
	
  public function edit_post_image_post($id) {
    $result = $this->image_model->add_image();

    if($result['success'] == 1) {  
      $post = $this->db->get_where('info', array('id' => $id))->first_row();
      if($post->image) {
        if(file_exists('./' . $this->image_model->upload_path . $post->image)) {
          unlink('./' . $this->image_model->upload_path . $post->image); 
        }
        if(file_exists('./' . $this->image_model->upload_path . 'thumb_120x120/' . $post->image)) {
          unlink('./' . $this->image_model->upload_path . 'thumb_120x120/' . $post->image);
        }
      }
        
	    $this->db->update('info', array(
  	    'updated_date' => standard_date('DATE_W3C', time()),
  	    'image' => $result['image_data']['file_name']
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'done');
    }
    else {
      $this->session->set_flashdata('message', $result['error']['error']);
    }  
    redirect('admin/info/edit_post_image/' . $id);
  }
	
  private function set_validation_rules() {
    $this->form_validation->set_rules('topic','topic','trim|required');
    $this->form_validation->set_rules('content','content','trim|required');
    
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข (มากกว่าศูนย์) เท่านั้น');
  }
	
}