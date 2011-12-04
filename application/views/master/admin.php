<?php  $this->load->view('shared/header'); ?>
<ul>
  <li><?= anchor('admin/home', 'home') ?></li>
  <li><?= anchor('admin/rent', 'rent') ?></li>
  <li><?= anchor('admin/sell', 'sell') ?></li>
  <li><?= anchor('admin/authen/logout', 'logout') ?></li>
  <li><?= anchor('/', 'back to site') ?></li>
</ul>
<?php (empty($page)) ? $this->load->view('index') : $this->load->view($page); ?>
<?php  $this->load->view('shared/footer'); ?>