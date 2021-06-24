<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アカウント一覧画面</title>
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
                <li><a href = "http://localhost/account/list.php">アカウント一覧画面</a></li>
                <li>その他</li>
            </ul>
        </header>
        
        <main>
            <div class = "kakunin_area">
            <table>
                <tr>
                    <td>ID</td>
                    <td>名前（姓）</td>
                    <td>名前（名）</td>
                    <td>カナ（姓）</td>
                    <td>カナ（名）</td>
                    <td>メールアドレス</td>
                    <td>性別</td>
                    <td>アカウント権限</td>
                    <td>削除フラグ</td>
                    <td>登録日時</td>
                    <td>更新日時</td>
                    <td>操作</td>
                </tr>
            <?php
            
            mb_internal_encoding("UTF-8");
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
            
            $stmt = $pdo -> query("select * from account");
            //ここにIDを降順にするif文を追記。            
            while($row = $stmt->fetch()){
                echo '<tr>';
                echo '<td>',$row['id'],'</td>';
                echo '<td>',$row['family_name'],'</td>';
                echo '<td>',$row['last_name'],'</td>';
                echo '<td>',$row['family_name_kana'],'</td>';
                echo '<td>',$row['last_name_kana'],'</td>';
                echo '<td>',$row['mail'],'</td>';
                if($row['gender'] === "0"){
                    echo '<td>',"男",'</td>';}else{
                    echo '<td>',"女",'</td>';
                }//パラメータのみではなく日本語で
                if($row['authority'] === "0"){
                    echo '<td>',"一般",'</td>';}else{
                    echo '<td>',"管理者",'</td>';
                }//パラメータのみではなく日本語で
                if($row['delete_flag'] === "0"){
                    echo '<td>',"有効",'</td>';}else{
                    echo '<td>',"無効",'</td>';
                }
                
                $date1 = $row['registered_time'];
                $registered_date = substr($date1,0,10);
                echo '<td>',$registered_date,'</td>';//年月日のみ
                
                $date2 = $row['update_time'];
                $update_date = substr($date2,0,10);//年月日のみ
                echo '<td>',$update_date,'</td>';
                
                echo '<td>','<form action="update.php" method="post">
            <input type="submit" name="btn_update" value="更新">
            </form>','</td>';
                
                echo '<td>','<form action="delete.php" method="post">
            <input type="submit" name="btn_delete" value="削除">
            </form>','</td>';
                
                echo '</tr>';
            }
            ?>
            
            </table>
                </div>
            
        </main>
        
        <footer>
            Copyright D.I.Works| D.I.blog is the one which provides Ato Z about programming
        </footer>
        <script type="text/javascript" src="regist.js"></script>
    </body>
</html>