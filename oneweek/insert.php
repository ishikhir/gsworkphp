<?php

include("functions.php");

//1. POSTデータ取得
$userId=$_POST["userId"];
$userPass=$_POST["userPass"];
$name=$_POST["name"];
$email=$_POST["email"];
$zipCode=$_POST["zipCode"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];

//2. DB接続します(エラー処理追加)
$pdo=pdolocalhost();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO user_table(id,userId,userPass,name,email,zipCode,address1,address2,indate,permFlg,lifeFlg)VALUES(NULL,:userId,:userPass,:name,:email,:zipCode,:address1,:address2,sysdate(),0,0)");
$stmt->bindValue(':userId',$userId,PDO::PARAM_STR);
$stmt->bindValue(':userPass',$userPass,PDO::PARAM_STR);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':email',$email,PDO::PARAM_STR);
$stmt->bindValue(':zipCode',$zipCode,PDO::PARAM_INT);
$stmt->bindValue(':address1',$address1,PDO::PARAM_STR);
$stmt->bindValue(':address2',$address2,PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
	qerror($stmt);
}else{
	header("Location: index.php");
	exit;
}



?>
