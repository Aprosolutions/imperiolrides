<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin|Login</title>

<link href="ASSETS/css/bootstrap.min.css" rel="stylesheet">

<link href="ASSETS/css/adminTheme.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php
	require_once("common/connect.php");
	if(isset($_POST["subLogin"]))
	{
		$uname=$_POST["txtUname"];
		$password=$_POST["txtPassword"];
		$query="select id from tb_det where uname='$uname' and access='$password'" ;
		$result=mysqli_query($con,$query) or die("Error in $query");
		if(mysqli_num_rows($result)>0)
		{
			header("location:dashboard/index.php");
		}
		else
		{
			$error="<div class='panel-footer'>
				<h5 class='alert alert-danger' align='center'>
				Invalid Usename or password</h5>
			</div>";
		}
	}
	?>
	<div class="row " >
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 ">
			<div class="login-panel panel panel-primary">
				<div class="panel-heading ">ADMINISTRATOR LOGIN</div>
				<div class="panel-body">
					<form method="post" action="">
						<fieldset>
							<div class="form-group">
								<input name="txtUname" type="text" autofocus required class="form-control" id="txtUname" placeholder="UserName">
							</div>
							<div class="form-group">
								<input name="txtPassword" type="password" required class="form-control" id="txtPassword" placeholder="Password" value="">
							</div>
							<div align="right">
                             <a href="." class="btn btn-primary pull-right">RESET</a>
                             <span class=" pull-right">&nbsp;&nbsp;</span>
							  <input type="submit" class="btn btn-primary pull-right" value="LOGIN" id="subLogin" name="subLogin">
                              
						  </div>
						</fieldset>
					</form>
                    </div>
                    <?php echo $error; ?>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="ASSETS/js/jquery-1.11.1.min.js"></script>
	<script src="ASSETS/js/bootstrap.min.js"></script>

	
	
</body>

</html>
