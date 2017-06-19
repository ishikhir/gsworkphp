<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>いえメンなび｜一軒家のメンテナンスナビ</title>
	<!-- Bootstrap Core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="themesid">

	<!-- Custom CSS -->
	<!-- <link href="css/stylish-portfolio.css" rel="stylesheet"> -->

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="animations.css">
	<link rel="stylesheet" href="introjs.css">
	<link rel="stylesheet" href="oneweek.css">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<!-- Navigation -->
	<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
	<nav id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
			<li class="sidebar-brand">
				<a href="#top" onclick=$ ( "#menu-close").click();>メニュー</a>
			</li>
			<li>
				<a href="#top" onclick=$ ( "#menu-close").click();>Home</a>
			</li>
			<li>
				<a href="#about" onclick=$ ( "#menu-close").click();>About</a>
			</li>
			<li>
				<a href="#services" onclick=$ ( "#menu-close").click();>Services</a>
			</li>
			<li>
				<a href="#portfolio" onclick=$ ( "#menu-close").click();>Portfolio</a>
			</li>
			<li>
				<a href="#contact" onclick=$ ( "#menu-close").click();>Contact</a>
			</li>
		</ul>
	</nav>

	<!-- login right -->
	<a id="menu-toggle3" href="#" class="btn btn-dark btn-lg toggle3"><i class="fa fa-user"></i></a>
	<div id="sidebar-wrapper3">
		<div class="sidebar-nav">
			<a id="menu-close3" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
			<p class="sidebar-brand">ユーザーメニュー</p>
			<div class="cotainer">
				<form id="userLogin" class="form-inline row" action="login_check.php" method="post">
					<div class="form-group form-group-lg col-sm-11">
						<label class="control-label" for="homeName">ID</label>
						<div class="inputWrap">
							<input class="form-control" type="text" name="userId" id="userId" required>
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-11">
						<label class="control-label" for="homeName">PASS</label>
						<div class="inputWrap">
							<input class="form-control" type="password" name="userPass" id="userPass" required>
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-11">
						<button class="btn btn-default" id="login">logIn</button>
					</div>
				</form>
				<a href="signin.php" class="btn btn-default" id="userSignin">SignIn</a>
			</div>
		</div>
	</div>

	<!-- chat_left -->
	<a id="menu-toggle2" href="#" class="btn btn-dark btn-lg toggle2"><i class="fa fa-comments"></i></a>
	<div id="sidebar-wrapper2">
		<ul class="sidebar-nav">
			<a id="menu-close2" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
			<li class="sidebar-brand">
				<a href="#top" onclick=$ ( "#menu-close").click();>チャットサポート</a>
			</li>
			<li>
				名前<br>
				<input type="text" size='32' id="username" data-intro="はじめにユーザー名を入力し忘れたら入力してね！" data-step="1">
			</li>
			<li>
				質問をどうぞ！<br>
				<textarea id="text" cols="30" rows="1" placeholder='ここに質問を書いてね！'></textarea>
			</li>
			<li>
				<label class="control-label" for="upLoad2">仕様書を読み込む</label>
				<div class="inputWrap">
					<input type="file" id="upLoad2">
				</div>
			</li>
			<li id="loadComp2">
				<label class="control-label" for="loadImg2">読み込み画像</label>
				<div class="inputWrap">
					<div id="loadImg2"></div>
				</div>
			</li>
			<li>
				<button id="send" class="tossing">送信</button>
			</li>
			<li id="output" data-intro="ここにメッセージが表示されるよ！" data-step="4">
			</li>
		</ul>
	</div>

	<!-- Header -->
	<header id="top" class="header">
		<div class="text-vertical-center">
			<h1>いえメンなび</h1>
			<h3>あなたの家のメンテナンスをナビゲートします</h3>
			<br>
			<a href="#callout" class="btn btn-primary btn-lg">すぐに使う</a>
		</div>
	</header>

	<!-- About -->
	<section id="about" class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>家を買うから住みこなすへ</h2>
					<p class="lead">たった５分であなたの家に必要なメンテナンスが分かります。</p>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>

	<!-- Services -->
	<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-10 col-lg-offset-1">
					<h2>いえメンNAVIの３つの特徴</h2>
					<hr class="small">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="service-item">
								<span class="fa-stack fa-4x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-user fa-stack-1x text-primary"></i>
								</span>
								<h4>
									<strong>登録不要であんぜん</strong>
								</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
								<a href="#" class="btn btn-light">Learn More</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="service-item">
								<span class="fa-stack fa-4x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-camera-retro fa-stack-1x text-primary"></i>
								</span>
								<h4>
									<strong>写真を撮るだけかんたん</strong>
								</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
								<a href="#" class="btn btn-light">Learn More</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="service-item">
								<span class="fa-stack fa-4x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-comments fa-stack-1x text-primary"></i>
								</span>
								<h4>
									<strong>チャットであんしん</strong>
								</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
								<a href="#" class="btn btn-light">Learn More</a>
							</div>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.col-lg-10 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>

	<!-- Callout -->
	<div id="callout" class="callout">
		<form action="index.php" method="post" class="text-vertical-center">
			<h2>あなた家の情報を入力してね！</h2>
			<div class="cotainer">
				<form id="homeBasicInfo" class="form-inline row">
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="homeName">家に名前をつけよう！</label>
						<div class="inputWrap">
							<input class="form-control" type="text" id="homeName" name="homeName" placeholder="俺のいえ">
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="homeAge">築年数</label>
						<div class="inputWrap">
							<select id="homeAge" name="homeAge" class="form-control"></select>
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="homeSize">建坪</label>
						<div class="inputWrap">
							<select id="homeSize" name="homeSize" class="form-control"></select>
						</div>
					</div>
				</form>
			</div>
			<div class="cotainer">
				<form id="uploadImg" class="form-inline row">
					<div class="form-group form-group-lg col-sm-6">
						<label class="control-label" for="upLoad">仕様書を読み込む</label>
						<div class="inputWrap">
							<input class="form-control" type="file" id="upLoad">
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-6" id="nothingWrap">
						<label class="control-label" for="nothing">仕様書がない！</label>
						<div class="inputWrap">
							<input class="form-control" type="button" id="nothing" value="手入力する">
						</div>
					</div>
					<div id="loadComp" class="form-group form-group-lg col-sm-6">
						<label class="control-label" for="loadImg">読み込み画像</label>
						<div class="inputWrap">
							<div id="loadImg"></div>
						</div>
					</div>
					<div id="ocrComp" class="form-group form-group-lg col-sm-12">
						<label class="control-label" for="ocrImg">文字認識完了</label>
						<div class="inputWrap">
							<div id="ocrImg"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="cotainer">
				<form id="homeOption" class="form-inline row">
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="roof">屋根</label>
						<div class="inputWrap">
							<select id="roof" name="roof" class="form-control">
								<option value="clay">瓦</option>
								<option value="slate">スレート</option>
								<option value="metal">金属</option>
								<option value="single">シングル</option>
								<option value="otherTiles">その他</option>
							</select>
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="wall">外壁</label>
						<div class="inputWrap">
							<select id="wall" name="wall" class="form-control">
								<option>モルタル</option>
								<option>サイディング</option>
								<option>タイル</option>
								<option>その他</option>
							</select>
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="toi">雨どい</label>
						<div class="inputWrap">
							<select id="toi" name="toi" class="form-control">
								<option>半月</option>
								<option>塩ビ</option>
								<option>金属</option>
								<option>その他</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="cotainer">
				<form id="doWhatArea" class="form-inline row">
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="roofDo">屋根工事</label>
						<div class="inputWrap">
							<select id="roofDo" name="roofDo" class="form-control">
								<option value="paint">塗装＋棟交換</option>
								<option value="cover">カバー工法</option>
								<option value="replace">葺き替え</option>
							</select>
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="wallDo">外壁工事</label>
						<div class="inputWrap">
							<input type='text' id="wallDo" name="wallDo" class="form-control">
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="toiDo">雨どい工事</label>
						<div class="inputWrap">
							<input type="text" id="toiDo" name="toiDo" class="form-control">
						</div>
					</div>
				</form>
			</div>
			<div class="cotainer">
				<form id="priceArea" class="form-inline row">
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="roofPrice">屋根金額</label>
						<div class="inputWrap">
							<input type='text' id="roofPrice" name="roofPrice" class="form-control">
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="wallPrice">外壁金額</label>
						<div class="inputWrap">
							<input type='text' id="wallPrice" name="wallPrice" class="form-control">
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-4">
						<label class="control-label" for="toiPrice">雨どい金額</label>
						<div class="inputWrap">
							<input type="text" id="toiPrice" name="toiPrice" class="form-control">
						</div>
					</div>
					<div class="form-group form-group-lg col-sm-12">
						<button type="submit" id="calcBtn">見積りを計算する！</button>
						<label class="control-label" for="totalPrice">合計金額</label>
						<div class="inputWrap">
							<input type="text" id="totalPrice" name="totalPrice" class="form-control">
						</div>
					</div>
				</form>
			</div>
		</form>
	</div>

	<!-- Portfolio -->
	<section id="portfolio" class="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h2>Our Work</h2>
					<hr class="small">
					<div class="row">
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#">
									<img class="img-portfolio img-responsive" src="img/portfolio-1.jpg">
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#">
									<img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#">
									<img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#">
									<img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
								</a>
							</div>
						</div>
					</div>
					<!-- /.row (nested) -->
					<a href="#" class="btn btn-dark">View More Items</a>
				</div>
				<!-- /.col-lg-10 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>

	<!-- Call to Action -->
	<aside class="call-to-action bg-primary">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h3>The buttons below are impossible to resist.</h3>
					<a href="#" class="btn btn-lg btn-light">Click Me!</a>
					<a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
				</div>
			</div>
		</div>
	</aside>

	<!-- Map -->
	<section id="contact" class="map">
		<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
		<br />
		<small>
			<a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
		</small>
	</section>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h4><strong>Start Bootstrap</strong>
					</h4>
					<p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
					<ul class="list-unstyled">
						<li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>
						<li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">name@example.com</a>
						</li>
					</ul>
					<br>
					<ul class="list-inline">
						<li>
							<a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
						</li>
					</ul>
					<hr class="small">
					<p class="text-muted">Copyright &copy; Your Website 2014</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="func.js"></script>
	<script src="database.js"></script>
	<script src="intro.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src='https://cdn.rawgit.com/naptha/tesseract.js/1.0.10/dist/tesseract.js'></script>
	<script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
	<script src="oneweek.js"></script>
</body>

</html>
