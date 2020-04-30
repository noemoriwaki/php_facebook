<!-- 登録ページ -->
<?php
// 新しいセッションを開始 ログインを開始
session_start();
// データーベースの読み込み
require_once("database.php");

// データベースに登録
function create($dbh, $userName, $email, $password) {
    $stmt = $dbh->prepare("INSERT INTO userData(user_name, email, password) VALUES(?,?,?)");
    $data = [];
    $data[] = $userName;
    $data[] = $email;
    // パスワードを暗号化する
    $data[] = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute($data);
}


// POSTに値が入っている時送信する
if (!empty($_POST)) {
    create($dbh, $_POST["user_name"], $_POST["email"], $_POST["password"],);
}
// ログインしているときにログインしていることを表示する
if ($_SESSION["login"]) {
    echo "ログインしています。";
} else {
    echo "ログインしていません。";
}


?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録ページ</title>
</head>
<body>
    <h1>ユーザー登録ページ</h1>
        <form action="./registrantion.php" method="POST">
            <label>ユーザー名：<input type="text" name="user_name" placeholder ="お名前"></label><br>
            <label>メールアドレス<input type="Email" name="email" placeholder="メールアドレス"></label><br>
            <label>パスワード：<input type="password" name="password" id="" placeholder ="パスワード"></label><br>
            <button type="submit">登録</button>
        </form>


    
</body>
</html>