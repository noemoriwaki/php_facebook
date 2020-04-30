<!-- ログインページ -->
<?php
// セッションを開始
session_start();
// データーベースの読み込み
require_once("database.php");

// データーベースの読み込み
function findUserByEmail($dbh,  $email){
$sql = "SELECT * FROM userData WHERE email = ? ";
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
        header('Location: facebook.php');
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
        <form action="./login.php" methot="POST">
        <label>メールアドレス：<input type="Email" name="email"></label><br>
        <label>パスワード：<input type="password" name="password"></label><br>
        <button type="submit" name="submit">ログイン</button>
    </form>
    <a href="registration.php">新規登録の方はこちらへ</a>

    
</body>
</html>