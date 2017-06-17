<?php

session_start();

include("functions.php");

$userId=$_POST["userId"];
$userPass=$_POST["userPass"];

$pdo=pdolocalhost();

$stmt = $pdo->prepare("SELECT * FROM user_table WHERE userId=:userId AND userPass=:userPass");
$stmt->bindValue(':userId',$userId,PDO::PARAM_STR);
$stmt->bindValue(':userPass',$userPass,PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
	qerror($stmt);
}else{
	$result = $stmt->fetch();
}

if($result["id"]!=""){
	$_SESSION["ssidCheck"]=session_id();
	$_SESSION["userId"]=$result["userId"];
	$_SESSION["name"]=$result["name"];
	header("Location: user_tool.php");
}else{
	header("Location: index.php");
}


?>