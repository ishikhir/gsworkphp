<?php
include("functions.php");
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
		<div>年齢<select name="yourAge">
				<option value="0">〜３０歳</option>
				<option value="1">３１〜５０歳</option>
				<option value="2">５１〜７０歳</option>
				<option value="3">７１歳〜</option>
			</select></div>
		<div>新築してから何年でリフォームしましたか？<select name="homeAge">
				<option value="0">〜１０年未満</option>
				<option value="1">１０〜１９年</option>
				<option value="2">２０〜２９年</option>
				<option value="3">３０〜３９年</option>
				<option value="4">４０年以上</option>
			</select></div>
		<div>リフォームのきっかけは？<select name="why">
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
				<option value="price">値段</option>
				<option value="function">機能性</option>
				<option value="durable">耐久性</option>
				<option value="proposal">提案力</option>
			</select></div>
		<div>リフォームの満足度は？<select name="satisfaction">
				<option value="0">満足</option>
				<option value="1">普通</option>
				<option value="2">不満</option>
			</select></div>
		<div>その満足度の理由は？<textarea name="reason" cols="30" rows="3"></textarea></div>
		<button id="reformSend">送信</button>
	</form>
	<form id="constNewForm" method="post" action="output_data5.php">
		<div>お名前<input type="text" name="name2" placeholder="ニックネーム可"></div>
		<div>年齢<select name="yourAge2">
				<option value="0">〜３０歳</option>
				<option value="1">３１〜５０歳</option>
				<option value="2">５１〜７０歳</option>
				<option value="3">７１歳〜</option>
			</select></div>
		<div>一軒家購入（検討）のきっかけは？<select name="why2">
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
				<option value="price">値段</option>
				<option value="function">機能性</option>
				<option value="durable">耐久性</option>
				<option value="proposal">提案力</option>
				<option value="design">デザイン・見た目</option>
				<option value="location">立地</option>
			</select></div>
		<div>一軒家購入（検討）の満足度は？<select name="satisfaction2">
				<option value="0">満足</option>
				<option value="1">普通</option>
				<option value="2">不満</option>
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
	<div id="reformArea">
		<div class="graph"><canvas id="yourAgeDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="homeAgeDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="whyDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="decideDataGraph" width="300" height="200"></canvas></div>
		<div class="graph"><canvas id="satisfactionDataGraph" width="300" height="200"></canvas></div>
		<div><strong>その満足度の理由は？</strong></div>
		<ul id="reasonList"></ul>
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
