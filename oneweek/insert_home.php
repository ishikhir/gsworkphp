<?php
include("functions.php");


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　ajaxでフォーム生成

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/


if(isset($_GET["id"]) && $_GET["id"]=="roof"){
	$roof=$_GET["roof"];
	$homeAge=$_GET["homeAge"];
	$pdo = pdolocalhost();
	$stmt = $pdo->prepare("SELECT * FROM roof_spec WHERE type=:roof AND homeAge > :homeAge");
	$stmt->bindValue(':roof', $roof, PDO::PARAM_STR);
	$stmt->bindValue(':homeAge', $homeAge, PDO::PARAM_INT);
	$status = $stmt->execute();
	if($status==false){
		qerror($stmt);
	}else{
		$view="";
		while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
			$view .= '<option value="'.$result["work"].'">';
			$view .= $result["name"];
			$view .= '</option>';
		}
		echo $view;
		exit;
	}
}

if(isset($_GET["id"]) && $_GET["id"]=="roofDo"){
	$roof=$_GET["roof"];
	$roofDo=$_GET["roofDo"];
	$pdo = pdolocalhost();
	$stmt = $pdo->prepare("SELECT * FROM roof_spec WHERE type=:roof AND work=:roofDo");
	$stmt->bindValue(':roof', $roof, PDO::PARAM_STR);
	$stmt->bindValue(':roofDo', $roofDo, PDO::PARAM_STR);
	$status = $stmt->execute();
	if($status==false){
		qerror($stmt);
	}else{
		$result = $stmt->fetch();
		$view=$result["price"];
		}
	echo $view;
	exit;
}

if(isset($_GET["id"]) && $_GET["id"]=="wall"){
	$wall=$_GET["wall"];
	$pdo = pdolocalhost();
	$stmt = $pdo->prepare("SELECT * FROM wall_spec WHERE type=:wall");
	$stmt->bindValue(':wall', $wall, PDO::PARAM_STR);
	$status = $stmt->execute();
	if($status==false){
		qerror($stmt);
	}else{
		$view="";
		while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
			$view .= '<option value="'.$result["work"].'">';
			$view .= $result["name"];
			$view .= '</option>';
		}
		echo $view;
		exit;
	}
}

if(isset($_GET["id"]) && $_GET["id"]=="wallDo"){
	$wall=$_GET["wall"];
	$wallDo=$_GET["wallDo"];
	$pdo = pdolocalhost();
	$stmt = $pdo->prepare("SELECT * FROM wall_spec WHERE type=:wall AND work=:wallDo");
	$stmt->bindValue(':wall', $wall, PDO::PARAM_STR);
	$stmt->bindValue(':wallDo', $wallDo, PDO::PARAM_STR);
	$status = $stmt->execute();
	if($status==false){
		qerror($stmt);
	}else{
		$result = $stmt->fetch();
		$view=$result["price"];
		}
	echo $view;
	exit;
}

if(isset($_GET["id"]) && $_GET["id"]=="toi"){
	$toi=$_GET["toi"];
	$pdo = pdolocalhost();
	$stmt = $pdo->prepare("SELECT * FROM toi_spec WHERE type=:toi");
	$stmt->bindValue(':toi', $toi, PDO::PARAM_STR);
	$status = $stmt->execute();
	if($status==false){
		qerror($stmt);
	}else{
		$view="";
		while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
			$view .= '<option value="'.$result["work"].'">';
			$view .= $result["name"];
			$view .= '</option>';
		}
		echo $view;
		exit;
	}
}

if(isset($_GET["id"]) && $_GET["id"]=="toiDo"){
	$toi=$_GET["toi"];
	$toiDo=$_GET["toiDo"];
	$pdo = pdolocalhost();
	$stmt = $pdo->prepare("SELECT * FROM toi_spec WHERE type=:toi AND work=:toiDo");
	$stmt->bindValue(':toi', $toi, PDO::PARAM_STR);
	$stmt->bindValue(':toiDo', $toiDo, PDO::PARAM_STR);
	$status = $stmt->execute();
	if($status==false){
		qerror($stmt);
	}else{
		$result = $stmt->fetch();
		$view=$result["price"];
		}
	echo $view;
	exit;
}


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　家データ登録処理

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/


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
