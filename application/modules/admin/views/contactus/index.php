<h2 class="header">จัดการข้อมูลติดต่อเรา</h2>
<div class="adminTable">
  <table>
    <tr>
      <th style="width: 596px">ที่อยู่</th>
      <th style="width: 120px">แผนที่</th>
      <th style="width: 170px">&nbsp;</th>
    </tr>
    <?php foreach($maps->result() as $m) : ?>
    <tr>  
      <td><?= $m->info ?></td>
      <td class="image">
        <?php if(!empty($m->image)) : ?>
        <img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $m->image ?>" alt="<?= $m->image ?>">
        <?php endif; ?>
      </td>
      <td class="control"><?= anchor('admin/contactus/edit_map_info/' . $m->id, 'แก้ไขข้อมูล') ?> | <?= anchor('admin/contactus/edit_map_image/' . $m->id, 'แก้ไขรูปภาพ') ?> | <?= anchor('admin/contactus/delete_map/' . $m->id, 'ลบ', 'onclick=\'return confirm("ยืนยันการลบ");\'') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="addNewItem">
  <?= anchor('admin/contactus/add_map', 'เพิ่มข้อมูลติดต่อเรา') ?>
</div>