<div class="adminForm">
  <?php 
  if(isset($size->id)) {
    echo '<h2 class="header">แก้ไขข้อมูลขนาดเครื่องจักร</h2>';
    echo form_open('admin/rent/edit_machine_size_post/' . $size->id);
  }
  else {
    echo '<h2 class="header">เพิ่มข้อมูลขนาดเครื่องจักร</h2>';
    echo form_open('admin/rent/add_machine_size_post/' . $machine_id);
  }
  ?>
    <div class="line">
      <div class="key">
        <?= form_label('ขนาดรถ', 'size'); ?>
      </div>
      <div class="value">
        <?= form_input('size', (isset($size->size)) ? $size->size : set_value('size')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ราคารายวัน (รวมน้ำมัน)', 'price_daily_fuel'); ?>
      </div>
      <div class="value">
        <?= form_input('price_daily_fuel', (isset($size->price_daily_fuel)) ? $size->price_daily_fuel : set_value('price_daily_fuel')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ราคารายวัน (ไม่รวมน้ำมัน)', 'price_daily'); ?>
      </div>
      <div class="value">
        <?= form_input('price_daily', (isset($size->price_daily)) ? $size->price_daily : set_value('price_daily')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ราคารายเดือน (รวมน้ำมัน)', 'price_monthly_fuel'); ?>
      </div>
      <div class="value">
        <?= form_input('price_monthly_fuel', (isset($size->price_monthly_fuel)) ? $size->price_monthly_fuel : set_value('price_monthly_fuel')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ราคารายเดือน (ไม่รวมน้ำมัน)', 'price_monthly'); ?>
      </div>
      <div class="value">
        <?= form_input('price_monthly', (isset($size->price_monthly)) ? $size->price_monthly : set_value('price_monthly')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ระยะทางไม่เกิน 40 กม. จากพางพลี', 'trans_in'); ?>
      </div>
      <div class="value">
        <?= form_input('trans_in', (isset($size->trans_in)) ? $size->trans_in : set_value('trans_in')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('ระยะทางเกิน 40 กม. จากพางพลี', 'trans_ex'); ?>
      </div>
      <div class="value">
        <?= form_input('trans_ex', (isset($size->trans_ex)) ? $size->trans_ex : set_value('trans_ex')); ?>
      </div>
    </div>
    <div class="line">
      <div class="key">
        <?= form_label('หมายเหตุ', 'note'); ?>
      </div>
      <div class="value">
        <?= form_input('note', (isset($size->note)) ? $size->note : set_value('note')); ?>
      </div>
    </div>
    <div class="submitArea">
      <?= form_submit('submit','Save'); ?>
      <?php if(isset($machine_id)) : ?>
      <?= anchor('admin/rent/edit_machine/' . $machine_id, 'กลับไปจัดการเครื่องจักร') ?>
      <?php elseif(isset($size->rent_id)) : ?>
      <?= anchor('admin/rent/edit_machine/' . $size->rent_id, 'กลับไปจัดการเครื่องจักร') ?>
      <?php endif; ?>
    </div>
    <?php 
    if(isset($size->id)) {
      echo form_hidden('rent_id', $size->rent_id);
    }
    ?>
  <?= form_close(); ?>
</div>