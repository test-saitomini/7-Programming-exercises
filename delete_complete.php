<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

$id = $_POST['id'];
$delete_flag = $_POST['delete_flag'];

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

$stmt = $pdo->prepare("UPDATE account SET delete_flag =".$delete_flag." where id = ".$id);

//$stmt->execute(array('$delete_flag' => $_POST['delete_flag']));

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