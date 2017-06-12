<?php //　受け取り処理
include("functions.php");
$reformDataCsv = 'data/reform_data.csv';//　リフォームのデータベース
$constNewDataCsv = 'data/constNew_data.csv';//　新築のデータベース

if(isset($_GET["id"]) && $_GET["id"]=="reform"){

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








?>