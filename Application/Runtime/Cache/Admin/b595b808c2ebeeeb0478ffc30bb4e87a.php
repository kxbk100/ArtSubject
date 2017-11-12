<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zh-cn">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>后台登录</title>
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



								<h1>后台登录</h1>
								<div class="tabbable">
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<form id="edit-profile" class="form-horizontal" action="<?php echo (C("GOTO")); ?>Admin/Index/getInfo" method="post" enctype="multipart/form-data">
												<fieldset>

													<div class="control-group">
														<div style="padding-left: 20px;">
															<label class="control-label" for="firstname"><b>账号</b></label>
														</div>
														<div class="controls">
															<div style="margin-right: 80px;"><input type="text" class="input-large" id="firstname" name="account"></div>
														</div>
														<!-- /controls -->
													</div>
													<!-- /control-group -->


													<div class="control-group">
														<div style="padding-left: 20px;">
															<label class="control-label" for="firstname"><b>密码</b></label>
														</div>
														<div class="controls">
															<div style="margin-right: 80px;"><input type="password" class="input-large" id="firstname" name="password"></div>
														</div>
														<!-- /controls -->
													</div>
													<!-- /control-group -->


												</fieldset>

										</div>
									</div>
								</div>

								<div class="login-actions">


									<button class="button btn btn-primary btn-large">&nbsp;&nbsp;&nbsp;&nbsp;登录&nbsp;&nbsp;&nbsp;&nbsp;</button>
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


</body>

</html>