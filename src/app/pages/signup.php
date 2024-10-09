<?php
include __DIR__ . '/../helpers/functions.php';


$title="signup";
render_header($title);
?>

<form action="index.php?action=signup" method="POST">
        <label for="username">ユーザー名:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="confirm_password">パスワード確認:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br>
        <button type="submit">登録する</button>
    </form>
    <p>すでにアカウントをお持ちですか？ <a href="login.php">ログイン</a></p>