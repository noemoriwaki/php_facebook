<!-- ログアウトページ -->
<?php
// セッション開始
 session_start();
// セッション変数を全て削除
$_SETTION = array();
// セッションクッキーを削除
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSEEID",'', time() -1800, '/');
}

// セッションの登録データを削除
session_destroy();
?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
    <h1>ログアウトページ</h1>
        <p>ログアウトしました。</p>
    
</body>
</html>