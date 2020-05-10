<?php
session_start();

// アップしたファイルの読み込み
$images = glob('./upload_dir/*');

require_once("database.php");

function create($dbh, $post_image) {
    $stmt = $dbh->prepare("INSERT INTO posts( user_id, post_image) VALUES(?,?)");
    $data = [];
    $data[] = $post_image;
    $stmt->execute($data);
}
function selectAll($dbh){
    $stmt = $dbh->prepare('SELECT * FROM posts ORDER BY updated_at DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
// 全ての投稿データを$resultに入れている
$result = selectAll($dbh);

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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
         <title>基本ページ</title>
    </head>
    <body>
    <!-- 共通のヘッダー部分の読み込み -->
    <?php include("header.php"); ?>
    
                <!-- 写真一覧 -->
        <div id="photos">
            <?php foreach($result as $row):?>
                <p><?php echo $row["post_image"]; ?></p>
            <?php endforeach ?>
        </div>
    </body>
</html>
