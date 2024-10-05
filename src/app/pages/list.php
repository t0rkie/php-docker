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
  [
    'subject' => '宅建',
    'days_left' => 55,
    'days_left_percentage' => 60,
    'progress_percentage' => 80,
  ],
];
?>

<main style="margin-left:300px;">
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
    <div class="card-container card-add" onclick="showPopup()">
      <img class="img-add" src="assets/img/add.svg" alt="add">
    </div>
  </div>
  <!-- オーバーレイとポップアップ -->
  <div class="overlay hidden" id="overlay"></div>
  <div class="popup hidden" id="popup">
    <h2>勉強をスタートします</h2>
    <p>がんばりましょう！<p>
    <p id="countdown" class="countdown">3</p>
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
    cursor: pointer;
  }
  .card-add {
    display: flex;
    justify-content: center; /* 水平方向の中央揃え */
    align-items: center; /* 垂直方向の中央揃え */
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    height: 175px;
  }
  .img-add {
    width: 30px;
  }

  /*
   * オーバーレイとポップアップ
   */
  /* ポップアップのスタイル */
  .popup {
    position: fixed;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);
    width: 800px;
    height: 300px;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    border-radius: 10px;
    z-index: 1000;
  }
  .countdown {
    font-size: 70px;
  }

  /* 背景のオーバーレイ */
  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
  }

  /* 非表示のスタイル */
  .hidden {
    display: none;
  }
</style>
<script src="assets/js/popup.js"></script>

<?php render_footer();