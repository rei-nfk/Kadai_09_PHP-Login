<?php
//セッション開始
session_start();

//外部ファイル読み込み
include("functions.php");

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


//1.DB接続
$pdo = db_con();

//2.ユーザーが入力したID、PWに合致する登録ユーザーがいるかチェック
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid");
$stmt->bindValue(':lid', $lid);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
  queryError($stmt);
}

//4.抽出データ数を取得
$val = $stmt->fetch(); //上段で実行したSQLで、該当するユーザーのレコードが取り出し、オブジェクトに格納

//5.ユーザー情報をセッション変数に格納
//if($_POST["lpw"]== $val["lpw"]){
if(password_verify($lpw, $val["lpw"])){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSIOM["kanri_flg"] = val["kanri_flg"]; //内部ユーザー専用画面で、外部ユーザーを排除する時に利用（多分・・・）
    $_SESSION["name"]      = $val['name'];
    header("Location: selectBook.php");//ユーザー一覧に飛ばすという選択肢もあるが、ここでは登録本一覧に飛ばすことにする
}else{
//    header("Location: logout.php");
    echo "パスワードが違います";
}
    

exit();
?>