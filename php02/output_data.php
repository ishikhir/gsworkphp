<?php
include("functions.php");

$name=$_POST['name'];
$mail=$_POST['mail'];
$age=$_POST['age'];

//$str=$name.",".$mail.",".$age."\n";
$str="{$name},{$mail},{$age}\n";

?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
書き込みを行います。<br>
formの中身を　data.csv に書き込みます。
<?php //　CSVに書き込み
$createCsv = fopen("data/data.csv","a");	// ファイル読み込み　,"a"で、なければ新規作成という命令;
flock($createCsv, LOCK_EX);			// ファイルロック
fwrite($createCsv, $str);
flock($createCsv, LOCK_UN);			// ファイルロック解除
fclose($createCsv);
?>

<table>
	<thead>
		<tr>
			<th>名前</th><th>メアド</th><th>年齢</th>
		</tr>
	</thead>
	<tbody>
<?php //　CSVファイルから生成処理
// fopenでファイルを開く（'r'は読み込みモードで開く）
$openCsv = fopen("data/data.csv", 'r');
// whileで行末までループ処理
while (!feof($openCsv)) {
	// fgetsでファイルを読み込み、変数に格納
	$text = fgets($openCsv);
	$text2=str_replace( "\r\n", "", $text);
	$text2=str_replace( "\n", "", $text);
	$text2=str_replace( "\r", "", $text);
	$text3=explode(",",$text2);
	echo "<tr>";
	for($i=0;$i<count($text3);$i++){
		echo "<td>".$text3[$i]."</td>";
	}
	echo "</tr>";
}
// fcloseでファイルを閉じる
fclose($openCsv);
?>
	</tbody>
</table>

</body>
</html>