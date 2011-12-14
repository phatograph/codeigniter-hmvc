RENT new rule
<?php 
if(isset($rule->id)) {
  echo form_open('admin/rent/edit_rent_rule_post/' . $rule->id);
}
else {
  echo form_open('admin/rent/add_rent_rule_post');
}
?>
  <?= form_label('rule'); ?>
  <?= form_input('rule', (isset($rule->rule)) ? $rule->rule : set_value('rule')); ?>
  <?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>