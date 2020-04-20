<?php
// ajaxデータを受信1
$file_nam = $_POST["file_num"]; 
// ファイル名
$count = $_POST["count"];
//  投票数
$cookieName = "vote_" . $file_id; 
// クッキー名。
$cookieTime = time() + 10; 
// クッキーの有効期限（投票を制限する秒数）

// クッキーが有効
if(isset($_COOKIE[$cookieName])){
     echo "クッキー制御により投票不可です。";

}else{
// クッキーが無効＝カウントアップ
     $count = $_POST["count"]; 
// 投票数

// カウント数を書き出すファイル名
     $fileName = "log/" . $file_num . ".count";

     $fp = @fopen($fileName , "w"); 
// 書き込みモードで開く
     
     flock($fp , LOCK_EX); 
// 排他的ロック(書く準備) 他のロックをすべてブロック
     fputs($fp , $count); 
// カウント数を書き込み
     flock($fp , LOCK_UN); 
// ロック開放

     fclose($fp);

     setcookie($cookieName , $count , $cookieTime); 
// 10秒有効のクッキーをセット

     echo "Complete"; 
// clickCount.jsにはここの値を返す
}
?>