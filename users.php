
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
    
            <form id="profile" action="base.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="name" value="value"/>
                <table>
                        <!-- user_name -->
                        <!-- <tr>
                            <th><label for="user_name">お名前</label></th>
                            <td><input type="text" name="user_name" placeholder="ユーザーの名前を入力して下さい"></td>
                        </tr> -->
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
                            <td><input type="text" name="birth_place" placeholder="出身地はどこですか？"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="record" value="登録する"></td>
                        </tr>
                    </table>
            </from>
            <div>
                <a href="images.html">アイコン画像の登録</a>
            </div>
    </body>
</html>


