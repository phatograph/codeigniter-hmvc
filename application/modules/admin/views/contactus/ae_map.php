<script type="text/javascript" charset="utf-8" src="<?= base_url() ?>script/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" charset="utf-8">
  tinyMCE.init({
    theme : "advanced",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,hr,|,link,unlink,|,justifyleft,justifycenter,justifyright,|,justifyfull|,code",
    theme_advanced_buttons2 : "undo,redo,|,bullist,numlist,separator,outdent,indent,|,sub,sup,separator,charmap,removeformat",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    mode: "textareas"
  });
</script>
Contact us new map
<?php 
if(isset($map->id)) {
  echo form_open('admin/contactus/edit_map_info_post/' . $map->id);
}
else {
  echo form_open('admin/contactus/add_map_post');
}
?>
  <div>
    <?= form_label('info'); ?>
    <div>
      <?= form_textarea('info', (isset($map->info)) ? $map->info : set_value('info')); ?>
    </div>
  </div>
  <?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php echo validation_errors(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>