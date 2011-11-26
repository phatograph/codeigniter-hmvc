Log in
<?php echo form_open('admin/authen/login_post'); ?>
<?php echo form_input('username'); ?>
<?php echo form_password('password'); ?>
<?php echo form_submit('submit','Submit'); ?>
<?php echo form_close(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>