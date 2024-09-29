<?php
include 'progress_bar.php';

function render_card($subject, $days_left, $days_left_percentage, $progress) {
?>
  <div class="card">
    <h4><?= htmlspecialchars($subject); ?></h2>
    <!-- 残日数バーを表示 -->
    <?php renderProgressBar($days_left_percentage); ?>
    <p>試験まであと<?= $days_left ?>日</p>

    <!-- 進捗バーを表示 -->
    <?php renderProgressBar($progress); ?>
    <p>進捗<?= $progress ?>％</p>
  </div>
<?php
}
?>

<style>
/* カードのスタイル */
.card {
  border: 1px solid #ddd;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.card h2 {
  font-size: 1.5em;
  margin-bottom: 10px;
}

.card p {
  font-size: 1em;
  margin-bottom: 20px;
}
</style>