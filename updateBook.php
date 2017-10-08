<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["bookName"]) || $_POST["bookName"]=="" ||
  !isset($_POST["bookUrl"]) || $_POST["bookUrl"]=="" ||
  !isset($_POST["bookComment"]) || $_POST["bookComment"]==""||
  !isset($_POST["regUser"]) || $_POST["regUser"]==""||
  !isset($_POST["id"]) || $_POST["id"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$id = $_POST["id"];
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


//３．データ更新SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET bookName=:bookName, bookUrl=:bookUrl, bookComment=:bookComment, regUser=:regUser WHERE id=:id");
$stmt->bindValue(':bookName', $bookName);
$stmt->bindValue(':bookUrl', $bookUrl);
$stmt->bindValue(':bookComment', $bookComment);
$stmt->bindValue(':regUser', $regUser);
$stmt->bindValue(':id', $id);
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
