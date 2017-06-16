<?php

include("functions.php");

//1.GETでidを取得
$userId = $_POST["userId"];
$userPass = $_POST["userPass"];

$pdo = pdolocalhost();

$stmt = $pdo->prepare("SELECT * FROM user_table WHERE userId=:userId AND userPass=:userPass");
$stmt->bindValue(":userId",$userId,PDO::PARAM_INT);
$stmt->bindValue(":userPass",$userPass,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
	qerror($stmt);
}else{
	$result = $stmt->fetch(); //　id＝１なら１のレコードだけ取得
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ユーザ登録情報更新画面</title>
	<link rel="stylesheet" href="oneweek.css">
</head>
<body>

<h1>登録情報変更</h1>
<form name="upDate" id="upDate" action="update_sql.php" method="post">
	<input type="hidden" name="id" value="<?=xss($result["id"])?>">
	<label for="userId">ユーザーID</label>
		<input class="mb20" type="text" name="userId" id="userId" maxlength="64" value="<?=xss($result["userId"])?>" required>
	<label for="userPass">パスワード</label>
		<input class="mb20" type="password" name="userPass" id="userPass" value="<?=xss($result["userPass"])?>" maxlength="64" required>
	<label for="name">お名前</label>
		<input class="mb20" type="text" name="name" id="name" maxlength="64" value="<?=xss($result["name"])?>" required>
	<label  for="email">メールアドレス</label>
		<input class="mb20" type="email" name="email" id="email" value="<?=xss($result["email"])?>" required>
	<label for="zipCode">郵便番号</label>
		<input class="mb20" type="text" name="zipCode" id="zipCode" maxlength="7" value="<?=xss($result["zipCode"])?>" required>
	<label for="address1">住所</label>
		<input class="mb20" type="text" name="address1" id="address1" value="<?=xss($result["address1"])?>" required>
	<label for="address2">地番・マンション名</label>
		<input class="mb20" type="text" name="address2" id="address2" value="<?=xss($result["address2"])?>" required>
	<button class="mb20" type="submit">変更する</button>
	<button id="deleteBtn"><a href="delete.php?id=<?=xss($result["id"])?>">削除する</a></button>

</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
		$('#deleteBtn').on('click',function(){
			alert('本当に削除しますか？');
		});
	</script>
</body>
</html>






