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
        <title>アカウント削除確認画面</title>
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
            <?php if($_POST != NULL) : ?>
            <div class="kakunin">
            <h4>本当に削除してよろしいですか？</h4>
            
            <input type="submit" onclick=history.back() value="前に戻る">
            
            <form action="delete_complete.php" method="post">
                <input type="submit" name="delete_submit" value="登録する">
                <input type="hidden" name = "id" value="<?php echo $_POST['id'];?>">
                <input type="hidden" value="1" name="delete_flag">
                
            </form>
            </div>
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