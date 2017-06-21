/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　郵便番号検索 API

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/

$('#zip').on('click',()=>{
	$.ajax({
		url: `http://zipcloud.ibsnet.co.jp/api/search?zipcode=${$('#zipCode').val()}`,
		dataType: 'jsonp',
	}).done(data=> {
		if (data.results) setData(data.results[0]);
		else alert('該当するデータが見つかりませんでした');
	}).fail(data=> {
		alert('通信に失敗しました');
	});
});
function setData(data) {
	$('#address1').val(`${data.address1}${data.address2}${data.address3}`);
}


//　フォーム部分　ajax

$('#hide').hide();

$('#userId').on('change',()=>{
	const userId=$("#userId").val();
	$.get("insert_user.php?id=userId",{"userId":userId},data=>{
		if(data!=""){
			$('#caution').html(`${data}　は使われています`);
			$('#hide').hide();
		}else{
			$('#caution').html(`このIDは使えます`);
			$('#hide').show();
		}
	});
});
