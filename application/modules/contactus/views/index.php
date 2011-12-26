<div class="contactWrapper">
  <?php foreach($maps->result() as $m) : ?>
  <div class="box">
    <?php if($m->image) : ?>
    <div class="map"><img src="<?= base_url() ?>images/uploaded/<?= $m->image ?>" alt="<?= $m->image ?>"></div>
    <?php endif; ?>
    <div class="info"><?= $m->info ?></div>
  </div>
  <?php endforeach; ?>
</div>