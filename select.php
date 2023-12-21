<?php

require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM phpkadai3;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';

        $view .= '<a href="detail.php?id='  . $result['id'] . '">';
        $view .= $result['indate'] 
                 .'<br>'
                 .'建物名：'.$result['name'] 
                 .'<br>'
                 .'価格：'.$result['price'] 
                 .'➡︎'. 
                 $result['pricechange']
                 .'<br>'
                 .'利回り：'.$result['yield'];
        $view .= '</a><br>';

        $view .= '<a href="delete.php?id='  . $result['id'] . '">';
        $view .= '[削除]';
        $view .= '</a>';

        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="select.css">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<div class="all">

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron ">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</div>

</body>

</html>
