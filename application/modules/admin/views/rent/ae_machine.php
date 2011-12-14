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
  <?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php if(isset($sizes)) : ?>
<?php if($sizes) : ?>
Size list
<style type="text/css">
  td, th { border: 1px solid #000; padding: 3px; }
</style>
<table>
<?php foreach($sizes as $s) : ?>
  <tr>
    <td><?= $s->id ?></td>
    <td><?= $s->size ?></td>
    <td><?= $s->price_daily_fuel ?></td>
    <td><?= $s->price_daily ?></td>
    <td><?= $s->price_monthly_fuel ?></td>
    <td><?= $s->price_monthly ?></td>
    <td><?= $s->note ?></td>
    <td><?= $s->trans_in ?></td>
    <td><?= $s->trans_ex ?></td>
    <td><?= anchor('admin/rent/edit_machine_size/' . $s->id, 'edit') ?> | <?= anchor('admin/rent/delete_machine_size/' . $s->id, 'delete') ?></td>
  </tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
<?= anchor('admin/rent/add_machine_size/' . $machine->id, 'add new size of this machine'); ?>
<?php endif; ?>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>