<?php $this->load->view('shared/header'); ?>
<div class="mainHeader">
  <div class="mainContainer">
    <div class="clearfix">
      <div class="logo">
      </div>
      <ul class="mainNavigation">
        <li><?= anchor('admin/home', 'admin') ?></li>
        <li class="contact"><?= anchor('contactus', 'ติดต่อเรา') ?></li>
        <li class="rent"><?= anchor('rent', 'ราคาเช่า') ?></li>
        <li class="sell"><?= anchor('sell', 'ราคาซื้อ') ?></li>
        <li class="info"><?= anchor('info', 'ข้อมูลเครื่องจักร') ?></li>
        <li class="home"><?= anchor('home', 'หน้าแรก') ?></li>
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
<?php if(isset($breadcrumb)) : ?>
<div class="breadcrumb">
  <div class="wrapper">
    <ul class="mainContainer clearfix">
      <li><?= anchor('/', 'หน้าแรก') ?></li>
      <?php foreach($breadcrumb as $b) : ?>
      <li>&gt;</li>
      <?php if(is_array($b)) : ?>
      <li><?= anchor($b['link'], $b['label']) ?></li>
      <?php else : ?>
      <li><span><?= $b ?></span></li>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>
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