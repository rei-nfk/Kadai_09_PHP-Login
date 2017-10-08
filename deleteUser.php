<?php
//外部ファイル読み込み
include("functions.php");
//セッションハイジャックされてないかチェック
//今のセッションIDなどを呼び出す為に、session_start();が必要
session_start();
ssidChk();

//0.GETでidを取得
$id=$_GET["id"];

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ削除SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();


//３．データ削除
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  header("Location: selectUser.php");
  exit;
}

?>
