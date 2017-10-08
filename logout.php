<?php
//お作法
session_start();

//セッションを初期化
$_SESSION = array();

//Cookieを無効化
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000, '/');
}
//サーバ側での、セッションIDの破棄
session_destroy();

//処理後、index.phpへリダイレクト
header("Location: login.php");
exit();

?>