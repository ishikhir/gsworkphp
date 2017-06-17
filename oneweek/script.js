for (let i = 0; i <= 100; i++) {
	$('#yourAge').append(`<option value="${i}">${i}歳</option>`);
	$('#homeAge').append(`<option value="${i}">築${i}年</option>`);
	$('#yourAge2').append(`<option value="${i}">${i}歳</option>`);
}

$("#reformArea").hide();
$("#constNewArea").hide();
$("#reformForm").hide();
$("#constNewForm").hide();
$("#thanks").hide();
$("#output1").hide();
$("#output2").hide();

$("#reformBtn").on("click", function() {
	$("#constNewForm").hide();
	$("#reformForm").fadeIn(500);
});

$("#constNewBtn").on("click", function() {
	$("#reformForm").hide();
	$("#constNewForm").fadeIn(500);
});


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　リフォームのアンケート

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/



$("#reformSend").on("click", function(e) {
	e.preventDefault();
	let userForm = $("#reformForm").serializeArray();
	//JSON取得
	$.getJSON("sql.php?id=reform", userForm, function(reformUser) {
		console.log(reformUser);
		if(reformUser==="JSON"||reformUser==="Jason"||reformUser==="ジェイソン"||reformUser==="json"||reformUser==="jason"){
			let json="thanks! ";
			json+='<img src="img/f-vs-jason.jpg">';
			$("#thanks").empty();
			$("#thanks").append(json);
			$("#thanks").fadeIn(1000);
			return;
		}
		let span = "<span>thaks! ";
		span += reformUser;
		span += "</span>";
		$("#thanks").empty();
		$("#thanks").append(span);
		$("#thanks").fadeIn(1000);
	});
});

$("#reformGet").on("click", function() {
	$("#constNewArea").hide();
	$("#reformArea").fadeIn(1500);
	//　質問１
	$("#yourAgeDataGraph").empty();
	let yourAge0=Number($('#rya029').html());
	let yourAge1=Number($('#rya3049').html());
	let yourAge2=Number($('#rya5069').html());
	let yourAge3=Number($('#rya70').html());
	const ctxYourAgeDataGraph = document.getElementById("yourAgeDataGraph").getContext("2d");
	const yourAgeDataGraph = new Chart(ctxYourAgeDataGraph, {
		type: 'doughnut',
		data: {
			labels: ["〜２９歳", "３０〜４９歳", "５０〜６９歳", "７０歳〜"],
			datasets: [{
				backgroundColor: [
					"#f00",
					"#0f0",
					"#00f",
					"#f0f"
				],
				data: [yourAge0,yourAge1,yourAge2,yourAge3]
			}]
		},
		options:{
			title: {
				display: true,
				text: '回答者の年齢層は？'
			}
		}
	});
	//　質問２
	$("#homeAgeDataGraph").empty();
	let homeAge0=Number($('#rha09').html());
	let homeAge1=Number($('#rha1019').html());
	let homeAge2=Number($('#rha2029').html());
	let homeAge3=Number($('#rha3039').html());
	let homeAge4=Number($('#rha40').html());
	const ctxHomeAgeDataGraph = document.getElementById("homeAgeDataGraph").getContext("2d");
	const homeAgeDataGraph = new Chart(ctxHomeAgeDataGraph, {
		type: 'doughnut',
		data: {
			labels: ["〜１０年未満", "１０〜１９年", "２０〜２９年", "３０年〜３９年", "４０年以上"],
			datasets: [{
				backgroundColor: [
					"#f00",
					"#0f0",
					"#00f",
					"#f0f",
					"#ff0"
				],
				data: [homeAge0,homeAge1,homeAge2,homeAge3,homeAge4],
//				scaleLabel: "<%=value%> %",
//				tooltipTemplate: "<%=value%> %",
			}]
		},
		options:{
			title: {
				display: true,
				text: '築何年でリフォームしたか？',
			}
		}
	});
	//　質問３
	$("#whyDataGraph").empty();
	let why0=Number($('#rtrouble').html());
	let why1=Number($('#rrenovation').html());
	let why2=Number($('#rsales').html());
	let why3=Number($('#rchild').html());
	let why4=Number($('#rgrandChild').html());
	let why5=Number($('#rresidentsDecreased').html());
	let why6=Number($('#rpet').html());
	let why7=Number($('#rmySpace').html());
	let why8=Number($('#rcleanUp').html());
	let why9=Number($('#roldAge').html());
	let why10=Number($('#rcare').html());
	let why11=Number($('#rearthquake').html());
	let why12=Number($('#renvironment').html());
	const ctxWhyDataGraph = document.getElementById("whyDataGraph").getContext("2d");
	const whyDataGraph = new Chart(ctxWhyDataGraph, {
		type: 'doughnut',
		data: {
			labels: ["雨漏りや故障","老朽化の改善","業者に指摘された","子どもが生まれた","孫が生まれた","住人が減った","ペットのため","自分の居場所が欲しい","片付いた家にしたい","老後のため","介護のため","地震のため","環境のため"],
			datasets: [{
				backgroundColor: [
					"#f00",
					"#0f0",
					"#00f",
					"#f0f",
					"#ff0",
					"#0ff",
					"#900",
					"#090",
					"#009",
					"#909",
					"#990",
					"#099",
					"#300"
				],
				data: [why0,why1,why2,why3,why4,why5,why6,why7,why8,why9,why10,why11,why12]
			}]
		},
		options:{
			title: {
				display: true,
				text: 'リフォームのきっかけは？'
			}
		}
	});
//		//　質問４
	$("#decideDataGraph").empty();
	$("#decideDataGraph").empty();
	let decide0=Number($('#rprice').html());
	let decide1=Number($('#rfunction').html());
	let decide2=Number($('#rdurable').html());
	let decide3=Number($('#rproposal').html());
	const ctxDecideDataGraph = document.getElementById("decideDataGraph").getContext("2d");
	const decideDataGraph = new Chart(ctxDecideDataGraph, {
		type: 'doughnut',
		data: {
			labels: ["値段", "機能性", "耐久性", "提案力"],
			datasets: [{
				backgroundColor: [
					"#f00",
					"#0f0",
					"#00f",
					"#f0f"
				],
				data: [decide0,decide1,decide2,decide3]
			}]
		},
		options:{
			title: {
				display: true,
				text: '業者を選んだ決め手は？'
			}
		}
	});
	//　質問５
	$("#satisfactionDataGraph").empty();
	let satisfaction0 = Number($('#rgood').html());;
	let satisfaction1 = Number($('#rsoso').html());;
	let satisfaction2 = Number($('#rbad').html());;
	const ctxSatisfactionDataGraph = document.getElementById("satisfactionDataGraph").getContext("2d");
	const satisfactionDataGraph = new Chart(ctxSatisfactionDataGraph, {
		type: 'doughnut',
		data: {
			labels: ["満足", "普通", "不満"],
			datasets: [{
				backgroundColor: [
					"#f00",
					"#0f0",
					"#00f"
				],
				data: [satisfaction0,satisfaction1,satisfaction2]
			}]
		},
		options:{
			title: {
				display: true,
				text: 'リフォームの満足度は？'
			}
		}
	});
	//　質問６
//	$("#reasonList").empty();
//	let reason = $('#rReason li').html;
//	console.log(reason);
});//　clickfunction


/*＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊

＊　新築のアンケート

＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊*/


$("#constNewSend").on("click", function(e) {
	e.preventDefault();
	let userForm2 = $("#constNewForm").serializeArray();
	//JSON取得
	$.getJSON("sql.php?id=constNew", userForm2, function(constNewUser) {
		console.log(constNewUser);
		let span = "<span>thaks! ";
		span += constNewUser;
		span += "</span>";
		$("#thanks").empty();
		$("#thanks").append(span);
		$("#thanks").fadeIn(1000);
	});
});

$("#constNewGet").on("click", function() {
	$("#reformArea").hide();
	$("#constNewArea").fadeIn(1500);
		//　質問１
		$("#yourAgeDataGraph2").empty();
		let yourAge2_0 =Number($('#cya029').html());
		let yourAge2_1 =Number($('#cya3049').html());
		let yourAge2_2 =Number($('#cya5069').html());
		let yourAge2_3 =Number($('#cya70').html());
		const ctxYourAgeDataGraph2 = document.getElementById("yourAgeDataGraph2").getContext("2d");
		const yourAgeDataGraph2 = new Chart(ctxYourAgeDataGraph2, {
			type: 'doughnut',
			data: {
				labels: ["〜２９歳", "３０〜４９歳", "５０〜６９歳", "７０歳〜"],
				datasets: [{
					backgroundColor: [
						"#f00",
						"#0f0",
						"#00f",
						"#f0f"
					],
					data: [yourAge2_0,yourAge2_1,yourAge2_2,yourAge2_3]
				}]
			},
			options:{
				title: {
					display: true,
					text: '回答者の年齢層は？'
				}
			}
		});
		//　質問２
		$("#whyDataGraph2").empty();
		let why2_0=Number($('#ctrouble').html());
		let why2_1=Number($('#crenewal').html());
		let why2_2=Number($('#csales').html());
		let why2_3=Number($('#cchild').html());
		let why2_4=Number($('#cgrandChild').html());
		let why2_5=Number($('#cresidentsDecreased').html());
		let why2_6=Number($('#cpet').html());
		let why2_7=Number($('#cmySpace').html());
		let why2_8=Number($('#ccleanUp').html());
		let why2_9=Number($('#coldAge').html());
		let why2_10=Number($('#ccare').html());
		let why2_11=Number($('#cearthquake').html());
		let why2_12=Number($('#cenvironment').html());
		const ctxWhyDataGraph2 = document.getElementById("whyDataGraph2").getContext("2d");
		const whyDataGraph2 = new Chart(ctxWhyDataGraph2, {
			type: 'doughnut',
			data: {
				labels: ["旧宅の雨漏りや故障による建て替え","旧宅の老朽化による建て替え ","子どもが生まれた","孫が生まれた","住人が減った","ペットのため","一軒家に住みたかった","自分の居場所が欲しい","片付いた家にしたい","老後のため","介護のため","地震のため","環境のため"],
				datasets: [{
					backgroundColor: [
						"#f00",
						"#0f0",
						"#00f",
						"#f0f",
						"#ff0",
						"#0ff",
						"#900",
						"#090",
						"#009",
						"#909",
						"#990",
						"#099",
						"#300"
					],
					data: [why2_0,why2_1,why2_2,why2_3,why2_4,why2_5,why2_6,why2_7,why2_8,why2_9,why2_10,why2_11,why2_12]
				}]
			},
			options:{
				title: {
					display: true,
					text: '一軒家購入（検討）のきっかけは？'
				}
			}
		});
		//　質問３
		$("#decideDataGraph2").empty();
		let decide2_0=Number($('#cprice').html());
		let decide2_1=Number($('#cfunction').html());
		let decide2_2=Number($('#cdurable').html());
		let decide2_3=Number($('#cproposal').html());
		let decide2_4=Number($('#cdesign').html());
		let decide2_5=Number($('#clocation').html());
		const ctxDecideDataGraph2 = document.getElementById("decideDataGraph2").getContext("2d");
		const decideDataGraph2 = new Chart(ctxDecideDataGraph2, {
			type: 'doughnut',
			data: {
				labels: ["値段", "機能性", "耐久性", "提案力", "デザイン・見た目", "立地"],
				datasets: [{
					backgroundColor: [
						"#f00",
						"#0f0",
						"#00f",
						"#f0f",
						"#ff0",
						"#0ff"
					],
					data: [decide2_0,decide2_1,decide2_2,decide2_3,decide2_4,decide2_5]
				}]
			},
			options:{
				title: {
					display: true,
					text: '一軒家購入（検討）の決め手は？'
				}
			}
		});
		//　質問４
		$("#satisfactionDataGraph2").empty();
		let satisfaction2_0 = Number($('#cgood').html());;
		let satisfaction2_1 = Number($('#csoso').html());;
		let satisfaction2_2 = Number($('#cbad').html());;
		const ctxSatisfactionDataGraph2 = document.getElementById("satisfactionDataGraph2").getContext("2d");
		const satisfactionDataGraph2 = new Chart(ctxSatisfactionDataGraph2, {
			type: 'doughnut',
			data: {
				labels: ["満足", "普通", "不満"],
				datasets: [{
					backgroundColor: [
						"#f00",
						"#0f0",
						"#00f"
					],
					data: [satisfaction2_0,satisfaction2_1,satisfaction2_2]
				}]
			},
			options:{
				title: {
					display: true,
					text: '一軒家購入の満足度（期待値）は？'
				}
			}
		});
//		//　質問５
//		$("#reasonList2").empty();
//		let reasonList2;
//		for (val in constNewData) {
//			if(constNewData[val][5]!==undefined){
//				reasonList2= `<li>`;
//				reasonList2+=constNewData[val][5];
//				reasonList2+=`</li>`;
//				$("#reasonList2").append(reasonList2);
//			}
//		}
});//　clickfunction
