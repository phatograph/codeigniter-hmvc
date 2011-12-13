<script type="text/javascript" charset="utf-8" src="<?= base_url() ?>script/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" charset="utf-8">
  tinyMCE.init({
    theme : "advanced",
    theme_advanced_buttons1 : "fontsizeselect,bold,italic,underline,strikethrough,hr,|,link,unlink,|,justifyleft,justifycenter,justifyright,|,justifyfull|,code",
    theme_advanced_buttons2 : "undo,redo,|,bullist,numlist,separator,outdent,indent,|,sub,sup,separator,charmap,removeformat",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    mode: "textareas"
  });
</script>
Info new post
<?php 
if(isset($post->id)) {
  echo form_open('admin/info/edit_post_post/' . $post->id);
}
else {
  echo form_open('admin/info/add_post_post');
}
?>
  <?= form_label('topic'); ?>
  <?= form_input('topic', (isset($post->topic)) ? $post->topic : set_value('topic')); ?>
  <div>
    <?= form_label('content'); ?>
    <div>
      <?= form_textarea('content', (isset($post->content)) ? $post->content : set_value('content')); ?>
    </div>
  </div>
  <?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>