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
      <div class="header">เรื่องที่นิยม</div>
      <div class="list">
        <ul>          
          <?php foreach($posts_sort->result() as $p) : ?>
            <li><?= anchor('info/post/' . $p->id, $p->topic) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="box">
      <div class="header">เรื่องที่เขียนล่าสุด</div>
      <div class="list">
        <ul>
          <?php foreach($posts->result() as $p) : ?>
            <li><?= anchor('info/post/' . $p->id, $p->topic) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <?php
    if(isset($post)) {
      $data['p'] = $post;
    }
    if(isset($posts)) {
      $data['posts'] = $posts;
    }
    if(isset($result)) {
      $data['result'] = $result;
    }
    if(isset($queryString)) {
      $data['queryString'] = $queryString;
    }
    $this->load->view($control, $data);
  ?>
</div>