<?php
mb_language('ja');
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

$delete_error_flag = 0;
$delete_error_message = 'アカウント一覧画面から削除するデータを選択してください。';

session_start();
if($_SESSION != NULL){
    $login_authority = $_SESSION["authority"];
}else{
    $login_authority = "NULL";
}

if($_POST != NULL){
    $id = $_POST['id'];
    $delete_flag = $_POST['delete_flag'];
}else{
    $delete_error_flag = 1;
}

try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $Exception){
    $delete_error_message = $Exception->getMessage();
    $delete_error_flag = 1;
    /*$abc = '<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除完了画面</title>
        <link rel="stylesheet"type="text/css" href="regist.css">
    </head>
    <header>
            <ul>
                <li><a href = "http://localhost/7-Programming-exercises/regist.html">トップ</a></li>
                <li>プロフィール</li>
                <li><a href = "http://localhost/7-Programming-exercises/regist.php">アカウント登録</a></li>
                <li>問い合わせ</li>
                <li><a href = "http://localhost/7-Programming-exercises/list.php">アカウント一覧</a></li>
                <li>その他</li>
            </ul>
        </header>
    <body>
        <div class="back-top">
            <h7>エラーが発生したためアカウント削除できません。<br>
            '.$Exception->getMessage().'</h7>
             <form action="regist.html" method="post">
            <input type="submit" class="button2" value="TOPページに戻る">
            </form>
        </div>
    </body>
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
    
</html>';
    echo $abc;*/
}

try{
    if($delete_error_flag == 0){
    $stmt = $pdo->prepare("UPDATE account SET delete_flag = ?,update_time = ? where id = $id");
    }
}catch(PDOException $Exception){
    $delete_error_message = $Exception->getMessage();
    $delete_error_flag = 1;
}

try{
    if($delete_error_flag == 0){
        $stmt ->execute(array($delete_flag,date('Y-m-d H:i:s')));
    }
    
    }catch(PDOException $Exception){
    $delete_error_message = $Exception->getMessage();
    $delete_error_flag = 1;
}
/*
echo '<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除完了画面</title>
        <link rel="stylesheet"type="text/css" href="regist.css">
    </head>
    <header>
            <ul>
                <li><a href = "http://localhost/7-Programming-exercises/regist.html">トップ</a></li>
                <li>プロフィール</li>
                <li><a href = "http://localhost/7-Programming-exercises/regist.php">アカウント登録</a></li>
                <li>問い合わせ</li>
                <li><a href = "http://localhost/7-Programming-exercises/list.php">アカウント一覧</a></li>
                <li>その他</li>
            </ul>
        </header>
    <body>
        <div class="back-top">
            <h4>削除完了しました。</h4>
             <form action="regist.html" method="post">
            <input type="submit" class="button2" value="TOPページに戻る">
            </form>
        </div>
    </body>
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
    
</html>';*/ ?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除完了画面</title>
        <link rel="stylesheet"type="text/css" href="regist.css">
    </head>
    <?php if($login_authority == 1) : ?>
    <header>
            <ul>
                <li><a href = "http://localhost/7-Programming-exercises/regist_top.php">トップ</a></li>
                <li>プロフィール</li>
                <li><a href = "http://localhost/7-Programming-exercises/regist.php">アカウント登録</a></li>
                <li>問い合わせ</li>
                <li><a href = "http://localhost/7-Programming-exercises/list.php">アカウント一覧</a></li>
                <li>その他</li>
            </ul>
        </header>
    <body>
        <div class="back-top">
            <?php if($delete_error_flag == 1){
                echo '<h7>エラーが発生したためアカウント削除できません。<br>
            '.$delete_error_message.'</h7>';
            }else{
                echo '<h4>削除完了しました。</h4>';
            };?>
            <form action="regist_top.php" method="post">
                <input type="submit" class="button2" value="TOPページに戻る">
            </form>
            <form action="login.php">
                <input type="submit" class="submit" value="ログイン画面へ戻る">
            </form>
        </div>
    </body>
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
        <main>
            <div class="error_messge">
                <h8>※この画面は操作できません。</h8>
                <form action="login.php" >
                    <input type="submit" class="submit" value="ログイン画面へ戻る">
                </form>
            </div>
        </main>
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
                <form action="login.php">
                    <input type="submit" class="submit" value="ログイン画面へ戻る">
                </form>
            </div>
        </main>
    <?php endif; ?>
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
    
</html>