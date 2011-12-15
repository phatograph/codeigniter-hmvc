<div class="infoWrapper clearfix">
  <div class="infoSidebar">
    <div class="searchBox">
      <?= form_open('info/search'); ?>
        <?php
          $v = '';
          if(isset($queryString)) {
            $v = $queryString;
          }
          echo form_input('text', $v, 'class="searchInput"');
        ?>
        <?= form_submit('submit', '', 'class="searchSubmit"'); ?>
      <?= form_close(); ?>
    </div>
    <div class="box">
      <div class="header">ประเภทรถ</div>
      <div class="list">
        <ul>
        </ul>
      </div>
    </div>
    <div class="box">
      <div class="header">ยี่ห้อรถ</div>
      <div class="list">
        <ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="infoContentWrapper">
    <div class="infoContent">
      <?php foreach($machines as $m) : ?>
      <div class="sellBox clearfix">
        <div class="image">
          <?php if(isset($m->img)) : ?>
          <div>
            <img src="<?= base_url() ?>images/uploaded/<?= reset($m->img)->imgname ?>" />
          </div>
          <ul class="clearfix">
            <? foreach($m->img as $i) : ?>
             <li><img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $i->imgname ?>" /></li>
            <? endforeach; ?>
          </ul>
          <?php else : ?>
          <div class="noImage">ยังไม่มีภาพ</div>
          <?php endif; ?>
        </div>
        <div class="info">
          <div class="line">
            <div class="left">ประเภทรถ</div>
            <div class="right"><?= $m->name ?></div>
          </div>
          <div class="line">
            <div class="left">ยี่ห้อ / รุ่น</div>
            <div class="right"><?= $m->brand ?></div>
          </div>
          <div class="line">
            <div class="left">Serial No.</div>
            <div class="right"><?= $m->serial ?></div>
          </div>
          <div class="line">
            <div class="left">จำนวนชั่วโมง</div>
            <div class="right"><?= $m->hour ?></div>
          </div>
          <div class="line">
            <div class="left">ราคา</div>
            <div class="right"><?= $m->price ?></div>
          </div>
          <div class="line">
            <div class="left">ข้อมูลอื่น ๆ</div>
            <div class="right"><?= $m->note ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <div class="pagination">
        <?= $this->pagination->create_links() ?>
      </div>
    </div>
  </div>
</div>