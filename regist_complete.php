<?php
mb_language('ja');
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');//日本時間へ変更（20210622）
$erorr_flag = 0;

try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $Exception){
    $erorr_message = $Exception->getMessage();
    $erorr_flag = 1;
}

try{
    if(empty($erorr_message)){
    $pdo -> exec("insert into account(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,delete_flag,registered_time,update_time)values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".password_hash($_POST['password'],PASSWORD_DEFAULT)."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."','".$_POST['delete_flag']."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."');");
    }
}catch(PDOException $Exception){
    $erorr_message = $Exception->getMessage();
    $erorr_flag = 1;
}

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録完了画面</title>
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
            <?php if($erorr_flag == 1){
                echo '<h7>エラーが発生したためアカウント登録できません。<br>
            '.$erorr_message.'</h7>';
            }else{
                echo '<h4>登録完了しました。</h4>';
            };?>
             <form action="regist.html" method="post">
            <input type="submit" class="button2" value="TOPページに戻る">
            </form>
        </div>
    </body>
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
    
</html>