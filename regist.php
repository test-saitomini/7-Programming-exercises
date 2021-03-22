<?php

//変数の初期化
//$page_flag = 0;
//$error = array();

//if( !empty($_POST['btn_confirm'])) {
  //エラーチェック
   //$error = validation($_POST);
    //if( empty($error) ) {
        //$page_flag = 1;
    //}
    //} elseif ( !empty($_POST['btn_submit'])) {
       //$page_flag = 2;
    //} else {
        //$page_flag = 0;
//    }
//
//    function validation($data) {
//        $error = array();
//        $check = array();
//        
//        // 氏名のエラー判定
//        if ( empty($data['family_name']) ) {
//            $error[] = "　氏名を記入してください";
//        } elseif ( 10< mb_strlen($data['family_name'] ) {
//            $error[] = "　氏名を記入してください";
//        }
//        // メールアドレスのエラー判定
//        //メールアドレスの@前後をcheck配列に格納（check[1]がドメイン部分）
//        //$check = explode('@',$data['mail']);
//        //if ( empty($data['mail']) ) {
//            //$error[] = "　メールアドレスを記入してください";
//       // } elseif ( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['mail']) ) {
//            //$error[] = "　正しいメールアドレスを記入してください";
//            //ドメイン部分が有効か判定
//       // }elseif (!(checkdnsrr($check[1],'A')) ) {
//        //    $error[] = "　有効なドメインか確認してください";
//       // } elseif ( 50 < mb_strlen($data['mail']) ) {
//       //     $error[] = "　正しいメールアドレスを記入してください";
//       // }
//        return $error;
//    }
//    
?>
<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録画面</title>
        <link rel="stylesheet"type="text/css"href="regist.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        
        <main>
            <form method="post" action="regist_confirm.php">
                <h2>入力フォーム</h2>
                    <div>
                        <label>名前（姓）</label>
                        <input type="text"class="text"size="10"name="family_name"value="<?php if( !empty($_POST['family_name']) ){ echo $_POST['family_name']; } ?>"><br>
                        <span id = 'family_name_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>名前（名）</label>
                        <input type="text"class="text" size="10"name="last_name"value="<?php if( !empty($_POST['last_name']) ){ echo $_POST['last_name']; } ?>"><br>
                        <span id = 'last_name_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>カナ（姓）</label>
                        <input type="text"class="text" size="10"name="family_name_kana"value="<?php if( !empty($_POST['family_name_kana']) ){ echo $_POST['family_name_kana']; } ?>"><br>
                        <span id = 'family_name_kana_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>カナ（名）</label>
                        <input type="text"class="text" size="10"name="last_name_kana"value="<?php if( !empty($_POST['last_name_kana']) ){ echo $_POST['last_name_kana']; } ?>"><br>
                        <span id = 'last_name_kana_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <input type="text"class="text" size="100"name="mail"value="<?php if( !empty($_POST['mail']) ){ echo $_POST['mail']; } ?>"><br>
                        <span id = 'mail_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>パスワード</label>
                        <input type="text"class="text" size="10"name="password"value="<?php if( !empty($_POST['password']) ){ echo $_POST['password']; } ?>"><br>
                        <span id = 'password_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>性別</label>
                        <label for="0"><input id="0" type="radio" name="gender"value="0" checked>男</label>
                        <label for="1"><input id="1" type="radio" name="gender"value="1">女</label>
                    </div>
                    <div>
                        <label>郵便番号</label>
                        <input type="text"class="text" size="7"name="postal_code"value="<?php if( !empty($_POST['postal_code']) ){ echo $_POST['postal_code']; } ?>"><br>
                        <span id = 'postal_code_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>住所（都道府県）</label>
                        <?php
                        $prefecture_list = Array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','長野県','新潟県','富山県','石川県','福井県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'); ?>
                    
                        <select class="dropdown" name="prefecture">
                            <option> </option>
                            <?php
                            foreach($prefecture_list as $prefecture_list){
                                print('<option value="'.$prefecture_list.'">'.$prefecture_list.'</option>');
                            } ?>
                        </select>
                        <span id = 'prefecture_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>住所（市区町村）</label>
                        <input type="text"class="text" size="10"name="address_1"value="<?php if( !empty($_POST['address_1']) ){ echo $_POST['address_1']; } ?>"><br>
                        <span id = 'address_1_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>住所（番地）</label>
                        <input type="text"class="text" size="100"name="address_2"value="<?php if( !empty($_POST['address_2']) ){ echo $_POST['address_2']; } ?>"><br>
                        <span id = 'address_2_error' class="error_m"></span><br>
                    </div>
                    <div>
                        <label>アカウント権限</label>
                        <select class="dropdown" name="authority">
                            <option value='0'　checked>一般</option>
                            <option value='1'>管理者</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" id="btn_confirm" value="確認する">
                        <script type="text/javascript" src="regist.js"></script>
                    </div>
                </form>
                    <br>
            </main>
        
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        
    </body>
</html>