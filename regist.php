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
                <li>D.I.Blogについて</li>
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
                        <select class="dropdown" name="">
                            <option>男</option>
                            
                        </select>
                    </div>
                    <div>
                        <label>郵便番号</label>
                        <input type="text"class="text" size="7"name="postal_code"><br>
                    </div>
                    <div>
                        <label>住所（都道府県）</label>
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