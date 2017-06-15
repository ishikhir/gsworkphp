<?php //　受け取り処理
include("functions.php");

if(isset($_GET["id"]) && $_GET["id"]=="reform"){
	if($_GET["name"]==="JSON"||$_GET["name"]==="Jason"||$_GET["name"]==="ジェイソン"||$_GET["name"]==="json"||$_GET["name"]==="jason"){
	$name3=$_GET['name'];
	$strJason="{$name3}";
	$json3 = json_encode($strJason);
	echo $json3;
	exit;
	}

	$name=$_GET['name'];
	$yourAge=$_GET['yourAge'];
	$homeAge=$_GET['homeAge'];
	$why=$_GET['why'];
	$decide=$_GET['decide'];
	$satisfaction=$_GET['satisfaction'];
	$reason=$_GET['reason'];

	$pdo=pdoLocalhost();

	$stmt = $pdo->prepare("INSERT INTO reform_q(id,name,yourAge,homeAge,why,decide,satisfaction,reason,indate)
	VALUES(NULL,:name,:yourAge,:homeAge,:why,:decide,:satisfaction,:reason,sysdate())");
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':yourAge', $yourAge, PDO::PARAM_INT);
	$stmt->bindValue(':homeAge', $homeAge, PDO::PARAM_INT);
	$stmt->bindValue(':why', $why, PDO::PARAM_STR);
	$stmt->bindValue(':decide', $decide, PDO::PARAM_STR);
	$stmt->bindValue(':satisfaction', $satisfaction, PDO::PARAM_STR);
	$stmt->bindValue(':reason', $reason, PDO::PARAM_STR);
	$status = $stmt->execute();

//４．データ登録処理後
	if($status==false){
		qerror($stmt);
	}else{
		$str="{$name}";
		$json = json_encode($str);
		echo $json;
		exit;
	}
}


if(isset($_GET["id"]) && $_GET["id"]=="constNew"){

	$name2=$_GET['name2'];
	$yourAge2=$_GET['yourAge2'];
	$why2=$_GET['why2'];
	$decide2=$_GET['decide2'];
	$satisfaction2=$_GET['satisfaction2'];
	$reason2=$_GET['reason2'];

	$pdo=pdoLocalhost();

	$stmt3 = $pdo->prepare("INSERT INTO constNew_q(id,name,yourAge,why,decide,satisfaction,reason,indate)
		VALUES(NULL,:name,:yourAge,:why,:decide,:satisfaction,:reason,sysdate())");
	$stmt3->bindValue(':name', $name2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt3->bindValue(':yourAge', $yourAge2, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt3->bindValue(':why', $why2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt3->bindValue(':decide', $decide2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt3->bindValue(':satisfaction', $satisfaction2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt3->bindValue(':reason', $reason2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$status3 = $stmt3->execute();

	//４．データ登録処理後
	if($status3==false){
		qerror($stmt3);
	}else{
		$str3="{$name2}";
		$json3 = json_encode($str3);
		echo $json3;                 //jsonを表示
		exit;
	}
}






?>
