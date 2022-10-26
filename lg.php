<div class="ui bottom attached segment">
    <?php
        function getRandomStr($len, $special=true){
            $chars = array(
                "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
                "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
                "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
                "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
                "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
                "3", "4", "5", "6", "7", "8", "9"
            );
            if($special){
                $chars = array_merge($chars, array(
                    "!", "@", "#", "$", "?", "|", "{", "/", ":", ";",
                    "%", "^", "&", "*", "(", ")", "-", "_", "[", "]",
                    "}", "<", ">", "~", "+", "=", ",", "."
                ));
            }
            $charsLen = count($chars) - 1;
            shuffle($chars);                            //打乱数组顺序
            $str = '';
            for($i=0; $i<$len; $i++){
                $str .= $chars[mt_rand(0, $charsLen)];    //随机取出一位
            }
            return $str;
        }
        $randomstr = getRandomStr(35, 0);
        setcookie("lgkey", md5($randomstr), time() + 300, "/") ; 
    ?>
    <script src="/static/lib/md5/md5.min.js"></script>
    <script type="text/javascript">
        function jumurl()
        {
            window.location.href = '/logout';
        }

        document.getElementById('okBtn').onclick = function () {
            var input_link = document.getElementById("link").value;
            var input_capt = document.getElementById("captcha").value;
            // ajax提交用户名+密码到后台程序
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/lg/lg.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("link=" + input_link + "&capt=" + input_capt);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var res = xhr.responseText;
                    // 后台响应成功则跳转到登录页面
                    if (res == "绑定成功") {
                        swal({
                            title: "绑定成功!",
                            text: "绑定成功，请重新登录",
                            icon: "success"
                        });
                        setTimeout(jumurl,3000);
                    }
                    else {
                        swal({
                            title: "绑定失败",
                            text: res,
                            icon: "error"
                        });
                    }
                }
            }
        }
        var if_swal = document.getElementsByClassName('swal-overlay swal-overlay--show-modal');
        $(document).keydown(function (event)
        {
            if (event.keyCode == 13 && if_swal.length == 0)
            {
                document.getElementById("okBtn").click();
            }
        });
    </script>
    <div class="ui attached message">
        <div class="header">绑定洛谷账号 </div>
        <p>请在<strong>5分钟之内</strong>创建一个以下面密钥为内容的公开的洛谷云剪贴板</br>并把剪贴板链接的<strong>后8位字符</strong>粘贴到下面的输入框内</p>
    </div>
    <form class="ui form attached fluid segment">
        <div class="one fields">
            <div class="field">
                <input type="text" readonly="readonly" value="<?php echo $randomstr;?>" style="width:320px;height:auto;">
            </div>
        </div>
        <div class="one field">
            <div class="field">
                <input placeholder="链接" type="text" id="link" style="width:320px;height:auto;">
            </div>
        </div>
        <div class="one fields">
            <div class="field">
                <label>验证码</label>
                <input placeholder="验证码" type="text" id="captcha"
                    style="width:100px;height:auto;">&nbsp<img id="captcha_img"
                    border="1" src="/captcha/captcha.php" alt="" width="auto"
                    height="35">
                <a href="javascript:void(0)"
                    onclick="document.getElementById('captcha_img').src='/captcha/captcha.php?r='+Math.random() ">换一张?</a>
            </div>
        </div>
        <div class="ui blue submit button" id="okBtn">确定</div>
    </form>
</div>