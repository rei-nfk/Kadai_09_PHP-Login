<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録ページ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bookmgt.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <p><a href="login.php">ログアウト</a></p>
            <h1>ユーザーを登録しましょう!</h1>
        </header>
        <nav>
            <ul>
                <li><a href="selectBook.php">登録書籍一覧</a></li>
                <li><a href="bookregister.php">書籍登録</a></li>
                <li><a href="selectUser.php">登録ユーザー一覧</a></li>
                <li><a href="userregister.php">ユーザー登録</a></li>
            </ul>
        </nav>
        <section>
            <form method="post" action="insertUser.php">
                <fieldset>
                    <legend>ユーザーの情報</legend>
                    <label>氏名：</label><input type="text" name="userName"><br>
                    <label>ID：</label><input type="text" name="lid"><br>
                    <label>PW：</label><input type="text" name="lpw"><br>
                    <label>
                        権限：</label><input type="radio" name="kanri_flg" value="0" checked="checked">一般ユーザー
                        <input type="radio" name="kanri_flg" value="1">特権管理者
                    <br>
                    <input type="submit" value="送信" id="submit">
                </fieldset>
            </form>
        </section>
    </div>
</body>

</html>
