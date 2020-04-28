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
    <!-- データーベース内のデータがからの場合、POSTで送ったデータを保存
        ・ifデーターベース内のデータがぬっlの場合、POSTを保存

        ・ifデーターベース内にすでにデータがある場合、
                UPDATE 商品
                SET 価格 = 170
                WHERE 商品ID = 'S01';
            UPDATE関数を使うPOST内容を保存する

-->
        <h1>基本データの編集</h1>
            <form id="profile" action="base.php" method="POST">
                <input type="hidden" name="name" value="value"/>
                <table>
                        <!-- user_name -->
                        <tr>
                            <th><label for="user_name">ユーザーの名前</label></th>
                            <td><input type="text" name="user_name" placeholder="ユーザーの名前を入力して下さい"></td>
                        </tr>
                            <!-- user_icon
                        <tr>
                            <th><label for="employer">勤務先：</label></th>
                            <td><input type="text" name="employer" placeholder="勤務先を入力する"></td>
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
                            <td><input type="text" name="birthplace" placeholder="出身地はどこですか？"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="record" value="登録する"></td>
                        </tr>
                    </table>
            </from>
        
    </body>
</html>


