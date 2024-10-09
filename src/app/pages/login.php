<?php
include __DIR__ . '/../helpers/functions.php';

$title="login";
render_header($title);
?>


<form action="index.php?action=login" method="POST">
        <label for="username">ユーザー名:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">ログイン</button>
    </form>


<?php render_footer();