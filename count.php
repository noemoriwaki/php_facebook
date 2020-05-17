
<?php
// 関数は並べる
// データベースに登録 投稿するときに必要。今は必要ではない
// function create($dbh, $iine)〜の文

require_once("database.php");
//↑これで$dbhができた
function selectOne($dbh,$post_id){
  $stmt = $dbh->prepare("SELECT * FROM posts WHERE post_id = ? ");//?にpost_idがはいる
  $data = [];
  $data[] = $post_id;//配列に入れていく
  $stmt->execute($data);
  //execute配列にする
  return $stmt->fetch(PDO::FETCH_ASSOC); 
}
// 更新アップデート文。postテーブルにあるいいねを更新
function update($dbh, $iine, $postId) {
  $sql = 'UPDATE posts SET iine = ? WHERE post_id = ?';
  $stmt = $dbh->prepare($sql);
  $data = [];//変数はまず初期化する
  $data[] = $iine;
  $data[] = $postId;
  return $stmt->execute($data);
}


// カウントに関する内容
// ここでpost_idにはいる
$postId = $_POST['post_id'];

// 全ての投稿データを$resultに入れている
$result = selectOne($dbh,$postId);

// いいねを計算
$iine = $result["iine"] + 1;

// アップデート
update($dbh, $iine, $postId);

// 更新した数を返す
echo json_encode([
  'post_id' => $_POST['post_id'], 
  'fav_count' => $iine//いいねの数
]);//配列になっている


?>