<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

$id = $_POST['id'];
$family_name = $_POST['family_name'];
$last_name = $_POST['last_name'];
$family_name_kana = $_POST['family_name_kana'];
$last_name_kana = $_POST['last_name_kana'];
$mail = $_POST['mail'];
$password = password_hash($_POST['password'],PASSWORD_ARGON2ID);
$gender = $_POST['gender'];
$postal_code = $_POST['postal_code'];
$prefecture = $_POST['prefecture'];
$address_1 = $_POST['address_1'];
$address_2 = $_POST['address_2'];
$authority = $_POST['authority'];
$delete_flag = $_POST['delete_flag']; 

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

$stmt = $pdo->prepare("UPDATE account SET family_name = $family_name,last_name = $last_name,family_name_kana = $family_name_kana,last_name_kana =  $last_name_kana,mail = $mail,password = $password,gender = $gender,postal_code = $postal_code,prefecture = $prefecture,address_1 = $address_1,address_2 = $address_2,authority = $authority,delete_flag = $delete_flag where id = $id");

$stmt->execute(array('$family_name' => $_POST['family_name'],
                     '$last_name' => $_POST['last_name'],
                     '$family_name_kana' => $_POST['family_name_kana'],
                     '$last_name_kana' => $_POST['last_name_kana'],
                     '$mail' => $_POST['mail'],
                     '$password' => password_hash($_POST['password'],PASSWORD_ARGON2ID),
                     '$gender' => $_POST['gender'],
                     '$postal_code' => $_POST['postal_code'],
                     '$prefecture' => $_POST['prefecture'],
                     '$address_1' => $_POST['address_1'],
                     '$address_2' => $_POST['address_2'],
                     '$authority' => $_POST['authority'],
                     '$delete_flag' => $_POST['delete_flag']));

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