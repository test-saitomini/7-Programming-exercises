<?php
mb_language('ja');
mb_internal_encoding("UTF-8");
date_default_timezone_set('Asia/Tokyo');

$update_error_flag = 0;
$update_error_message = 'アカウント一覧画面から更新するデータを選択してください。';

session_start();
if($_SESSION != NULL){
    $login_authority = $_SESSION["authority"];
}else{
    $login_authority = "NULL";
}

if($_POST != NULL){
    $id = $_POST['id'];
    $family_name = $_POST['family_name'];
    $last_name = $_POST['last_name'];
    $family_name_kana = $_POST['family_name_kana'];
    $last_name_kana = $_POST['last_name_kana'];
    $mail = $_POST['mail'];
    $password_check = $_POST['password_check'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $postal_code = $_POST['postal_code'];
    $prefecture = $_POST['prefecture'];
    $address_1 = $_POST['address_1'];
    $address_2 = $_POST['address_2'];
    $authority = $_POST['authority'];
    $delete_flag = $_POST['delete_flag'];
}else{
    $update_error_flag = 1;
}



try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
}catch(PDOException $Exception){
    $update_error_message = $Exception->getMessage();
    $update_error_flag = 1;
}

try{
    if($update_error_flag == 0){
        $password_update = "";
        if($password_check == 1){
            $password_update = "password = ?,";
        }
        $stmt = $pdo->prepare("UPDATE account SET family_name = ?,last_name = ?,family_name_kana = ?,last_name_kana = ?,mail = ?,".$password_update."gender = ?,postal_code = ?,prefecture = ?,address_1 = ?,address_2 = ?,authority = ?,delete_flag = ?,update_time = ? where id = $id");
    }
}catch(PDOException $Exception){
    $update_error_message = $Exception->getMessage();
    $update_error_flag = 1;
}

try{
    if($update_error_flag == 0){
        $data = array($family_name,$last_name,
              $family_name_kana,$last_name_kana,$mail);

        if($password_check == 1){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = array_merge($data,array($password));// 配列に追加したいけど、正しい書き方ではない
        }

        $data =  array_merge($data,array($gender,$postal_code,$prefecture,
                      $address_1,$address_2,$authority,
                      $delete_flag,date('Y-m-d H:i:s')));// 更に追加してあげたいけど、、、


        $stmt->execute($data);
    }
}catch(PDOException $Exception){
    $update_error_message = $Exception->getMessage();
    $update_error_flag = 1;
}


?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント更新完了画面</title>
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
            <?php if($update_error_flag == 1){
                echo '<h7>エラーが発生したためアカウント更新できません。<br>
            '.$update_error_message.'</h7>';
            }else{
                echo '<h4>更新完了しました。</h4>';
            };?>
             <form action="regist.html" method="post">
            <input type="submit" class="button2" value="TOPページに戻る">
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
                </div>
        </main>
    <?php endif; ?>
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
    
</html>