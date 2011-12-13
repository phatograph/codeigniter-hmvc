<div class="rentWrapper">
  <h2>ราคาเช่าเครื่องจักร</h2>
  <table>
    <tr>
      <th rowspan="3">ที่</th>
      <th rowspan="3">รายการ</th>
      <th colspan="4">ราคา</th>
      <th rowspan="3">หมายเหตุ</th>
    </tr>
    <tr>
      <th colspan="2">รายวัน</th>
      <th colspan="2">รายเดือน</th>
    </tr>
    <tr>
      <th>รวมน้ำมัน</th>
      <th>ไม่รวมน้ำมัน</th>
      <th>รวมน้ำมัน</th>
      <th>ไม่รวมน้ำมัน</th>
    </tr>
    <?php foreach($machines->result() as $i => $m) :?>
    <tr>
      <td><?= $i+1 ?></td>
      <td><?= $m->name ?></td>
      <td><?= $m->price_daily_fuel ?></td>
      <td><?= $m->price_daily ?></td>
      <td><?= $m->price_monthly_fuel ?></td>
      <td><?= $m->price_monthly ?></td>
      <td><?= $m->note ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>