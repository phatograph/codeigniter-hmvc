<h2 class="header">จัดการภาพข้อมูลเครื่องจักร</h2>
<?php if($post->image) : ?>
<div class="adminForm">
  <div class="line">
    <div class="key">
      ภาพปัจจุบัน
    </div>
    <div class="value">
      <img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $post->image ?>" alt="<?= $post->image ?>">
    </div>
  </div>
<?php endif; ?>  
<?= form_open_multipart('admin/info/edit_post_image_post/' . $post->id, array()); ?>
  <div class="line">
    <div class="key">
      ใช้ภาพใหม่
    </div>
    <div>
        <?= form_upload('userfile', '', 'size="50"'); ?>
    </div>
  </div>
  <div class="submitArea">
    <?= form_submit('submit','Save'); ?>
    <?= anchor('admin/info', 'กลับไปหน้าข้อมูลเครื่องจักร') ?>
  </div>
<?= form_close(); ?>
</div>