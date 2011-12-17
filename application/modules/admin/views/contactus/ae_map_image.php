<h2 class="header">จัดการภาพแผนที่</h2>
<?php if($map->image) : ?>
<div class="adminForm">
  <div class="line">
    <div class="key">
      ภาพปัจจุบัน
    </div>
    <div class="value">
      <img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $map->image ?>" alt="<?= $map->image ?>">
    </div>
  </div>
<?php endif; ?>  
<?= form_open_multipart('admin/contactus/edit_map_image_post/' . $map->id, array()); ?>
  <div class="line">
    <div class="key">
      ใช้ภาพใหม่
    </div>
    <div>
      <?= form_upload('userfile', '', 'size="50"'); ?>
    </div>
  </div>
  <div class="submitArea">
    <?= form_submit('submit', 'Save'); ?>
    <?= anchor('admin/contactus', 'กลับไปหน้าข้อมูลติดต่อเรา') ?>
  </div>
<?= form_close(); ?>
</div>