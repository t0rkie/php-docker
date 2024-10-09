<?php
session_start();

require_once '../app/models/User.php';

class AuthController {
  private $userModel;

  public function __construct($pdo) {
    $this->userModel = new User($pdo);
  }

  // ユーザ登録
  public function register() {
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';
      $confirmPassword = $_POST['confirm_password'] ?? '';

      if ($password !== $confirmPassword) {
        throw new Exception('パスワードが一致しません。');
      }

      try {
        $this->userModel->create($username, $password);
        header('Location: login.php'); // 登録後にログインページにリダイレクト
        exit();
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }
  }

  // ログイン処理
  public function login() {
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';

      $user = $this->userModel->authenticate($username, $password);

      if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: /');
        exit();
      } else {
        return 'Invalid username or password';
      }
    }
  }

  // ログアウト処理
  public function logout() {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
  }

  // ログイン判定
  public function isLoggedIn() {
    return isset($_SESSION['user_id']);
  }
}