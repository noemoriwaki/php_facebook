<?php

// ファイルのアップロード
$uploaded = false;
if (!empty($_FILES['uploaded_file'])) { 
  $upload_icon = './upload_icon/';
  $uploaded_file = $upload_icon . basename($_FILES['uploaded_file']['name']);
  move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploaded_file);
  $uploaded = true;
$uploaded = false;
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/images.css">

    <title>アイコン画像編集画面</title>
</head>
<body>
    <div>
         <!-- 投稿を入力と送信 -->

        <form action="header.php" method="POST" enctype="multipart/form-data">
        <!-- user_icon -->
            <label for="user_icon">アイコン</label><br>
            <span class="filelabel" tiltle="ファイルを選択"><input name="uploaded_file" type="file" id="display" onchange="previewImage(this);"/></span>
            <!-- <input type="file" name="wrapper" id="wrapper"><br> -->
            <button type="submit" name="submit">アイコン画像の登録</button>
        </form>
        <!-- プレビュー --><br>
            <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:10%;">
                <script>
                        function previewImage(obj){
                            var fileReader = new FileReader();
                            fileReader.onload = (function() {
                                document.getElementById('preview').src = fileReader.result;
                            });
                            fileReader.readAsDataURL(obj.files[0]);
                        }
                </script>    
        </div>

</body>
</html>