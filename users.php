<?php
$uploaded = false;
if (!empty($_FILES['user_image'])) { 
  $upload_icon = './upload_icon/';
  $user_image = $upload_icon . basename($_FILES['user_image']['name']);
  move_uploaded_file($_FILES['user_image']['tmp_name'], $uploaded_file);
  $uploaded = true;
}
// アップしたファイルの読み込み
$images = glob('./upload_icon/*');
// データベースの読み込み
require_once("database.php");

// データベースに登録
function create($dbh, $user_icon, $user_wrapper) {
    $stmt = $dbh->prepare("INSERT INTO user_image( user_icon, user_wrapper) VALUES(?,?)");
    $data = [];
    $data[] = $user_icon;//入力する順番が大事。上のcreateと同じ順番で入力する
    $data[] = $user_wrapper;
    $stmt->execute($data);
}
 function selectAll($dbh){
    $stmt = $dbh->prepare('SELECT * FROM user_file ORDER BY updated_at DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
// $_POSTが入っている時にcreateを実行する
 if (!empty($_POST)) {
     create($dbh, basename($_FILES['user_image']['name']));
}
// 全ての投稿データを$resultに入れている
$result = selectAll($dbh);



?>

<!-- マイページの編集ページ -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="css/users.css">
        <title>プロフィール修正ページ</title>
    </heade>
    <body>


        <h1>基本データの編集</h1>
    
            <form id="profile" action="base.php" method="POST">
                <input type="hidden" name="name" value="value"/>
                <table>
                        <!-- user_name -->
                        <tr>
                            <th><label for="user_name">お名前</label></th>
                            <td><input type="text" name="user_name" placeholder="ユーザーの名前を入力して下さい"></td>
                        </tr>
                        <tr>
                            <th><label>勤務先</label></th>
                            <td><input type="text" name="employer" placeholder="お勤め先はどこですか？"></td>
                        </tr>
                        <tr>
                            <th><label>出身校</label></th>
                            <td><input type="text" name="alma_mater" placeholder="出身校はどこですか？"></td>
                        </tr>
                        <tr>
                            <th><label>居住地</label></th>
                            <td><input type="text" name="home_address" placeholder="どこにお住まいですか？"></td>
                        </tr>
                        <tr>
                            <th><label>出身地</label></th>
                            <td><input type="text" name="birthplace" placeholder="出身地はどこですか？"></td>
                        </tr>
                        <!-- user_icon -->
                        <tr>
                            <th><label for="user_icon">アイコン</label></th>
                            <td><span class="filelabel" tiltle="ファイルを選択"><i class="fas fa-camera"></i><input name="user_image" type="file" id="display" onchange="previewImage(this);"/></span></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="record" value="登録する"></td>
                        </tr>
                    </table>
            </from>
                    <!-- プレビュー --><br>
                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:10%;">
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
                <!-- user_iconのみほん                     -->
                    <div class="users_img wrapper_img">
                        <p>表示するアイコンの見本</p>
                    <!-- user_imageが入っている時実行する -->
                        <?php if (!empty($result['user_image'])): ?>
                    <!-- アップロードされた画像の表示 -->
                        <img class="user_img" src="./upload_icon/<?php echo $result['user_icon'];?>">
                                <?php endif ?><br>
                        <!-- <img src="facebook_image/icon.01.jpeg" alt="icon画像"> -->
                    </div>

    </body>
</html>


