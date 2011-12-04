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
<?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>