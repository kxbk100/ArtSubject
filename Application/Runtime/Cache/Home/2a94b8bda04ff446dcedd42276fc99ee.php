<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zh-cn">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>往届毕业生档案信息查询系统</title>
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="stylesheet" href="<?php echo (C("HOMETOOLS")); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo (C("HOMETOOLS")); ?>css/bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo (C("HOMETOOLS")); ?>css/application.css">
	<script src="<?php echo (C("HOMETOOLS")); ?>js/libs/modernizr-2.5.3.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="container">
				<div class="logo col-lg-6"><img src="<?php echo (C("HOMETOOLS")); ?>img/logo/logo1.png"></div>
				<a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<i class="icon-reorder"></i>
				</a>
			</div>
			<!-- /.container -->
		</div>
		<!-- /#header -->
		<div id="content">
			<div class="container">
				<div class="row">
					<div style="text-align: center;">
						<div class="account-container login stacked">
							<div class="content clearfix">
								<h1>往届毕业生档案信息查询</h1>
								<div class="tabbable">
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<form id="edit-profile" class="form-horizontal" action="<?php echo (C("GOTO")); ?>Home/Index/passageStudent" method="post" enctype="multipart/form-data">
												<fieldset>

													<div class="control-group">
														<div style="padding-left: 20px;">
															<label class="control-label" for="firstname"><b>姓名</b></label>
														</div>
														<div class="controls">
															<div style="margin-right: 80px;"><input type="text" required="required" class="input-large" id="firstname" name="name"></div>
														</div>
														<!-- /controls -->
													</div>
													<!-- /control-group -->


													<div class="control-group">
														<div style="padding-left: 20px;">
															<label class="control-label" for="firstname"><b>身份证号码</b></label>
														</div>
														<div class="controls">
															<div style="margin-right: 80px;"><input type="text" required="required" class="input-large" id="firstname" name="id_number"></div>
														</div>
														<!-- /controls -->
													</div>
													<!-- /control-group -->

													<div class="control-group">
														<div style="padding-left: 20px;">
															<label class="control-label" for="firstname"><b>手机号码</b></label>
														</div>
														<div class="controls">
															<div style="margin-right: 80px;"><input type="text" required="required" class="input-large" id="firstname" name="phone"></div>
														</div>
														<!-- /controls -->
													</div>
													<!-- /control-group -->

													<div class="control-group">
														<div style="padding-left: 20px;">
															<label class="control-label" for="firstname"><b>验证码</b></label>
														</div>
														<div class="controls">
															<input type="text" required="required" class="input-small" id="firstname" name="verify" style="margin-left:-65px;margin-right: 5px;width:110px;">
															<img width="25%" class="left15" height="100" alt="验证码" src="<?php echo U('Home/Index/verify_c',array());?>" title="点击刷新">
														</div>
													</div>
													<!-- /control-group -->
												</fieldset>
										</div>
									</div>
								</div>

								<div class="login-actions">


									<button class="button btn btn-primary btn-large" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;查询&nbsp;&nbsp;&nbsp;&nbsp;</button>
								</div>

							</div>
							<!-- .actions -->


							</form>

						</div>
						<!-- /content -->

					</div>
					<!-- /account-container -->

				</div>
				<!-- /.row -->

			</div>
			<!-- /.container -->

		</div>
		<!-- /#content -->

	</div>
	<!-- /#wrapper -->


	<div id="footer">

		<div class="container">

			<div class="row">

				<div style="text-align: center;font-size: 14px">版权所有：浙江科技学院艺术设计学院/服装学院 浙ICP备11051284号</div>

			</div>
			<!-- /row -->

		</div>
		<!-- /container -->

	</div>
	<!-- /#footer -->





	<script src="<?php echo (C("HOMETOOLS")); ?>js/libs/jquery-1.7.2.min.js"></script>
	<script src="<?php echo (C("HOMETOOLS")); ?>js/libs/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="<?php echo (C("HOMETOOLS")); ?>js/libs/jquery.ui.touch-punch.min.js"></script>

	<script src="<?php echo (C("HOMETOOLS")); ?>js/libs/bootstrap/bootstrap.min.js"></script>
	<script>
		var aCity = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古", 21: "辽宁", 22: "吉林", 23: "黑龙江", 31: "上海", 32: "江苏", 33: "浙江", 34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北", 43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川", 52: "贵州", 53: "云南", 54: "西藏", 61: "陕西", 62: "甘肃", 63: "青海", 64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外" }
		function isCardID(sId) {
			var iSum = 0;
			var info = "";
			if (!/^\d{17}(\d|x)$/i.test(sId)) return false;
			sId = sId.replace(/x$/i, "a");
			if (aCity[parseInt(sId.substr(0, 2))] == null) return false;
			sBirthday = sId.substr(6, 4) + "-" + Number(sId.substr(10, 2)) + "-" + Number(sId.substr(12, 2));
			var d = new Date(sBirthday.replace(/-/g, "/"));
			if (sBirthday != (d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate())) return false;
			for (var i = 17; i >= 0; i--) iSum += (Math.pow(2, i) % 11) * parseInt(sId.charAt(17 - i), 11);
			if (iSum % 11 != 1) return false;
			//aCity[parseInt(sId.substr(0,2))]+","+sBirthday+","+(sId.substr(16,1)%2?"男":"女");//此次还可以判断出输入的身份证号的人性别
			return true;
		} 
	</script>
</body>
</html>