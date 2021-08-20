<link rel="stylesheet" href="regist.css">
<?php
mb_language('ja');
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

$id = $_POST['id'];
$delete_flag = $_POST['delete_flag'];
$delete_erorr_message = "<span class='erorr'>エラーが発生したためアカウント削除ができません。</span>";

try{
    $pdo = new PDO("mysql:dbname=lesson0;host=localhost;","root","");
}catch(PDOException $Exception){
    die($delete_erorr_message.'<br><span class="erorr">'.$Exception->getMessage().'</span>');
}
/*$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");*/

try{
    $stmt = $pdo->prepare("UPDATE account SET delete_flag = ?,update_time = ? where id = $id");
}catch(PDOException $Exception){
    die($delete_erorr_message.'<br><span class="erorr">'.$Exception->getMessage().'</span>');
}
/*$stmt = $pdo->prepare("UPDATE account SET delete_flag = ?,update_time = ? where id = $id");*/
try{
    $stmt ->execute(array($delete_flag,date('Y-m-d H:i:s')));
}catch(PDOException $Exception){
    die($delete_erorr_message.'<br><span class="erorr">'.$Exception->getMessage().'</span>');
}
/*$stmt ->execute(array($delete_flag,date('Y-m-d H:i:s')));*/

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除完了画面</title>
        <link rel="stylesheet"type="text/css" href="regist.css">
    </head>
    <body>
        <div class="back-top">
            <h4>削除完了しました。</h4>
             <form action="regist.html" method="post">
            <input type="submit" class="button2" value="TOPページに戻る">
            </form>
        </div>
    </body>
    
</html>