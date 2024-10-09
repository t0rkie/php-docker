<?php
require_once '../db/Database.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/SubjectController.php';

$db = new Database();
$pdo = $db->getConnection();

$authController = new AuthController($pdo);
$subjectController = new SubjectController();

// ルーティング
$action = filter_input(INPUT_GET, 'action') ?? null;
switch ($action) {
  case 'signup':
    $authController->register();
    break;
  case 'login':
    $authController->login();
    break;
  case 'regist_subject':
    $subjectController->addSubject();
    break;
}


$page = $_GET['page'] ?? 'home';
// セキュリティ対策：ページ名に不正な文字が含まれないか確認
$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');

$page_file = __DIR__ . '/../app/pages/' . $page . '.php';

if (file_exists($page_file)) {
  include $page_file;
} else {
  echo "Not Found";
}