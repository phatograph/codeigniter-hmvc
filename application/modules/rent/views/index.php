<div class="rentWrapper">
  <h2>ราคาเช่าเครื่องจักร</h2>
  <table>
    <tr>
      <th class="no" rowspan="3">ลำดับ</th>
      <th class="name" rowspan="3">รายการ</th>
      <th class="size" rowspan="3">ขนาดรถ</th>
      <th class="price" colspan="4">ราคา</th>
      <th class="trans" colspan="2">ค่าขนย้าย</th>
      <th class="note" rowspan="3">หมายเหตุ</th>
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
    <?php $ii = 1; ?>
    <?php $jj = 0; ?>
    <?php foreach($machines as $i => $m) : ?>
      <?php if(isset($m->sizes)) : ?>
        <?php foreach($m->sizes as $j => $s) : ?>
        <?php
          if($jj == 0) echo '<tr class="head">';
          else echo '<tr class="child">';
        ?>
          <td class="no"><?php if($jj == 0) echo $ii ?></td>
          <td class="name"><?php if($jj == 0) echo $m->name ?></td>
          <td class="size"><?= $s->size ?></td>
          <td class="price_daily_fuel"><?= $s->price_daily_fuel ?></td>
          <td class="price_daily"><?= $s->price_daily ?></td>
          <td class="price_monthly_fuel"><?= $s->price_monthly_fuel ?></td>
          <td class="price_monthly"><?= $s->price_monthly ?></td>
          <td class="trans_in"><?= $s->trans_in ?></td>
          <td class="trans_ex"><?= $s->trans_ex ?></td>
          <td class="note"><?= $s->note ?></td>
        </tr>
        <?php $jj += 1 ; ?>
        <?php endforeach; ?>
        <?php $jj = 0 ; ?>
      <?php else : ?>
      <tr class="head">
        <td class="no"><?= $ii ?></td>
        <td class="name"><?= $m->name ?></td>
        <td class="size">&nbsp;</td>
        <td class="price_daily_fuel">&nbsp;</td>
        <td class="price_daily">&nbsp;</td>
        <td class="price_monthly_fuel">&nbsp;</td>
        <td class="price_monthly">&nbsp;</td>
        <td class="trans_in">&nbsp;</td>
        <td class="trans_ex">&nbsp;</td>
        <td class="note">&nbsp;</td>
      </tr>
      <?php endif; ?>
      <?php $ii += 1; ?>
    <?php endforeach; ?>
  </table>
</div>