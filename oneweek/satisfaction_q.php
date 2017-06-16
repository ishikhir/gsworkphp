<?php
include("functions.php");

$pdo=pdoLocalhost();


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　リフォームのアンケート

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/


//　年齢の処理

$yourAge = $pdo->prepare(
	"SELECT
		CASE
			WHEN yourAge BETWEEN 0 AND 29 THEN 'ya029'
			WHEN yourAge BETWEEN 30 AND 49 THEN 'ya3049'
			WHEN yourAge BETWEEN 50 and 69 THEN 'ya5069'
			WHEN yourAge >= 70 THEN 'ya70'
		END
	AS agegroup, count(yourAge) AS total
	FROM reform_q
	GROUP BY agegroup");
$ya = $yourAge->execute();
//３．データ表示
$viewya="";
if($ya==false){
	qerror($yourAge);
}else{
	while( $resya = $yourAge->fetch(PDO::FETCH_ASSOC)){
		$viewya .='<p class="yourAge" id="r'.$resya["agegroup"].'">'.$resya["total"].'</p>';
	}
}

//　築年数の処理

$homeAge = $pdo->prepare(
	"SELECT
		CASE
			WHEN homeAge BETWEEN 0 AND 9 THEN 'ha09'
			WHEN homeAge BETWEEN 10 AND 19 THEN 'ha1019'
			WHEN homeAge BETWEEN 20 and 29 THEN 'ha2029'
			WHEN homeAge BETWEEN 30 and 39 THEN 'ha3039'
			WHEN homeAge >= 40 THEN 'ha40'
		END
	AS agegroup, count(homeAge) AS total,count(homeAge)*100/(SELECT count(homeAge) FROM reform_q) AS percent
	FROM reform_q
	GROUP BY agegroup");
$ha = $homeAge->execute();
$viewha="";
if($ha==false){
	qerror($homeAge);
}else{
	while( $resha = $homeAge->fetch(PDO::FETCH_ASSOC)){
		$viewha .='<p class="homeAge" id="r'.$resha["agegroup"].'">'.$resha["percent"].'</p>';
	}
}


//　きっかけの処理

$why = $pdo->prepare("SELECT COUNT(*) AS record,why FROM reform_q GROUP BY why ORDER BY record DESC");
$whyex = $why->execute();
$viewwhy="";
if($whyex==false){
	qerror($why);
}else{
	while( $reswhy = $why->fetch(PDO::FETCH_ASSOC)){
		$viewwhy .='<p class="why" id="r'.$reswhy["why"].'">'.$reswhy["record"].'</p>';
	}
}


//　決め手の処理

$decide = $pdo->prepare("SELECT COUNT(*) AS record,decide FROM reform_q GROUP BY decide ORDER BY record DESC");
$decideex = $decide->execute();
$viewdec="";
if($decideex==false){
	qerror($decide);
}else{
	while( $resdec = $decide->fetch(PDO::FETCH_ASSOC)){
		$viewdec .='<p class="decide" id="r'.$resdec["decide"].'">'.$resdec["record"].'</p>';
	}
}


//　満足度の処理

$satisfaction = $pdo->prepare("SELECT COUNT(*) AS record,satisfaction FROM reform_q GROUP BY satisfaction ORDER BY record DESC");
$satisfactionex = $satisfaction->execute();
$viewsat="";
if($satisfactionex==false){
	qerror($satisfaction);
}else{
	while( $ressat = $satisfaction->fetch(PDO::FETCH_ASSOC)){
		$viewsat .='<p class="satisfaction" id="r'.$ressat["satisfaction"].'">'.$ressat["record"].'</p>';
	}
}


//　コメントの処理

$reason = $pdo->prepare("SELECT id,reason FROM reform_q");
$reasonex = $reason->execute();
$viewrea="";
if($reasonex==false){
	qerror($reason);
}else{
	while( $resrea = $reason->fetch(PDO::FETCH_ASSOC)){
		$viewrea .='<li class="reason" id="rreason'.$resrea["id"].'">'.$resrea["reason"].'</li>';
	}
}


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　新築のアンケート

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/


//　年齢の処理

$yourAge2 = $pdo->prepare(
	"SELECT
		CASE
			WHEN yourAge BETWEEN 0 AND 29 THEN 'ya029'
			WHEN yourAge BETWEEN 30 AND 49 THEN 'ya3049'
			WHEN yourAge BETWEEN 50 and 69 THEN 'ya5069'
			WHEN yourAge >= 70 THEN 'ya70'
		END
	AS agegroup, count(yourAge) AS total
	FROM constNew_q
	GROUP BY agegroup");
$ya2 = $yourAge2->execute();
//３．データ表示
$viewya2="";
if($ya2==false){
	qerror($yourAge2);
}else{
	while( $resya2 = $yourAge2->fetch(PDO::FETCH_ASSOC)){
		$viewya2 .='<p class="yourAge" id="c'.$resya2["agegroup"].'">'.$resya2["total"].'</p>';
	}
}


//　きっかけの処理

$why2 = $pdo->prepare("SELECT COUNT(*) AS record,why FROM constNew_q GROUP BY why ORDER BY record DESC");
$whyex2 = $why2->execute();
$viewwhy2="";
if($whyex2==false){
	qerror($why2);
}else{
	while( $reswhy2 = $why2->fetch(PDO::FETCH_ASSOC)){
		$viewwhy2 .='<p class="why" id="c'.$reswhy2["why"].'">'.$reswhy2["record"].'</p>';
	}
}


//　決め手の処理

$decide2 = $pdo->prepare("SELECT COUNT(*) AS record,decide FROM constNew_q GROUP BY decide ORDER BY record DESC");
$decideex2 = $decide2->execute();
$viewdec2="";
if($decideex2==false){
	qerror($decide2);
}else{
	while( $resdec2 = $decide2->fetch(PDO::FETCH_ASSOC)){
		$viewdec2 .='<p class="decide" id="c'.$resdec2["decide"].'">'.$resdec2["record"].'</p>';
	}
}


//　満足度の処理

$satisfaction2 = $pdo->prepare("SELECT COUNT(*) AS record,satisfaction FROM constNew_q GROUP BY satisfaction ORDER BY record DESC");
$satisfactionex2 = $satisfaction2->execute();
$viewsat2="";
if($satisfactionex2==false){
	qerror($satisfaction2);
}else{
	while( $ressat2 = $satisfaction2->fetch(PDO::FETCH_ASSOC)){
		$viewsat2 .='<p class="satisfaction" id="c'.$ressat2["satisfaction"].'">'.$ressat2["record"].'</p>';
	}
}


//　コメントの処理

$reason2 = $pdo->prepare("SELECT id,reason FROM constNew_q");
$reasonex2 = $reason2->execute();
$viewrea2="";
if($reasonex2==false){
	qerror($reason2);
}else{
	while( $resrea2 = $reason2->fetch(PDO::FETCH_ASSOC)){
		$viewrea2 .='<li class="reason" id="creason'.$resrea2["id"].'">'.$resrea2["reason"].'</li>';
	}
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
	<form id="reformForm" method="post" action="sql.php">
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
	<form id="constNewForm" method="post" action="sql.php">
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
	<div id="output2">
		<?=$viewya2 ?>
		<?=$viewwhy2 ?>
		<?=$viewdec2 ?>
		<?=$viewsat2 ?>
		<ul id="rReason">
			<?=$viewrea2 ?>
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
		<ul id="reasonList2"><?=$viewrea2 ?></ul>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script src="script.js"></script>
</body>

</html>
