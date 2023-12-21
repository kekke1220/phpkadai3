<?php

/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */

//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */

$id = $_GET["id"];

require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
// IDが＄idののデータを取得するSQLを作成
$stmt = $pdo->prepare('SELECT * FROM phpkadai3 WHERE id =:id;');
$stmt->bindValue(':id' , $id , PDO::PARAM_INT);

$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    // 成功した場合
    $result = $stmt->fetch();
}

?>

<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="detail.css">

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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
    <div class="jumbotron">
                <legend class="legend">お気に入り登録</legend>
                <input name="name" type="text" class="feedback-input" placeholder="建物名" value="<?= $result['name'] ?>" /><br>
                <input name="price" type="text" class="feedback-input" placeholder="価格" value="<?= $result['price'] ?>" /><br>
                <input name="yield" type="text" class="feedback-input" placeholder="利回り" value="<?= $result['yield'] ?>" /><br>
                <input name="pricechange" type="text" class="feedback-input" placeholder="価格変更" value="<?= $result['pricechange'] ?>" /><br>
                <input name="file" type="file" class="feedback-input" placeholder="掲載情報" value="<?= $result['file'] ?>" /><br>
                <input type="hidden" name="id" value="<?= $result['id']?>">
                <input type="submit" value="登録"/>
        </div>
    </form>
</body>

</html>

