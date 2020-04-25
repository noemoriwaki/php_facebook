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
            <form id="profile" action="" method="POST">
                <table>
                        <!-- user_name -->
                        <tr>
                            <th><label for="user_name">ユーザーの名前：</label></th>
                            <td><input type="text" name="user_name" placeholder="ユーザーの名前を入力して下さい"></td>
                        </tr>
                            <!-- user_icon
                        <tr>
                            <th><label for="employer">勤務先：</label></th>
                            <td><input type="text" name="employer" placeholder="勤務先を入力する"></td>
                        </tr> -->

                        <tr>
                            <th><label for="employer">勤務先：</label></th>
                            <td><input type="text" name="employer" placeholder="勤務先を入力して下さい"></td>
                        </tr>
                        <tr>
                            <th><label for="alma_mater">出身校：</label></th>
                            <td><input type="text" name="alma_mater" placeholder="出身校を入力して下さい"></td>
                        </tr>
                        <tr>
                            <th><label for="home_address">居住地：</label></th>
                            <td><input type="text" name="home_address" placeholder="居住地を入力して下さい"></td>
                        </tr>
                        <tr>
                            <th><label for="birth_place">出身地：</label></th>
                            <td><input type="text" name="birth_place" placeholder="出身地を入力して下さい"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="record" value="登録する"></td>
                        </tr>
                    </table>
            </from>
        
    </body>
</html>
