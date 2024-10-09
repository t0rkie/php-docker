<?php
class User {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  // ユーザを登録する
  public function create($username, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $this->pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->execute([
      ':username' => $username,
      ':password' => $hashedPassword
    ]);

    return $this->pdo->lastInsertId();
  }

  // ユーザを認証する
  public function authenticate($username, $password) {
    $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      // var_dump($user);
      return $user;
    }

    return false;
  }
}

