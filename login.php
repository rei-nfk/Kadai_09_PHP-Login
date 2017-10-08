<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>本の管理アプリ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bookmgt.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <h1>本を管理しよう！</h1>
        </header>
        <section class="content">
       <h2>ログイン</h2>
       <form name="form1" action="login_act.php" method="post">
            ID:<input type="text" name="lid" />
            PW:<input type="password" name="lpw" />
            <input type="submit" value="LOGIN" />
       </form>
<!--
            <div id="loginscreen">
                <a href="selectBook.php">本を管理する</a>
                <a href="selectUser.php">ユーザーを管理する</a>
            </div>
-->
        </section>
    </div>
</body>

</html>
