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
            <h5>本当に削除してよろしいですか？</h5>
            
            <input type="submit" onclick=history.back() value="戻って修正する">
            
            <form action="delete_complete.php" method="post">
                <input type="submit" name="delete_submit" value="登録する">
                <input type="hidden" name = "id" value="<?php echo $_POST['id'];?>">
                <input type="hidden" value="1" name="delete_flag">
                
            </form>
        </main>
        
                <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>