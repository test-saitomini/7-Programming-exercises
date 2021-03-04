<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録確認画面</title>
        <link rel="stylesheet"type="text/css"href="regist.css">
    </head>
    
    <body>
        <header>
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li><a href = "http://localhost/account/regist.php">アカウント登録</a></li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </header>
        <h1>お問合わせ内容の確認</h1>
        <p>お問合わせ内容はこちらでよろしいでしょうか？
        <br>よろしければ「送信する」ボタンを押してください。
        </p>
            
        <p>名前（姓）
        <br>
        <?php echo $_POST['family_name'];?>
        </p>
        <p>名前（名）
        <br>
        <?php echo $_POST['last_name'];?>
        </p>
        <p>カナ（姓）
        <br>
        <?php echo $_POST['family_name_kana'];?>
        </p>
        <p>カナ（名）
        <br>
        <?php echo $_POST['last_name_kana'];?>
        </p>
            
        <p>メールアドレス
        <br>
        <?php echo $_POST['mail'];?>
        </p>
            
        <p>パスワード
        <br>
        <?php echo $_POST['password'];?>//●で隠す
        </p>
        
        <p>性別
        <br>
        <?php if( $_POST['gender'] === "0" ){ echo '男性'; }
		else{ echo '女性'; } ?></p>
        
        <p>郵便番号
        <br>
        <?php echo $_POST['postal_code'];?>
        </p>
        <p>住所（都道府県）
        <br>
        <?php echo $_POST['prefecture'];?>
        </p>
        <p>住所（市区町村）
        <br>
        <?php echo $_POST['address_1'];?>
        </p>
        <p>住所（番地）
        <br>
        <?php echo $_POST['address_2'];?>
        </p>
        
        <p>アカウント権限
        <br>
        <?php echo $_POST['authority'];?>
        </p>
        
        <input type="submit" onclick=history.back() value="戻って修正する">
            
        <form action="regist_complete.php" method="post">
            <input type="submit" class="button2" value="登録する">
            <input type="hidden" value="<?php echo $_POST['family_name'];?>" name="family_name">
            <input type="hidden" value="<?php echo $_POST['last_name'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['nenrei'];?>" name="nenrei">
            <input type="hidden" value="<?php echo $_POST['coment'];?>" name="coment">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
            <input type="hidden" value="<?php echo $_POST['address'];?>" name="address">
                                                                               
        </form>
        
    </body>
</html>