<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録ページ</title>
    <?php include('header-settings.html'); ?>
</head>

<body>
    <div id="wrapper">
        <?php include('header_inner-user.html'); ?>
        <section>
            <h1>ユーザーを登録しましょう!</h1>
        </section>
        <section>
            <form method="post" action="insertUser.php">
                <fieldset>
                    <legend>ユーザーの情報</legend>
                    <label>氏名：</label><input type="text" name="userName"><br>
                    <label>ID：</label><input type="text" name="lid"><br>
                    <label>PW：</label><input type="text" name="lpw"><br>
                    <label>
                        権限：</label><input type="radio" name="kanri_flg" value="0" checked="checked" class="radio">一般ユーザー
                    <input type="radio" name="kanri_flg" value="1" class="radio">特権管理者
                    <br>
                    <input type="submit" value="送信" id="submit">
                </fieldset>
            </form>
        </section>
    </div>
</body>

</html>
