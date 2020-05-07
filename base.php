<!-- マイページの内容 -->


<?php


// データベースの読み込み
require_once("database.php");
function create($dbh, $employer, $alma_mater, $home_address, $birthplace) {
    $stmt = $dbh->prepare("INSERT INTO users( employer, alma_mater, home_address, birthplace ) VALUES(?,?,?,?)");
    $data = [];
    //入力する順番が大事。上のcreateと同じ順番で入力する
    $data[] = $employer;
    $data[] = $alma_mater;
    $data[] = $home_address;
    $data[] = $birthplace;
    $stmt->execute($data);
}
 function selectAll($dbh){
    $stmt = $dbh->prepare('SELECT * FROM users ORDER BY updated_at DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
// $_POSTが入っている時にcreateを実行する
if (!empty($_POST)) {
    create($dbh, $_POST["employer"], $_POST["alma_mater"],$_POST["home_address"],$_POST["birthplace"]);
}


// 全ての投稿データを$resultに入れている
$result = selectAll($dbh);


?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="css/base.css">
         <title>基本ページ</title>
    </head>
    <body>
    <!-- 共通のヘッダー部分の読み込み -->
    <?php include("header.php"); ?>
    
        <div id="basic_info">
            <a href="users.php"><h1>基本データの編集する</h1></a>

                <table class="table">
                <?php foreach( $result as $row):?>

                    <tr>
                        <th>勤務先</th>
                        <td><?php echo $row['employer'];?></td>
                    </tr>
                    <tr>
                        <th>出身校</th>
                        <td><?php echo $row['alma_mater'];?></td>
                    </tr>
                    <tr>
                        <th>居住地</th>
                        <td><?php echo $row['home_address'];?></td>
                    </tr>
                    <tr>
                        <th>出身地</th>
                        <td><?php echo $row['birthplace'];?></td>
                    </tr>
                    <?php endforeach ?>
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