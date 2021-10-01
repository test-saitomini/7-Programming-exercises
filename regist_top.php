<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

session_start();

if($_SESSION != NULL){
    $login_authority = $_SESSION["authority"];
}else{
    $login_authority = "NULL";
}
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
            <?php if($login_authority == 1) : ?>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li><a href = "http://localhost/7-Programming-exercises/regist.php">アカウント登録</a></li>
                <li>問い合わせ</li>
                <li><a href = "http://localhost/7-Programming-exercises/list.php">アカウント一覧</a></li>
                <li>その他</li>
            </ul>
            <?php elseif($login_authority == 0) : ?>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>アカウント登録</li>
                <li>問い合わせ</li>
                <li>アカウント一覧</li>
                <li>その他</li>
            </ul>
        </header>
        <?php else : ?>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>アカウント登録</li>
                <li>問い合わせ</li>
                <li>アカウント一覧</li>
                <li>その他</li>
            </ul>
        </header>
        <main>
            <div class="error_messge">
                <h8>※ログインを行ってください。</h8>
                </div>
        </main>
            <?php endif; ?>
        </header>
        
    </body>
    
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
</html>