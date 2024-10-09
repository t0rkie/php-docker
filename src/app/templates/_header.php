<?php
require_once '../db/Database.php';
require_once '../app/controllers/AuthController.php';

// session_start();

$db = new Database();
$pdo = $db->getConnection();

$auth = new AuthController($pdo);

$currentPage = $_SERVER['REQUEST_URI'];

if (!$auth->isLoggedIn()) {
  if (!str_contains($currentPage, 'login') && !str_contains($currentPage, 'signup')) {
    header('Location: /login');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title><?php echo $title ?? '資格サポート'; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="assets/css/style.css">
</script>
</head>
<body>