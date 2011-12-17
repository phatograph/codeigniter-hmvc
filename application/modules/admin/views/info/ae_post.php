<script type="text/javascript" charset="utf-8" src="<?= base_url() ?>script/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" charset="utf-8">
  tinyMCE.init({
    width: "100%",
    theme : "advanced",
    theme_advanced_buttons1 : "fontsizeselect,bold,italic,underline,strikethrough,hr,|,link,unlink,|,justifyleft,justifycenter,justifyright,|,justifyfull,|,code",
    theme_advanced_buttons2 : "undo,redo,|,bullist,numlist,separator,outdent,indent,|,sub,sup,separator,charmap,removeformat",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    mode: "textareas"
  });
</script>

<div class="adminForm">
<?php 
if(isset($post->id)) {
  echo '<h2 class="header">แก้ไขข้อมูลเครื่องจักร</h2>';
  echo form_open('admin/info/edit_post_post/' . $post->id);
}
else {
  echo '<h2 class="header">เพิ่มข้อมูลเครื่องจักรใหม่</h2>';
  echo form_open('admin/info/add_post_post');
}
?>
  <div class="line">
    <div class="key">
      <?= form_label('หัวข้อ', 'topic'); ?>
    </div>
    <div class="value">
      <?= form_input('topic', (isset($post->topic)) ? $post->topic : set_value('topic'), 'style="width: 900px"'); ?>
    </div>
  </div>
  <div class="line">
    <div class="key">
      <?= form_label('เนื้อหา', 'content'); ?>
    </div>
    <div class="value">
      <?= form_textarea('content', (isset($post->content)) ? $post->content : set_value('content')); ?>
    </div>
  </div>
  <div class="submitArea">
    <?= form_submit('submit','Save'); ?>
    <?= anchor('admin/info', 'กลับไปหน้าข้อมูลเครื่องจักร') ?>
  </div>
<?= form_close(); ?>    
</div>