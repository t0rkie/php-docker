<?php
include __DIR__ . '/../helpers/functions.php';
include __DIR__ . '/../components/card.php';

$title="List";
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
  <div class="overlay hidden" id="overlay" onclick="closePopup()"></div>
  <div class="popup hidden" id="popup">
    <form action="index.php?action=regist_subject" method="POST">
      <div>
        <h1>科目登録</h1>
      </div>
      <div>
        <label for="subject_name">資格名</label>
        <input name="subject_name" id="subject_name" type="text" placeholder="FP3級">
      </div>
      <div>
        <label for="examine_day">試験日</label>
        <input name="examine_day" id="examine_day" type="date">
      </div>
      <div>
        <label for="goalStudyTime">目標学習時間(h)</label>
        <input name="goalStudyTime" id="goalStudyTime" type="number" placeholder="300">
      </div>
      <input class="btn-submit" type="submit" value="登録する">
    </form>
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
    top: 10%;
    left: 50%;
    transform: translateX(-50%) scale(0.8);
    -webkit-transform: translateX(-50%) scale(0.8);
    width: 600px;
    height: 600px;
    padding: 50px 80px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* text-align: center; */
    border-radius: 10px;
    z-index: 1000;
    opacity: 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
    -webkit-transition: opacity 0.3s ease, -webkit-transform 0.3s ease;
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
    opacity: 0;
    transition: opacity 0.3s ease;
    -webkit-transition: opacity 0.3s ease;
  }

  /* 表示時のスタイル */
  .popup.show {
    opacity: 1;
    transform: translateX(-50%) scale(1);
    -webkit-transition: translateX(-50%) scale(1);
  }
  .overlay.show {
    opacity: 1;
  }

  /* 非表示のスタイル */
  .hidden {
    display: none;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  form div {
    display: flex;
    flex-direction: column;
  }

  input {
    font-family: inherit;
    font-size: inherit;
    border-radius: .25rem;
    border: 1px solid #707070;
    outline: none;
    padding: 0.375em 0.75em;
  }

  .btn-submit {
    background: #1A4472;
    color: #FFF;
    margin-top: 40px;
  }

</style>
<script src="assets/js/popup.js"></script>

<?php render_footer();