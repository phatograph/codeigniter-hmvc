<h2 class="header">จัดการข้อมูลเครื่องจักร</h2>
<div class="adminTable">
  <table>
    <tr>
      <th style="width: 182px">ประเภทรถ</th>
      <th style="width: 150px">ยี่ห้อ / รุ่น</th>
      <th style="width: 150px">Serial No.</th>
      <th style="width: 50px">จำนวนชั่วโมง</th>
      <th style="width: 50px">ราคา</th>
      <th style="width: 200px">ข้อมูลอื่น ๆ</th>
      <th style="width: 60px">&nbsp;</th>
    </tr>
    <?php foreach($machines->result() as $m) : ?>
      <tr>
        <td><?= $m->name ?></td>
        <td><?= $m->brand ?></td>
        <td><?= $m->serial ?></td>
        <td><?= $m->hour ?></td>
        <td><?= $m->price ?></td>
        <td><?= $m->note ?></td>
        <td class="control"><?= anchor('admin/sell/edit_machine/' . $m->id, 'แก้ไข') ?> | <?= anchor('admin/sell/delete_machine/' . $m->id, 'ลบ', 'onclick=\'return confirm("ยืนยันการลบ");\'') ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<div class="addNewItem">
  <?= anchor('admin/sell/add_machine', 'เพิ่มเครื่องจักรใหม่') ?>
</div>