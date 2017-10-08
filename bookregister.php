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
        <?php include('header_inner-user.html'); ?>
        <section>
            <h1>本を登録しましょう!</h1>
        </section>
        <section>
            <form method="post" action="insertBook.php">
                <fieldset>
                    <legend>本の情報</legend>
                    <label>書籍名：</label><input type="text" name="bookName"><br>
                    <label>URL：</label><input type="text" name="bookUrl"><br>
                    <label>コメント：</label>
                    <textArea name="bookComment" rows="4" cols="40"></textArea><br>
                    <!--                    本当はここでログイン機能があって、自動で入力されるといい-->
                    <label>社員番号：</label><input type="text" name="regUser"><br>
                    <input type="submit" value="送信" id="submit">
                </fieldset>
            </form>
        </section>
    </div>
</body>

</html>
