<h2 class="header">จัดการข้อมูลเครื่องจักร</h2>
<div class="adminTable">
  <table>
    <tr>
      <th style="width: 393px">หัวข้อ</th>
      <th style="width: 70px">วันที่สร้าง</th>
      <th style="width: 70px">วันที่ปรับปรุง</th>
      <th style="width: 120px">ภาพปก</th>
      <th style="width: 50px">เข้าชม</th>
      <th style="width: 150px">&nbsp;</th>
    </tr>
    <?php foreach($posts->result() as $p) : ?>
    <tr>
      <td><?= $p->topic ?></td>
      <td class="alc"><?= $p->created_date ?></td>
      <td class="alc"><?= $p->updated_date ?></td>
      <td class="image">
        <?php if(!empty($p->image)) : ?>
          <img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $p->image ?>" />
        <?php endif; ?>
      </td>
      <td class="alr"><?= $p->views ?></td>
      <td class="control"><?= anchor('admin/info/edit_post/' . $p->id, 'แก้ไขเนื้อหา') ?> | <?= anchor('admin/info/edit_post_image/' . $p->id, 'แก้ไขภาพ') ?> | <?= anchor('admin/info/delete_post/' . $p->id, 'ลบ', 'onclick=\'return confirm("ยืนยันการลบ");\'') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="addNewItem">
  <?= anchor('admin/info/add_post', 'เพิ่มข้อมูลใหม่') ?>
</div>