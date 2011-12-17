<h2 class="header">จัดการราคาเช่าเครื่องจักร</h2>
<div class="adminTable">
  <table>
    <tr>
      <th style="width: 50px">ลำดับที่</th>
      <th>รายการ</th>
      <th style="width: 60px">&nbsp;</th>
    </tr>
    <?php foreach($machines->result() as $i=>$m) : ?>
    <tr>
      <td class="alr"><?= $i + 1 ?></td>
      <td><?= $m->name ?></td>
      <td><?= anchor('admin/rent/edit_machine/' . $m->id, 'แก้ไข') ?> | <?= anchor('admin/rent/delete_machine/' . $m->id, 'ลบ') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="addNewItem">
  <?= anchor('admin/rent/add_machine', 'เพิ่มเครื่องจักร') ?>
</div>
<h2 class="header secondHeader">จัดการข้อตกลงการเช่า</h2>
<div class="adminTable">
  <table>
    <tr>
      <th>ข้อตกลง</th>
      <th style="width: 60px">&nbsp;</th>
    </tr>
    <?php foreach($rules->result() as $i=>$r) : ?>
    <tr>
      <td><?= $r->rule ?></td>
      <td><?= anchor('admin/rent/edit_rent_rule/' . $r->id, 'แก้ไข') ?> | <?= anchor('admin/rent/delete_rent_rule/' . $r->id, 'ลบ', 'onclick=\'return confirm("ยืนยันการลบ");\'') ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="addNewItem">
  <?= anchor('admin/rent/add_rent_rule', 'เพิ่มข้อตกลง') ?>
</div>