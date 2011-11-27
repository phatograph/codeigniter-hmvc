SELL backend
<?= form_open_multipart('admin/sell/post', array()); ?>
<?= form_upload('userfile'); ?>
<?= form_submit('submit', 'เพิ่มรูปภาพ'); ?>
<?= form_close(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>