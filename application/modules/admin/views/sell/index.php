SELL backend
<div>
  Machine List
  <ul>
    <?php foreach($machines->result() as $m) : ?>
      <li><?= anchor('admin/sell/edit_machine/' . $m->id, $m->name) ?> (<?= $m->price; ?>) <?= anchor('admin/sell/delete_machine/' . $m->id, 'x') ?></li>
    <?php endforeach; ?>
  </ul>
</div>
<div>
  <?= anchor('admin/sell/add_machine', 'add machine') ?>
</div>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>