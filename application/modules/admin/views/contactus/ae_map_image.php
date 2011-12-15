Contact us edit post image
<?php if($map->image) : ?>
<div>
  current image <img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $map->image ?>" alt="<?= $map->image ?>">
</div>
<?php endif; ?>
<div>
  use new image
  <?= form_open_multipart('admin/contactus/edit_map_image_post/' . $map->id, array()); ?>
    <?= form_upload('userfile'); ?>
    <?= form_submit('submit', 'submit'); ?>
  <?= form_close(); ?>
</div>  
<?= anchor('admin/contactus', 'back to map'); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>