<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>sample</h1>
  <div class="iine">
    <button onclick="iine(this)">いいね！</button><span class="count">0</span>
  </div>
 
  <script>
    const httpRequest = new XMLHttpRequest();
    function iine(event, postId) {
     const iine = event.parentNode.querySelector("span.count")

     httpRequest.onreadystatechange = function(){
        // ここでサーバーからの応答を処理します。

        // この関数では何を行うべきでしょうか。
        // 最初に、この関数ではリクエストの状態を調べる必要があります。
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
</body>
</html>
