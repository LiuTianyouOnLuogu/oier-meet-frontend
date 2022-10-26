<!DOCTYPE html>
<?php require "./config.php"; ?>
<head>
	<script>
		var _hmt = _hmt || []; //kk
		(function() {
			var hm = document.createElement("script");
			hm.src = "https://hm.baidu.com/hm.js?4977405ba218bbc3043530a0be8e0e0d";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
	<meta name="renderer" content="webkit" />
	<meta name="force-rendering" content="webkit" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php include('loadJS.html') ?>
	<title>OIer meet!</title>
	<style>
		.inupy {
			outline-style: none;
			border: 1px solid #ccc;
			border-radius: 3px;
			padding: 13px 14px;
			font-size: 14px;
			font-weight: 700;
			font-family: "Microsoft soft";
		}

		.btn {
			/* 文字颜色 */
			color: #0099CC;
			/* 清除背景色 */
			background: transparent;
			/* 边框样式、颜色、宽度 */
			border: 2px solid #0099CC;
			/* 给边框添加圆角 */
			border-radius: 6px;
			/* 字母转大写 */
			border: none;
			color: white;
			padding: 16px 32px;
			text-align: center;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			-webkit-transition-duration: 0.4s;
			/* Safari */
			transition-duration: 0.4s;
			cursor: pointer;
			text-decoration: none;
			text-transform: uppercase;
		}

		.btn1 {
			background-color: white;
			color: black;
			border: 2px solid #008CBA;
		}

		/* 悬停样式 */
		.btn1:hover {
			background-color: #008CBA;
			color: white;
		}
	</style>
</head>

<body>
	<div class="ui borderless menu" style="height: 49px; ">
		<div class="left menu">
			<div class="header item">
				<span style="font-family: 'Exo 2'; font-size: 1.5em; font-weight: 600; ">
					<a href="https://oier-meet.cn">OIer meet!</a>
				</span>
			</div>
			<a class="active item" data-tab="home"><i class="home icon"></i>首页</a>
			<a class="item" data-tab="province"><i class="map icon"></i>名单</a>
            <a class="item" data-tab="contribute"><i class="list icon"></i>开发者</a>
			<a class="item" data-tab="communication"><i class="comments icon"></i>动态</a>
		</div>
		<div class="right menu">
		<?php if (!isset($_COOKIE["username"])){ ?>
			    <div class="ui simple dropdown item">
			    登录/注册
			    <div class="menu">
				<a class="item" href="/?module=login">登录</a>
            			<a class="item" href="/?module=register">注册</a>
            	</div>
            	</div>
		<?php	} else { ?>
				<div class="ui simple dropdown item">
				<?php echo htmlentities($_COOKIE["username"]); ?>
				<div class="menu">
                    <a class="item" href="/?module=user">个人信息</a>
					<a class="item" href="/logout">登出</a>
				</div>
			</div>
		<?php	} ?>
		</div>
	</div>
	<div class="ui tab active container" data-tab="home">
		<div style="margin-top: 28px; ">
			<div class="ui main container">
				<div style="padding-left: 1em; padding-right: 1em; ">
					<div class="ui two column grid">
						<div class="three column row">
							<div class="sixteen wide mobile eleven wide computer evelen wide tablet column">
								<h4 class="ui top attached block header"><i class="ui info icon"></i>信息</h1>
									<?php if(moduleCheck("404")) {
										include("modules/404.html");
									} else if(moduleCheck("user")) {
										include("modules/user.php");
									} else if(moduleCheck("register")) {
										include("modules/register.html");
									} else if(moduleCheck("lg")){
										include("modules/lg.php");
									} else if(moduleCheck("setting")){
										include("modules/setting.php");
									}else if(moduleCheck("login")){
										include("modules/login.html");
									}else{
										include("modules/introduction.html");
									}?>
							</div>
							<div class="right floated five wide computer right floated five wide tablet sixteen wide mobile column">
								<h4 class="ui top attached block header"><i class="ui quote left icon"></i>一言（ヒトコト）</h4>
								<div class="ui bottom attached center aligned segment">
									<div style="font-size: 1em; line-height: 1.5em;" id="hitokoto-content"> </div>
									<div style="text-align: right; margin-top: 10px; font-size: 0.9em;" id="hitokoto-from"> </div>
									<script>
										fetch('https://v1.hitokoto.cn/?c=a')
											.then(function(res) {
												return res.json();
											})
											.then(function(data) {
												var h_content = document.getElementById('hitokoto-content');
												var h_from = document.getElementById('hitokoto-from');
												h_content.innerText = data.hitokoto;
												h_from.innerText = "——" + data.from;
											})
											.catch(function(err) {
												console.error(err);
											})
									</script>
								</div>
								<h4 class="ui top attached block header"><i class="bullhorn icon"></i>最近更新</h4>
								<div class="ui bottom attached segment">
									<p>增加注册登录与绑定洛谷账号功能</p>
									<p>可以动态提交数据</p>
								</div>
								<h4 class="ui top attached block header"><i class="ui magic icon"></i>今日运势</h4>
								<div class="ui bottom attached segment">
									<div style="height: 15px; "></div>
									<div class="ui two column center aligned padded grid">
										<div class="one column row">
											<div style="text-align: center; ">
												<div style="color: #f25e65; font-size: 49px;">♂ 小吉 ♀</div>
											</div>
										</div>
										<div class="two column row">
											<div class="column">
												<div style="color: #0ccf00; ">
													<strong>宜：</strong>面基
													<br>
													<span style="color: #888; font-size: 0.7em; ">面基到一大堆神仙</span>
													<div style="margin-top: 10px; "></div>
													<strong>宜：</strong>膜拜大神
													<br>
													<span style="color: #888; font-size: 0.7em; ">接受神犇光环照耀</span>

												</div>
											</div>
											<div class="column">
												<div style="color: #f25e65; ">
													<strong>忌：</strong>吃饭
													<br>
													<span style="color: #888; font-size: 0.7em; ">小心长胖啊</span>
													<div style="margin-top: 10px; "></div>
													<strong>忌：</strong>熬夜
													<br>
													<span style="color: #888; font-size: 0.7em; ">爆肝</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							</br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ui tab container" data-tab="province">
		<div style="margin-top: 28px; ">
			<div class="ui main container">
				<div style="padding-left: 1em; padding-right: 1em; ">
					<div class="ui two column grid">
						<div class="two column row">
							<div class="eleven wide computer sixteen wide mobile eleven wide tablet column">
							<i class="ui info icon"></i>信息</h1><div class="ui bottom attached segment">
									<p>如果没有找到你朋友的信息，说明他并没有填写信息。</p>
									<p>在抱怨这里信息少之前，最好先填写自己的信息。</p>
									<p>右上角进入个人主页以绑定洛谷账号，进行主页设置以填写省份信息。</p>
									<div class="ui styled fluid accordion">
										<!---<script src="https://www.oier-meet.tk/script/ui.js"></script>--->
										<script>
											$(document).ready(() => {
												$('.ui.checkbox').checkbox();
												$('.menu .item').tab();
												$('.button').popup();
												$('.ui.menu a.item').on('click', function() {
													$(this)
														.addClass('active')
														.siblings()
														.removeClass('active');
												});
											});
											$('.ui.accordion')
												.accordion();
											$('.trigger.example .accordion')
												.accordion({
													selector: {
														trigger: '.title .icon'
													}
												});
											$('.ui.accordion').accordion('refresh');
										</script>
										<?php
										$con = getDatabase();
										$province_name=array("AH 安徽","BJ 北京","CQ 重庆","FJ 福建","GD 广东","GS 甘肃","GX 广西","GZ 贵州","HA 河南","HE 河北","HB 湖北","HI 海南","HK 中国香港","HL 黑龙江","HN 湖南","JL 吉林","JS 江苏","JX 江西","LN 辽宁","LM 内蒙古","MO 中国澳门","NX 宁夏","QH 青海","SC 四川","SD 山东","SH 上海","SN 陕西","SX 山西","TJ 天津","TW 中国台湾","XJ 新疆","XZ 西藏","YN 云南","ZJ 浙江");
										echo '<div class="ui styled fluid accordion">';
										for($i = 0;$i < count($province_name);$i++){
											echo '<div class="title">';
											echo '	<i class="dropdown icon"></i>';
											echo "	" . $province_name[$i];
											echo '</div>';
											echo '<div class="content">';
											$pro = substr($province_name[$i], 0, 2);
											$res = DatabaseGet("user", "province", $pro, true);
											if ($res->num_rows > 0) {
												echo '<table class=\'ui celled padded table\'>
												<thead>
													<tr>
														<th class=\'single line\'>用户名</th>
														<th>洛谷昵称</th>
														<th>学校</th>
													</tr>
												</thead>
												<tbody>';
												while ($row = $res->fetch_assoc()) {
													echo "<tr><td><a href=https://oier-meet.cn/?module=user&username=" . $row["username"] . ">".htmlentities(urldecode($row["username"]))."</a></td><td><a href='https://www.luogu.com.cn/user/".$row['id']."'>" . urldecode($row["lgname"]) . "</a></td><td>" . htmlentities(urldecode($row["examPoint"])) . "</td></tr>";
												}
												echo '</tbody></table>';
											}
											else{
												echo '<h3>暂无数据</h3>';
											}
											echo '</div>';
										}
										echo '</div>';
										?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div></div>
    <div class="ui tab container" data-tab="contribute">
		<div style="margin-top: 28px; ">
			<div class="ui main container">
				<div style="padding-left: 1em; padding-right: 1em; ">
					<div class="ui two column grid">
						<div class="two column row">
							<div class="eleven wide column">
							<i class="ui info icon"></i>信息</h1><div class="ui bottom attached segment">
									<div class="ui cards">
										<div class="card">
											<div class="content">
												<img class="right floated mini ui image" src="https://i.loli.net/2021/08/01/mBuv1YnIkZWfMHb.png">
												<div class="header">MStar</div>
												<div class="meta"> Developer  </div>
												<div class="description">一只OIer</div>
											</div>
											<div class="extra content">
												<div class="ui two buttons">
													<div class="ui basic button">
														<a href="https://imoier.xyz">Homepage</a>
													</div>
													<div class="ui basic button">
														<a href="mailto:819433558@qq.com">Email</a>
													</div>
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="content">
												<img class="right floated mini ui image" src="https://cravatar.cn/avatar/324e28c2ec4493f6bd78f98d34a089b7?d=identicon">
												<div class="header">Histcat</div>
												<div class="meta"> Developer </div>
												<div class="description">超级大鸽子</div>
											</div>
											<div class="extra content">
												<div class="ui two buttons">
													<div class="ui basic button">
														<a href="http://www.histcat.top">Blog</a>
													</div>
													<div class="ui basic button">
														<a href="https://github.com/JesseJeson">Github</a>
													</div>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="content">
												<img class="right floated mini ui image" src="https://cdn.luogu.com.cn/upload/usericon/206814.png">
												<div class="header">LiuTianyou</div>
												<div class="meta"> Developer </div>
												<div class="description">一位奇怪的小哥哥</div>
											</div>
											<div class="extra content">
												<div class="ui two buttons">
													<div class="ui basic button">
														<a href="https://www.luogu.com.cn/user/206814">Luogu</a>
													</div>
													<div class="ui basic button">
														<a href="https://gitsr.cn/">星河 Gitea</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ui tab container" data-tab="communication">
		<div style="margin-top: 28px; ">
			<div class="ui main container">
				<div style="padding-left: 1em; padding-right: 1em; ">
					<div class="ui two column grid">
						<div class="two column row">
							<div class="eleven wide computer sixteen wide mobile eleven wide tablet column">
							<i class="ui info icon"></i>信息</h1><div class="ui bottom attached segment">
								<script>
									$(window).scroll(function(){
										var scrollTop = $(this).scrollTop();
										var scrollHeight = $(document).height();
										var windowHeight = $(this).height();
										if(scrollTop + windowHeight == scrollHeight){
											var msg = document.createElement('div');
											msg.innerHTML =
												`<div class="swal2-container swal2-top-end swal2-fade swal2-shown" style="overflow-y: auto;">
            <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-show" tabindex="-1" role="alert" aria-live="polite" style="display: flex;">
                <div class="swal2-header">
                    <ul class="swal2-progresssteps" style="display: none;"></ul>
            <div class="swal2-icon swal2-info" style="display: flex;">
                <span class="swal2-icon-text">i</span>
                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                <span class="swal2-success-line-tip"></span>
                <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div>
            <h2 class="swal2-title" id="swal2-title">你已滚动到页面底部！</h2>
            <button type="button" class="swal2-close" style="display: flex;" onclick="document.body.removeChild(document.body.lastElementChild)">×</button>
        </div>`;
											document.body.appendChild(msg);
										}
										left += step, right += step;
										add_post(left, right);
									});
									var left = 1, right = 5, step = 5;
									add_post(left, right);
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div></div>
<div class="ui vertical footer segment" style="margin-top: 15px; ">
	<div class="ui center aligned container">
		<span style="color: #999;">
			&copy; 2020-2022 <a title="Join Us!" href="https://gitsr.cn/oier-meet" target="_blank"> OIer Meet</a>.<br>
		</span>
	</div>
</div>
</body>