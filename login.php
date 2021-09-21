<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

$login_erorr_flag = 0;

if(empty($_POST['login'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    }catch(PDOException $Exception){
    $login_erorr_message = $Exception->getMessage();
    $login_erorr_flag = 1;
    }
    
    try{
        if(empty($login_erorr_message)){
            $stmt = $pdo->query('select * from account where mail = '.$mail);
        }
    }catch(PDOException $Exception){
    $login_erorr_message = $Exception->getMessage();
    $login_erorr_flag = 1;
    }

    try{
        if(empty($login_erorr_message)){
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        }
    }catch(PDOException $Exception){
    $login_erorr_message = $Exception->getMessage();
    $login_erorr_flag = 1;
    }
    
    if(password_verify($password,$result['password'])){
        echo "OK";
    }else{
        echo "NO";
    }
}

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウントログイン</title>
    <link rel="stylesheet"type="text/css" href="regist.css">
</head>
    
    <body>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </header>
        
        <main>
            <h1>ログイン画面</h1>
            <form action="regist.html" method="post" name = "login">
                <div class="textarea">
                    <?php if($login_erorr_flag == 1){
                echo '<h7>エラーが発生したためログイン情報を取得できません。<br>
                '.$login_erorr_message.'<br></h7>';
                    };?>
                    <label>メールアドレス</label>
                        <input type="text"class="text" size="100"name="mail"id="mail">
                </div>
                
                <div class="textarea">
                    <label>パスワード</label>
                    <input type="password"class="text" size="10" name="password"id="password">
                </div>
                
                <input class="button" type="submit" name="login" value="ログイン">
                
            </form>
            
        </main>
        
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>