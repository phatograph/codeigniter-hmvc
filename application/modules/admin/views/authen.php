<div class="authenWrapper">
  <h2 class="logo">SBT Rental</h2>
  <h3>เข้าสู่ระบบ</h3>
  <?= form_open('admin/authen/login_post'); ?>
  <div class="line">
    <div class="key"><?= form_label('Username', 'username') ?></div>
    <div class="value"><?= form_input('username'); ?></div>
  </div>
  <div class="line">
    <div class="key"><?= form_label('Password', 'password') ?></div>
    <div class="value"><?= form_password('password'); ?></div>
  </div>
  <div class="submitArea">
    <?= form_submit('submit','Submit'); ?>
  </div>
  <?= form_close(); ?>
</div>