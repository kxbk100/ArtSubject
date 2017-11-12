<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zh-cn">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>学生信息</title>
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
					<span style="float: right;font-size: 14px;">欢迎您，管理员！</span>
				</div>

			</div>
			<!-- /.container -->

		</div>
		<!-- /#masthead -->




		<div id="content">

			<div class="container">
				<h2 class="text-center"><?php echo ($year); ?>届毕业生学生信息</h2>
				<div class="row">

					<div class="col-xs-4 pull-left">
						<form class="form-inline" action="" method="get">
							<label style="margin-left: 30px;">请选择毕业年份：</label>
							<select onchange="goto(this)"> 
									<option value="2015" id="2015">2015</option> 
									<option value="2016" id="2016">2016</option> 
									<option value="2017" id="2017">2017</option>
							</select>
						</form>
					</div>
					<div class="col-xs-8 pull-right">
						<button type="button" class="btn btn-primary" style="margin-bottom: 10px;" onclick="window.location.href='<?php echo (C("goto")); ?>Admin/Index/expStudents'">下载表格</button>
					</div>
				</div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>编号</th>
							<th>姓名</th>
							<th>学号</th>
							<th>专业班级</th>
							<th>电话</th>
							<th>身份证号</th>
							<th>查询情况</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$student): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($student["id"]); ?></td>
								<td><?php echo ($student["name"]); ?></td>
								<td><?php echo ($student["student_id"]); ?></td>
								<td><?php echo ($student["major_class"]); ?></td>
								<td><?php echo ($student["phone"]); ?></td>
								<td><?php echo ($student["id_number"]); ?></td>
								<td><?php echo ($student["sign"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>

				<br />
				<div class="yahoo2 text-center">
					<?php echo ($page); ?>
				</div>
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

	<script type="text/javascript">
		function goto(year){
			var selectedOption=year.options[year.selectedIndex];
			if(selectedOption.value == "2015"){
				//TODO 跳转
				window.location.href="/ArtSubject/index.php/Admin/Index/passageAdmin?year=2015";
			}else if(selectedOption.value == "2016"){
				window.location.href="/ArtSubject/index.php/Admin/Index/passageAdmin?year=2016";
			}else if(selectedOption.value == "2017"){
				window.location.href="/ArtSubject/index.php/Admin/Index/passageAdmin?year=2017";
			}
		}

		var year="<?php echo $year;?>";
		document.getElementById(year).selected = "true";

	</script>


</body>

</html>