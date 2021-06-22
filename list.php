<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント一覧画面</title>
        <link rel="stylesheet"type="text/css"href="regist.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
    </head>
    
    <body>
        <header>
            <ul>
                <li><a href = "http://localhost/account/regist.html">トップ</a></li>
                <li>プロフィール</li>
                <li><a href = "http://localhost/account/regist.php">アカウント登録</a></li>
                <li>問い合わせ</li>
                <li><a href = "http://localhost/account/list.php">アカウント一覧画面</a></li>
                <li>その他</li>
            </ul>
        </header>
        
        <main>
            <?php
            
            mb_internal_encoding("UTF-8");
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
            
            $stmt = $pdo -> query("select * from account");
            
            while($row = $stmt->fetch()){
                echo $row['id'];
                echo $row['family_name'];
                echo $row['last_name'];
                echo $row['family_name_kana'];
                echo $row['last_name_kana'];
                echo $row['mail'];
                echo $row['gender'];//パラメータのみではなく日本語で
                echo $row['authority'];//パラメータのみではなく日本語で
                echo $row['delete_flag'];
                echo $row['registered_time'];//年月日のみ
                echo $row['update_time'];//年月日のみ
            }
            
            ?>
            
            <form action="update.php" method="post">
            <input type="submit" name="btn_submit" value="更新">
            </form>
            
            <form action="delete.php" method="post">
            <input type="submit" name="btn_submit" value="削除">
            </form>
            
        </main>
        
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>