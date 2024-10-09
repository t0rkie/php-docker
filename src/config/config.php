<?php
// .env読み込み
function loadEnv($path) {
  echo "################".$path;
  if (!file_exists($path)) {
    throw new Exception('.env file not found');
  }
  $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  foreach($lines as $line) {
    if (strpos(trim($line), '#') === 0) {
      // コメント行は除外
      continue;
    }
    list($key, $value) = explode('=', $line, 2);
    $key = trim($key);
    $value = trim($value);
    if (!array_key_exists($key, $_ENV)) {
      $_ENV[$key] = $value;
    }
  }
}

loadEnv(__DIR__ . '/../../.env');

// データベースの接続設定
define('DB_HOST', 'mysql');
define('DB_NAME', $_ENV['MYSQL_DATABASE']);
define('DB_USER', $_ENV['MYSQL_USER']);
define('DB_PASSWORD', $_ENV['MYSQL_PASSWORD']);
define('DB_CHARSET', 'utf8mb4');

// エラーレポートの設定（開発環境向け）
error_reporting(E_ALL);
ini_set('display_errors', 1);