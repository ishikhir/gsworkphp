<?php

/** 共通で使うものを別ファイルにしておきましょう。*/

//DB接続関数（PDO）
function pdoLocalhost(){
	try {
	return $pdo = new PDO('mysql:dbname=myHome;charset=utf8;host=localhost','root','');
	}catch (PDOException $e) {
		exit('DbConnectError:'.$e->getMessage());
	}
}


//SQL処理エラー
function qerror($stmt){
	$error = $stmt->errorInfo();
	exit("ErrorQuery:".$error[2]);
}


/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function xss($val){
	return htmlspecialchars($val,ENT_QUOTES,"UTF-8");
}

//　セッションIDを発行してログインチェック　チェックOKならさらにIDを更新（else以下）

function loginCheck(){
	if(!isset($_SESSION["ssidCheck"])||$_SESSION["ssidCheck"]!=session_id()){
		echo "logIn Error!";
		exit();
	}else{
		session_regenerate_id(true);
		$_SESSION["ssidCheck"]=session_id();
	}
}


?>
