<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

$update_error = 0;

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
        <title>アカウント更新画面</title>
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

                $stmt = $pdo -> query('select * from account where id = '.$id);
                $update = $stmt->fetch();
            }else{
                $update_error = 1;
            }
            
            ?>
            <?php if($update_error == 0) : ?>
            <form action="update_confirm.php" method="post" name = "update">
                <input type="hidden" name = "id" value="<?php echo $_POST['id'];?>">
            <div class="textarea">
                        <label>名前（姓）</label>
                        <input type="text"class="text"size="10"name="family_name"id="family_name"value="<?php if( !empty($update['family_name']) ){ echo $update['family_name']; } ?>"><br>
                        <span id = 'family_name_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>名前（名）</label>
                        <input type="text"class="text" size="10"name="last_name"id="last_name"value="<?php if( !empty($update['last_name']) ){ echo $update['last_name']; } ?>"><br>
                        <span id = 'last_name_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>カナ（姓）</label>
                        <input type="text"class="text" size="10"name="family_name_kana"id="family_name_kana"value="<?php if( !empty($update['family_name_kana']) ){ echo $update['family_name_kana']; } ?>"><br>
                        <span id = 'family_name_kana_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>カナ（名）</label>
                        <input type="text"class="text" size="10"name="last_name_kana"id="last_name_kana"value="<?php if( !empty($update['last_name_kana']) ){ echo $update['last_name_kana']; } ?>"><br>
                        <span id = 'last_name_kana_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>メールアドレス</label>
                        <input type="text"class="text" size="10"name="mail"id="mail"value="<?php if( !empty($update['mail']) ){ echo $update['mail']; } ?>"><br>
                        <span id = 'mail_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>パスワード</label><br>
                        <input type = "checkbox" name = "password_check" id = "password_check">※パスワードを変更する場合は左のチェックボックスにチェックをしてください。<br>
                        <!--変更したいのと変更したくない場合どのようにすべきか -->
                        <div class="password_area">
                        <input type="text"class="text" size="10"
                               name="password"id="password"
                               value="<?php if( !empty($_POST['password']) ){ echo $_POST['password'];} ?>">
                        </div>
                        <span id = 'password_error' class="error_m"></span>
                        <br>
                    </div>
                    <div class="textarea">
                        <label>性別</label>
                        <input type="radio" name="gender"value="0" <?php if((int)$update['gender']=="0") echo "checked"; ?>>男
                        <input type="radio" name="gender"value="1" <?php if((int)$update['gender']=="1") echo "checked"; ?>>女
                    </div>
                    <div class="textarea">
                        <label>郵便番号</label>
                        <!--0ずめしたい -->
                        <input type="text"class="text" size="7"name="postal_code"id="postal_code"value="<?php if( !empty($update['postal_code']) ){ echo $update['postal_code']; } ?>"><br>
                        <span id = 'postal_code_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>住所（都道府県）</label>
                        <?php
                        $prefecture_list = Array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','長野県','新潟県','富山県','石川県','福井県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'); ?>
                    
                        <select class="dropdown" name="prefecture"id="prefecture" value ="<?php if( !empty($update['prefecture']) ){ echo $update['prefecture']; } ?>" >
                            <!-- ユーザーが選んだ内容にselectedをつけるようなプログラムにする -->
                            <?php
                            foreach($prefecture_list as $key => $prefecture){
                                if(!empty($update['prefecture'])){
                                    if($prefecture === $update['prefecture']){
                                        echo '<option value="'.$key.'"selected>'.$prefecture.'</option>';
                                    }else{
                                        echo '<option value="'.$key.'">'.$prefecture.'</option>';
                                    }
                                }else{
                                        echo '<option value="'.$key.'">'.$prefecture.'</option>';
                                }
                            } ?>
                            
                        </select><br>
                        <span id = 'prefecture_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>住所（市区町村）</label>
                        <input type="text"class="text" size="10"name="address_1"id="address_1"value="<?php if( !empty($update['address_1']) ){ echo $update['address_1']; } ?>"><br>
                        <span id = 'address_1_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>住所（番地）</label>
                        <input type="text"class="text" size="100"name="address_2"id="address_2"value="<?php if( !empty($update['address_2']) ){ echo $update['address_2']; } ?>"><br>
                        <span id = 'address_2_error' class="error_m"></span><br>
                    </div>
                    <div class="textarea">
                        <label>アカウント権限</label>
                        <select class="dropdown" name="authority">
                            <option value='0'<?php if((int)$update['authority']=="0") echo "selected"; ?>>一般</option>
                            <option value='1'<?php if((int)$update['authority']=="1") echo "selected"; ?>>管理者</option>
                        </select>
                    </div>
                    <div class="textarea">
                        <input type="submit" class="btn_submit" id="btn_confirm" value="確認する">
                    </div>
                </form>
            <?php else : ?>
            <div class="error_messge">
                <h8>※アカウント一覧画面から更新するデータを選択してください。</h8>
                <form action="list.php" >
                    <input type="submit" class="submit" value="アカウント一覧画面へ進む">
                </form>
            </div>
            <?php endif; ?>
            <br>
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