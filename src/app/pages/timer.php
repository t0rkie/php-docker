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
    <h1 id="timer" class="timer">00:00:00</h1>
    
    <div class="btn-wrapper">
      <button class="btn-action main-color" onclick="startTimer()">
        <img class="" src="assets/img/play_arrow.svg" alt="play">
      </button>

      <button class="btn-action" onclick="stopTimer()">
        <img class="" src="assets/img/pause.svg" alt="pause">
      </button>

      <button class="btn-action" onclick="">
        <img class="" src="assets/img/replay.svg" alt="play">
      </button>

      <button class="btn-action" onclick="endTimer()">
        終了
      </button>

    </div>
  </div>

</main>
<style>

  main {
  }

  /* タイマーモード切り替え */
  .btn-timer-mode {
    width: 200px;
  }

  .timer-wrapper {
    margin-left: 30%;
    margin-top: 10%
  }
  .timer {
    font-size: 70px;
  }

  .btn-wrapper {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .btn-action {
    width: 344px;
    height: 25px;
    border: none;
    border-radius: 10px;
  }
  .main-color {
    background: #1A4472;
  }
</style>
<script src="assets/js/timer.js"></script>

<?php render_footer();