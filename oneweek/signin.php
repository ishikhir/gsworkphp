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
			<span id="cautionId"></span>
			<input class="mb20" type="text" name="userId" id="userId" maxlength="64" placeholder="半角英数字のみ" required>
		<label class="hide" for="userPass">パスワード</label>
		<span class="hide" id="cautionPass"></span>
			<input class="hide mb20" type="password" name="userPass" id="userPass" placeholder="半角英数字のみ" maxlength="64" required>
		<label class="hide2" for="name">お名前</label>
			<input class="hide2 mb20" type="text" name="name" id="name" maxlength="64" required>
		<label class="hide3" for="email">メールアドレス</label>
		<span class="hide3" id="cautionEmail"></span>
			<input class="hide3 mb20" type="email" name="email" id="email" placeholder="ccc@gmail.co" required>
		<label class="hide4" for="zipCode">郵便番号</label>
		<span class="hide4" id="cautionZipCode"></span>
			<input class="hide4 mb10" type="text" name="zipCode" id="zipCode" maxlength="7" placeholder="半角ハイフン「ー」なし" required>
			<button class="hide5 mb20" id="zip">住所検索</button>
		<label class="hide6" for="address1">住所</label>
			<input class="hide6" class="mb20" type="text" name="address1" id="address1" required>
		<label class="hide6" for="address2">地番・マンション名</label>
		<span class="hide6" id="cautionAddress2"></span>
			<input class="hide6 mb20" type="text" name="address2" id="address2" required>
		<button class="hide7" type="submit">登録する</button>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="signin.js"></script>
</body>
</html>
