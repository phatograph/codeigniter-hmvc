RENT backend
<div>
  Machine List
  <style type="text/css">
    td, th { border: 1px solid #000; padding: 3px; }
  </style>
  <table>
    <tr>
      <th>no.</th>
      <th>name</th>
      <th>price_daily_fuel</th>
      <th>price_daily</th>
      <th>price_monthly_fuel</th>
      <th>price_monthly</th>
      <th>note</th>
      <th>&nbsp;</th>
    </tr>
    <?php foreach($machines->result() as $i=>$m) : ?>
    <tr>
      <td><?= $i+1 ?></td>
      <td><?= $m->name ?></td>
      <td><?= $m->price_daily_fuel ?></td>
      <td><?= $m->price_daily ?></td>
      <td><?= $m->price_monthly_fuel ?></td>
      <td><?= $m->price_monthly ?></td>
      <td><?= $m->note ?></td>
      <td><?= anchor('admin/rent/edit_machine/' . $m->id, 'edit') ?> | <?= anchor('admin/rent/delete_machine/' . $m->id, 'delete') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div>
  <?= anchor('admin/rent/add_machine', 'add machine') ?>
</div>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>