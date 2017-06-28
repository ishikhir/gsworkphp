<?php

session_start();

include("functions.php");

$userId=$_POST["userId"];
$userPass=$_POST["userPass"];

$pdo=pdolocalhost();

$stmt = $pdo->prepare("SELECT * FROM user_table WHERE userId=:userId");
$stmt->bindValue(':userId',$userId,PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
	qerror($stmt);
}else{
	$result = $stmt->fetch();
}

if($result["id"]!=""&&$result["lifeFlg"]==0&&password_verify($userPass,$result["userPass"])){
	$_SESSION["ssidCheck"]=session_id();
	$_SESSION["id"]=$result["id"];
	$_SESSION["userId"]=$result["userId"];
	$_SESSION["userPass"]=$result["userPass"];
	$_SESSION["name"]=$result["name"];
	$_SESSION["permFlg"]=$result["permFlg"];
	$_SESSION["address1"]=$result["address1"];
	$_SESSION["address2"]=$result["address2"];
	header("Location: user_tool.php");
}else{
	header("Location: index.php");
}

?>