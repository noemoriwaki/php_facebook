<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="css/friends.css">
        <link rel="stylesheet" href="css/header_footer.css">
        <link rel="stylesheet" href="css/responsive_header.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
         <title>基本ページ</title>
    </head>
    <body>
        <header class="header_top">
            <div class="header_logo">
                <img src="facebook_image/facebook.png" alt="facebookのアイコン画像">
            </div>
                <form  class="header_seach" action="" method="POST">
                <input type="text" name="search" placeholder="検索">
                <button type="button" name="name" value="検索"><i class="fas fa-search"></i></button>　
                </form>
            <div class="header_nav">
                <nav>
                    <a href="facebook.php">プロフィール</a><!--自分のプロフィールホームへ飛ぶようにする（このページ）-->
                    <a href="#">ホーム</a>
                    <a href="#">友達</a>
                    <a href="#">お知らせ</a>
                    <a href="login.php">ログイン</a>
                </nav>
            </div>
        </header>
        <div id="wrapper">
            <div class="wrapper_image">
                <!-- メインの画像 -->
                <img src="facebook_image/IMG_0009.jpeg" alt="兄弟の写真">
            </div>
            <div id="users">
                <a href="#"><p>Noe Moriwaki</p></a>
                    <div class="users_img wrapper_img">
                        <img src="facebook_image/icon.01.jpeg" alt="icon画像">
                    </div>
            </div>
            <div class="wrapper_nav">
                <nav>
                    <a href="facebook.php">タイムライン</a>
                    <a href="base.php">基本データ</a>
                    <a href="friends.php">友達</a>
                    <a href="photo.php">写真</a>
                    <a href="#">アーカイブ</a>
                    <a href="#">その他</a>
                </nav>
            </div>
        </div>
                <!-- 友達の一覧 -->
        <div id="friends">
                <!-- 友達について -->
            <a  class="friends_link" href="#"><p>友達</p></a>
                <div class="contents">
                    <div class="content">
                        <a href=""><img src="facebook_image/friends01.jpeg" alt=""><p class="friend">友達1</p></a>
                    </div>
                    <div class="content">
                        <a href=""><img src="facebook_image/friends02.jpeg" alt=""><p class="friend">友達2</p></a>
                    </div>
                    <div class="content">
                        <a href=""><img src="facebook_image/friends03.jpeg" alt=""><p class="friend">友達3</p></a>
                    </div>
                    <div class="content">
                        <a href=""><img src="facebook_image/friends04.jpeg" alt=""><p class="friend">友達4</p></a>
                    </div>
                    <div class="content">
                        <a href=""><img src="facebook_image/friends05.jpeg" alt=""><p class="friend">友達5</p></a>
                    </div>
                    <div class="content">
                        <a href=""><img src="facebook_image/friends06.jpeg" alt=""><p class="friend">友達6</p></a>
                    </div>
                </div>
        </div>
<!-- 
        <div id="friends">
            <div class="user_id1">
                <a href=""><img src="" alt="">友達1</a>
            </div>
            <div class="user_id2">
                <a href=""><img src="" alt="">友達2</a>
            </div>
        </div> -->

    </body>
</html>
