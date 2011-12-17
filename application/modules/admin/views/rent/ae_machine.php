<div class="adminForm">
<?php 
if(isset($machine->id)) {
  echo '<h2 class="header">แก้ไขข้อมูลเครื่องจักร</h2>';
  echo form_open('admin/rent/edit_machine_post/' . $machine->id);
}
else {
  echo '<h2 class="header">เพิ่มข้อมูลเครื่องจักรใหม่</h2>';
  echo form_open('admin/rent/add_machine_post');
}
?>
    <div class="line">
      <div class="key">
        <?= form_label('รายการ', 'name'); ?>
      </div>
      <div class="value">
        <?= form_input('name', (isset($machine->name)) ? $machine->name : set_value('name')); ?>
      </div>
    </div>
    <div class="submitArea">
      <?= form_submit('submit','Save'); ?>
      <?= anchor('admin/rent', 'กลับไปจัดการราคาเช่าเครื่องจักร') ?>
    </div>
  <?= form_close(); ?>
</div>
<?php if(isset($sizes)) : ?>
<h2 class="header secondHeader">ขนาดเครื่องจักร</h2>
<?php if($sizes) : ?>
<div class="adminTable">
  <table>
    <tr>
      <th class="no" rowspan="3">ลำดับ</th>
      <th class="size" rowspan="3">ขนาดรถ</th>
      <th class="price" colspan="4">ราคา</th>
      <th class="trans" colspan="2">ค่าขนย้าย</th>
      <th class="note" rowspan="3">หมายเหตุ</th>
      <th class="name" rowspan="3">&nbsp;</th>
    </tr>
    <tr>
      <th class="price_daily" colspan="2">รายวัน</th>
      <th class="price_monthly" colspan="2">รายเดือน</th>
      <th class="trans_in" rowspan="2">ระยะทางไม่เกิน 40 กม. จากพางพลี</th>
      <th class="trans_ex" rowspan="2">ระยะทางเกิน 40 กม. จากพางพลี</th>
    </tr>
    <tr>
      <th class="with_fuel">รวมน้ำมัน</th>
      <th class="without_fuel">ไม่รวมน้ำมัน</th>
      <th class="with_fuel">รวมน้ำมัน</th>
      <th class="without_fuel">ไม่รวมน้ำมัน</th>
    </tr>
  <?php foreach($sizes as $s) : ?>
    <tr>
      <td class="alr"><?= $s->id ?></td>
      <td><?= $s->size ?></td>
      <td class="alr"><?= $s->price_daily_fuel ?></td>
      <td class="alr"><?= $s->price_daily ?></td>
      <td class="alr"><?= $s->price_monthly_fuel ?></td>
      <td class="alr"><?= $s->price_monthly ?></td>
      <td class="alr"><?= $s->trans_in ?></td>
      <td class="alr"><?= $s->trans_ex ?></td>
      <td><?= $s->note ?></td>
      <td class="control"><?= anchor('admin/rent/edit_machine_size/' . $s->id, 'แก้ไข') ?> | <?= anchor('admin/rent/delete_machine_size/' . $s->id, 'ลบ', 'onclick=\'return confirm("ยืนยันการลบ");\'') ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
</div>
<?php else : ?>
  <div class="noImage">ยังไม่มีขนาดเครื่องจักร</div>
<?php endif; ?>
<div class="addNewItem">
  <?= anchor('admin/rent/add_machine_size/' . $machine->id, 'เพิ่มขนาดเครื่องจักร'); ?>
</div>
<?php endif; ?>