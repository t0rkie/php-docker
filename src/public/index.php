<?php
$page = $_GET['page'] ?? 'home';
// セキュリティ対策：ページ名に不正な文字が含まれないか確認
$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');
echo "######################################################################" . $page;

$page_file = __DIR__ . '/../app/pages/' . $page . '.php';

if (file_exists($page_file)) {
  include $page_file;
} else {
  echo "Not Found";
}