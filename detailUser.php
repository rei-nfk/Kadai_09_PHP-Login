<?php
//0.GETでidを取得
$id=$_GET["id"];


//1.  DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //対象行のみ取得
  $row = $stmt->fetch(); //$row["name"]
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー情報を更新できます！</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bookmgt.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <h1>ユーザー情報を更新しましょう！</h1>
        </header>
        <nav>
            <ul>
                <li><a href="selectBook.php">登録書籍一覧</a></li>
                <li><a href="bookregister.php">書籍登録</a></li>
                <li><a href="selectUser.php">登録ユーザー一覧</a></li>
                <li><a href="userregister.php">ユーザー登録</a></li>
            </ul>
        </nav>
        <section>
            <form method="post" action="updateUser.php">
                <fieldset>
                    <legend>ユーザー情報</legend>
                    <label>氏名：</label><input type="text" name="userName" value="<?=$row["userName"]?>"><br>
                    <label>ID：</label><input type="text" name="lid" value="<?=$row["lid"]?>"><br>
                    <label>PW：</label><input type="text" name="lpw" value="<?=$row["lpw"]?>"><br>
<!--                    本当はここでログイン機能があって、自動で入力されるといい-->
                    <label>権限：</label>
                        <?php
                            if($row["kanri_flg"]==0){
                                $radio_kanri = 
                                        '<input type="radio" name="kanri_flg" value="0" checked="checked">一般ユーザー
                                        <input type="radio" name="kanri_flg" value="1">特権管理者';
                            }else{
                                $radio_kanri = 
                                        '<input type="radio" name="kanri_flg" value="0">一般ユーザー
                                        <input type="radio" name="kanri_flg" value="1" checked="checked">特権管理者';
                            }
                            echo $radio_kanri;
                        ?>
                    <br>
                    <label>有効/無効：</label>
                        <?php
                            if($row["life_flg"]==0){
                                $radio_life = 
                                        '<input type="radio" name="life_flg" value="0" checked="checked">有効
                                        <input type="radio" name="life_flg" value="1">無効';
                            }else{
                                $radio_life = 
                                        '<input type="radio" name="life_flg" value="0">有効
                                        <input type="radio" name="life_flg" value="1" checked="checked">無効';
                            }
                            echo $radio_life;
                        ?>
                    <br>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" value="送信"  id="submit">
                </fieldset>
            </form>
        </section>
    </div>
</body>

</html>

