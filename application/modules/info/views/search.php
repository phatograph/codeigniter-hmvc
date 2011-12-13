<div class="infoContentWrapper">
  <div class="infoContent">
    <div class="box">
      <div class="boxBody">
        <div class="resultHeader">ผลการค้นหาจากคำว่า "<?= $queryString ?>"</div>
        <div class="resultCount">พบเรื่องที่เกี่ยวข้องจำนวน <?= $result_count ?> เรื่อง</div>
        <div class="resultArea">
          <?php foreach($result->result() as $r) : ?>
          <div class="line">
            <h2><?= anchor('info/post/' . $r->id, $r->topic) ?></h2>&nbsp;<h3>/ เขียนเมื่อวันที่ <?= $r->created_date ?><h3>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="pagination">
      <?= $this->pagination->create_links() ?>
    </div>
  </div>
</div>