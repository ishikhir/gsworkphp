<?php

include("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ユーザー登録</title>
	<link rel="stylesheet" href="oneweek.css">
</head>
<body>
	<h1>ユーザー登録</h1>
	<form name="signIn" id="signIn" action="insert_user.php" method="post">
		<label for="userId">ユーザーID</label>
			<span id="caution"></span>
			<input class="mb20" type="text" name="userId" id="userId" maxlength="64" placeholder="半角英数字のみ" required>
		<div id="hide">
			<label for="userPass">パスワード</label>
				<input class="mb20" type="password" name="userPass" id="userPass" placeholder="半角英数字のみ" maxlength="64" required>
			<label for="name">お名前</label>
				<input class="mb20" type="text" name="name" id="name" maxlength="64" required>
			<label  for="email">メールアドレス</label>
				<input class="mb20" type="email" name="email" id="email" placeholder="ccc@gmail.co" required>
			<label for="zipCode">郵便番号</label>
				<input class="mb10" type="text" name="zipCode" id="zipCode" maxlength="7" placeholder="ハイフン「ー」なし" required>
				<button class="mb20" id="zip">住所検索</button>
			<label for="address1">住所</label>
				<input class="mb20" type="text" name="address1" id="address1" required>
			<label for="address2">地番・マンション名</label>
				<input class="mb20" type="text" name="address2" id="address2" required>
			<button type="submit">登録する</button>
		</div>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="signin.js"></script>
</body>
</html>
