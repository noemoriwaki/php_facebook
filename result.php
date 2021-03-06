<!-- ここからログインの為のコード -->
<?php
// phpの一番初めに記載する必要がある
session_start();
// ログインしていない場合はログイン画面へ飛ぶ　
// if (!$_SETTION["login"]) {
//     header('Location: login.php');
//     exit;
// }
// $user = $_SETTION['user'];
?>

<?php
// データーベースの読み込み
require_once("database.php");

// ５、６のsearchは別物
function selectAll($dbh, $search){
    // LIKEは文字列が一致するもの「％」を前後に使うと、その文字列を含むという意味になる
    $stmt = $dbh->prepare('SELECT * FROM posts WHERE  post_message LIKE ? ORDER BY updated_at DESC');
    $stmt->execute(["%{$search}%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function users($dbh, $user_name) {
    $stmt = $dbh->prepare('SELECT * FROM userData WHERE user_name');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

// var_dump($_POST['user_name']);

$result = selectAll($dbh, $_GET["search"]);
// var_dump($result);




?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/result.css">
    <title>検索結果</title>
</head>
<body>
    <!-- 共通のヘッダー部分の読み込み -->
    <?php include("header.php"); ?>

    <!-- ここから検索結果の読み込み -->
    <h1>投稿の検索ページ</h1>
    <div id="post">
        <?php foreach($result as $row):?>
            <div class="post_receive">
                <div class="users_img post_img">
                    <img class="users_img post_img" src="facebook_image/icon.01.jpeg" alt="users画像">
                </div>
                <!-- user_nameを表示する -->
                <p class="center">Noe Moriwaki</p>
                <p class="center"><?php echo $row['created_at'];?></p><br>
                <p class="left"><?php echo $row["post_message"];?></p>
                <?php if(!empty($row['post_image'])):?>
                 <!-- アップロードされた画像の表示 -->
                 <p><img class="upload_img" src="./upload_dir/<?php echo $row['post_image'];?>"></p>
                <?php endif ?><br>
            </div>    
        <?php endforeach ?>
    </div>

    
</body>
</html>