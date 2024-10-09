<?php
include __DIR__ . '/../helpers/functions.php';

$title="HOME";
render_header($title);
render_sidebar();
?>


<main style="margin-left:300px;">

  <button class="btn-timer-mode">ストップウォッチ</button>
  <button class="btn-timer-mode">タイマー</button>

  <div class="timer-wrapper">
    <div class="status-status-wrapper">
      <h1 id="timer" class="timer">00:00:00</h1>

      <div id="study-status" class="study-status">NOW STUDYING</div>
    </div>
    
    <div class="btn-wrapper">
      <button id="toggle_play" class="btn-action main-color" onclick="startTimer()">
        <img class="" src="assets/img/play_arrow.svg" alt="play">
      </button>

      <button id="toggle_pause" class="btn-action" onclick="stopTimer()">
        <img class="" src="assets/img/pause.svg" alt="pause">
      </button>

      <button class="btn-action" onclick="resetTimer()">
        <img class="" src="assets/img/replay.svg" alt="reset">
      </button>

      <button class="btn-action" onclick="endTimer()">
        終了
      </button>

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
  button {
    cursor: pointer;
  }
  /* タイマーモード切り替え */
  .btn-timer-mode {
    width: 200px;
  }

  .timer-wrapper {
    margin-left: 30%;
    margin-top: 100px;
  }
  .status-status-wrapper {
    height: 200px;
  }
  .timer {
    font-size: 70px;
    font-weight: lighter;
    color: #161a2d;
  }
  .study-status {
    /* background: #FFD700; */

  }

  .btn-wrapper {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .btn-action {
    width: 344px;
    height: 28px;
    border: none;
    border-radius: 10px;
  }
  .main-color {
    background: #1A4472;
  }
  /*
   * オーバーレイとポップアップ
   */
  /* ポップアップのスタイル */
  .popup {
    position: fixed;
    top: 20%;
    left: 60%;
    transform: translateX(-60%);
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
<script src="assets/js/timer.js"></script>

<?php render_footer();