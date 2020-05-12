<?php

// session_start();
// if(empty($_SESSION['count'])) {
//     $_SESSION['count'] = 0;
// }
// $_SESSION['count']++;

// echo json_encode([
//     'fav_id' => $_POST['fav_id'],
//     'fav_count' => $_SESSION['count']]
// );



?>

<?php
session_start();

$postId = $_POST['post_id'];

if (empty($_SESSION['count'][$postId])) {
  $_SESSION['count'] = array_merge($_SESSION['count'], [$postId => 0]);
}
$_SESSION['count'][$postId]++;

echo json_encode([
  'post_id' => $_POST['post_id'], 
  'fav_count' => $_SESSION['count'][$postId]
]);
