<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zh-cn">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>查询结果</title>
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

				<div class="logo"><img src="<?php echo (C("HOMETOOLS")); ?>img/logo/logo1.png"></div>


				<a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<i class="icon-reorder"></i>
				</a>



			</div>
			<!-- /.container -->

		</div>
		<!-- /#header -->




		<div id="masthead">

			<div class="container">

				<div class="masthead-pad">
					<a href="http://art.zust.edu.cn" style="font-size: 14px;">学院首页</a>
					<span style="float: right;font-size: 14px;">欢迎您，<?php echo ($result[0]['name']); ?>！</span>
				</div>

			</div>
			<!-- /.container -->

		</div>
		<!-- /#masthead -->




		<div id="content">

			<div class="container">


				<div class="row">

					<div style="text-align: center">

						<div class="">

							<h2>查询结果</h2>

							<table class="table table-bordered table-striped">



								<tbody>
									<tr>
										<td class="value">
											<span><b>姓名</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['name']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>学号</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['student_id']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>专业班级</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['major_class']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>手机号</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['phone']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>身份证号</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['id_number']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>档案去向</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['direction']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>快递单号(EMS)</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['ems_id']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>机要编号</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['jiyao_id']); ?></td>
									</tr>
									<tr>
										<td class="value">
											<span><b>备注</b></span>
										</td>
										<td class="description"><?php echo ($result[0]['remark']); ?></td>
									</tr>

								</tbody>
							</table>

						</div>
						<!-- /.span4 -->


					</div>
					<!-- /.span12 -->

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