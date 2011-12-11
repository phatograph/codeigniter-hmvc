RENT new machine
<?php 
if(isset($machine->id)) {
  echo form_open('admin/rent/edit_machine_post/' . $machine->id);
}
else {
  echo form_open('admin/rent/add_machine_post');
}
?>
  <?= form_label('name'); ?>
  <?= form_input('name', (isset($machine->name)) ? $machine->name : set_value('name')); ?>
  <?= form_label('price_daily_fuel'); ?>
  <?= form_input('price_daily_fuel', (isset($machine->price_daily_fuel)) ? $machine->price_daily_fuel : set_value('price_daily_fuel')); ?>
  <?= form_label('price_daily'); ?>
  <?= form_input('price_daily', (isset($machine->price_daily)) ? $machine->price_daily : set_value('price_daily')); ?>
  <?= form_label('price_monthly_fuel'); ?>
  <?= form_input('price_monthly_fuel', (isset($machine->price_monthly_fuel)) ? $machine->price_monthly_fuel : set_value('price_monthly_fuel')); ?>
  <?= form_label('price_monthly'); ?>
  <?= form_input('price_monthly', (isset($machine->price_monthly)) ? $machine->price_monthly : set_value('price_monthly')); ?>
  <?= form_label('note'); ?>
  <?= form_input('note', (isset($machine->note)) ? $machine->note : set_value('note')); ?>
  <?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>