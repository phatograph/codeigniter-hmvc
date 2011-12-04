<?php  $this->load->view('shared/header'); ?>
<ul>
  <li><?= anchor('home', 'หน้าแรก') ?></li>
  <li><?= anchor('rent', 'ข้อมูลเครื่องจักร') ?></li>
  <!--
  <li><?= anchor('rent', 'ราคาเช่า') ?></li>
  <li><?= anchor('rent', 'ราคาซื้อ') ?></li>
  <li><?= anchor('rent', 'ติดต่อเรา') ?></li>
  -->
  <li><?= anchor('admin/home', 'admin') ?></li>
</ul>
<?php (empty($page)) ? $this->load->view('index') : $this->load->view($page); ?>
<?php  $this->load->view('shared/footer'); ?>