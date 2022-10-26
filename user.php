<div class="ui bottom attached segment">
    <?php 
    if(!isset($_GET['username']) || !DatabaseExists('user', 'username', $_GET['username'])){
        $username = $_COOKIE['username'];
    }else{
        $username = $_GET['username'];
    } 
    $result = DatabaseGet('user', 'username', $username);
    ?>
    <h3> 个人信息 </h3>
    <br>
    <p> 用户名：
    <?php echo htmlentities($username);?>
    </br>
    <?php
        echo "洛谷账号：" . (!isset($result['lgname']) ? "未绑定" : urldecode($result['lgname'])).'<br>';
        echo "省份：" . (!isset($result['province']) ? "未设置" : $result['province']).'<br>';
        echo "学校：" . (!isset($result['examPoint']) ? "未设置" : htmlentities(urldecode($result['examPoint']))).'<br>';
    ?>
    </p>
    <script>document.write(window.markdownit().render('<?php echo urldecode($result['homepage']); ?>'));</script><br>
    <?php
    if($username == $_COOKIE['username']){
        echo '<a href="/?module=lg"><div class="ui blue submit button">绑定洛谷账号</div></a><br><br>';
        echo '<a href="/?module=setting"><div class="ui blue submit button">主页设置</div></a>';
    }else{
        echo '<br><br><a href="/report/report.php?username='.urlencode($username).'"><div class="ui blue submit button">举报此人</div></a>';
    }
    ?>
</div>