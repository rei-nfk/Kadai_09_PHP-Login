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
            <p>動作確認用：ID test2、PW test2</p>
            <form name="form1" action="login_act.php" method="post">
                <label class="input-title">ID:</label>
                <div class="input">
                    <input type="text" name="lid" />
                </div>
                <label class="input-title">PW:</label>
                <div class="input">
                    <input type="password" name="lpw" />
                </div>
                <div class="button">
                    <input type="submit" value="LOGIN" id="submit"/>
                </div>
            </form>
            <p><a href="selectUser_external-user.php">ログインせずに本・ユーザーを確認する</a></p>
        </section>
    </div>
</body>

</html>
