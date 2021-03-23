<?php
mb_language('ja');
mb_internal_encoding("UTF-8");
$date = time();
$registered_time = $date;
$update_time = $date;
$error_message = array();

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

$pdo -> exec("insert into account(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,delete_flag,registered_time,update_time)values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".password_hash($_POST['password'],PASSWORD_DEFAULT)."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."','".$_POST['delete_flag']."','".date('Y-m-d H:i:s',$registered_time)."','".date('Y-m-d H:i:s',$update_time)."');");

if($pdo -> connect_errno){
    $error_message[] = 'エラーが発生したためアカウント登録できません。'
}

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録完了画面</title>
        <link rel="stylesheet"type="text/css" href="style2_php.css">
    </head>
    <body>
        <h1>アカウント登録完了</h1>
        <div class="confirm">
            <?php elseif( $page_flag === 2): ?>
            <p>登録完了しました。</p>
             <form action="regist.html" method="post">
            <input type="submit" class="button2" value="TOPページに戻る">
            </form>
        </div>
    </body>
    
</html>