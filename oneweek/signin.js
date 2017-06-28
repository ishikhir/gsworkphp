/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　郵便番号検索 API

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/

$('#zip').on('click',()=>{
	$.ajax({
		url: `http://zipcloud.ibsnet.co.jp/api/search?zipcode=${$('#zipCode').val()}`,
		dataType: 'jsonp',//　戻り値の型を設定している
	}).done(data=> {
		if(data.results){
			setData(data.results[0]);
			$('.hide6').show();
		}else{
			alert('該当するデータが見つかりませんでした');
			$('.hide6').hide();
		}
	}).fail(data=>alert('通信に失敗しました'));
});
function setData(data) {
	$('#address1').val(`${data.address1}${data.address2}${data.address3}`);
}


//　フォーム部分　ajax

$('.hide,.hide2,.hide3,.hide4,.hide5,.hide6,.hide7').hide();

$('#userId').on('change',()=>{
	const userId=$("#userId").val();
	if(!$("#userId").val().match(/^[a-zA-Z0-9]+$/)){
		$('#cautionId').html("半角英数字のみ使用できます").css("font-weight","bold").css("color","#f00");
		$('.hide,.hide2,.hide3,.hide4,.hide5').hide();
	}else{
		$.get("insert_user.php?id=userId",{"userId":userId},data=>{
			if(data!=""){
				$('#cautionId').show();
				$('#cautionId').html(`${data}　は使われています`);
				$('.hide,.hide2,.hide3,.hide4,.hide5').hide();
			}else{
				$('#cautionId').html(`このIDは使えます`);
				$('#cautionId').fadeOut(2000);
				$('.hide').show();
			}
		});
	}
});

$('#userPass').on('change',()=>{
	if(!$("#userPass").val().match(/^[a-zA-Z0-9]+$/)){
		$('#cautionPass').show();
		$('#cautionPass').html("半角英数字のみ使用できます").css("font-weight","bold").css("color","#f00");
	}else{
		$('.hide2').show();
		$('#cautionPass').fadeOut(2000);
	}
});

$('#name').on('change',()=>$('.hide3').show());

$('#email').on('change',()=>{
	if(!$("#email").val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
		$('#cautionEmail').show();
		$('#cautionEmail').html("ご連絡できるメールアドレスをご入力ください").css("font-weight","bold").css("color","#f00");
	}else{
		$('.hide4').show();
		$('#cautionEmail').fadeOut(2000);
	}
});

$('#zipCode').on('change',()=>{
	if(!$("#zipCode").val().match(/^[0-9]+$/)){
		$('#cautionZipCode').show();
		$('#cautionZipCode').html("半角英数字（ハイフンなし）でご入力ください").css("font-weight","bold").css("color","#f00");
	}else{
		$('.hide5').show();
		$('#cautionZipCode').fadeOut(2000);
	}
});

$('#address2').on('change',()=>$('.hide7').show());
