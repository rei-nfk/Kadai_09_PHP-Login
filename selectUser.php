<?php
//1.  DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .= '<tr>';
      
      $view .= '<td><a href="detailUser.php?id='.$result["id"].'">'.$result["id"].'</a></td>';
      $view .= '<td>'.$result["userName"].'</td>';
      $view .= '<td>'.$result["lid"].'</td>';
      $view .= '<td>'.$result["lpw"].'</td>';
//      $view .= '<td>'.$result["kanri_flg"].'</td>';
      if($result["kanri_flg"]==0){
          $view .= '<td>一般ユーザー</td>';
      }else{
          $view .= '<td>特権管理者</td>';
      }
      if($result["life_flg"]==0){
          $view .= '<td>有効</td>';
      }else{
          $view .= '<td>無効</td>';
      }
//      $view .= '<td>'.$result["life_flg"].'</td>';
      $view .= '<td><a href="deleteUser.php?id='.$result["id"].'">(削除)</a></td>';
      $view .= '</tr>';
  }
}
?>


    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザー一覧</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/bookmgt.css">
    </head>

    <body>
        <div id="wrapper">
            <header>
                <p><a href="login.php">ログアウト</a></p>
                <h1>ユーザー一覧</h1>
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
                <table>
                    <tr>
                        <th>id</th>
                        <th>氏名</th>
                        <th>ID</th>
                        <th>PW</th>
                        <th>権限</th>
                        <th>有効/無効</th>
                        <th>削除</th>
                    </tr>
                    <?=$view?>
                </table>
            </section>
        </div>


    </body>

    </html>
