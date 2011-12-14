RENT add machine size
<?php 
if(isset($size->id)) {
  echo form_open('admin/rent/edit_machine_size_post/' . $size->id);
}
else {
  echo form_open('admin/rent/add_machine_size_post/' . $machine_id);
}
?>
  <?= form_label('size'); ?>
  <?= form_input('size', (isset($size->size)) ? $size->size : set_value('size')); ?>
  <?= form_label('price_daily_fuel'); ?>
  <?= form_input('price_daily_fuel', (isset($size->price_daily_fuel)) ? $size->price_daily_fuel : set_value('price_daily_fuel')); ?>
  <?= form_label('price_daily'); ?>
  <?= form_input('price_daily', (isset($size->price_daily)) ? $size->price_daily : set_value('price_daily')); ?>
  <?= form_label('price_monthly_fuel'); ?>
  <?= form_input('price_monthly_fuel', (isset($size->price_monthly_fuel)) ? $size->price_monthly_fuel : set_value('price_monthly_fuel')); ?>
  <?= form_label('price_monthly'); ?>
  <?= form_input('price_monthly', (isset($size->price_monthly)) ? $size->price_monthly : set_value('price_monthly')); ?>
  <?= form_label('note'); ?>
  <?= form_input('note', (isset($size->note)) ? $size->note : set_value('note')); ?>
  <?= form_label('trans_in'); ?>
  <?= form_input('trans_in', (isset($size->trans_in)) ? $size->trans_in : set_value('trans_in')); ?>
  <?= form_label('trans_ex'); ?>
  <?= form_input('trans_ex', (isset($size->trans_ex)) ? $size->trans_ex : set_value('trans_ex')); ?>
  <?= form_submit('submit','Save'); ?>
  <?php 
  if(isset($size->id)) {
    echo form_hidden('rent_id', $size->rent_id);
  }
  ?>
<?= form_close(); ?>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>