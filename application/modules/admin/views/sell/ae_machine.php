<div class="adminForm">
  <?php 
  if(isset($machine->id)) {
    echo '<h2 class="header">แก้ไขข้อมูลเครื่องจักร</h2>';
    echo form_open('admin/sell/edit_machine_post/' . $machine->id);
  }
  else {
    echo '<h2 class="header">เพิ่มข้อมูลเครื่องจักรใหม่</h2>';
    echo form_open('admin/sell/add_machine_post');
  }
  ?>
    <div class="line">
      <div class="key">
        <?= form_label('ประเภทรถ', 'name'); ?>
      </div>
      <div class="value">
        <?= form_input('name', (isset($machine->name)) ? $machine->name : set_value('name')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ยี่ห้อ / รุ่น', 'brand'); ?>
      </div>
      <div class="value">
        <?= form_input('brand', (isset($machine->brand)) ? $machine->brand : set_value('brand')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('Serial No.', 'serial'); ?>
      </div>
      <div class="value">
        <?= form_input('serial', (isset($machine->serial)) ? $machine->serial : set_value('serial')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('จำนวนชั่วโมง', 'hour'); ?>
      </div>
      <div class="value">
        <?= form_input('hour', (isset($machine->hour)) ? $machine->hour : set_value('hour')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ราคา', 'price'); ?>
      </div>
      <div class="value">
        <?= form_input('price', (isset($machine->price)) ? $machine->price : set_value('price')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ข้อมูลอื่น ๆ', 'note'); ?>
      </div>
      <div class="value">
        <?= form_input('note', (isset($machine->note)) ? $machine->note : set_value('note')); ?>
      </div>
    </div>
    <div class="submitArea">
      <?= form_submit('submit','Save'); ?>
      <?= anchor('admin/sell', 'กลับไปหน้าข้อมูลเครื่องจักร') ?>
    </div>
  <?= form_close(); ?>
</div>
<?php if(isset($images)) : ?>
<h2 class="header secondHeader">ภาพเครื่องจักร</h2>
<?php if($images) : ?>
<ul class="imageList clearfix">
<?php foreach($images as $i) : ?>
  <li>
    <img src="<?= base_url();?>images/uploaded/thumb_120x120/<?= $i->name ?>" alt="<?= $i->id ?>" />
    <div class="del"><a onclick="return confirm('ยืนยันการลบ')" href="<?= base_url() . 'admin/sell/delete_image_post/' . $i->id ?>"><img src="<?= base_url();?>images/shared/cross-circle-frame.png" /></a></div>
  </li>
<?php endforeach; ?>
</ul>
<?php else : ?>
  <div class="noImage">ยังไม่มีรูปภาพ</div>
<?php endif; ?>
<div class="addNewItem">
  <?= anchor('admin/sell/add_machine_image/' . $machine->id, 'เพิ่มรูปภาพเครื่องจักร'); ?>
</div>
<?php endif; ?>
