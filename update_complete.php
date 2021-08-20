<link rel="stylesheet" href="regist.css">
<?php
mb_language('ja');
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

$id = $_POST['id'];
$family_name = $_POST['family_name'];
$last_name = $_POST['last_name'];
$family_name_kana = $_POST['family_name_kana'];
$last_name_kana = $_POST['last_name_kana'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$postal_code = $_POST['postal_code'];
$prefecture = $_POST['prefecture'];
$address_1 = $_POST['address_1'];
$address_2 = $_POST['address_2'];
$authority = $_POST['authority'];
$delete_flag = $_POST['delete_flag'];

$update_erorr_message = "<span class='erorr'>エラーが発生したためアカウント更新ができません。</span>";//20210820　エラー文追加

try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $Exception){
    die($update_erorr_message.'<br><span class="erorr">'.$Exception->getMessage().'</span>');
}

try{
    $stmt = $pdo->prepare("UPDATE account SET family_name = ?,last_name = ?,family_name_kana = ?,last_name_kana = ?,mail = ?,password = ?,gender = ?,postal_code = ?,prefecture = ?,address_1 = ?,address_2 = ?,authority = ?,delete_flag = ?,update_time = ? where id = $id AND password IS NOT NULL");
}catch(PDOException $Exception){
    die($update_erorr_message.'<br><span class="erorr">'.$Exception->getMessage().'</span>');
}

try{
    $stmt ->execute(array($family_name,$last_name,$family_name_kana,$last_name_kana,$mail,password_hash($password,PASSWORD_ARGON2ID),$gender,$postal_code,$prefecture,$address_1,$address_2,$authority,$delete_flag,date('Y-m-d H:i:s')));
}catch(PDOException $Exception){
    die($update_erorr_message.'<br><span class="erorr">'.$Exception->getMessage().'</span>');
}


?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント更新完了画面</title>
        <link rel="stylesheet"type="text/css" href="regist.css">
    </head>
    <body>
        <div class="back-top">
            <h4>更新完了しました。</h4>
             <form action="regist.html" method="post">
            <input type="submit" class="button2" value="TOPページに戻る">
            </form>
        </div>
    </body>
    
</html>