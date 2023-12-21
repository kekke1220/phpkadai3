<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="index.css">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">収益物件お気に入り一覧</a></div>
            </div>
        </nav>
    </header>

    <img src="https://pictarts.com/14/material/thumbnail/t-01.png" alt="不動産" width="100%" height="200px">

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
                <legend class="legend">お気に入り登録</legend>
                <input name="name" type="text" class="feedback-input" placeholder="建物名" /><br>
                <input name="price" type="text" class="feedback-input" placeholder="価格" /><br>
                <input name="yield" type="text" class="feedback-input" placeholder="利回り" /><br>
                <input name="pricechange" type="text" class="feedback-input" placeholder="価格変更" /><br>
                <input name="file" type="file" class="feedback-input" placeholder="掲載情報" /><br>
                <input type="submit" value="登録"/>
        </div>
    </form>
</body>

</html>