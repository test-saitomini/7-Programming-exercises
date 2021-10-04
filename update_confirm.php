<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

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
        <title>アカウント更新確認画面</title>
        <link rel="stylesheet"type="text/css"href="regist.css">
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
        <?php if($_POST != NULL) : ?>
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
            
            if(isset($_POST['password_check'])){
                $password = $_POST['password'];
            for($i=0;$i< mb_strlen($password);$i++){
            echo '●';}
                $_POST['password_check'] = 1;
            }else{
                echo '<h7>パスワードは変更されません。</h7>';
                $_POST['password_check'] = 0;
            }
            ?>
        </p>
        
        <p>性別
        <br>
        <?php if( $_POST['gender'] === "0" ){
            echo '男性';
        }else{
            echo '女性'; 
        }?></p>
        
        <p>郵便番号
        <br>
        <?php echo $_POST['postal_code'];?>
        </p>
        <p>住所（都道府県）
        <br>
        <?php
            //今は番号Keyのほうが表示されているのでそれを都道府県が表示されるようにする
            $prefecture_list = Array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','長野県','新潟県','富山県','石川県','福井県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
            
            foreach($prefecture_list as $key => $prefecture){
                if(!empty($_POST['prefecture'])){
                    if($key == $_POST['prefecture']){
                        echo $prefecture;
                        $_POST['prefecture'] = $prefecture;
                    }
                }
            }
        ?>
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
        <?php if($_POST['authority']==="0"){
            echo'一般';
        }else{
            echo '管理者'; 
        }?>
        </p>
        
        <input type="submit" onclick=history.back() value="前に戻る">
            
        <form action="update_complete.php" method="post">
            <input type="submit" name="btn_submit" value="登録する">
            <input type="hidden" name = "id" value="<?php echo $_POST['id'];?>">
            <input type="hidden" value="<?php echo $_POST['family_name'];?>" name="family_name">
            <input type="hidden" value="<?php echo $_POST['last_name'];?>" name="last_name">
            <input type="hidden" value="<?php echo $_POST['family_name_kana'];?>" name="family_name_kana">
            <input type="hidden" value="<?php echo $_POST['last_name_kana'];?>" name="last_name_kana">
            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['password_check'];?>" name="password_check">
            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
            <input type="hidden" value="<?php echo $_POST['gender'];?>" name="gender">
            <input type="hidden" value="<?php echo $_POST['postal_code'];?>" name="postal_code">
            <input type="hidden" value="<?php echo $_POST['prefecture'];?>" name="prefecture">
            <input type="hidden" value="<?php echo $_POST['address_1'];?>" name="address_1">
            <input type="hidden" value="<?php echo $_POST['address_2'];?>" name="address_2">
            <input type="hidden" value="<?php echo $_POST['authority'];?>" name="authority">
            <input type="hidden" value="0" name="delete_flag">
            
        </form>
        <?php else : ?>
        <div class="error_messge">
                <h8>※アカウント一覧画面から更新するデータを選択してください。</h8>
                <form action="list.php" >
                    <input type="submit" class="submit" value="アカウント一覧画面へ進む">
                </form>
            </div>
        <?php endif; ?>
        
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
    </body>
    <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
    </footer>
</html>