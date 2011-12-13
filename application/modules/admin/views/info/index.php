Info backend
<div>
  Post List
  <style type="text/css">
    td, th { border: 1px solid #000; padding: 3px; }
  </style>
  <table>
    <tr>
      <th>topic</th>
      <th>content</th>
      <th>created_date</th>
      <th>updated_date</th>
      <th>image</th>
      <th>views</th>
      <th>&nbsp;</th>
    </tr>
    <?php foreach($posts->result() as $p) : ?>
    <tr>
      <td><?= $p->topic ?></td>
      <td><?= $p->content ?></td>
      <td><?= $p->created_date ?></td>
      <td><?= $p->updated_date ?></td>
      <td><?= $p->image ?></td>
      <td><?= $p->views ?></td>
      <td><?= anchor('admin/info/edit_post/' . $p->id, 'edit') ?> | <?= anchor('admin/info/edit_post_image/' . $p->id, 'edit image') ?> | <?= anchor('admin/info/delete_post/' . $p->id, 'delete') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div>
  <?= anchor('admin/info/add_post', 'add post') ?>
</div>
<?php if ($this->session->flashdata('message')) : ?>
<?= $this->session->flashdata('message'); ?>
<?php endif ?>