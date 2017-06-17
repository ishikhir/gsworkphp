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





/** JS：Area */


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

$("#menu-close2").on("click",function(e) {
	$("#sidebar-wrapper2").toggleClass("active");
	return false;
});

$("#menu-toggle2").on("click",function(e) {
	$("#sidebar-wrapper2").toggleClass("active");
	var sign = window.prompt("ユーザー名をご入力ください", "ニックネーム可");
	$('#username').val(sign);
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
			var img = document.createElement('img');
			img.src = reader.result;
			loadImg.appendChild(img);


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
＊　文字認識　API
＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/

		Tesseract.recognize(img.src, {
			lang: "jpn"
		}).then(function(result) {
			const a = document.querySelector("#ocrImg");
			a.innerHTML = result.html;
			$('#ocrComp').fadeIn(1000);
			$('#homeOption').fadeIn(1000);
			$('#doWhatArea').fadeIn(1000);
			$('#priceArea').fadeIn(1000);
			console.log(a.innerHTML);


			for(let i=1;i<10;i++){
				console.log($(`#line_1_1 #word_1_${i}`).html());
				console.log($(`#line_1_2 #word_1_${i}`).html());
				console.log($(`#line_1_3 #word_1_${i}`).html());
				if($(`#line_1_1 #word_1_${i}`).html()!==undefined){
					ocrArr.push($(`#line_1_1 #word_1_${i}`).html());
				}
				if($(`#line_1_2 #word_1_${i}`).html()!==undefined){
					ocrArr.push($(`#line_1_2 #word_1_${i}`).html());
				}
				if($(`#line_1_3 #word_1_${i}`).html()!==undefined){
					ocrArr.push($(`#line_1_3 #word_1_${i}`).html());
				}
			}

			console.log(ocrArr);
			if(ocrArr[0]==='屋根'){
				let roofType=ocrArr[1];
				console.log(roofType);
//				$('#roof option').val(roofCategory[roofType]);
//				console.log(roofCategory[roofType]);
				}


		});


		}
		// ファイル読み込みを実行
		reader.readAsDataURL(fileData);
		$('#nothingWrap').hide();
		$('#loadComp').fadeIn(1000);
	}
	upLoad.addEventListener('change', loadLocalImage, false);
} else {
	upLoad.style.display = 'none';
	loadImg.innerHTML = 'File APIに対応したブラウザでご確認ください';
}

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



//　郵便番号検索 API　チャット

//$(function () {
//	$('#btn').on('click', function () {
//		//今後、ここにクリックされた時の処理を記述する。
//		$.ajax({
//			url: 'http://zipcloud.ibsnet.co.jp/api/search?zipcode=' +
//				$('#zipcode').val(),
//			dataType: 'jsonp',
//		}).done(function (data) {
//			if (data.results) {
//				setData(data.results[0]);
//			} else {
//				alert('該当するデータが見つかりませんでした');
//			}
//		}).fail(function (data) {
//			alert('通信に失敗しました');
//		});
//	});
//
//	// データ取得が成功した時の処理
//	function setData(data) {
//		//取得したデータを各HTML要素に代入
//		$('#prefecture').val(data.address1); //都道府県名
//		$('#city').val(data.address2); //市区町村名
//		$('#address').val(data.address3); //町域名
//	}
//});




$('#nothing').on('click', function() {
	$('#loadComp').fadeIn(500);
	$('#homeOption').fadeIn(500);
	$('#doWhatArea').fadeIn(500);
	$('#priceArea').fadeIn(500);
});

var homeAge=document.querySelector('#homeAge');
var roofDo=document.querySelector('#roofDo');
roofDo.addEventListener('change',()=>{
//$('#roofPrice').val(homeAge.val*roofSlate30.坪単価);
console.log(homeAge);
console.log(homeAge.value);
console.log(roofSlate30.坪単価);
});


// Initialize Firebase
var config = {
	apiKey: "AIzaSyDOWPhYU8acaB6t5wR-t1rf02Yg54LtIEY",
	authDomain: "chatapp-6d65c.firebaseapp.com",
	databaseURL: "https://chatapp-6d65c.firebaseio.com",
	projectId: "chatapp-6d65c",
	storageBucket: "chatapp-6d65c.appspot.com",
	messagingSenderId: "96210396193"
};
firebase.initializeApp(config); //　isitializeApp関数にconfigを読み込んで準備完了



//１．Authentication → ログイン方法 → 匿名を選択
//　初期はログインしないとチャットできない仕様
//　firebaseのコンソール画面で行う
//＋　Database,ルールで
//{
//  "rules": {
//    ".read": true,
//    ".write": true
//  }
//}　にする


//2.MSG送受信準備

var newPostRef = firebase.database().ref(); //　送信データがnewPostRefに入る

//3.Submit:MSG送信

$("#send").on('click', function() {
	var date = WTIN('.', '.', ' ', ':');
	var img2 = document.querySelector('#img2');
	newPostRef.push({
		username: $("#username").val(),
		text: $("#text").val(),
		img: img2.src,
		date: date
	});
	$("#text").val(''); //　送信後にテキストを空にしてるだけ
});

$('#text').keypress(function (e) {
	if (e.keyCode == 13) {
		var date = WTIN('.', '.', ' ', ':');
		var img2 = document.querySelector('#img2');
		newPostRef.push({
			username: $("#username").val(),
			text: $("#text").val(),
			img: img2.src,
			date: date
		});
		$("#text").val(''); //　送信後にテキストを空にしてるだけ
	}
		});


//4.MSGデータ受信
//child_added:毎回1個//value:毎回全てのデータを取得→　用意されているイベント
newPostRef.on('child_added', function(data) { //　dataに値が入ってくるが、dataを生では見れない
	var v = data.val(); //　送信データ受信　これで初めてdataの中身が見れるようになる
	var k = data.key; //　送信データに紐付いたユニークkey　後で削除したい時とかに使う→　削除すると送った先も消える
	if ($('#username').val() === v.username) {
		var str = `<div class="msg me">
					<div class="user" id="${k}">
						<p class="username">${v.username}</p>
						<p>${v.date}</p>
					</div>
					<div class="textWrap">
						<span class="text">${v.text}</span>
					</div>
					<p class="imgBox"><img class="img" src="${v.img}"></p>
				</div>` //　表示方法を整形
		$("#output").prepend(str);
	} else {
		str = `<div class="msg">
				<div class="user" id="${k}">
					<p class="username">${v.username}</p>
					<p>${v.date}</p>
				</div>
				<div class="textWrap">
					<span class="text">${v.text}</span>
				</div>
				<p class="imgBox"><img class="img" src="${v.img}"></p>
			</div>` //　表示方法を整形
		$("#output").prepend(str);
	}
});
