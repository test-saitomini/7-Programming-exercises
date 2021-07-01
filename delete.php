<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除画面</title>
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
                <li><a href = "http://localhost/account/list.php">アカウント一覧</a></li>
                <li>その他</li>
            </ul>
        </header>
        
        <main>
            
            <?php
            
            $(function(){
                $('input:submit[id="id"]').click(function(){
                    if(){
                        
                    }
                });
            });
            
            
            mb_internal_encoding("UTF-8");
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
            
            $sql = $pdo -> query("select * from account where id = ?");
            
            $delete = $sql->fetch();
            echo $delete['id'];
            echo $delete['family_name'];
            ?>
        </main>
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>