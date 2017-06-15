//ランダム

function rand(n){
	var r=Math.floor(Math.random()*n+1);
	return r;
}


//日付取得して計算用 Number

//var now = new Date();
//
//var MSECOND = now.getmilliseconds();
//var SECOND = now.getSeconds();
//var MINUTE = now.getMinutes();
//var HOUR = now.getHours();
//var DATE = now.getDate();
//var MONTH = now.getMonth()+1;
//var YEAR = now.getFullYear();


//経過時間リアルタイム表示

//	var dateS;
//	var dateE;
//	function elapsedTime(dateS){
//		var now = new Date();
//		var elapsedTime1=Math.floor((now-dateS)/1000);
//		var nowMS = Math.floor(now.getMilliseconds()/10);
////取得した時間によって表示がマイナスになっちゃう↓
////		var nowS = now.getSeconds();
////		var nowM = now.getMinutes();
////		var sS = dateS.getSeconds();
////		var sM = dateS.getMinutes();
////		var eMS =Math.floor(nowMS);
////		var eS =nowS-sS;
////		var eM =nowM-sM;
//		if(nowMS<10){
//			nowMS='0'+nowMS;
//		}
////		if(eS<10){
////			eS='0'+eS;
////		}
////		if(eM<10){
////			eM='0'+eM;
////		}
//		var elapsedTimeStr=elapsedTime1+'：'+nowMS;
//		return elapsedTimeStr;
//	}
//	function recalc(){
//		var eTime1=elapsedTime(dateS);
//		$('#timer').html(eTime1);
//		refresh();
//	}
//	function refresh(){
//		setTimeout(recalc,90);
//	}




//日付取得してイケてる表示用 String

function WTIN(yyyy,mm,dd,h) {
	var now = new Date();
	var year = now.getFullYear();
	var month = now.getMonth();
	month=month+1;
	var date = now.getDate();
	var day = now.getDay();
	var hour = now.getHours();
	var minute = now.getMinutes();
	var second = now.getSeconds();
	if(month<10){
		month='0'+month;
	}
	if(date<10){
		date='0'+date;
	}
	if(hour<10){
		hour='0'+hour;
	}
	if(minute<10){
		minute='0'+minute;
	}
	if(second<10){
		second='0'+second;
	}
//	var nowTime = year + yyyy + month + mm + date + dd + hour + h + minute + m + second + s;
	var nowTime2= year + yyyy + month + mm + date + dd + hour + h + minute
	return nowTime2;
}
//var date = WTIN('.','.','　','：','：','');


//パスワードジェネレーター numで桁数指定
	function randPass(num){
		var password=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9'];
		var len=password.length;
		var rand=[];
		var str=[];
		var i=0;
		for(var i=0; i<num; i++){
			rand.push(Math.floor(Math.random()*len));
			str.push(password[rand[i]]);
			var strPS = str.join('');//.replace(/,/g,"");正規表現のオプション
		}
		return strPS;
	}
	
//	var a=randPass(20);
//	console.log(a);


//乱数ジェネレーター numで桁数指定 0が厄介未解決
	function randNum(num){
		var password=[1,2,3,4,5,6,7,8,9];
		var len=password.length;
		var rand=[];
		var str=[];
		var i=0;
		for(var i=0; i<num; i++){
			rand.push(Math.floor(Math.random()*len));
			str.push(password[rand[i]]);
			var strPS = str.join('');//.replace(/,/g,"");正規表現のオプション
		}
		return strPS;
	}

//ランダム計算ジェネレーター
	function randCalc(){
		var password=['+','-','*','/'];
		var len=password.length;
		var rand=[];
		var str;
		rand.push(Math.floor(Math.random()*len));
		str=password[rand[0]];
		return str;
	}
	
//	var a=randCalc();
//	console.log(a);


//　再帰関数 ちょっと違うけど似た同じ処理を繰り返す的な
//　functionの中で、自分のfunctionを呼び出すことができる
//　forやwhileじゃなくても繰り返せる？
//　promptを条件に当てはまるまで繰り返し機能を実装
//	function getPrompt1(digit){
//		if(isNaN(digit)||digit===''||digit===null||digit===undefined||digit<=0){
//　ifの条件中身　１半角数字以外　２空白　３escボタン等　４定義されてない　５半角数字もマイナスは不可の時
//			digit = prompt('何けたの計算にする？','（半角数字で入力）');
//			return getPrompt1(digit);

//isNaNが効いているうちじゃないと他の時に文字列が通っちゃうから、このelse ifだとダメ。
//		}else if(round===""){
//			ronud =prompt('何回勝負にする？','（半角数字で入力）');
//			return getoPrompt2(round);
//		}else if(round===null){
//			ronud =prompt('何回勝負にする？','（半角数字で入力）');
//			return getoPrompt2(round);
//		}else if(round===undefined){
//			ronud =prompt('何回勝負にする？','（半角数字で入力）');
//			return getoPrompt2(round);
//isNaNが効いているうちじゃないと他の時に文字列が通っちゃうから、このelse ifだとダメ。

//		}else{
//			return digit
//		}
//	}
//	var digit = prompt('何けたの計算にする？','（※半角数字で入力）');
//	digit = getPrompt1();
