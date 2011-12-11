<?php $this->load->view('shared/header'); ?>
<div class="mainHeader">
  <div class="mainContainer">
    <div class="clearfix">
      <div class="logo">
      </div>
      <ul class="mainNavigation">
        <li><?= anchor('admin/home', 'admin') ?></li>
        <li><?= anchor('rent', 'ติดต่อเรา') ?></li>
        <li><?= anchor('rent', 'ราคาเช่า') ?></li>
        <li><?= anchor('sell', 'ราคาซื้อ') ?></li>
        <li><?= anchor('rent', 'ข้อมูลเครื่องจักร') ?></li>
        <li><?= anchor('home', 'หน้าแรก') ?></li>
      </ul>
    </div>
  </div>
</div>
<?php if(isset($welcome)) : ?>
<div class="welcome">
  <div class="mainContainer">
    <div class="banner">
    </div>
  </div>
</div>
<?php endif; ?>
<div class="mainContent">
  <div class="mainContainer">
    <?php (empty($page)) ? $this->load->view('index') : $this->load->view($page); ?>
  </div>
</div>
<div class="mainFooter">
  <div class="mainContainer">
    <div class="copyright">Copyright © 2011 - <?= anchor('http://phatograph.com', 'phatograph.com'); ?> - All rights reserved</div>
  </div>
</div>
<?php $this->load->view('shared/footer'); ?>