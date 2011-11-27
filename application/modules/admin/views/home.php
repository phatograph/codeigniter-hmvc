HOME Backend
<?= form_open('admin/home/post'); ?>
<?= form_textarea('text', $text->text); ?>
<?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>