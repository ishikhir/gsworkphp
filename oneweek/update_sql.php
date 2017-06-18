<?php
session_start();

include("functions.php");

loginCheck();

$id=$_POST["id"];
$userId=$_POST["userId"];
$userPass=$_POST["userPass"];
$name=$_POST["name"];
$email=$_POST["email"];
$zipCode=$_POST["zipCode"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];

$pdo=pdolocalhost();

$stmt = $pdo->prepare("UPDATE user_table SET userId=:userId,userPass=:userPass,name=:name,email=:email,zipCode=:zipCode,address1=:address1,address2=:address2 WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->bindValue(':userId',$userId,PDO::PARAM_STR);
$stmt->bindValue(':userPass',$userPass,PDO::PARAM_STR);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':email',$email,PDO::PARAM_STR);
$stmt->bindValue(':zipCode',$zipCode,PDO::PARAM_INT);
$stmt->bindValue(':address1',$address1,PDO::PARAM_STR);
$stmt->bindValue(':address2',$address2,PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
	qerror($stmt);
}else{
	header("Location: user_tool.php");
	exit;
}




?>
