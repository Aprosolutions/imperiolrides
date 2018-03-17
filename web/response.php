<?php require_once("header1.php");?>
<?php require_once("connect.php");?>
<?php if(isset($_GET['resp']))
{
	$id=$_GET['resp'];
	$qu="select * from tb_cars where cid=$id";
	$res=mysqli_query($con,$qu);
	$row=mysqli_fetch_array($res);
	$name=$row[2];
}
?>
<div class="main">
<div class="main1">
 	<div class="section group1">				
				<div class="col span_1_of_3">
				
      			
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Express Your Intrest</h3>
					      <form id="responseform" method="post" action="process.php">
					    	<div>
						    	<span><label>NAME</label></span>
								<input type="hidden" id="car" value="<?php echo($name); ?>">
								<input type="hidden" id="carid" value="<?php echo($id); ?>">
						    	<span><input type="text" class="textbox" id="customer"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" class="textbox" id="email"></span>
						    </div>
						    <div>
						     	<span><label>MOBILE</label></span>
						    	<span><input type="text" class="textbox" id="phone"></span>
					              
							  </div>
						    
						   <div>
						   		<span><input type="submit" value="Send me" id="subresp"></span>
						  </div>
					    </form>
				    </div>
  				</div>		
  			<div class="clear"></div>		
	</div>
</div>
</div>

<?php require_once("footer.php");?>

