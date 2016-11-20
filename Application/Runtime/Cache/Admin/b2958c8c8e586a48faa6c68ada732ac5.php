<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>温馨提示</title>
    <link rel="stylesheet" type="text/css" href="/thinkphp3.2.3/Public/css/successCss.css"/>
</head>
<body>
<div class="wrap">
    <div class="title">
        温馨提示
    </div>
    <div class="content">
        <div class="icon"></div>
        <div class="message">
            <p>

                <?php echo $error;?>
            </p>
            <a id="href" class="btn btn-default btn-sm" href="<?php echo($jumpUrl); ?>">立即跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
        </div>
    </div>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
    var time = --wait.innerHTML;
    if(time <= 0) {
        location.href = href;
        clearInterval(interval);
    };
}, 1000);
})();
</script>
</body>
</html>