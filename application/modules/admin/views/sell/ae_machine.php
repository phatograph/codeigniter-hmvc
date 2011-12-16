SELL new machine
<?php 
if(isset($machine->id)) {
  echo form_open('admin/sell/edit_machine_post/' . $machine->id);
}
else {
  echo form_open('admin/sell/add_machine_post');
}
?>
  <?= form_label('name'); ?>
  <?= form_input('name', (isset($machine->name)) ? $machine->name : set_value('name')); ?>
  <?= form_label('price'); ?>
  <?= form_input('price', (isset($machine->price)) ? $machine->price : set_value('price')); ?>
  <?= form_label('brand'); ?>
  <?= form_input('brand', (isset($machine->brand)) ? $machine->brand : set_value('brand')); ?>
  <?= form_label('serial'); ?>
  <?= form_input('serial', (isset($machine->serial)) ? $machine->serial : set_value('serial')); ?>
  <?= form_label('hour'); ?>
  <?= form_input('hour', (isset($machine->hour)) ? $machine->hour : set_value('hour')); ?>
  <?= form_label('note'); ?>
  <?= form_input('note', (isset($machine->note)) ? $machine->note : set_value('note')); ?>
  <?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php if(isset($images)) : ?>
<?php if($images) : ?>
Picture list
<ul>
<?php foreach($images as $i) : ?>
  <li><img src="<?= base_url();?>images/uploaded/thumb_120x120/<?= $i->name ?>" alt="<?= $i->id ?>" /> <?= anchor('admin/sell/delete_image_post/' . $i->id, 'x'); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<?= anchor('admin/sell/add_machine_image/' . $machine->id, 'add new image of this machine'); ?>
<?php endif; ?>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>