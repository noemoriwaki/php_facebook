<?php

// アップしたファイルの読み込み
$images = glob('./upload_icon/*');


// データベースの読み込み
require_once("database.php");

// データベースに登録
function run($dbh, $user_icon) {
    $stmt = $dbh->prepare("INSERT INTO user_image( user_icon) VALUES(?)");
    $data = [];
    $data[] = $user_icon;//入力する順番が大事。上のrunと同じ順番で入力する
    // $data[] = $user_wrapper;
    $stmt->execute($data);
}
// $_POSTが入っている時にrunを実行する
 if (!empty($_POST)) {
     run($dbh, basename($_FILES['uploaded_file']['name']));
}
var_dump("$_POST");

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <meta name="description" content="PHPによるfacebookのクローンの作成練習のために作られたサイトです。">
    <!-- OGPを設定する   -->
        <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
 
        <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
            <!-- ページのURL -->
        <meta property="og:url" content=" ページの URL" />
            <!-- ページの種類 -->
        <meta property="og:type" content="facebook" />
            <!-- ページのタイトル -->
        <meta property="og:title" content="facebookのクローン" />
            <!-- ページのディスクリプション -->
        <meta property="og:description" content="PHPによるfacebookのクローンの作成練習のために作られたサイトです。" />
            <!-- ページのサイト名 -->
        <meta property="og:site_name" content="Facebook" />
            <!-- サムネイル画像のURL -->
        <meta property="og:image" content=" サムネイル画像の URL" />    
    <!-- OGPここまで -->
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
         <title>facebook</title>
    </head>
    <body>
        <header class="header_top">
            <div class="header_logo">
                <img src="facebook_image/facebook.png" alt="facebookのアイコン画像">
            </div>
                <form  class="header_seach" action="result.php" method="GET">
                <input type="text" name="search" placeholder="検索">
                <button type="submit" name="name" value=""><i class="fas fa-search"></i></button>
                </form>
            <div class="header_nav">
                <nav>
                    <a href="facebook.php">プロフィール</a><!--自分のプロフィールホームへ飛ぶようにする（このページ）-->
                    <a href="#">ホーム</a>
                    <a href="friends.php">友達</a>
                    <a href="#">お知らせ</a>
                    <a href="login.php">ログイン</a>
                </nav>
            </div>
        </header>
        <div id="wrapper">
            <div class="wrapper_image">
                <!-- メインの画像 -->
                <img src="facebook_image/IMG_0009.jpeg" alt="兄弟の写真">
            </div>
            <div id="users">
                <a href="#"><p>Noe Moriwaki</p></a>
                    <div class="users_img wrapper_img">
                     <img src="./upload_icon/<?php echo $_FILES['uploaded_file'];?>">
                    </div>
            </div>
            <div class="wrapper_nav">
                <nav>
                    <a href="facebook.php">タイムライン</a>
                    <a href="base.php">基本データ</a>
                    <a href="friends.php">友達</a>
                    <a href="photo.php">写真</a>
                    <a href="#">アーカイブ</a>
                    <a href="#">その他</a>
                </nav>
            </div>
        </div>
</body>
</html>