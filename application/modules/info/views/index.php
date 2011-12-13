<div class="infoContentWrapper">
  <div class="infoContent">
    <?php foreach($posts->result() as $p) : ?>
    <div class="box">
      <div class="boxHeader">
        <div class="views">จำนวนผู้เข้าชม <span class="count"><?= $p->views ?></span> คน</div>
      </div>
      <div class="boxBody clearfix">
        <h2 class="topic"><?= anchor('info/post/' . $p->id, $p->topic) ?></h2>
        <div class="date">เขียนเมื่อวันที่ <?= $p->created_date ?></div>
        <div class="content">
          <?php if($p->image) : ?>
          <div class="image"><img src="<?= base_url() ?>images/uploaded/thumb_120x120/<?= $p->image ?>" alt="img"></div>
          <?php endif; ?>
          <div class="text">
            <?= $p->content ?>
          </div>
          <div class="readMore"><?= anchor('info/post/' . $p->id, 'อ่านต่อ') ?></div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>