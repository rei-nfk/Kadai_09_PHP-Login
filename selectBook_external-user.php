<?php
//外部ファイル読み込み
include("functions.php");
////セッションハイジャックされてないかチェック
////今のセッションIDなどを呼び出す為に、session_start();が必要
//session_start();
//ssidChk();

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
      
      $view .= '<td><a>'.$result["id"].'</a></td>';
      $view .= '<td>'.$result["bookName"].'</td>';
      $view .= '<td>'.$result["bookUrl"].'</td>';
      $view .= '<td>'.$result["bookComment"].'</td>';
      $view .= '<td>'.$result["regBookDate"].'</td>';
      $view .= '<td>'.$result["regUser"].'</td>';
//      $view .= '<td><a href="deleteBook.php?id='.$result["id"].'">(削除)</a></td>';
      $view .= '</tr>';
  }
}
?>


    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>本の一覧</title>
        <?php include('header-settings.html'); ?>
       <!--
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/bookmgt.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="js/jquery.fademover.js"></script>
        <script>
            $(function() {
                $('body').fadeMover();
            });
        </script>
-->
    </head>

    <body>
        <div id="wrapper">
            <?php include('header_external-user.html'); ?>
            <section>
                <h1>登録書籍一覧</h1>
            </section>
            <section>
                <table>
                    <tr>
                        <th>id</th>
                        <th>書籍名</th>
                        <th>書籍URL</th>
                        <th>コメント</th>
                        <th>登録日時</th>
                        <th>登録者</th>
                    </tr>
                    <?=$view?>
                </table>
            </section>
        </div>


    </body>

    </html>
