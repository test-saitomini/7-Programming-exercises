<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント登録画面</title>
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
        
        <main>
            <form method="post" action="regist_confirm.php">
                <h2>入力フォーム</h2>
                    <div>
                        <label>名前（姓）</label>
                        <input type="text"class="text" size="10"name="family_name"><br>
                    </div>
                    <div>
                        <label>名前（名）</label>
                        <input type="text"class="text" size="10"name="last_name"><br>
                    </div>
                    <div>
                        <label>カナ（姓）</label>
                        <input type="text"class="text" size="10"name="family_name_kana"><br>
                    </div>
                    <div>
                        <label>カナ（名）</label>
                        <input type="text"class="text" size="10"name="last_name_kana"><br>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <input type="text"class="text" size="100"name="mail"><br>
                    </div>
                    <div>
                        <label>パスワード</label>
                        <input type="text"class="text" size="10"name="password"><br>
                    </div>
                    <div>
                        <label>性格</label>
                        <input type="radio" name="gender"value="0" checked>男
                        <input type="radio" name="gender"value="1">女
                    </div>
                    <div>
                        <label>郵便番号</label>
                        <input type="text"class="text" size="7"name="postal_code"><br>
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
                    </div>
                    <div>
                        <label>住所（市区町村）</label>
                        <input type="text"class="text" size="10"name="address_1"><br>
                    </div>
                    <div>
                        <label>住所（番地）</label>
                        <input type="text"class="text" size="100"name="address_2"><br>
                    </div>
                    <div>
                        <label>アカウント権限</label>
                        <select class="dropdown" name="authority">
                            <option value='0'>一般</option>
                            <option value='1'>管理者</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" class="submit" value="確認する">
                    </div>
                </form>
                    <br>
            </main>
        
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
    </body>
</html>