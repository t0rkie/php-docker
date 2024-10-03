<?php
function renderProgressBar($percentage) {
?>
  <div class="progress-container">
    <div class="progress-bar" data-percentage="<?= $percentage; ?>"></div>
  </div>
<?php
}
?>

<style>
/* プログレスバーのスタイル */
.progress-container {
  width: 100%;
  background-color: #DDDDDD;
  border-radius: 5px;
  overflow: hidden;
  height: 10px;
}

.progress-bar {
  width: 0%;
  height: 100%;
  background-color: #1A4472;
  text-align: center;
  line-height: 30px;
  color: white;
  font-weight: bold;
  border-radius: 5px;
  transition: width 0.5s ease;
}

/* ページ読み込み時に幅を変更するためのクラス */
.animate {
  width: auto; /* JavaScriptで指定された幅に応じて変更 */
}
</style>
<script>
// ページが読み込まれたらすべてのプログレスバーにアニメーションを適用
window.onload = function() {
  const progressBars = document.querySelectorAll('.progress-bar');
  progressBars.forEach(function(bar) {
    const percentage = bar.getAttribute('data-percentage');
    bar.style.width = percentage + '%';  // アニメーションで幅を設定
  });
};
</script>