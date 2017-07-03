	<a id="menu-toggle2" href="#" class="btn btn-dark btn-lg toggle2"><i class="fa fa-comments"></i></a>
	<div id="sidebar-wrapper2">
		<ul class="sidebar-nav">
			<a id="menu-close2" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
			<li class="sidebar-brand">
				<a href="#top" onclick=$ ( "#menu-close").click();>チャットサポート</a>
			</li>
			<li>
<!--				名前<br>-->
				<input type="hidden" size='32' id="username" data-intro="はじめにユーザー名を入力し忘れたら入力してね！" data-step="1">
			</li>
			<?php
//				if(isset($_SESSION["permFlg"]) && $_SESSION["permFlg"]==1){
					echo '<li><input type="text" id="roomId"></li>';
//				}
			?>
			<li>
				質問をどうぞ！<br>
				<textarea id="text" cols="30" rows="1" placeholder='ここに質問を書いてね！'></textarea>
			</li>
			<li id="googleMap">
				<div id="floating-panel">
					<input class="mb10" id="address" type="textbox" value="Sydney, NSW">
					<input id="submit" type="button" value="自宅を見る" class="pulse">
				</div>
				<div id="map" width="200" height="150"></div>
				<button id="sendMap" class="pulse">地図を読み込む</button>
			</li>
			<li>
				<label class="control-label" for="upLoad2">写真を読み込む</label>
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
			<li id="mapSS2">
				<img id="mapSS" src="">
			</li>
			<li>
				<button id="send" class="tossing">送信</button>
			</li>
			<li id="output" data-intro="ここにメッセージが表示されるよ！" data-step="4">
			</li>
		</ul>
	</div>
