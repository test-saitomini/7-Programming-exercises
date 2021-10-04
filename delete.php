<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

$delete_error = 0;

session_start();

if($_SESSION != NULL){
    $login_authority = $_SESSION["authority"];
}else{
    $login_authority = "NULL";
}
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除画面</title>
        <link rel="stylesheet"type="text/css"href="regist.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
    </head>
    
    <body>
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
        
        <main>
            
            <?php
            if($_POST != NULL){
                $id = $_POST['id'];

                mb_internal_encoding("UTF-8");
                $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

                //var_dump('select * from account where id = '.$id);
                $stmt = $pdo -> query('select * from account where id = '.$id);
                $delete = $stmt->fetch();
            }else{
                $delete_error = 1;
            }
            
            //var_dump($delete);
            //var_dump('select * from account where id = "$id"');
            ?>
            <?php if($delete_error == 0) : ?>
            <form action="delete_confirm.php" method="post">
            <p><label>名前（姓）</label>
            <?php echo $delete['family_name']; ?></p>
            
            <p><label>名前（名）</label>
            <?php echo $delete['last_name']; ?></p>
            
            <p><label>カナ（姓）</label>
            <?php echo $delete['family_name_kana']; ?></p>
            
            <p><label>カナ（名）</label>
            <?php echo $delete['last_name_kana']; ?></p>
            
            <p><label>メールアドレス</label>
            <?php echo $delete['mail']; ?></p>
            
            <p><label>パスワード</label>
            <br><h7>※セキュリティ上、パスワードを非表示にしています。</h7>
            </p>
            
            <p><label>性別</label>
            <?php if( $delete['gender'] === "0" ){echo '男性'; 
                }else{ echo '女性'; } ?></p>
            
            <p><label>郵便番号</label>
                <!--0ずめしたい -->
            <?php echo $delete['postal_code']; ?></p>
            
            <p><label>住所（都道府県）</label>
            <?php echo $delete['prefecture']; ?></p>
            
            <p><label>住所（市区町村）</label>
            <?php echo $delete['address_1']; ?></p>
            
            <p><label>住所（番地）</label>
            <?php echo $delete['address_2']; ?></p>
            
            <p><label>アカウント権限</label>
            <?php if($delete['authority']==="0"){ echo'一般';
                }else{ echo '管理者'; }?></p> 
                
                <input type="submit" id="btn_dlete_confirm" value="確認する">
                <input type="hidden" name = "id" value="<?php echo $_POST['id'];?>">
            </form>
            <?php else : ?>
            <div class="error_messge">
                <h8>※アカウント一覧画面から削除するデータを選択してください。</h8>
                <form action="list.php" >
                    <input type="submit" class="submit" value="アカウント一覧画面へ進む">
                </form>
            </div>
            <?php endif; ?>
            
        </main>
        
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
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>