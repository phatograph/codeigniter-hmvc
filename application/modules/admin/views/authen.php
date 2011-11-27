Log in
<?= form_open('admin/authen/login_post'); ?>
<?= form_input('username'); ?>
<?= form_password('password'); ?>
<?= form_submit('submit','Submit'); ?>
<?= form_close(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>