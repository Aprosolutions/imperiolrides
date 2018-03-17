<?php require_once("header1.php");?>
<?php require_once("connect.php");?>
<?php if(isset($_POST['subresp'])==true)
{
	$id=$_POST['carid'];
	$name=$_POST['customer'];
	$mobile=$_POST['phone'];
	$email=$_POST['email'];
	$qu="insert into tb_request (carid,cusname,email,phone,status)values($id,'$name','$email','$mobile',0)";
	echo($qu);
	mysqli_query($con,$qu) or die("ERROR IN $qu");
	
}
else
{
	echo('errpr');
}
?>
<div class="main">
<div class="main1">
 	<div class="section group1">				
				<h1 align="center" style="color: aliceblue;font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif' ">
			YJJAJKJAKJKJ	
					<?php echo($qu); ?>
		</h1 ><div class="clear"></div>		
	</div>
</div>
</div>

<?php require_once("footer.php");?>

