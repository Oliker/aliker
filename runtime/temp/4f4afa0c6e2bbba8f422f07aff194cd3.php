<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"I:\phpStudy\PHPTutorial\project\aliker\public/../application/index\view\user\index.html";i:1556346862;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login</title>
<link rel="stylesheet" type="text/css" href="/front/login/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/front/login/css/demo.css" />
<link rel="stylesheet" href="/front/login/js/vendor/jgrowl/css/jquery.jgrowl.min.css">
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/front/login/css/component.css" />
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
<style>
	input::-webkit-input-placeholder{
		color:rgba(0, 0, 0, 0.726);
	}
	input::-moz-placeholder{   /* Mozilla Firefox 19+ */
		color:rgba(0, 0, 0, 0.726);
	}
	input:-moz-placeholder{    /* Mozilla Firefox 4 to 18 */
		color:rgba(0, 0, 0, 0.726);
	}
	input:-ms-input-placeholder{  /* Internet Explorer 10-11 */ 
		color:rgba(0, 0, 0, 0.726);
	}
</style>
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>MARS HELP</h3>
						<form action="<?php echo url('user/login'); ?>" name="f" method="post">
							
							<div class="input_outer">
								<span class="u_user"></span>
								<input id="ID" name="username" class="text" style="color: #000000 !important" type="text" placeholder="请输入账户">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input id="PASSWORD" name="password" class="text" style="color: #000000 !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<button type="submit" class="act-but submit" style="color: #FFFFFF">登录</button>
							
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="/front/login/js/TweenLite.min.js"></script>
		<script src="/front/login/js/EasePack.min.js"></script>
		<script src="/front/login/js/jquery.js"></script>
		<script src="/front/login/js/rAF.js"></script>
		<script src="/front/login/js/demo-1.js"></script>
		<script src="/front/login/js/vendor/jgrowl/jquery.jgrowl.min.js"></script>
		<script src="/front/login/js/Longin.js"></script>
		<div style="text-align:center;">
     </div>
	</body>
</html>
<script type="text/javascript">
    // $(function(){
    //     var url = "<?php echo url('user/login',[],false); ?>";//组装请求地
    //     $('#LOGIN').click(function(){
    //     	 var username = $('#ID').val()//拿到用户名
    //    		 var password = $('#PASSWORD').val()//拿到密码
    //         $.ajax({
    //             type:'post',
    //             data:{'username':username,'password':password},
    //             url:url,
    //             datatype:'json',
    //             success:function(res){
    //               if (res.status===false) {
    //               	alert(res.msg)
    //               }else{
    //               	 var str=location.href;
    //               	 var id = str.substr(-1,1);
    //               	window.location.href="<?php echo url('article/detail',[],false); ?>/"+id;
    //               }
    //             }
    //         })
    //     })
    // })
</script>