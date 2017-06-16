/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　郵便番号検索 API

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/

$('#zip').on('click', function () {
	$.ajax({
		url: `http://zipcloud.ibsnet.co.jp/api/search?zipcode=${$('#zipCode').val()}`,
		dataType: 'jsonp',
	}).done(function (data) {
		if (data.results) setData(data.results[0]);
		else alert('該当するデータが見つかりませんでした');
	}).fail(function (data) {
		alert('通信に失敗しました');
	});
});
function setData(data) {
	$('#address1').val(`${data.address1}${data.address2}${data.address3}`);
}
