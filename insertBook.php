<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["bookName"]) || $_POST["bookName"]=="" ||
  !isset($_POST["bookUrl"]) || $_POST["bookUrl"]=="" ||
  !isset($_POST["bookComment"]) || $_POST["bookComment"]==""||
  !isset($_POST["regUser"]) || $_POST["regUser"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$bookName   = $_POST["bookName"];
$bookUrl  = $_POST["bookUrl"];
$bookComment = $_POST["bookComment"];
$regUser = $_POST["regUser"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, bookName, bookUrl, bookComment, regBookDate, regUser )
VALUES(NULL, :a1, :a2, :a3, sysdate(), :a4)");
$stmt->bindValue(':a1', $bookName);
$stmt->bindValue(':a2', $bookUrl);
$stmt->bindValue(':a3', $bookComment);
$stmt->bindValue(':a4', $regUser);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: selectBook.php");
  exit;
}
?>
