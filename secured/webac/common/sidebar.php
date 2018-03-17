<?php
require_once("../common/connect.php");
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<?php
			$query="SELECT
			(select count(*) from tb_brands),
			(select count(*) from tb_cars)";
			$result=mysqli_query($con,$query) or die("Error in $query");
			$count=mysqli_fetch_array($result);
		?>
		<ul class="nav menu">
			<li id="mnuDb"><a href="../dashboard/index.php"> DASHBOARD</a></li>
			<li id="mnuModel"><a href="../category/index.php"> BRANDS <span class="badge bg-info pull-right"><?php echo $count[0]; ?></span></a></li>
            <li id="mnuCar"><a href="../cars/index.php"> CARS <span class="badge bg-info pull-right"><?php echo $count[1]; ?></span></a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    