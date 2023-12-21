<?php

//1. POSTデータ取得
$name   = $_POST['name'];
$price  = $_POST['price'];
$yield  = $_POST['yield'];
$pricechange  = $_POST['pricechange'];
$file = $_POST['file'];


//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO
                        phpkadai3(
                            name, price, yield, pricechange, file, indate
                            )
                        VALUES (
                            :name , :price, :yield , :pricechange , :file , sysdate()
                            );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':yield', $yield, PDO::PARAM_INT); //PARAM_INTなので注意
$stmt->bindValue(':pricechange', $pricechange, PDO::PARAM_STR);
$stmt->bindValue(':file', $file, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
