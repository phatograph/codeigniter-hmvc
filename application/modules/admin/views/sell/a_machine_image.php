Add new image
<?= form_open_multipart('admin/sell/add_machine_image_post/' . $machine->id, array()); ?>
<?= form_upload('userfile'); ?>
<?= form_submit('submit', 'submit'); ?>
<?= form_close(); ?>
<?= anchor('admin/sell/edit_machine/' . $machine->id, 'back to machine'); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>