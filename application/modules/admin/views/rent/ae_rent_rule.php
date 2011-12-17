<div class="adminForm">
  <?php 
  if(isset($rule->id)) {
    echo '<h2 class="header">แก้ไขข้อมูลข้อตกลง</h2>';
    echo form_open('admin/rent/edit_rent_rule_post/' . $rule->id);
  }
  else {
    echo '<h2 class="header">เพิ่มข้อมูลข้อตกลงใหม่</h2>';
    echo form_open('admin/rent/add_rent_rule_post');
  }
  ?>
    <div class="line">
      <div class="key">
        <?= form_label('ข้อตกลง'); ?>    
      </div>
      <div class="value">
        <?= form_input('rule', (isset($rule->rule)) ? $rule->rule : set_value('rule'), 'style="width: 900px"'); ?>
      </div>
    </div>
    <div class="submitArea">
      <?= form_submit('submit','Save'); ?>
      <?= anchor('admin/rent', 'กลับไปจัดการราคาเช่าเครื่องจักร') ?>
    </div>
  <?= form_close(); ?>
</div>