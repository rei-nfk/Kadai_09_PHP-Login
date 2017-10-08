<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>本の登録ページ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bookmgt.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <p><a href="login.php">ログアウト</a></p>
            <h1>本を登録しましょう!</h1>
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
            <form method="post" action="insertBook.php">
                <fieldset>
                    <legend>本の情報</legend>
                    <label>書籍名：</label><input type="text" name="bookName"><br>
                    <label>URL：</label><input type="text" name="bookUrl"><br>
                    <label>コメント：</label><textArea name="bookComment" rows="4" cols="40"></textArea><br>
<!--                    本当はここでログイン機能があって、自動で入力されるといい-->
                    <label>社員番号：</label><input type="text" name="regUser"><br>
                    <input type="submit" value="送信" id="submit">
                </fieldset>
            </form>
        </section>
    </div>
</body>

</html>
