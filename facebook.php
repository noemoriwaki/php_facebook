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
$uploaded = false;
if (!empty($_FILES['uploaded_file'])) { 
  $upload_dir = './upload_dir/';
  $uploaded_file = $upload_dir . basename($_FILES['uploaded_file']['name']);
  move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploaded_file);
  $uploaded = true;
}
$uploaded = false;
if (!empty($_FILES['uploaded_file2'])) { 
  $upload_dir = './upload_dir/';
  $uploaded_file = $upload_dir . basename($_FILES['uploaded_file2']['name']);
  move_uploaded_file($_FILES['uploaded_file2']['tmp_name'], $uploaded_file);
  $uploaded = true;
}
// アップしたファイルの読み込み
$images = glob('./upload_dir/*');
// データベースの読み込み
require_once("database.php");
// データベースに登録
function create($dbh, $post_id, $post_message,$post_image) {
    $stmt = $dbh->prepare("INSERT INTO posts( post_id, post_message, post_image) VALUES(?,?,?)");
    $data = [];
    $data[] = $post_id;//入力する順番が大事。上のcreateと同じ順番で入力する
    $data[] = $post_message;
    $data[] = $post_image;
    /* ステートメント（文）を実行します */
    $stmt->execute($data);
}
 function selectAll($dbh){
    $stmt = $dbh->prepare('SELECT * FROM posts ORDER BY updated_at DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
// $_POSTが入っている時にcreateを実行する
 if (!empty($_POST)) {
     create($dbh,$_POST["post_id"], $_POST["post_message"], basename($_FILES['uploaded_file']['name']));
}
// 全ての投稿データを$resultに入れている
$lot = selectAll($dbh);


// ここから友達の投稿について
function run($dbh, $friend_name, $friend_message) {
    $stmt = $dbh->prepare("INSERT INTO friendM( friend_name, friend_message) VALUES(?,?)");
    $data = [];
    $data[] = $friend_name;//入力する順番が大事。上のcreateと同じ順番で入力する
    $data[] = $friend_message;
    /* ステートメント（文）を実行します */
    $stmt->execute($data);
}
 function selectAll($dbh){
    $stmt = $dbh->prepare('SELECT * FROM friendM ORDER BY updated_at DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
// $_POSTが入っている時にcreateを実行する
 if (!empty($_POST)) {
     create($dbh,$_POST["friend_name"], $_POST["friend_message"]);
}
// 全ての投稿データを$resultに入れている
$many = selectAll($dbh);



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
        <link rel="stylesheet" href="css/facebook.css">
        <link rel="stylesheet" href="css/friends.css">
         <title>facebook</title>
    </head>
    <body>
        <!-- 共通のヘッダー部分の読み込み -->
        <?php include("header.php"); ?>

        <main>
            <div id="friends">
            <a  class="friends_link" href="friends.php">友達</a><br>
                <!-- 友達について -->
                    <div class="contents">
                            <div class="content">
                                <a href="#"><img src="facebook_image/friends01.jpeg" alt=""><p class="friend">友達1</p></a>
                            </div>
                            <div class="content">
                                <a href="#"><img src="facebook_image/friends02.jpeg" alt=""></a>
                            </div>
                            <div class="content">
                                <a href="#"><img src="facebook_image/friends03.jpeg" alt=""></a>
                            </div>
                            <div class="content">
                                <a href="#"><img src="facebook_image/friends04.jpeg" alt=""></a>
                            </div>
                            <div class="content">
                                <a href="#"><img src="facebook_image/friends05.jpeg" alt=""></a>
                            </div>
                            <div class="content">
                                <a href="#"><img src="facebook_image/friends06.jpeg" alt=""></a>
                            </div>
                        </div>
            </div>
            <!-- ここから投稿ページ -->
                <div id="form">
                        <!-- 投稿を入力と送信 -->
                            <?php if ($uploaded): ?>
                            <p class="upload"><?php echo "ファイルのアップロードが完了しました。";?></p>
                            <?php endif ?>
                            <!-- ※enctype="multipart/form-data" ファイルを送るときはこれをいれる-->
                            <form enctype="multipart/form-data" action="facebook.php" method="POST">
        <!-- ユーザーの名前とアイコンを表示したい -->
                                <!-- <input type="text" name="user_name" placeholder="ユーザーの名前"> -->

                                <input type="hidden" name="name" value="value"/>
                                <!-- プレビューの為のコード -->
                                <span class="filelabel" tiltle="ファイルを選択"><i class="fas fa-camera"></i><input name="uploaded_file" type="file" id="display" onchange="previewImage(this);"/></span><br>
                                <span class="filelabel" tiltle="ファイルを選択"><i class="fas fa-camera"></i><input name="uploaded_file2" type="file" id="display" onchange="previewImage(this);"/></span>
                                <!-- 投稿のエリア -->
                                <textarea name="post_message" id="contents" cols="100" rows="10" placeholder="今なにしてる？"></textarea><br>
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
                        <?php foreach( $lot as $row):?>
                            <div class="post_receive">
                                <div class="users_img post_img">
                                    <img class="users_img post_img" src="facebook_image/icon.01.jpeg" alt="users画像">
                                </div>


                                <!-- user_nameを表示する -->
                                <p>Noe Moriwaki</p>
                                <p><?php echo $row['created_at'];?></p>
                                <p class="left"><?php echo $row['post_message'];?> </p>

                            <!-- post_imageが入っている時実行する -->
                                <?php if (!empty($row['post_image'])): ?>
                            <!-- アップロードされた画像の表示 -->
                                    <img class="upload_img" src="./upload_dir/<?php echo $row['post_image'];?>">
                                <?php endif ?><br>
                            
                            <!-- いいねボタンを実装 -->
                            <div class="iine_btn">
                                <div class="iine">
                                <!-- post_idを取得するとできるのか？ -->
                                    <button onclick="iine(this,<?php echo $row['post_id'];?>)">いいね！</button><span class="count">0</span>
                                </div>
                                
                                <script>
                                    const httpRequest = new XMLHttpRequest();
                                    function iine(event, postId) {
                                    const iine = event.parentNode.querySelector("span.count")

                                    httpRequest.onreadystatechange = function(){
                                        // ここでサーバーからの応答を処理します。

                                        // この関数ではリクエストの状態を調べる必要がある。
                                        // ステータス値が XMLHttpRequest.DONE (4 に対応) であるなら、
                                        // サーバーからの応答が完了しており、処理を進められることを意味します。
                                        if (httpRequest.readyState === XMLHttpRequest.DONE) {
                                            if (httpRequest.status === 200) {
                                            const response = JSON.parse(httpRequest.responseText)
                                            iine.innerText = response.fav_count 
                                            } else {
                                            alert('リクエストに問題が発生しました');
                                            }
                                        }
                                    };
                                    //   GET、POST、HEAD やその他のメソッドになります。
                                    //   HTTP 標準に準拠するためにメソッド名はすべて大文字にしてください。
                                    httpRequest.open('POST', 'http://localhost:3000/count.php', true);
                                    httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                    //   (' HTTP リクエストメソッド、', 'リクエストを送信するページの URL ','リクエストを非同期に送るかどうかを示し,true (既定値) であれば、JavaScript の実行が継続される’)
                                    httpRequest.send(`post_id=${postId}`);//sendはPOST同様
                                    }
                                </script>
                             </div>
                                <!-- 友達の投稿form -->
                                <form action="facebook.php" method="get">
                                    <input type="text" name = "friend_name" placeholder ="お名前"></label><br>
                                    <textarea name="friend_text" id="friend_text" placeholder ="コメントを入力" cols="35" rows=3></textarea>
                                    <input type="submit" name="friend_submit" id="friend_submit" value="投稿">
                                </form>
                            </div>
                            <!-- 友達の投稿表示 -->
                            <div class="friend_post">
                                <?php foreach($many as $row):?>
                                    <p class="friend_comment">投稿者：<?php echo $_row['friend_name'];?></p>
                                    <p class="friend_comment">コメント：<?php echo $_row['friend_message'];?></p>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
            </div>
        </main>
    </body>
</html>