HOME Backend
<?php echo form_open('admin/home_post'); ?>
<?php echo form_textarea('text', $text->text); ?>
<?php echo form_submit('submit','Save'); ?>
<?php echo form_close(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>