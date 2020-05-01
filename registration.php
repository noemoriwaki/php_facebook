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
    <link rel="stylesheet" href="css/registration.css">

    <title>ユーザー登録ページ</title>
</head>
<body>
    <!-- 共通のログインnavを読み込み -->

    <h1>ユーザー登録ページ</h1>
        <form action="./registration.php" method="POST">
            <table>
            <tr>
                    <th>ユーザー名</th>
                    <td><input type="text" name="user_name" placeholder ="お名前"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="email" name="email" placeholder="メールアドレス"></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input type="password" name="password" id="" placeholder ="パスワード"></td>
                </tr>
            </table>
                    <button type="submit" id="button">登録</button>
        </form>

    <a href="login.php">アカウントをお持ちの方はこちら</a>


    
</body>
</html>