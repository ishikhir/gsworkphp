$("#reformArea").hide();
$("#reformForm").hide();
$("#constNewForm").hide();

$("#reformBtn").on("click", function() {
	$("#reformForm").fadeIn(500);
	$("#reformBtn").hide();
	$("#constNewBtn").hide();
});

$("#constNewBtn").on("click", function() {
	$("#constNewForm").fadeIn(500);
	$("#constNewBtn").hide();
	$("#reformBtn").hide();
});

$("#reformSend").on("click", function(e) {
	e.preventDefault();
	let userForm = $("#reformForm").serializeArray();
	//JSON取得
	$.getJSON("output_data5.php?id=reform", userForm, function(reformUser) {
		console.log(reformUser);
		let span = "<span>thaks! ";
		span += reformUser[0];
		span += "</span>";
		$("#thnks").append(span);
	});
});

$("#reformGet").on("click", function() {
	$("#reformArea").fadeIn(1500);
	$.getJSON("output_data5.php?id=reformGet", function(reformData) {
		console.log(reformData);
		//　DATA表示　数ループ処理
		//　質問１
		$("#yourAgeDataGraph").empty();
		let yourAge0 = [];
		let yourAge1 = [];
		let yourAge2 = [];
		let yourAge3 = [];
		for (val in reformData) {
			if (reformData[val][1] === "0")yourAge0.push(reformData[val][1]);
			if (reformData[val][1] === "1")yourAge1.push(reformData[val][1]);
			if (reformData[val][1] === "2")yourAge2.push(reformData[val][1]);
			if (reformData[val][1] === "3")yourAge3.push(reformData[val][1]);
		}
		const ctxYourAgeDataGraph = document.getElementById("yourAgeDataGraph").getContext("2d");
		const yourAgeDataGraph = new Chart(ctxYourAgeDataGraph, {
			type: 'doughnut',
			data: {
				labels: ["〜３０歳", "３１〜５０歳", "５１〜７０歳", "７１歳〜"],
				datasets: [{
					backgroundColor: [
						"#f00",
						"#0f0",
						"#00f",
						"#f0f"
					],
					data: [yourAge0.length,yourAge1.length,yourAge2.length,yourAge3.length]
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
		let homeAge0 = [];
		let homeAge1 = [];
		let homeAge2 = [];
		let homeAge3 = [];
		let homeAge4 = [];
		for (val in reformData) {
			if (reformData[val][2] === "0")homeAge0.push(reformData[val][2]);
			if (reformData[val][2] === "1")homeAge1.push(reformData[val][2]);
			if (reformData[val][2] === "2")homeAge2.push(reformData[val][2]);
			if (reformData[val][2] === "3")homeAge3.push(reformData[val][2]);
			if (reformData[val][2] === "4")homeAge4.push(reformData[val][2]);
		}
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
					data: [homeAge0.length,homeAge1.length,homeAge2.length,homeAge3.length,homeAge4.length]
				}]
			},
			options:{
				title: {
					display: true,
					text: '築何年でリフォームしたか？'
				}
			}
		});
		//　質問３
		$("#whyDataGraph").empty();
		let why0 = [];
		let why1 = [];
		let why2 = [];
		let why3 = [];
		let why4 = [];
		let why5 = [];
		let why6 = [];
		let why7 = [];
		let why8 = [];
		let why9 = [];
		let why10 = [];
		let why11 = [];
		let why12 = [];
		for (val in reformData) {
			if (reformData[val][3] === "trouble")why0.push(reformData[val][3]);
			if (reformData[val][3] === "renovation")why1.push(reformData[val][3]);
			if (reformData[val][3] === "sales")why2.push(reformData[val][3]);
			if (reformData[val][3] === "child")why3.push(reformData[val][3]);
			if (reformData[val][3] === "grandChild")why4.push(reformData[val][3]);
			if (reformData[val][3] === "residentsDecreased")why5.push(reformData[val][3]);
			if (reformData[val][3] === "pet")why6.push(reformData[val][3]);
			if (reformData[val][3] === "mySpace")why7.push(reformData[val][3]);
			if (reformData[val][3] === "cleanUp")why8.push(reformData[val][3]);
			if (reformData[val][3] === "oldAge")why9.push(reformData[val][3]);
			if (reformData[val][3] === "Care")why10.push(reformData[val][3]);
			if (reformData[val][3] === "earthquake")why11.push(reformData[val][3]);
			if (reformData[val][3] === "environment")why12.push(reformData[val][3]);
		}
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
					data: [why0.length,why1.length,why2.length,why3.length,why4.length,why5.length,why6.length,why7.length,why8.length,why9.length,why10.length,why11.length,why12.length]
				}]
			},
			options:{
				title: {
					display: true,
					text: 'リフォームのきっかけは？'
				}
			}
		});
		//　質問４
		$("#decideDataGraph").empty();
		let decide0 = [];
		let decide1 = [];
		let decide2 = [];
		let decide3 = [];
		for (val in reformData) {
			if (reformData[val][4] === "price")decide0.push(reformData[val][4]);
			if (reformData[val][4] === "function")decide1.push(reformData[val][4]);
			if (reformData[val][4] === "durable")decide2.push(reformData[val][4]);
			if (reformData[val][4] === "proposal")decide3.push(reformData[val][4]);
		}
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
					data: [decide0.length,decide1.length,decide2.length,decide3.length]
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
		let satisfaction0 = [];
		let satisfaction1 = [];
		let satisfaction2 = [];
		for (val in reformData) {
			if (reformData[val][5] === "0")satisfaction0.push(reformData[val][5]);
			if (reformData[val][5] === "1")satisfaction1.push(reformData[val][5]);
			if (reformData[val][5] === "2")satisfaction2.push(reformData[val][5]);
		}
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
					data: [satisfaction0.length,satisfaction1.length,satisfaction2.length]
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
		$("#reasonList").empty();
		let reasonList;
		for (val in reformData) {
			if(reformData[val][6]!==undefined){
				reasonList= `<li>`;
				reasonList+=reformData[val][6];
				reasonList+=`</li>`;
				$("#reasonList").append(reasonList);
			}
		}
	});//　getjson
});//　clickfunction
