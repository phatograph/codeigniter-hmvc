<ul>
  <?php foreach($machines as $m) : ?>
    <li><?= $m->name ?></li>
    <?php if(isset($m->img)) : ?>
      <ul>
        <?php foreach($m->img as $i) : ?>
          <li><img src="<?= base_url();?>images/uploaded/thumb_120x120/<?= $i->imgname ?>" alt="<?= $i->imgid ?>" /></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  <?php endforeach; ?>
</ul>