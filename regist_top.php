<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウント登録</title>
    <link rel="stylesheet"type="text/css" href="regist.css">
</head>
    
    <body>
        <header>
            <ul>
                <form method="post" name="link">
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li><a href = "http://localhost/7-Programming-exercises/regist.php">アカウント登録</a></li>
                    <li>問い合わせ</li>
                    <li><a href = "http://localhost/7-Programming-exercises/list.php">アカウント一覧</a></li>
                    <li>その他</li>
                    <input type="hidden" value="<?php echo $_POST['authority'];?>" name="authority">
                </form>
            </ul>
        </header>
        <?php
        echo $_POST['authority'];
        ?>
    </body>
    
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
</html>