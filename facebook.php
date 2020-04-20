<?php
$uploaded = false;
if (!empty($_FILES['uploaded_file'])) { 
  $upload_dir = './upload_dir/';
  $uploaded_file = $upload_dir . basename($_FILES['uploaded_file']['name']);
  move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploaded_file);
  $uploaded = true;
}

$images = glob('./upload_dir/*');
require_once("database.php");
function create($dbh, $user_id, $message,$post_image) {
    $stmt = $dbh->prepare("INSERT INTO posts( user_id, post_message, post_image) VALUES(?,?,?)");
    $data = [];
    $data[] = $user_id;//入力する順番が大事。上のcreateと同じ順番で入力する
    $data[] = $message;
    $data[] = $post_image;
    $stmt->execute($data);
}
 function selectAll($dbh){
    $stmt = $dbh->prepare('SELECT * FROM posts ORDER BY updated_at DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
// $_POSTが入っている時にcreateを実行する
 if (!empty($_POST)) {
     create($dbh, "1", $_POST["message"], basename($_FILES['uploaded_file']['name']));
}
// 全ての投稿データを$resultに入れている
$result = selectAll($dbh);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="css/facebook.css">
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/responsive_header.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
         <title>facebook</title>
    </head>
    <body>
        <header class="header_top">
            <div class="header_logo">
                <img src="facebook_image/facebook.png" alt="facebookのアイコン画像">
            </div>
                <form  class="header_seach" action="" method="POST">
                <input type="text" name="search" placeholder="検索">
                <button type="submit" name="name" value=""><i class="fas fa-search"></i></button>
                </form>
            <div class="header_nav">
                <nav>
                    <a href="facebook.php">プロフィール</a><!--自分のプロフィールホームへ飛ぶようにする（このページ）-->
                    <a href="#">ホーム</a>
                    <a href="friends.php">友達</a>
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
        <main>
            <div id="friends">
            <a  class="friends_link" href="#"><p>友達</p></a><br>
                <!-- 友達について -->
                    <div class="contents">
                            <div class="content">
                                <a href=""><img src="facebook_image/friends01.jpeg" alt=""><p class="friend">友達1</p></a>
                            </div>
                            <div class="content">
                                <a href=""><img src="facebook_image/friends02.jpeg" alt=""><p class="friend">友達2</p></a>
                            </div>
                            <div class="content">
                                <a href=""><img src="facebook_image/friends03.jpeg" alt=""><p class="friend">友達3</p></a>
                            </div>
                            <div class="content">
                                <a href=""><img src="facebook_image/friends04.jpeg" alt=""><p class="friend">友達4</p></a>
                            </div>
                            <div class="content">
                                <a href=""><img src="facebook_image/friends05.jpeg" alt=""><p class="friend">友達5</p></a>
                            </div>
                            <div class="content">
                                <a href=""><img src="facebook_image/friends06.jpeg" alt=""><p class="friend">友達6</p></a>
                            </div>
                        </div>
            </div>
                <!-- ここから投稿ページ -->
                <div id="form">
                        <!-- 投稿を入力と送信 -->
                            <?php if ($uploaded): ?>
                            <p class="upload"><?php echo "ファイルのアップロードが完了しました。";?></p>
                            <?php endif ?>
                            <!-- enctype="multipart/form-data" ファイルを送るときはこれをいれる-->
                            <form enctype="multipart/form-data" action="facebook.php" method="POST">
        <!-- ユーザーの名前とアイコンを表示したい -->
                                <!-- <input type="text" name="user_name" placeholder="ユーザーの名前"> -->

                                <input type="hidden" name="name" value="value"/>
                                <!-- プレビューの為のコード -->
                                <span class="filelabel" tiltle="ファイルを選択"><i class="fas fa-camera"></i><input name="uploaded_file" type="file" id="display" onchange="previewImage(this);"/></span>
                                <!-- 投稿のエリア -->
                                <textarea name="message" id="contents" cols="100" rows="10" placeholder="今なにしてる？"></textarea>     
                                <button type="submit" name="btn_submit"><i class="fas fa-pen"></i>投稿を作成</button>
                            </form>
                            <!-- プレビュー --><br>
                                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:50%;">
                                    <script>
                                        function previewImage(obj)
                                        {
                                            var fileReader = new FileReader();
                                            fileReader.onload = (function() {
                                                document.getElementById('preview').src = fileReader.result;
                                            });
                                            fileReader.readAsDataURL(obj.files[0]);
                                        }
                                    </script>    
                
                </div>
                <!-- ここから投稿表示 -->
            <div id="post">
                <div class="post_header">
                    <div class="users_img post_img">
                        <img src="facebook_image/icon.01.jpeg" alt="users画像">
                    </div>
                    <div class="post_info">
                        <!-- 日時を追加できるようにする -->
                    </div>
                        <?php foreach( $result as $row):?>
                            <div class="post_receive">

                                <p><?php echo $row['user_id'];?></p>
                                <p><?php echo $row['created_at'];?></p>
                                <p><?php echo $row['post_message'];?> </p>

                            <!-- post_imageが入っている時実行する -->
                                <?php if (!empty($row['post_image'])): ?>
                                    <img class="upload_img" src="./upload_dir/<?php echo $row['post_image'];?>">
                                <?php endif ?>
                            
                            <!-- いいねボタンを実装してみる -->
                            
                                <!--*****facebook.php-->
                                <button class="letsVote" data-num="buttonNUM" data-numhtml="countNum1">
                                <span class="countNum1"><?php echo getVoteCount('buttonNUM'); ?></span>いいね!
                                <button>
                            
                                <!-- clickCount.jsとfunction.phpを読み込ませます -->
                                <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
                                <script type="text/javascript" src="js/clickCount.js"></script>

                                <!-- include -->
                                <?
                                include_once(dirname(__FILE__) . 'fucntion.php');
                                ?>
                                <!-- include -->

                                <button class="letsVote" data-num="buttonNUM" data-numhtml="countNum1">
                                <span class="countNum1"><?php echo getVoteCount('buttonNUM'); ?></span>超いいね！
                                <button>
                                
                            </div>
                        <?php endforeach ?>
                </div>
            </div>
        </main>
    </body>
</html>