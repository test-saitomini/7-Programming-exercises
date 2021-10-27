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
        <title>アカウント一覧画面</title>
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
            <h5>アカウント一覧画面</h5>
            
            <form action="" method="post">
                <div class="textarea">
                   <table class="accountlisttable"> 
                        <tr>
                            <td class="center">名前（姓）</td>
                            <td class="list_left">
                                <input type="text"class="text"size="50"name="family_name"id="family_name"value="<?php if( !empty($_POST['family_name']) ){ echo $_POST['family_name']; } ?>">
                            </td>
                            <td class="center">名前（名）</td>
                            <td class="list_left">
                                <input type="text"class="text" size="50"name="last_name"id="last_name"value="<?php if( !empty($_POST['last_name']) ){ echo $_POST['last_name']; } ?>">
                            </td>
                       </tr>
                       <tr>
                           <td class="center">カナ（姓）</td>
                            <td class="list_left">
                                <input type="text"class="text" size="50"name="family_name_kana"id="family_name_kana"value="<?php if( !empty($_POST['family_name_kana']) ){ echo $_POST['family_name_kana']; } ?>">
                           </td>
                           <td class="center">カナ（名）</td>
                            <td class="list_left">
                                <input type="text"class="text" size="50"name="last_name_kana"id="last_name_kana"value="<?php if( !empty($_POST['last_name_kana']) ){ echo $_POST['last_name_kana']; } ?>">
                           </td>
                       </tr>
                       <tr>
                           <td class="center">メールアドレス</td>
                            <td class="list_left">
                                <input type="text"class="text" size="50"name="mail"id="mail"value="<?php if( !empty($_POST['mail']) ){ echo $_POST['mail']; } ?>">
                           </td>
                           <td class="center">性別</td>
                            <td class="list_center">
                                <label for="0"><input id="0" type="radio" name="gender"value="0" <?php if(!empty($_POST['gender']) && (int)$_POST['gender']=="0") echo "checked"; ?>checked>男</label>
                                <label for="1"><input id="1" type="radio" name="gender"value="1" <?php if(!empty($_POST['gender']) && (int)$_POST['gender']=="1") echo "checked"; ?>>女</label>
                                <label for="2"><input id="2" type="radio" name="gender"value="2" <?php if(!empty($_POST['gender']) && (int)$_POST['gender']=="2") echo "checked"; ?>>選択なし</label>
                           </td>
                       </tr>
                       <tr>
                           <td class="center">アカウント権限</td>
                            <td class="list_center"><select class="dropdown" name="authority">
                                <option value='0' <?php if(!empty($_POST['authority']) && (int)$_POST['authority']=="0") echo "selected"; ?>selected>一般</option>
                                <option value='1' <?php if(!empty($_POST['authority']) && (int)$_POST['authority']=="1") echo "selected"; ?>>管理者</option>
                                <option value='2' <?php if(!empty($_POST['authority']) && (int)$_POST['authority']=="2") echo "selected"; ?>>選択なし</option>
                                </select></td>
                       </tr>
                       <tr>
                           <td class ="center"><input type="submit" name="kensaku"  id="kensaku"value="検索"></td>
                       </tr>
                       
                    </table>
                </div>
            </form>
            
            <?php
            
            if (isset($_POST['kensaku'])) {
            
                mb_internal_encoding("UTF-8");
                $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
            
                $family_name = $_POST['family_name'];
                $last_name = $_POST['last_name'];
                $family_name_kana = $_POST['family_name_kana'];
                $last_name_kana = $_POST['last_name_kana'];
                $mail = $_POST['mail'];
                $gender = $_POST['gender'];
                $authority = $_POST['authority'];
                
                $count = 0;
                
                if($family_name != "" || $last_name !="" || $family_name_kana !="" || $last_name_kana != ""
                  || $mail != "" || $gender != "2" || $authority != "2"){
                    $sql = "select * from account where ";
                    if ($family_name != ""){
                        $family_name = '%'.$family_name.'%';
                        $sql.= "family_name LIKE (:family_name)";
                        $count = 1;
                    }
                    if ($last_name != ""){ 
                        if($count == 0){
                            $sql.= "last_name LIKE (:last_name)";
                            $last_name = '%'.$last_name.'%';
                            $count = 1;
                        }else{
                            $sql.= " AND last_name LIKE (:last_name)";
                            $last_name = '%'.$last_name.'%';
                        }
                    }
                    if ($family_name_kana != ""){ 
                        if($count == 0){
                            $sql.= "family_name_kana LIKE (:family_name_kana)";
                            $family_name_kana = '%'.$family_name_kana.'%';
                            $count = 1;
                        }else{
                            $sql.= " AND family_name_kana LIKE (:family_name_kana)";
                            $family_name_kana = '%'.$family_name_kana.'%';
                        }
                    }
                    if ($last_name_kana != ""){ 
                        if($count == 0){
                            $sql.= "last_name_kana LIKE (:last_name_kana)";
                            $last_name_kana = '%'.$last_name_kana.'%';
                            $count = 1;
                        }else{
                            $sql.= " AND last_name_kana LIKE (:last_name_kana)";
                            $last_name_kana = '%'.$last_name_kana.'%';
                        }
                    }
                    if ($mail != ""){ 
                        if($count == 0){
                            $sql.= "mail LIKE (:mail)";
                            $mail = '%'.$mail.'%';
                            $count = 1;
                        }else{
                            $sql.= " AND mail LIKE (:mail)";
                            $mail = '%'.$mail.'%';
                        }
                    }
                    if ($gender != "2"){ 
                        if($count == 0){
                            $sql.= "gender = :gender";
                            $count = 1;
                        }else{
                            $sql.= " AND gender = :gender";
                        }
                    }
                    if ($authority != "2"){ 
                        if($count == 0){
                            $sql.= "authority = :authority";
                            $count = 1;
                        }else{
                            $sql.= " AND authority = :authority";
                        }
                    }
                    $stmt = $pdo->prepare($sql);
                    if ($family_name != ""){
                        $stmt->bindValue(':family_name', $family_name, PDO::PARAM_STR);
                    }
                    if ($last_name != ""){
                        $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
                    }
                    if ($family_name_kana != ""){
                        $stmt->bindValue(':family_name_kana', $family_name_kana, PDO::PARAM_STR);
                    }
                    if ($last_name_kana != ""){
                        $stmt->bindValue(':last_name_kana', $last_name_kana, PDO::PARAM_STR);
                    }
                    if ($mail != ""){
                        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
                    }
                    if ($gender != "2"){
                        $stmt->bindValue(':gender', $gender);
                    }
                    if ($authority != "2"){
                        $stmt->bindValue(':authority', $authority);
                    }
                    
                    $stmt->execute();
                    $count = $stmt -> rowCount();
                    if($count == 0){
                        echo '<h7>該当のアカウントは見つかりませんでした。</h7>';
                    }else{
                        echo '<h7>該当のアカウントが'.$count.'件見つかりました。</h7>';
                    }
                }else{
                    $stmt = $pdo -> query("select * from account ORDER BY id DESC");
                    echo '<h7>全件表示しています。</h7>';
                }
            }
            
            ?>
            
            <div class = "kakunin_area">
            <table class="accounttable">
                <tr>
                    <td class="center">ID</td>
                    <td class="center">名前（姓）</td>
                    <td class="center">名前（名）</td>
                    <td class="center">カナ（姓）</td>
                    <td class="center">カナ（名）</td>
                    <td class="center">メールアドレス</td>
                    <td class="center">性別</td>
                    <td class="center">アカウント権限</td>
                    <td class="center">削除フラグ</td>
                    <td class="center">登録日時</td>
                    <td class="center">更新日時</td>
                    <td class="center" colspan="2">操作</td>
                </tr>
            <?php
                if (isset($_POST['kensaku'])) {
                    while($row = $stmt->fetch()){
                        echo '<tr>';
                        echo '<td class="right">',$row['id'],'</td>';
                        echo '<td class="right">',$row['family_name'],'</td>';
                        echo '<td class="right">',$row['last_name'],'</td>';
                        echo '<td class="right">',$row['family_name_kana'],'</td>';
                        echo '<td class="right">',$row['last_name_kana'],'</td>';
                        echo '<td class="left">',$row['mail'],'</td>';
                        if($row['gender'] === "0"){
                            echo '<td class="center">',"男",'</td>';
                        } else {
                            echo '<td class="center">',"女",'</td>';
                        }
                        if($row['authority'] === "0"){
                            echo '<td class="center">',"一般",'</td>';
                        } else {
                            echo '<td class="center">',"管理者",'</td>';
                        }
                        if($row['delete_flag'] === "0"){
                            echo '<td class="center">',"有効",'</td>';
                        } else {
                            echo '<td class="center">',"無効",'</td>';
                        }

                        $date1 = $row['registered_time'];
                        $registered_date = substr($date1,0,10);
                        echo '<td class="center">',$registered_date,'</td>';

                        $date2 = $row['update_time'];
                        $update_date = substr($date2,0,10);
                        echo '<td class="center">',$update_date,'</td>';

                        //各行の表に対応した更新ボタン
                        echo '<form action="update.php" method="post">';
                        echo '<input type = "hidden" name = "id" value="'.$row["id"].'">';
                        if($row['delete_flag']== 1){
                            echo '<td class="center">','<input type="submit" value="更新" disabled>
                    </form>','</td>';
                        }else{
                            echo '<td class="center">','<input type="submit" value="更新">
                    </form>','</td>';
                        };


                        //各行の表に対応した削除ボタン
                        echo '<form action="delete.php" method="post">';
                        echo '<input type = "hidden" name = "id" value="'.$row["id"].'" >';
                        //echo "<input type = hidden value=".$row["id"].">";
                        if($row['delete_flag']== 1){
                            echo '<td class="center">','<input type="submit" value="削除"disabled>
                    </form>','</td>';
                        }else{
                            echo '<td class="center">','<input type="submit" value="削除">
                    </form>','</td>';
                        }


                        echo '</tr>';
                    }
                }
                ?>


                </table>
                    </div>

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