<?php $this->load->view('shared/header'); ?>
<div class="adminWrapper">
  <?php if(!isset($hide)) : ?>
  <ul class="adminNav clearfix">
    <li class="home"><?= anchor('admin/home', 'หน้าแรก') ?></li>
    <li class="info"><?= anchor('admin/info', 'ข้อมูลเครื่องจักร') ?></li>
    <li class="sell"><?= anchor('admin/sell', 'ราคาซื้อ') ?></li>
    <li class="rent"><?= anchor('admin/rent', 'ราคาเช่า') ?></li>
    <li class="contactus"><?= anchor('admin/contactus', 'ติดต่อเรา') ?></li>
    <li class="back"><?= anchor('/', 'กลับไปที่หน้าหลัก', 'onclick=\'return confirm("ยืนยันการกลับไปหน้าหลัก");\'') ?></li>
    <li class="logout"><?= anchor('admin/authen/logout', 'ออกจากระบบ', 'onclick=\'return confirm("ยืนยันการออกจากระบบ");\'') ?></li>
  </ul>
  <?php endif; ?>
  <div class="adminContent">
    <?php (empty($page)) ? $this->load->view('index') : $this->load->view($page); ?>
  </div>
  <?php if(validation_errors() || $this->session->flashdata('message') || $this->session->flashdata('loginerror')) : ?>
  <div class="flashArea">
    <?php echo validation_errors('<div class="error">', '</div>'); ?>
    <?php if ($this->session->flashdata('message')) : ?>
      <div class="success">
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('loginerror')) : ?>
      <div class="error" style="text-align: center;">
        <?= $this->session->flashdata('loginerror'); ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  </div>
</div>
<?php  $this->load->view('shared/footer'); ?>