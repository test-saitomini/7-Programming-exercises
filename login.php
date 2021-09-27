<?php
session_start();

//DB接続
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

//エラーメッセージの初期化
$login_error = array();
$login_error_flag = 0;


// ログインボタンが押されたら
if (isset($_POST['login'])) {

   //エラー文
   if (empty($_POST['mail'])) {
       $login_error['mail'] = 'メールアドレスが未入力です。';
   } 
   if (empty($_POST['password'])) {
       $login_error['password'] = 'パスワードが未入力です。';
   }
   
   if (!empty($_POST['mail']) && !empty($_POST['password'])) {
       $mail = $_POST['mail'];
       try {
           $pdo -> beginTransaction();
           $stmt = $pdo->prepare("SELECT * FROM account WHERE mail = :mail");
           $stmt -> bindValue(':mail', $mail, PDO::PARAM_STR);
           $stmt -> execute();

           $password = $_POST['password'];
           $result = $stmt->fetch(PDO::FETCH_ASSOC);

           if (password_verify($password, $result['password'])) {    
               $_SESSION['id'] = $result["id"];
               $_SESSION['mail'] = $mail;
               $_SESSION['authority'] = $result['authority'];
               header('Location: regist_top.php');
           } else {
               $login_error['login'] = 'メールアドレスまたはパスワードに誤りがあります。';
           }
       } catch (PDOException $Exception) {
           $login_error_message = $Exception->getMessage();
           $login_error_flag = 1;
       }
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
            <div class="form">
            <form id="loginForm" name="loginForm" action="" method="POST">
               <?php
                foreach($login_error as $error){
                    print "<p class='login_error'>";
                    print "<h7>".$error."</h7><br>";
                    print "</p>";
                }
                if($login_error_flag == 1){
                    echo '<h7>エラーが発生したためログイン情報を取得できません。<br>'.$login_erorr_message.'<br></h7>';
                };

               ?>

               <div>
                   <label for="mail">メールアドレス
                   <input type="text" id="mail" name="mail" placeholder="メールアドレス" value="<?php if (!empty($_POST["mail"])) {echo $_POST["mail"];} ?>">
                   </label>
               </div>

               <div>
                   <label for="password">パスワード
                   <input type="password" id="password" name="password" value="" placeholder="パスワード">
                   </label>
               </div>
                <input type="submit" id="login" name="login" value="ログイン">
            </form>
            </div>
        </main>
        
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>