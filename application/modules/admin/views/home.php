<script type="text/javascript" charset="utf-8" src="<?= base_url() ?>script/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" charset="utf-8">
  tinyMCE.init({
    theme : "advanced",
    theme_advanced_buttons1 : "fontsizeselect,fontselect,|,cleanup,code",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    mode: "textareas",
    theme_advanced_fonts :
                    "Angsana=Angsana New,AngsanaUPC;"+
                    "Arial=Arial;"+
                    "Browallia=Browallia New,BrowalliaUPC;"+
                    "Cordia=Cordia New,CordiaUPC;"+
                    "Dillenia=DilleniaUPC;"+
                    "Eucrosia=EucrosiaUPC;"+
                    "Freesia=FreesiaUPC;"+
                    "Iris=IrisUPC;"+
                    "Jasmine=JasmineUPC;"+
                    "Kodchiang=KodchiangUPC;"+
                    "Lily=LilyUPC;"+
                    "Ms Sans Serif=Microsoft Sans Serif,ms sans-serif,sans-serif;"+
                    "Tahoma=tahoma,arial,helvetica,sans-serif;"
  });
</script>
HOME Backend
<?= form_open('admin/home/post'); ?>
<?= form_textarea('text', $text->text); ?>
<?= form_submit('submit','Save'); ?>
<?= form_close(); ?>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>