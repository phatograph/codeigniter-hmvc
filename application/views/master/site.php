<?php $this->load->view('shared/header'); ?>
<div class="mainHeader">
  <div class="mainContainer">
    <div class="clearfix">
      <h1 class="logo"><?= anchor('/', 'SBT Rental') ?></h1>
      <ul class="mainNavigation">
        <li class="contactus"><div class="l"></div><?= anchor('contactus', 'ติดต่อเรา') ?><div class="r"></div></li>
        <li class="rent"><div class="l"></div><?= anchor('rent', 'ราคาเช่า') ?><div class="r"></div></li>
        <li class="sell"><div class="l"></div><?= anchor('sell', 'ราคาซื้อ') ?><div class="r"></div></li>
        <li class="info"><div class="l"></div><?= anchor('info', 'ข้อมูลเครื่องจักร') ?><div class="r"></div></li>
        <li class="home"><div class="l"></div><?= anchor('/', 'หน้าแรก') ?><div class="r"></div></li>
      </ul>
    </div>
  </div>
</div>
<?php if(isset($welcome)) : ?>
<div class="welcome">
  <div class="mainContainer">
    <div class="bannerText"></div>
    <div class="bannerImage"></div>
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
    <div class="copyright">Powered by <?= anchor('http://phatograph.com', 'phatograph.com'); ?></div>
  </div>
</div>
<?php $this->load->view('shared/footer'); ?>