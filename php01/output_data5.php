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

	//$str=$name.",".$mail.",".$age."\n";
	$str1="{$name},{$yourAge},{$homeAge},{$why},{$decide},{$satisfaction},{$reason}\n";

	$createCsv1 = fopen($reformDataCsv,"a");// ファイル読み込み　,"a"で、なければ新規作成という命令;
	flock($createCsv1, LOCK_EX);// ファイルロック
	fwrite($createCsv1, $str1);
	flock($createCsv1, LOCK_UN);// ファイルロック解除
	fclose($createCsv1);

	$strExp1=explode(",",$str1);
	$json1 = json_encode($strExp1);
	echo $json1;                 //jsonを表示
	exit;
}

if(isset($_GET["id"]) && $_GET["id"]=="reformGet"){
	$rData = array();
	$openReformData = fopen($reformDataCsv,"r");
	while (!feof($openReformData)) {
		$rDataRecord = fgets($openReformData);
		$rDataRecord2=str_replace( "\r\n", "", $rDataRecord);
		$rDataRecord3=str_replace( "\n", "", $rDataRecord2);
		$rDataRecord4=str_replace( "\r", "", $rDataRecord3);
		$rDR=explode(",",$rDataRecord4);
		for($i=0;$i<count($rDR);$i++){
			$rDR[$i] = xss($rDR[$i]);
		}
		array_push($rData, $rDR);
	}
	fclose($openReformData);
	$json2 = json_encode($rData);
	echo $json2;
	exit;
}



if(isset($_GET["id"]) && $_GET["id"]=="constNew"){

	$name2=$_GET['name2'];
	$yourAge2=$_GET['yourAge2'];
	$why2=$_GET['why2'];
	$decide2=$_GET['decide2'];
	$satisfaction2=$_GET['satisfaction2'];
	$reason2=$_GET['reason2'];

	//$str=$name.",".$mail.",".$age."\n";
	$str2="{$name2},{$yourAge2},{$why2},{$decide2},{$satisfaction2},{$reason2}\n";

	$createCsv2 = fopen($constNewDataCsv,"a");// ファイル読み込み　,"a"で、なければ新規作成という命令;
	flock($createCsv2, LOCK_EX);// ファイルロック
	fwrite($createCsv2, $str2);
	flock($createCsv2, LOCK_UN);// ファイルロック解除
	fclose($createCsv2);

	$strExp2=explode(",",$str2);
	$json2 = json_encode($strExp2);
	echo $json2;                 //jsonを表示
	exit;
}

if(isset($_GET["id"]) && $_GET["id"]=="constNewGet"){
	$cNData = array();
	$openConstNewData = fopen($constNewDataCsv,"r");
	while (!feof($openConstNewData)) {
		$cNDataRecord = fgets($openConstNewData);
		$cNDataRecord2=str_replace( "\r\n", "", $cNDataRecord);
		$cNDataRecord3=str_replace( "\n", "", $cNDataRecord2);
		$cNDataRecord4=str_replace( "\r", "", $cNDataRecord3);
		$cNDR=explode(",",$cNDataRecord4);
		for($i=0;$i<count($cNDR);$i++){
			$cNDR[$i] = xss($cNDR[$i]);
		}
		array_push($cNData, $cNDR);
	}
	fclose($openConstNewData);
	$json2 = json_encode($cNData);
	echo $json2;
	exit;
}






?>