<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends MX_Controller {
  
  function __construct() {
    parent::__construct();
    $this->authen_model->is_signed_in();
  }

	public function index() {
	  $data['machines'] = $this->db->get('sell');
	  
	  $data['page'] = 'sell/index';
	  $this->load->view('master/admin', $data);
	}
	
	public function add_machine() {
	  $data['page'] = 'sell/ae_machine';
	  $this->load->view('master/admin', $data);
	}
	
	public function add_machine_post() {
	  $this->set_validation_rules();
	  
    if($this->form_validation->run()) {
	    $this->db->insert('sell', array(
  	    'name' => html_escape($this->input->post('name', true)),
  	    'price' => html_escape($this->input->post('price', true)),
  	    'brand' => html_escape($this->input->post('brand', true)),
  	    'serial' => html_escape($this->input->post('serial', true)),
  	    'hour' => html_escape($this->input->post('hour', true)),
  	    'note' => html_escape($this->input->post('note', true))
      ));
      $this->session->set_flashdata('message', 'เพิ่มข้อมูลเสร็จเรียบร้อย');
  	  redirect('admin/sell');
    }
    else {
  	  $data['page'] = 'sell/ae_machine';
  	  $this->load->view('master/admin', $data);
    }
	}
	
	public function edit_machine($id) {
	  $data['machine'] = $this->db->get_where('sell', array('id' => $id))->first_row();
	  $data['images'] = $this->db->get_where('sell_image', array('sell_id' => $id))->result();

	  $data['page'] = 'sell/ae_machine';
	  $this->load->view('master/admin', $data);
	}
	
	public function edit_machine_post($id) {
	  $this->set_validation_rules();
    
    if($this->form_validation->run()) {
      $this->db->update('sell', array(
  	    'name' => html_escape($this->input->post('name', true)),
  	    'price' => html_escape($this->input->post('price', true)),
  	    'brand' => html_escape($this->input->post('brand', true)),
  	    'serial' => html_escape($this->input->post('serial', true)),
  	    'hour' => html_escape($this->input->post('hour', true)),
  	    'note' => html_escape($this->input->post('note', true))
      ), array('id' => $id));
      $this->session->set_flashdata('message', 'แก้ไขข้อมูลเสร็จเรียบร้อย');
  	  //redirect('admin/sell/edit_machine/' . $id);
  	  redirect('admin/sell');
    }
    else {
  	  $data['machine']->id = $id;
  	  
  	  $data['page'] = 'sell/ae_machine';
  	  $this->load->view('master/admin', $data);
    }
  }
  
  public function delete_machine($id) {
    $sell_images = $this->db->get_where('sell_image', array('sell_id' => $id))->result();
    foreach($sell_images as $si) {
      if(file_exists('./' . $this->image_model->upload_path . $si->name)) {
        unlink('./' . $this->image_model->upload_path . $si->name);
      }
      if(file_exists('./' . $this->image_model->upload_path . 'thumb_120x120/' . $si->name)) {
        unlink('./' . $this->image_model->upload_path . 'thumb_120x120/' . $si->name);
      }
    }
    
    $this->db->delete('sell', array('id' => $id));
    $this->session->set_flashdata('message', 'ลบข้อมูลเสร็จเรียบร้อย');
	  redirect('admin/sell/');
  }
  
  public function add_machine_image($id) {
    $data['machine']->id = $id;
    
	  $data['page'] = 'sell/a_machine_image';
	  $this->load->view('master/admin', $data);
  }
  
  public function add_machine_image_post($id) {  
    $result = $this->image_model->add_image();

    if($result['success'] == 1) {
	    $this->db->insert('sell_image', array(
  	    'name' => $result['image_data']['file_name'],
  	    'path' => $result['image_data']['file_path'],
  	    'sell_id' => $id
      ));
      $this->session->set_flashdata('message', 'เพิ่มรูปภาพเสร็จเรียบร้อย');
      redirect('admin/sell/edit_machine/' . $id);
    }
    else {
      $this->session->set_flashdata('message', $result['error']['error']);
      redirect('admin/sell/add_machine_image/' . $id);
    }  
  }
  
  public function delete_image_post($id) {
    $image = $this->db->get_where('sell_image', array('id' => $id))->first_row();
    
    if(file_exists('./' . $this->image_model->upload_path . $image->name)) {
      unlink('./' . $this->image_model->upload_path . $image->name);
    }
    if(file_exists('./' . $this->image_model->upload_path . 'thumb_120x120/' . $image->name)) {
      unlink('./' . $this->image_model->upload_path . 'thumb_120x120/' . $image->name);
    }
    
    $this->db->delete('sell_image', array('id' => $id));
    $this->session->set_flashdata('message', 'ลบรูปภาพเสร็จเรียบร้อย');
	  redirect('admin/sell/edit_machine/' . $image->sell_id);
  }
  
  private function set_validation_rules() {
    $this->form_validation->set_rules('name','ประเภทรถ','trim|required');
    $this->form_validation->set_rules('brand','ยี่ห้อ / รุ่น','trim|required');
    $this->form_validation->set_rules('price','ราคา','trim|required|is_natural');
    $this->form_validation->set_message('required', 'กรุณาใส่%s');
    $this->form_validation->set_message('is_natural', 'กรุณาใส่ตัวเลข%s (มากกว่าศูนย์) เท่านั้น');
  }
	
}