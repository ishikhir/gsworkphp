<?php

session_start();

include("functions.php");

loginCheck();

$id = $_SESSION["id"];
$userId = $_SESSION["userId"];
$userPass = $_SESSION["userPass"];

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ユーザーツール画面</title>
	<link rel="stylesheet" href="oneweek.css">
</head>
<body>
	<div id="tools">
		<button class="mb20" id="useGraphBtn"><a href="satisfaction_q.php">ユーザーの体験談を参照する</a></button>
		<button class="mb20" id="updateBtn">登録情報変更</button>
		<button class="mb20" id="logoutBtn"><a href="logout.php">ログアウトする</a></button>
	</div>
	<form id="userUpdate" action="update.php" method="post">
		<label for="homeName">ID</label>
			<input class="mb20" type="text" name="userId" id="userId" value="<?=$userId?>" required>
		<label for="homeName">PASS</label>
			<input class="mb20" type="password" name="userPass" id="userPass" value="<?=$userPass?>" required>
		<button  class="mb20" id="update">upDate</button>
		<button id="deleteBtn"><a href="delete.php?id=<?=$id?>">削除する</a></button>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
		$('#userUpdate').hide();
		$('#updateBtn').on('click',function(){
			$('#userUpdate').show();
		});
	</script>
</body>
</html>