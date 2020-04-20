
<?php 
function getVoteCount($num){
    // カウント数を書き出してあるファイル名
$faileName = "log/" . $num . ".count";

// fopenでファイルを読み込む
$fp = @fopen($fileName , "r");

if($fp){
//  カウント数書き込みのファイルの内容を取得
$vote = fgets($fp, 9182);
}else{
    $vote = 0;
}

return $vote;
}