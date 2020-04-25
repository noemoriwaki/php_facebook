<?php
// データベースの読み込み

require_once("database.php");
function create($dbh, $user_name, $user_icon, $user_header_image, $employer, $alma_mater, $home_address, $birth_place) {
    $stmt = $dbh->prepare("INSERT INTO users( user_name, user_icon, user_header_image, employer, alma_mater, home_address, birth_place ) VALUES(?,?,?,?,?,?,?)");
    $data = [];
    $data[] = $user_name;//入力する順番が大事。上のcreateと同じ順番で入力する
    $data[] = $user_icon;
    $data[] = $user_header_image;
    $data[] = $employer;
    $data[] = $alma_mater;
    $data[] = $home_address;
    $data[] = $birth_place;
    $stmt->execute($data);
}
 function selectAll($dbh){
    $stmt = $dbh->prepare('SELECT * FROM users ORDER BY updated_at DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
// $_POSTが入っている時にcreateを実行する
//  if (!empty($_POST)) {
//      create($dbh, "1", $_POST["message"], basename($_FILES['uploaded_file']['name']));
// }
// 全ての投稿データを$resultに入れている
$result = selectAll($dbh);


?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/responsive_header.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
         <title>基本ページ</title>
    </head>
    <body>
        <header class="header_top">
            <div class="header_logo">
                <img src="facebook_image/facebook.png" alt="facebookのアイコン画像">
            </div>
                <form  class="header_seach" action="" method="POST">
                <input type="text" name="search" placeholder="検索">
                <button type="button" name="name" value="検索"><i class="fas fa-search"></i></button>　
                </form>
            <div class="header_nav">
                <nav>
                    <a href="facebook.php">プロフィール</a><!--自分のプロフィールホームへ飛ぶようにする（このページ）-->
                    <a href="#">ホーム</a>
                    <a href="#">友達</a>
                    <a href="#">お知らせ</a>
                    <a href="#">ログイン</a>
                </nav>
            </div>
        </header>
        <div id="wrapper">
            <div class="wrapper_image">
                <!-- メインの画像 -->
                <img src="facebook_image/IMG_0009.jpeg" alt="兄弟の写真">
            </div>
            <div id="users">
                <!-- user_nameを出力 -->
                <a href="#"><p>Noe Moriwaki</p></a>
                    <div class="users_img wrapper_img">
                        <img src="facebook_image/icon.01.jpeg" alt="icon画像">
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
        <div id="basic_info">
            <a href="users.php"><h1>基本データの編集する</h1></a>
                <table class="table">
                    <tr>
                        <th>勤務先</th>
                        <td>株式会社サイゼリヤ</td>
                    </tr>
                    <tr>
                        <th>出身校</th>
                        <td>神戸学院大学</td>
                    </tr>
                    <tr>
                        <th>居住地</th>
                        <td>愛知県</td>
                    </tr>
                    <tr>
                        <th>出身地</th>
                        <td>兵庫県</td>
                    </tr>
                </table>
        </div>
    </body>   
</html>

        <!-- ユーザー情報(users)
  - ID(id) int
  - 名前(user_name) varchar(100)
  - アイコン画像(user_icon) varchar(100)
  - ヘッダー画像(user_header_image) varchar(100)
  - 勤務先(employer) varchar(200)
  - 出身校(alma_mater) varchar(200)
  - 住んでいる場所(home_address) varchar(200)
  - 出身地(birthplace) varchar(200)
  - 作成日(created_at) datetime
  - 更新日(updated_at) datetime -->