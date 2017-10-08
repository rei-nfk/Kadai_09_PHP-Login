<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["userName"]) || $_POST["userName"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""||
  !isset($_POST["kanri_flg"]) || $_POST["kanri_flg"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$userName  = $_POST["userName"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db37;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, userName, lid, lpw, kanri_flg, life_flg )
VALUES(NULL, :a1, :a2, :a3, :a4, 0)");
$stmt->bindValue(':a1', $userName);
$stmt->bindValue(':a2', $lid);
$stmt->bindValue(':a3', $lpw);
$stmt->bindValue(':a4', $kanri_flg);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: selectUser.php");
  exit;
}
?>
