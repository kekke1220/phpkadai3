<?php

//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$name   = $_POST['name'];
$price  = $_POST['price'];
$yield  = $_POST['yield'];
$pricechange = $_POST['pricechange'];
$file = $_POST['file'];
$id = $_POST['id'];

//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
// UPDATE テーブル名　SET 更新対象,更新対象2=:更新データ2,....WHERE id = 対象ID；
$stmt = $pdo->prepare('UPDATE 
      phpkadai3 
      SET
      name = :name , price = :price , yield = :yield, pricechange = :pricechange , file = :file , indate = sysdate()
      where id = :id; ');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':yield', $yield, PDO::PARAM_INT); //PARAM_INTなので注意
$stmt->bindValue(':pricechange', $pricechange, PDO::PARAM_STR);
$stmt->bindValue(':file', $file, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

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
