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
                <li><a href = "http://localhost/account/list.php">アカウント一覧</a></li>
                <li>その他</li>
            </ul>
        </header>
        
        <main>
            <h5>アカウント一覧画面</h5>
            <div class = "kakunin_area">
            <table class="accounttable">
                <tr>
                    <td class="centor">ID</td>
                    <td class="centor">名前（姓）</td>
                    <td class="centor">名前（名）</td>
                    <td class="centor">カナ（姓）</td>
                    <td class="centor">カナ（名）</td>
                    <td class="centor">メールアドレス</td>
                    <td class="centor">性別</td>
                    <td class="centor">アカウント権限</td>
                    <td class="centor">削除フラグ</td>
                    <td class="centor">登録日時</td>
                    <td class="centor">更新日時</td>
                    <td class="centor" colspan="2">操作</td>
                </tr>
            <?php
            
            mb_internal_encoding("UTF-8");
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
            
            $stmt = $pdo -> query("select * from account ORDER BY id DESC");           
            while($row = $stmt->fetch()){
                echo '<tr>';
                echo '<td class="right">',$row['id'],'</td>';
                echo '<td class="right">',$row['family_name'],'</td>';
                echo '<td class="right">',$row['last_name'],'</td>';
                echo '<td class="right">',$row['family_name_kana'],'</td>';
                echo '<td class="right">',$row['last_name_kana'],'</td>';
                echo '<td class="left">',$row['mail'],'</td>';
                if($row['gender'] === "0"){
                    echo '<td class="centor">',"男",'</td>';
                } else {
                    echo '<td class="centor">',"女",'</td>';
                }
                if($row['authority'] === "0"){
                    echo '<td class="centor">',"一般",'</td>';
                } else {
                    echo '<td class="centor">',"管理者",'</td>';
                }
                if($row['delete_flag'] === "0"){
                    echo '<td class="centor">',"有効",'</td>';
                } else {
                    echo '<td class="centor">',"無効",'</td>';
                }
                
                $date1 = $row['registered_time'];
                $registered_date = substr($date1,0,10);
                echo '<td class="centor">',$registered_date,'</td>';
                
                $date2 = $row['update_time'];
                $update_date = substr($date2,0,10);
                echo '<td class="centor">',$update_date,'</td>';
                
                //各行の表に対応した更新ボタン
                echo '<form action="update.php" method="post">';
                //echo "<input type = hidden  value=".$row["id"].">";
                echo '<td class="centor">','<input type="submit" id="btn_update" value="更新">
            </form>','</td>';
                
                //各行の表に対応した削除ボタン
                echo '<form action="delete.php" method="post">';
                echo '<input type = "hidden" name = "id" value="'.$row["id"].'" >';
                //echo "<input type = hidden value=".$row["id"].">";
                echo '<td class="centor">',$row['id'],'<input type="submit" value="削除">
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