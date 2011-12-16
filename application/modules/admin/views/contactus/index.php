Contact us backend
<div>
  Post List
  <style type="text/css">
    td, th { border: 1px solid #000; padding: 3px; }
  </style>
  <table>
    <tr>
      <th>info</th>
      <th>image</th>
      <th>&nbsp;</th>
    </tr>
    <?php foreach($maps->result() as $m) : ?>
    <tr>  
      <td><?= $m->info ?></td>
      <td>
        <?php if(!empty($m->image)) : ?>
        <img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $m->image ?>" alt="<?= $m->image ?>">
        <?php endif; ?>
      </td>
      <td> <?= anchor('admin/contactus/edit_map_info/' . $m->id, 'edit info') ?> | <?= anchor('admin/contactus/edit_map_image/' . $m->id, 'edit map') ?> | <?= anchor('admin/contactus/delete_map/' . $m->id, 'delete') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div>
  <?= anchor('admin/contactus/add_map', 'add map') ?>
</div>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>