<?php

//db接続
function db_con(){
  $dbname='gs_db37';//こちらはDB名に合わせて書き換える必要
  try {
    $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//XSS対策
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

//SessionCheck関数
function ssidChk(){
    if(!isset($_SESSION["chk_ssid"]) || 
      $_SESSION["chk_ssid"]!=session_id()){
        echo "Login Error.";
        exit;
    }else{
        session_regenerate_id();
        $_SESSION["chk_ssid"]=session_id();
    }
}
?>