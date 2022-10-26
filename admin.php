<!DOCTYPE html>
<?php require "../config.php"; ?>
<?php 
if(!isset($_COOKIE['username']) || getUser($_COOKIE['username'])['operator'] != 'true'){
    die('你不是管理员！');
}
$salt = "jshOrzOrz";
$token = crypt($_COOKIE["username"], $salt);
if($token != $_COOKIE["token"]){   
    die('token出错');
}
function makeName($value){
    $key = urldecode($value['keyword']);
    $reason = urldecode($value['reason']);
    switch ($value['type']) {
        case 'user':
            return "举报用户<a href=/?module=user&username=$key>$key</a>： $reason";
    }
}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
	<meta name="renderer" content="webkit" />
	<meta name="force-rendering" content="webkit" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php include('../loadJS.html') ?>
    <script src="https://cdn.bootcdn.net/ajax/libs/mdui/1.0.2/js/mdui.min.js"></script>
    <link href="https://cdn.bootcdn.net/ajax/libs/mdui/1.0.2/css/mdui.css" rel="stylesheet">
	<title>OIer meet! 管理后台</title>
</head>
<body>
<script>
    window.accept_user = function(id, key){
        $.get("/admin/accept_user.php?id=" + id + "&username=" + decodeURIComponent(key));
        document.getElementById('panel').removeChild(document.getElementById('audit-' + id));
    }
    window.refuse = function(id){
        $.get("/admin/refuse.php?id=" + id);
        document.getElementById('panel').removeChild(document.getElementById('audit-' + id));
    }
</script>
<div class="ui tab active container">
	<div style="margin-top: 28px; ">
		<div class="ui main container">
			<div style="padding-left: 1em; padding-right: 1em; ">
                <div class="ui two column grid">
                    <div class="three column row">
                        <div class="sixteen wide mobile eleven wide computer evelen wide tablet column">
                            <h4 class="ui top attached block header"><i class="ui info icon"></i>管理后台</h1>
							<div class="ui bottom attached segment">
                                审核完毕请刷新界面<br>
                                <div class="mdui-panel" mdui-panel id="panel">
                                <?php
                                    $con = getDatabase();
                                    $sql = 'SELECT * FROM auditing LIMIT 20';
                                    $res = $con->query($sql);
                                    while ($value = $res->fetch_assoc()) {
                                        $name = makeName($value);
                                        $op = $value['type'];
                                        $id = $value['id'];
                                        $keyword = urldecode($value['keyword']);
                                        echo "
                                        <div class=\"mdui-panel-item\" id=\"audit-$id\">
                                            <div class=\"mdui-panel-item-header\">$name</div>
                                            <div class=\"mdui-panel-item-body\">
                                            <div class=\"ui green submit button\" type=\"submit\" onclick=\"return accept_$op($id, '$keyword')\">执行操作</div>
                                            <div class=\"ui red submit button\" type=\"submit\" onclick=\"return window.refuse($id)\">拒绝操作</div>
                                            </div>
                                        </div>";
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<div class="ui vertical footer segment" style="margin-top: 15px; ">
	<div class="ui center aligned container">
		<span style="color: #999;">
			&copy; 2020-2022 <a title="Join Us!" href="https://gitsr.cn/oier-meet/oier-meet" target="_blank"> OIer Meet</a>.<br>
		</span>
	</div>
</div>