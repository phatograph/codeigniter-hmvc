<?php $this->load->view('shared/header'); ?>
<div class="adminWrapper">
  <ul class="adminNav clearfix">
    <li class="home"><?= anchor('admin/home', 'หน้าแรก') ?></li>
    <li class="info"><?= anchor('admin/info', 'info') ?></li>
    <li class="rent"><?= anchor('admin/rent', 'rent') ?></li>
    <li class="sell"><?= anchor('admin/sell', 'sell') ?></li>
    <li class="contactus"><?= anchor('admin/contactus', 'contact us') ?></li>
    <li class="logout"><?= anchor('admin/authen/logout', 'logout') ?></li>
    <li class="back"><?= anchor('/', 'back to site') ?></li>
  </ul>
  <div class="adminContent">
    <?php (empty($page)) ? $this->load->view('index') : $this->load->view($page); ?>
  </div>
  <?php if(validation_errors() || $this->session->flashdata('message')) : ?>
  <div class="flashArea">
    <?php echo validation_errors('<div class="error">', '</div>'); ?>
    <?php if ($this->session->flashdata('message')) : ?>
      <div class="success">
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php endif ?>
  <?php endif ?>
  </div>
</div>
<?php  $this->load->view('shared/footer'); ?>