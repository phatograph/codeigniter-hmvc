<div class="infoContentWrapper">
  <div class="infoContent">
    <div class="box">
      <div class="boxHeader">
        <div class="views">จำนวนผู้เข้าชม <span class="count"><?= $p->views ?></span> คน</div>
      </div>
      <div class="boxBody clearfix">
        <h2 class="topic"><?= $p->topic ?></h2>
        <div class="date">เขียนเมื่อวันที่ <?= $p->created_date ?></div>
        <div class="content">
          <?php if($p->image) : ?>
          <div class="imageFull"><img src="<?= base_url() ?>images/uploaded/<?= $p->image ?>" alt="img"></div>
          <?php endif; ?>
          <div class="textFull">
            <?= $p->content ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>