<?php //　受け取り処理
include("functions.php");
$reformDataCsv = 'data/reform_data.csv';//　リフォームのデータベース
$constNewDataCsv = 'data/constNew_data.csv';//　新築のデータベース

if(isset($_GET["id"]) && $_GET["id"]=="reform"){
	if($_GET["name"]==="JSON"||$_GET["name"]==="Jason"||$_GET["name"]==="ジェイソン"||$_GET["name"]==="json"||$_GET["name"]==="jason"){
	$name3=$_GET['name'];
	$strJason="{$name3}";
	$json3 = json_encode($strJason);
	echo $json3;                 //jsonを表示
	exit;
	}

	$name=$_GET['name'];
	$yourAge=$_GET['yourAge'];
	$homeAge=$_GET['homeAge'];
	$why=$_GET['why'];
	$decide=$_GET['decide'];
	$satisfaction=$_GET['satisfaction'];
	$reason=$_GET['reason'];


	try {
		$pdo = new PDO('mysql:dbname=myHome;charset=utf8;host=localhost','root','');
	} catch (PDOException $e) {
		exit('DbConnectError:'.$e->getMessage());
	}

	$stmt = $pdo->prepare("INSERT INTO reform_q(id,name,yourAge,homeAge,why,decide,satisfaction,reason,indate)
		VALUES(NULL,:name,:yourAge,:homeAge,:why,:decide,:satisfaction,:reason,sysdate())");
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':yourAge', $yourAge, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':homeAge', $homeAge, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':why', $why, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':decide', $decide, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':satisfaction', $satisfaction, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':reason', $reason, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$status = $stmt->execute();

	//４．データ登録処理後
	if($status==false){
		$error = $stmt->errorInfo();
		exit("QueryError:".$error[2]);//　[2]で固定でいい
	}else{
		$str="{$name}";
		$json = json_encode($str);
		echo $json;                 //jsonを表示
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


	try {
		$pdo3 = new PDO('mysql:dbname=myHome;charset=utf8;host=localhost','root','');
	} catch (PDOException $e) {
		exit('DbConnectError:'.$e->getMessage());
	}

	$stmt3 = $pdo3->prepare("INSERT INTO constNew_q(id,name,yourAge,why,decide,satisfaction,reason,indate)
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
		$error3 = $stmt3->errorInfo();
		exit("QueryError:".$error3[2]);//　[2]で固定でいい
	}else{
		$str3="{$name2}";
		$json3 = json_encode($str3);
		echo $json3;                 //jsonを表示
		exit;
	}
}






?>
