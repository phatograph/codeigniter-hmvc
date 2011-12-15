<div class="contactWrapper">
  <?php foreach($maps->result() as $m) : ?>
  <div class="box">
    <div class="map"><img src="<?= base_url() ?>images/uploaded/<?= $m->image ?>" alt="<?= $m->image ?>"></div>
    <div class="info"><?= $m->info ?></div>
  </div>
  <?php endforeach; ?>
</div>