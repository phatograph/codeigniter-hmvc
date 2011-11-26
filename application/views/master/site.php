<!doctype html>
<html>
  <head>
    <meta charset="utf8">
    <?= link_tag('css/reset.css') ?>
    <?= link_tag('css/style.css') ?>
    <title>SBT RENTAL</title>
  </head>
  <body>
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
  </body>
</html>