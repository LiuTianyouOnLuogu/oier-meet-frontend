<div class="ui bottom attached segment">
    <h3> 主页设置 </h3>
    <br>
    <iframe id="rfFrame" name="rfFrame" width="0" height="0" scrolling="auto" frameborder="0" marginheight="0" marginwidth="0"></iframe>
    <form target="rfFrame">
        <div id="editor-container" style="height: 700px;" target="rfFrame">
            <div id="editor"></div>
        </div>
        <script>
            <?php
                function getHome(){
                    $target = DatabaseGet('user', 'username', $_COOKIE['username'])['homepage'];
                    return !isset($target) ? "hello, world" : $target;
                }
            ?>
            window.markdownEditor = new MarkdownPalettes("#editor");
            window.markdownEditor.content = "<?php echo urldecode(getHome()); ?>";
            window.submit = function(){
                $.post("/setting/setting.php",{
                    'data': window.markdownEditor.content,
                    'val_province': document.getElementById('val_province').value,
                    'examPoint': document.getElementById('examPoint').value
                },
                function(result){
                    swal("提交成功","","success");
                });
            }
        </script>
        <div class="ui search selection dropdown" id="province">
            <input type="hidden" id="val_province" onchange="return rebuild()">
            <div class="default text">选择省份</div>
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item" data-value="AH">AH 安徽</div>
                <div class="item" data-value="BJ">BJ 北京</div>
                <div class="item" data-value="CQ">CQ 重庆</div>
                <div class="item" data-value="FJ">FJ 福建</div>
                <div class="item" data-value="GD">GD 广东</div>
                <div class="item" data-value="GS">GS 甘肃</div>
                <div class="item" data-value="GX">GX 广西</div>
                <div class="item" data-value="GZ">GZ 贵州</div>
                <div class="item" data-value="HA">HA 河南</div>
                <div class="item" data-value="HE">HE 河北</div>
                <div class="item" data-value="HB">HB 湖北</div>
                <div class="item" data-value="HI">HI 海南</div>
                <div class="item" data-value="HK">HK 中国香港</div>
                <div class="item" data-value="HL">HL 黑龙江</div>
                <div class="item" data-value="HN">HN 湖南</div>
                <div class="item" data-value="JL">JL 吉林</div>
                <div class="item" data-value="JS">JS 江苏</div>
                <div class="item" data-value="JX">JX 江西</div>
                <div class="item" data-value="LN">LN 辽宁</div>
                <div class="item" data-value="LM">LM 内蒙古</div>
                <div class="item" data-value="MO">MO 中国澳门</div>
                <div class="item" data-value="NX">NX 宁夏</div>
                <div class="item" data-value="QH">QH 青海</div>
                <div class="item" data-value="SC">SC 四川</div>
                <div class="item" data-value="SD">SD 山东</div>
                <div class="item" data-value="SH">SH 上海</div>
                <div class="item" data-value="SN">SN 陕西</div>
                <div class="item" data-value="SX">SX 山西</div>
                <div class="item" data-value="TJ">TJ 天津</div>
                <div class="item" data-value="TW">TW 中国台湾</div>
                <div class="item" data-value="XJ">XJ 新疆</div>
                <div class="item" data-value="XZ">XZ 西藏</div>
                <div class="item" data-value="YN">YN 云南</div>
                <div class="item" data-value="ZJ">ZJ 浙江</div>
            </div>
        </div><br>
        <div class="ui input focus">
            <input id="examPoint" placeholder="请输入你的学校">
        </div><br><br>
        <script>$('.ui.dropdown').dropdown();</script>
        <div class="ui blue submit button" id="subBtn" type="submit" onclick="return window.submit()">提交</div>
    </form>
</div>