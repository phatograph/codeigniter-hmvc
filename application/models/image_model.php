<?php

class Image_model extends CI_Model {
  
  function __construct() {
    parent::__construct();
    require_once('FirePHPCore/fb.php');
  }
  
  var $upload_path = 'images/uploaded/';

  function add_image() {
    $result['success'] = '0';
    $result['error'] = null;
    $result['imagedata'] = null;
    
    if(!is_dir($this->upload_path)) {
      mkdir($this->upload_path);
    }

    $this->load->library('upload', $this->get_image_config());
    
    if($this->upload->do_upload()) {
      $result['image_data'] = $this->upload->data();
      $this->get_thumbnail_resize($result['image_data']['file_name'], 120, 120, $result['image_data']['image_width'], $result['image_data']['image_height']);
      $result['success'] = 1;
    }
    else {
      $result['error'] = array('error' => $this->upload->display_errors('<div class="error">', '</div>'));
    }
    
    return $result;
  }

  function get_image_config() {
    $config['upload_path'] = './'.$this->upload_path;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']	= '1024';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';
    $config['remove_spaces'] = true;
    //$config['encrypt_name'] = true;
    $config['overwrite'] = false;

    return $config;
  }
  
  function get_thumbnail_resize($source_name, $x, $y, $ix, $iy) {
    $thumbnail_path = $this->upload_path.'thumb_'.$x.'x'.$y;
    
    $config['image_library'] = 'GD2';
    $config['source_image'] = './'.$this->upload_path.$source_name;
    $config['new_image'] = './'.$thumbnail_path.'/'.$source_name;
    $config['quality'] = '100%';
    
    if(!is_dir($thumbnail_path)) {
     mkdir($thumbnail_path);
    }

    if($ix > $iy)						// the image is landscape
    {
        $config['width'] = $iy;
    }
    else if($iy > $ix)					// the image is portrait
    {
        $config['height'] = $ix;
    }
    else {
        $config['width'] = $ix;
        $config['height'] = $iy;
    }
    $this->load->library('image_lib', $config);
    $this->image_lib->crop();

    $this->image_lib->clear();

    $config['image_library'] = 'GD2';
    $config['quality'] = '100%';
    $config['source_image'] = './'.$this->upload_path.'thumb_'.$x.'x'.$y.'/'.$source_name;
    $config['maintain_ratio'] = TRUE;
    $config['height'] = $y;
    $config['width'] = $x;

    $this->image_lib->initialize($config);
    $this->image_lib->resize();
  }
  
}