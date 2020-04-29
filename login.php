<?php
// データーベースの読み込み
require_once("databace.php");

// データーベースの読み込み
function findUserByEmail($dbh, $user_name, $email, $password){
$sql = "SELECT * FROM users WHERE email = ? ";
    $stmt = $dbh->prepare($sql);
    $data[] = $email;
    $stmt->execute($data);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
// Emailが合っているのか参照
if (!empty($_POST)) {
    // emailが合っている場合
    $user = findUserByEmail($dbh, $_POST["email"]);
        //passwordも合っている場合
    if(password_verify($_POST["password"], $user["password"])) {
        // ログイン状態にする
        $_SESSION["login"] = true;
        // どのページでもログイン状態にする
        $_SESSION["user"] = $user;
        // ログインするとマイページへ飛ぶ
        header('Location: base.php');
        exit;
    } else {
        echo 'Invalid password.';
    }
}

// ログインしているのか表示
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
    <title>ログインページ</title>
</head>
<body>
    <h1>ログインページ</h1>
        <form action="./login.php" method="POST">
            <label>ユーザー名：<input type="text" name="user_name" placeholder ="お名前"></label><br>
            <label>メールアドレス<input type="Email" name="email" placeholder="メールアドレス"></label><br>
            <label>パスワード：<input type="password" name="password" id="" placeholder ="パスワード"></label><br>
            <button type="submit">登録</button>
        </form>

    
</body>
</html>