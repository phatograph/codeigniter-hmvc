Info edit post image
<?php if($post->image) : ?>
<div>
  current image <img src="<?= base_url() ?>images/uploaded/<?= $post->image ?>" alt="<?= $post->image ?>">
</div>
<?php endif; ?>
<div>
  use new image
  <?= form_open_multipart('admin/info/edit_post_image_post/' . $post->id, array()); ?>
    <?= form_upload('userfile'); ?>
    <?= form_submit('submit', 'submit'); ?>
  <?= form_close(); ?>
</div>  
<?= anchor('admin/info', 'back to post'); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>