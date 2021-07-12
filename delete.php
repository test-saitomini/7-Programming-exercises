<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント削除画面</title>
        <link rel="stylesheet"type="text/css"href="regist.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
    </head>
    
    <body>
        <header>
            <ul>
                <li><a href = "http://localhost/account/regist.html">トップ</a></li>
                <li>プロフィール</li>
                <li><a href = "http://localhost/account/regist.php">アカウント登録</a></li>
                <li>問い合わせ</li>
                <li><a href = "http://localhost/account/list.php">アカウント一覧</a></li>
                <li>その他</li>
            </ul>
        </header>
        
        <main>
            
            <?php
            
            $id = $_POST['id'];
            
            mb_internal_encoding("UTF-8");
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
            
            //var_dump('select * from account where id = '.$id);
            $stmt = $pdo -> query('select * from account where id = '.$id);
            $delete = $stmt->fetch();
            //var_dump($delete);
            //var_dump('select * from account where id = "$id"');
            ?>
            
            <p>名前（姓）
            <?php echo $delete['family_name']; ?></p>
            
            <p>名前（名）
            <?php echo $delete['last_name']; ?></p>
            
            <p>カナ（姓）
            <?php echo $delete['family_name_kana']; ?></p>
            
            <p>カナ（名）
            <?php echo $delete['last_name_kana']; ?></p>
            
            <p>メールアドレス
            <?php echo $delete['mail']; ?></p>
            
            <p>パスワード
            <?php
            $password = $delete['password'];
            for($i=0;$i< mb_strlen($password);$i++){
            echo '●';}?></p><!--ハッシュ化されているのでそれを解除しなきゃいけない-->
            
            <p>性別
            <?php if( $delete['gender'] === "0" ){echo '男性'; 
                }else{ echo '女性'; } ?></p>
            
            <p>郵便番号
            <?php echo $delete['postal_code']; ?></p>
            
            <p>住所（都道府県）
            <?php echo $delete['prefecture']; ?></p>
            
            <p>住所（市区町村）
            <?php echo $delete['address_1']; ?></p>
            
            <p>住所（番地）
            <?php echo $delete['address_2']; ?></p>
            
            <p>アカウント権限
            <?php if($delete['authority']==="0"){ echo'一般';
                }else{ echo '管理者'; }?></p> 
            
        </main>
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>