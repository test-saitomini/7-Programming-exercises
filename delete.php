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
            <!--<?php /*
            $password = $delete['password'];
            for($i=0;$i< mb_strlen($password);$i++){
            echo '●';} */?>--> </p>
            
            <p><label>性別</label>
            <?php if( $delete['gender'] === "0" ){echo '男性'; 
                }else{ echo '女性'; } ?></p>
            
            <p><label>郵便番号</label>
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
        </main>
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>