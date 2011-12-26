<h2 class="header">จัดการภาพราคาซื้อเครื่องจักร</h2>
<div class="adminForm">
  <?= form_open_multipart('admin/sell/add_machine_image_post/' . $machine->id, array()); ?>
  <div class="line">
    <div>
      <?= form_upload('userfile'); ?>
    </div>
  </div>
  <div class="submitArea">
    <?= form_submit('submit', 'submit'); ?>
    <?= anchor('admin/sell/edit_machine/' . $machine->id, 'กลับไปแก้ไขเครื่องจักร'); ?>
  </div>
  <?= form_close(); ?>
</div>