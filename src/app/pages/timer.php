<?php
include __DIR__ . '/../helpers/functions.php';


$title="HOME";
render_header($title);
render_sidebar();
?>


<main style="margin-left:300px;">

  <button>タイマー</button>
  <button>ストップウォッチ</button>

  
  <h1 id="timer">00:00:00</h1>
  <button onclick="startTimer()">スタート</button>
  <button onclick="endTimer()">終了</button>
  <button onclick="stopTimer()">停止</button>

</main>
<script>
let timerInterval = null; // タイマーのintervalを保持する変数

// ローカルストレージに開始時間があるか確認
let startTime = localStorage.getItem('startTime');

// ページ読み込み時にカウントを再開する
if (startTime) {
  // ローカルストレージから取得したタイムスタンプと現在時間の差を計算
  let elapsedSeconds = Math.floor((Date.now() - startTime) / 1000);
  startCountUp(elapsedSeconds);  // 経過秒数を基にタイマーを再開
}

// タイマーをフォーマットして表示する関数
function updateTimer(seconds) {
  // 時、分、秒に変換
  let hours = Math.floor(seconds / 3600);
  let minutes = Math.floor((seconds % 3600) / 60);
  let secs = seconds % 60;

  // 2桁の表示にするためにゼロ埋め
  hours = String(hours).padStart(2, '0');
  minutes = String(minutes).padStart(2, '0');
  secs = String(secs).padStart(2, '0');

  // タイマーを表示
  document.getElementById('timer').textContent = `${hours}:${minutes}:${secs}`;
}

// カウントアップを開始する関数
function startCountUp(initialSeconds) {
  let seconds = initialSeconds;

  // 1秒ごとにタイマーを更新
  timerInterval = setInterval(() => {
    updateTimer(seconds);
    seconds++;
  }, 1000);
}

// タイマーをスタートする関数
function startTimer() {
  if (!timerInterval) {
    // 現在のタイムスタンプを取得してローカルストレージに保存
    startTime = Date.now();
    localStorage.setItem('startTime', startTime);

    // 0秒からカウントアップを開始
    startCountUp(0);
  }
}

function endTimer() {

}

function stopTimer() {
  
}
</script>

<?php render_footer();