<?php
// データーベースの読み込み
require_once("database.php");

// var_dump($search);
// ５、６のsearchは別物
function selectAll($dbh, $search){
    $stmt = $dbh->prepare('SELECT * FROM posts WHERE  post_message LIKE ?');
    $stmt->execute(["%{$search}%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$result = selectAll($dbh, $_GET["search"]);
// var_dump($result);




?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果
    </title>
</head>
<body>
    <?php foreach($result as $row):?>
    <p><?php echo $row["post_message"];?></p>
    <?php if(!empty($row['post_image'])):?>
 <!-- アップロードされた画像の表示 -->
    <p><img class="upload_img" src="./upload_dir/<?php echo $row['post_image'];?>"></p>
     <?php endif ?><br>
     <?php endforeach ?>

    
</body>
</html>