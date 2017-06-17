<?php

//session_start();
//
//include("functions.php");
//
//loginCheck();
//

//削除ボタンとグラフへのリンクボタンを追加
//それぞれにログイン認証つける


?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ユーザーツール画面</title>
</head>
<body>
	<button id="updateBtn">登録情報変更</button>
	<form id="userUpdate" action="update.php" method="post">
		<label for="homeName">ID</label>
			<input type="text" name="userId" id="userId2" required>
		<label for="homeName">PASS</label>
			<input type="password" name="userPass" id="userPass2" required>
		<button id="update">upDate</button>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="user_tool.js"></script>
	
</body>
</html>