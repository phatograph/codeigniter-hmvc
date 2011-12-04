<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?= link_tag('css/reset.css') ?>
    <?= link_tag('css/style.css') ?>
    <title>SBT RENTAL</title>
  </head>
  <body>
    <ul>
      <li><?= anchor('admin/home', 'home') ?></li>
      <li><?= anchor('admin/rent', 'rent') ?></li>
      <li><?= anchor('admin/sell', 'sell') ?></li>
      <li><?= anchor('admin/authen/logout', 'logout') ?></li>
      <li><?= anchor('/', 'back to site') ?></li>
    </ul>
    <?php (empty($page)) ? $this->load->view('index') : $this->load->view($page); ?>
  </body>
</html>