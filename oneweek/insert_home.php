<?php

include("functions.php");

//1. POSTデータ取得
$homeName=$_POST["homeName"];
$homeAge=$_POST["homeAge"];
$homeSize=$_POST["homeSize"];
$roof=$_POST["roof"];
$wall=$_POST["wall"];
$toi=$_POST["toi"];
$roofDo=$_POST["roofDo"];
$wallDo=$_POST["wallDo"];
$toiDo=$_POST["toiDo"];
$roofPrice=$_POST["roofPrice"];
$wallPrice=$_POST["wallPrice"];
$toiPrice=$_POST["toiPrice"];
$totalPrice=$_POST["totalPrice"];

//2. DB接続します(エラー処理追加)
$pdo=pdolocalhost();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO home_table(id,userId,userPass,name,email,zipCode,address1,address2,indate,permFlg,lifeFlg)VALUES(NULL,:userId,:userPass,:name,:email,:zipCode,:address1,:address2,sysdate(),0,0)");
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
