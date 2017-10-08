<?php
//1.  DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
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
      
      $view .= '<td><a href="detailBook.php?id='.$result["id"].'">'.$result["id"].'</a></td>';
      $view .= '<td>'.$result["bookName"].'</td>';
      $view .= '<td>'.$result["bookUrl"].'</td>';
      $view .= '<td>'.$result["bookComment"].'</td>';
      $view .= '<td>'.$result["regBookDate"].'</td>';
      $view .= '<td>'.$result["regUser"].'</td>';
      $view .= '<td><a href="deleteBook.php?id='.$result["id"].'">(削除)</a></td>';
      $view .= '</tr>';
  }
}
?>


    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>本の一覧</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/bookmgt.css">
    </head>

    <body>
        <div id="wrapper">
            <header>
                <p><a href="login.php">ログアウト</a></p>
                <h1>登録書籍一覧</h1>
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
                        <th>書籍名</th>
                        <th>書籍URL</th>
                        <th>コメント</th>
                        <th>登録日時</th>
                        <th>登録者</th>
                        <th>削除</th>
                    </tr>
                    <?=$view?>
                </table>
            </section>
        </div>


    </body>

    </html>
