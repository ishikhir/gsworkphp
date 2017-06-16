<?php

include("functions.php");

$id=$_GET["id"];

$pdo=pdolocalhost();

$stmt = $pdo->prepare("UPDATE user_table SET lifeFlg=1 WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
	qerror($stmt);
}else{
	header("Location: index.php");
	exit;
}

?>