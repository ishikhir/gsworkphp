//　HTML生成

for (let i = 0; i <= 100; i++) {
	$('#homeAge').append(`<option id="homeAge${i}" value="${i}">築${i}年</option>`);
}

for (let i = 1; i <= 100; i++) {
	$('#homeSize').append(`<option id="homeSize${i}" value="${i}">${i}坪</option>`);
}

$('#ocrComp').hide();
$('#loadComp').hide();
$('#loadComp2').hide();
$('#homeOption').hide();
$('#doWhatArea').hide();
$('#priceArea').hide();


//　フォーム部分
$('#hide2,#hide3,#calcBtn,#hide5,#hide6,#hideR1,#hideW1,#hideT1,.hideR2,.hideW2,.hideT2').hide();

$('#homeAge').on('change',()=>{
	const roof=$("#roof").val();
	const homeAge=$('#homeAge').val();
	if($('#homeSize').val()!=''){
		$.get("insert_home.php?id=roof",{"roof":roof,"homeAge":homeAge},data=>{
			console.log(data);
			$('#roofDo').empty();
			$('#roofDo').append("<option selected>工事方法をお選びください</option>");
			$('#roofDo').append(data);
		});
	}
	$('#hide2').show();
});

$('#homeSize').on('change',()=>$('#hideR1').show());

$('#roof').on('change',()=>{
	const roof=$("#roof").val();
	const homeAge=$('#homeAge').val();
	$.get("insert_home.php?id=roof",{"roof":roof,"homeAge":homeAge},data=>{
		console.log(data);
		$('.hideR2').show();
		$('#roofDo').empty();
		$('#roofDo').append("<option selected>工事方法をお選びください</option>");
		$('#roofDo').append(data);
	});
});

$('#roofDo').on('change',()=>{
	const roof=$("#roof").val();
	const roofDo=$("#roofDo").val();
	$.get("insert_home.php?id=roofDo",{"roof":roof,"roofDo":roofDo},data=>{
		console.log(data);
		$('#hide3,#calcBtn').show();
		$('#roofPrice').val(data);
	});
});

$('#wall').on('change',()=>{
	const wall=$("#wall").val();
	$.get("insert_home.php?id=wall",{"wall":wall},data=>{
		console.log(data);
		$('#wallDo').empty();
		$('#wallDo').append("<option selected>工事方法をお選びください</option>");
		$('#wallDo').append(data);
	});
});

$('#wallDo').on('change',()=>{
	const wall=$("#wall").val();
	const wallDo=$("#wallDo").val();
	$.get("insert_home.php?id=wallDo",{"wall":wall,"wallDo":wallDo},data=>{
		console.log(data);
		$('#wallPrice').val(data);
	});
});

$('#toi').on('change',()=>{
	const toi=$("#toi").val();
	$.get("insert_home.php?id=toi",{"toi":toi},data=>{
		console.log(data);
		$('#toiDo').empty();
		$('#toiDo').append("<option selected>工事方法をお選びください</option>");
		$('#toiDo').append(data);
	});
});

$('#toiDo').on('change',()=>{
	const toi=$("#toi").val();
	const toiDo=$("#toiDo").val();
	$.get("insert_home.php?id=toiDo",{"toi":toi,"toiDo":toiDo},data=>{
		console.log(data);
		$('#toiPrice').val(data);
	});
});

$('#calcBtn').on('click',e=>{
	e.preventDefault();
	$('#hide5,#hide6').show();
	$('#totalPrice').val(($('#roofPrice').val()*1+$('#wallPrice').val()*1+$('#toiPrice').val()*1+$("#scaffoldPrice").val()*1)*($('#homeSize').val()*1));
	});



/** UI Area */


// Closes the sidebar menu
$("#menu-close").on("click",function(e) {
	$("#sidebar-wrapper").toggleClass("active");
	return false;
});

// Opens the sidebar menu
$("#menu-toggle").on("click",function(e) {
	$("#sidebar-wrapper").toggleClass("active");
	return false;
});

$("#menu-close3").on("click",function(e) {
	$("#sidebar-wrapper3").toggleClass("active");
	return false;
});

$("#menu-toggle3").on("click",function(e) {
	$("#sidebar-wrapper3").toggleClass("active");
	return false;
});

$("#menu-close4").on("click",function(e) {
	$("#sidebar-wrapper4").toggleClass("active");
	return false;
});

$("#menu-toggle4").on("click",function(e) {
	$("#sidebar-wrapper4").toggleClass("active");
	return false;
});

$('#loginBtn').on('click',function(){
	$('#userLogin').show();
	$('#userUpdate').hide();
});

$('#updateBtn').on('click',function(){
	$('#userLogin').hide();
	$('#userUpdate').show();
});



// Scrolls to the selected menu item on the page
$(function() {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
＊　File API　フォーム
＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/

var upLoad = document.getElementById('upLoad');
var upLoad2 = document.getElementById('upLoad2');
var loadImg = document.getElementById('loadImg');
var loadImg2 = document.getElementById('loadImg2');
var ocrArr=[];

// File APIに対応しているか確認
//if (window.File && window.FileReader && window.FileList && window.Blob) {
//	function loadLocalImage(e) {
//		// ファイル情報を取得
//		var fileData = e.target.files[0];
//		console.log(fileData); // 取得した内容の確認用
//
//		// 画像ファイル以外は処理を止める
//		if (!fileData.type.match('image.*')) {
//			alert('画像を選択してください');
//			return;
//		}
//
//		// FileReaderオブジェクトを使ってファイル読み込み
//		var reader = new FileReader();
//		// ファイル読み込みに成功したときの処理
//		reader.onload = function() {
//			var img = document.createElement('img');
//			img.src = reader.result;
//			loadImg.appendChild(img);
//
//
///*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
//＊　文字認識　API
//＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/
//
//		Tesseract.recognize(img.src, {
//			lang: "jpn"
//		}).then(function(result) {
//			const a = document.querySelector("#ocrImg");
//			a.innerHTML = result.html;
//			$('#ocrComp').fadeIn(1000);
//			$('#homeOption').fadeIn(1000);
//			$('#doWhatArea').fadeIn(1000);
//			$('#priceArea').fadeIn(1000);
//			console.log(a.innerHTML);
//
//
//			for(let i=1;i<10;i++){
//				console.log($(`#line_1_1 #word_1_${i}`).html());
//				console.log($(`#line_1_2 #word_1_${i}`).html());
//				console.log($(`#line_1_3 #word_1_${i}`).html());
//				if($(`#line_1_1 #word_1_${i}`).html()!==undefined){
//					ocrArr.push($(`#line_1_1 #word_1_${i}`).html());
//				}
//				if($(`#line_1_2 #word_1_${i}`).html()!==undefined){
//					ocrArr.push($(`#line_1_2 #word_1_${i}`).html());
//				}
//				if($(`#line_1_3 #word_1_${i}`).html()!==undefined){
//					ocrArr.push($(`#line_1_3 #word_1_${i}`).html());
//				}
//			}
//
//			console.log(ocrArr);
//			if(ocrArr[0]==='屋根'){
//				let roofType=ocrArr[1];
//				console.log(roofType);
////				$('#roof option').val(roofCategory[roofType]);
////				console.log(roofCategory[roofType]);
//				}
//
//
//		});
//
//
//		}
//		// ファイル読み込みを実行
//		reader.readAsDataURL(fileData);
//		$('#nothingWrap').hide();
//		$('#loadComp').fadeIn(1000);
//	}
//	upLoad.addEventListener('change', loadLocalImage, false);
//} else {
//	upLoad.style.display = 'none';
//	loadImg.innerHTML = 'File APIに対応したブラウザでご確認ください';
//}

//　File API　チャット


if (window.File && window.FileReader && window.FileList && window.Blob) {
	function loadLocalImage(e) {
		// ファイル情報を取得
		var fileData = e.target.files[0];
		console.log(fileData); // 取得した内容の確認用

		// 画像ファイル以外は処理を止める
		if (!fileData.type.match('image.*')) {
			alert('画像を選択してください');
			return;
		}

		// FileReaderオブジェクトを使ってファイル読み込み
		var reader = new FileReader();
		// ファイル読み込みに成功したときの処理
		reader.onload = function() {
			var img2 = document.createElement('img');
			img2.src = reader.result;
			img2.id='img2';
			loadImg2.appendChild(img2);
		}
		// ファイル読み込みを実行
		reader.readAsDataURL(fileData);
		$('#loadComp2').fadeIn(1000);
	}
	upLoad2.addEventListener('change', loadLocalImage, false);
} else {
	upLoad2.style.display = 'none';
	loadImg2.innerHTML = 'File APIに対応したブラウザでご確認ください';
}


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　firebase

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/


// Initialize Firebase

var config = {
	apiKey: "AIzaSyDOWPhYU8acaB6t5wR-t1rf02Yg54LtIEY",
	authDomain: "chatapp-6d65c.firebaseapp.com",
	databaseURL: "https://chatapp-6d65c.firebaseio.com",
	projectId: "chatapp-6d65c",
	storageBucket: "chatapp-6d65c.appspot.com",
	messagingSenderId: "96210396193"
};
firebase.initializeApp(config);

var newPostRef = firebase.database().ref();

const USERID=$('#userId2').html();
$('#userId2,#permFlg').hide();

//固有のdatabaseを作成

function FBpushId(){
	var ref=newPostRef.push();
	return ref;
}
console.log(FBpushId());
if(USERID!=""){
//	const FBPID=FBpushId();
//	var KEY=FBPID.key;
	$('#roomId').val(USERID);
}
if($('#permFlg').html()==0)$('#roomId').hide();
//console.log(KEY);


$("#menu-close2").on("click",function(e) {
	$("#sidebar-wrapper2").toggleClass("active");
	return false;
});

$("#menu-toggle2").on("click",function(e) {
	$("#sidebar-wrapper2").toggleClass("active");
	alert(USERID+'さま、チャットルームへようこそ');
	$('#username').val(USERID);
	return false;
});


$("#send").on('click', function() {
	var date = WTIN('.', '.', ' ', ':');
	var img2 = document.querySelector('#img2');
	if(img2==null)img2="";
	else img2=img2.src;
	console.log($('#permFlg').html());
	console.log($('#roomId').val());
	roomId=$('#roomId').val();
	if($('#permFlg').html()==1)roomId=roomId;
	else roomId=USERID;
	firebase.database().ref(`ROOMS/${roomId}`).push({
		username: $("#username").val(),
		text: $("#text").val(),
		date: date,
		img: img2,
//		map: canvas.toDataURL('image/jpg'),

	});
	$("#text,#upLoad2").val(''); //　送信後にテキストを空にしてるだけ
	$("loadImg2").empty(); //　送信後にテキストを空にしてるだけ
});


function firebaseOutput(data){
	var v = data.val();
	var k = data.key; //　送信データに紐付いたユニークkey　後で削除したい時とかに使う→　削除すると送った先も消える
	if ($('#username').val() === v.username) {
		var str = `<div class="msg me">
					<div class="user">
						<p class="username">${v.username}</p>
						<p>${v.date}</p>
					</div>
					<div class="textWrap">
						<p class="text"><a class="deleteText" value="${v.username}" id="${k}">${v.text}</a></p>
					</div>
					<p class="imgBox"><img class="img" src="${v.img}"></p>
				</div>`
		$("#output").prepend(str);
	} else {
		str = `<div class="msg">
				<div class="user">
					<p class="username">${v.username}</p>
					<p>${v.date}</p>
				</div>
				<div class="textWrap">
					<p class="text"><a class="deleteText" value="${v.username}" id="${k}">${v.text}</a></p>
				</div>
				<p class="imgBox"><img class="img" src="${v.img}"></p>
			</div>`
		$("#output").prepend(str);
	}
}


$('#roomId').on("change",()=>{
	firebase.database().ref(`ROOMS/${$('#roomId').val()}`).on('child_added', data=>firebaseOutput(data));
});

firebase.database().ref(`ROOMS/${$('#roomId').val()}`).on('child_added',data=>firebaseOutput(data));//　上で"load change"　だと効かなかったので下にもう１回load用のfunction


$(document).on('click','.deleteText',function(){//　DOMがスタート時にはないから反応しなかった再読み込みして、第２引数でDOMを取得　アロー関数だとthisがdocumentになっちゃう
	var messageId = $(this).attr("id");
	messageId=$(this).attr("id");
	var messageUsername = $(this).attr("value");
	messageId=$(this).attr("id");
	console.log(`USERID: ${USERID}-----html: ${messageUsername}`)
	if(USERID==messageUsername){
		if(confirm("メッセージを削除しますか？")==true){
			firebase.database().ref(`ROOMS/${$('#roomId').val()}/${messageId}`).remove();
		}
	}else alert("ご自分のメッセージは削除できます。");
});


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　googlemap

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/


const userAddress=$('#userAddress').val();
$('#userAddress2').hide();
$('#address').val(userAddress);

function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 17,
		center: {lat: 35.6811716, lng: 139.7648629},
		mapTypeId: 'satellite',
	});
	var geocoder = new google.maps.Geocoder();

	document.getElementById('submit').addEventListener('click', function() {
		geocodeAddress(geocoder, map);
	});
}

function geocodeAddress(geocoder, resultsMap) {
	var address = document.getElementById('address').value;
	geocoder.geocode({'address': address}, function(results, status) {
		if (status === 'OK') {
			resultsMap.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
			map: resultsMap,
			position: results[0].geometry.location
			});
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
	});
}

//$('#sendMap').on('click',()=>{
//	var map=$('#map');
//	var canvas = $("#drowarea")[0];
//	var context = canvas.getContext('2d');
//	context.drawImage(map,0,0,map.width,map.height);
//});


//$("#dl").on('click', function() {
//	$("#imgDl").attr({
//		href:can3.toDataURL().replace('image/png','application/octet-stream'),
//		download:`${new Date().getTime()} .png`
//	});
//});

