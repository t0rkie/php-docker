<?php
include __DIR__ . '/../helpers/functions.php';
include __DIR__ . '/../components/card.php';

$title="HOME";
render_header($title);
render_sidebar();
?>

<?php
// 商品データの例（通常はデータベースから取得します）
$products = [
  [
    'subject' => '宅建',
    'days_left' => 55,
    'days_left_percentage' => 60,
    'progress_percentage' => 80,
  ],
  [
    'subject' => '宅建',
    'days_left' => 55,
    'days_left_percentage' => 60,
    'progress_percentage' => 80,
  ],
  [
    'subject' => '宅建',
    'days_left' => 55,
    'days_left_percentage' => 60,
    'progress_percentage' => 80,
  ],
  [
    'subject' => '宅建',
    'days_left' => 55,
    'days_left_percentage' => 60,
    'progress_percentage' => 80,
  ],
  [
    'subject' => '宅建',
    'days_left' => 55,
    'days_left_percentage' => 60,
    'progress_percentage' => 80,
  ],
  [
    'subject' => '宅建',
    'days_left' => 55,
    'days_left_percentage' => 60,
    'progress_percentage' => 80,
  ],
];
?>



<main style="margin-left:25%;">
  list

  <!-- カードを表示するコンテナ -->
  <div class="card-list">
  <?php 
    foreach ($products as $product):
  ?>
    <div class="card-container">
      <?php
        render_card(
          subject: $product['subject'], 
          days_left: $product['days_left'],
          days_left_percentage: $product['days_left_percentage'],
          progress: $product['progress_percentage']
        );
      ?>
    </div>
  <?php endforeach; ?>
  </div>


</main>
<style>
  .card-list {
    display: flex;
    flex-wrap: wrap; /* 要素が収まらない場合に折り返す */
    gap: 10px;
  }
  .card-container {
    width: 300px;
  }
</style>

<?php render_footer();