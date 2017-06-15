<?php
include("functions.php");


//if(isset($_GET["id"]) && $_GET["id"]=="reformGet"){
	try {
		$pdo = new PDO('mysql:dbname=myHome;charset=utf8;host=localhost','root','');
	}catch (PDOException $e) {
		exit('DbConnectError:'.$e->getMessage());
	}

	//　年齢の処理

	$yourAge = $pdo->prepare(
		"SELECT
			CASE
				WHEN yourAge BETWEEN 0 AND 29 THEN 'rya029'
				WHEN yourAge BETWEEN 30 AND 49 THEN 'rya3049'
				WHEN yourAge BETWEEN 50 and 69 THEN 'rya5069'
				WHEN yourAge >= 70 THEN 'rya70'
			END
		AS agegroup, count(yourAge) AS total
		FROM reform_q
		GROUP BY agegroup");
	$ya = $yourAge->execute();
	//３．データ表示
	$viewya="";
	if($ya==false){
		$errya = $yourAge->errorInfo();
		exit("ErrorQuery:".$errya[2]);
	}else{
		while( $resya = $yourAge->fetch(PDO::FETCH_ASSOC)){
			$viewya .='<p class="yourAge" id="'.$resya["agegroup"].'">'.$resya["total"].'</p>';
		}
	}

	//　築年数の処理

	$homeAge = $pdo->prepare(
		"SELECT
			CASE
				WHEN homeAge BETWEEN 0 AND 9 THEN 'rha09'
				WHEN homeAge BETWEEN 10 AND 19 THEN 'rha1019'
				WHEN homeAge BETWEEN 20 and 29 THEN 'rha2029'
				WHEN homeAge BETWEEN 30 and 39 THEN 'rha3039'
				WHEN homeAge >= 40 THEN 'rha40'
			END
		AS agegroup, count(homeAge) AS total,count(homeAge)*100/(SELECT count(homeAge) FROM reform_q) AS percent
		FROM reform_q
		GROUP BY agegroup");
	$ha = $homeAge->execute();
	$viewha="";
	if($ha==false){
		$errha = $homeAge->errorInfo();
		exit("ErrorQuery:".$errha[2]);
	}else{
		while( $resha = $homeAge->fetch(PDO::FETCH_ASSOC)){
			$viewha .='<p class="homeAge" id="'.$resha["agegroup"].'">'.$resha["percent"].'</p>';
		}
	}


//　きっかけの処理

	$why = $pdo->prepare("SELECT COUNT(*) AS record,why FROM reform_q GROUP BY why ORDER BY record DESC");
	$whyex = $why->execute();
	$viewwhy="";
	if($whyex==false){
		$errwhy = $why->errorInfo();
		exit("ErrorQuery:".$errwhy[2]);
	}else{
		while( $reswhy = $why->fetch(PDO::FETCH_ASSOC)){
			$viewwhy .='<p class="why" id="'.$reswhy["why"].'">'.$reswhy["record"].'</p>';
		}
	}


//　決め手の処理

	$decide = $pdo->prepare("SELECT COUNT(*) AS record,decide FROM reform_q GROUP BY decide ORDER BY record DESC");
	$decideex = $decide->execute();
	$viewdec="";
	if($decideex==false){
		$errdec = $decide->errorInfo();
		exit("ErrorQuery:".$errdec[2]);
	}else{
		while( $resdec = $decide->fetch(PDO::FETCH_ASSOC)){
			$viewdec .='<p class="decide" id="'.$resdec["decide"].'">'.$resdec["record"].'</p>';
		}
	}


//　満足度の処理

	$satisfaction = $pdo->prepare("SELECT COUNT(*) AS record,satisfaction FROM reform_q GROUP BY satisfaction ORDER BY record DESC");
	$satisfactionex = $satisfaction->execute();
	$viewsat="";
	if($satisfactionex==false){
		$errsat = $satisfaction->errorInfo();
		exit("ErrorQuery:".$errsat[2]);
	}else{
		while( $ressat = $satisfaction->fetch(PDO::FETCH_ASSOC)){
			$viewsat .='<p class="satisfaction" id="'.$ressat["satisfaction"].'">'.$ressat["record"].'</p>';
		}
	}


//　コメントの処理

	$reason = $pdo->prepare("SELECT id,reason FROM reform_q");
	$reasonex = $reason->execute();
	$viewrea="";
	if($reasonex==false){
		$errrea = $reason->errorInfo();
		exit("ErrorQuery:".$errrea[2]);
	}else{
		while( $resrea = $reason->fetch(PDO::FETCH_ASSOC)){
			$viewrea .='<li class="reason" id="reason'.$resrea["id"].'">'.$resrea["reason"].'</li>';
		}
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

<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>一戸建ての新築・リフォームの意識調査</title>
</head>

<body>
	<h1>一戸建ての新築・リフォームの意識調査</h1>
	<p>アンケートにご協力くださいませ（※個人情報は取得していません）</p>
	<div id="choose">
		<button id="constNewBtn">一軒家を新築した！</button>
		<button id="reformBtn">一軒家をリフォームした！</button>
	</div>
	<form id="reformForm" method="post" action="output_data5.php">
		<div>お名前<input type="text" name="name" placeholder="ニックネーム可"></div>
		<div>年齢<select name="yourAge" id="yourAge">
				<option value="" selected>-- 選択してください --</option>
			</select></div>
		<div>新築してから何年でリフォームしましたか？<select name="homeAge" id="homeAge">
				<option value="" selected>-- 選択してください --</option>
			</select></div>
		<div>リフォームのきっかけは？<select name="why">
				<option value="" selected>-- 選択してください --</option>
				<option value="trouble">雨漏りや故障</option>
				<option value="renovation">老朽化の改善</option>
				<option value="sales">業者に指摘された</option>
				<option value="child">子どもが生まれた</option>
				<option value="grandChild">孫が生まれた</option>
				<option value="residentsDecreased">住人が減った</option>
				<option value="pet">ペットのため</option>
				<option value="mySpace">自分の居場所が欲しい</option>
				<option value="cleanUp">片付いた家にしたい</option>
				<option value="oldAge">老後のため</option>
				<option value="care">介護のため</option>
				<option value="earthquake">地震のため</option>
				<option value="environment">環境のため</option>
			</select></div>
		<div>業者を選んだ決め手は？<select name="decide">
				<option value="" selected>-- 選択してください --</option>
				<option value="price">値段</option>
				<option value="function">機能性</option>
				<option value="durable">耐久性</option>
				<option value="proposal">提案力</option>
			</select></div>
		<div>リフォームの満足度は？<select name="satisfaction">
				<option value="" selected>-- 選択してください --</option>
				<option value="good">満足</option>
				<option value="soso">普通</option>
				<option value="bad">不満</option>
			</select></div>
		<div>その満足度の理由は？<textarea name="reason" cols="30" rows="3"></textarea></div>
		<button id="reformSend">送信</button>
	</form>
	<form id="constNewForm" method="post" action="output_data5.php">
		<div>お名前<input type="text" name="name2" placeholder="ニックネーム可"></div>
		<div>年齢<select name="yourAge2" id="yourAge2">
				<option value="" selected>-- 選択してください --</option>
			</select></div>
		<div>一軒家購入（検討）のきっかけは？<select name="why2">
				<option value="" selected>-- 選択してください --</option>
				<option value="trouble">旧宅の雨漏りや故障による建て替え</option>
				<option value="renewal">旧宅の老朽化による建て替え</option>
				<option value="child">子どもが生まれた</option>
				<option value="grandChild">孫が生まれた</option>
				<option value="residentsDecreased">住人が減った</option>
				<option value="pet">ペットのため</option>
				<option value="dream">一軒家に住みたかった</option>
				<option value="mySpace">自分の居場所が欲しい</option>
				<option value="cleanUp">片付いた家にしたい</option>
				<option value="oldAge">老後のため</option>
				<option value="care">介護のため</option>
				<option value="earthquake">地震のため</option>
				<option value="environment">環境のため</option>
			</select></div>
		<div>一軒家購入（検討）の決め手は？<select name="decide2">
				<option value="" selected>-- 選択してください --</option>
				<option value="price">値段</option>
				<option value="function">機能性</option>
				<option value="durable">耐久性</option>
				<option value="proposal">提案力</option>
				<option value="design">デザイン・見た目</option>
				<option value="location">立地</option>
			</select></div>
		<div>一軒家購入（検討）の満足度は？<select name="satisfaction2">
				<option value="" selected>-- 選択してください --</option>
				<option value="good">満足</option>
				<option value="soso">普通</option>
				<option value="bad">不満</option>
			</select></div>
		<div>その満足度の理由は？<textarea name="reason2" cols="30" rows="3"></textarea></div>
		<button id="constNewSend">送信</button>
	</form>
	<p id="thanks"></p>

	<h2>アンケートの集計結果を確認できます！</h2>
	<div id="result">
		<button id="reformGet">リフォームアンケートの結果確認</button>
		<button id="constNewGet">新築アンケートの結果確認</button>
	</div>
	<div id="output1">
		<?=$viewya ?>
		<?=$viewha ?>
		<?=$viewwhy ?>
		<?=$viewdec ?>
		<?=$viewsat ?>
		<ul id="rReason">
			<?=$viewrea ?>
		</ul>
	</div>
	<div id="reformArea">
		<div class="graph"><canvas id="yourAgeDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="homeAgeDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="whyDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="decideDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="satisfactionDataGraph" width="300" height="200"></canvas></div>
		<div><strong>その満足度の理由は？</strong></div>
		<ul id="reasonList"><?=$viewrea ?></ul>
	</div>
	<div id="constNewArea">
		<div class="graph"><canvas id="yourAgeDataGraph2" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="whyDataGraph2" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="decideDataGraph2" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="satisfactionDataGraph2" width="300" height="200"></canvas></div>
		<div><strong>その満足度の理由は？</strong></div>
		<ul id="reasonList2"></ul>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script src="script.js"></script>
</body>

</html>
