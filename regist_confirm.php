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
        <h2>お問合わせ内容の確認</h2>
        <p>お問合わせ内容はこちらでよろしいでしょうか？
        <br>よろしければ「登録する」ボタンを押してください。
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
        <?php
            $password = $_POST['password'];
            for($i=0;$i< mb_strlen($password);$i++){
            echo '●';}?>
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
        <?php if($_POST['authority']==="0"){ echo'一般';}
            else{ echo '管理者'; }?>
        </p>
        
        <input type="submit" onclick=history.back() value="戻って修正する">
            
        <form action="regist_complete.php" method="post">
            <input type="submit" name="btn_submit" value="登録する">
            <input type="hidden" value="<?php echo $_POST['family_name'];?>" name="family_name">
            <input type="hidden" value="<?php echo $_POST['last_name'];?>" name="last_name">
            <input type="hidden" value="<?php echo $_POST['family_name_kana'];?>" name="family_name_kana">
            <input type="hidden" value="<?php echo $_POST['last_name_kana'];?>" name="last_name_kana">
            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
            <input type="hidden" value="<?php echo $_POST['gender'];?>" name="gender">
            <input type="hidden" value="<?php echo $_POST['postal_code'];?>" name="postal_code">
            <input type="hidden" value="<?php echo $_POST['prefecture'];?>" name="prefecture">
            <input type="hidden" value="<?php echo $_POST['address_1'];?>" name="address_1">
            <input type="hidden" value="<?php echo $_POST['address_2'];?>" name="address_2">
            <input type="hidden" value="<?php echo $_POST['authority'];?>" name="authority">
            <input type="hidden" value="0" name="delete_flag">
            
            
            
        </form>
    </body>
</html>