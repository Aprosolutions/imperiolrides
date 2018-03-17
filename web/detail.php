<?php require_once("header1.php");?>
<?php require_once("connect.php");?>
<?php if(isset($_GET['stat']))
{
	$id=$_GET['stat'];
	$qu="select * from tb_cars where cid=$id";
	$res=mysqli_query($con,$qu);
	$row=mysqli_fetch_array($res);
}
?>

<div class="main">
<div class="main1">
<div class="details">
				  <div class="product-details">				
					<div class="images_3_of_2">
						<div id="container">
						<div class="flexslider">
							  <ul class="slides">
			          <?php	echo"	<li data-thumb='images/d_pic1.jpg'>
									<div class='thumb-image'> <img src='../secured/webac/cars/$row[4]' data-imagezoom='true' class='img-responsive'> </div>
								</li> ";
					 ?>
						
								
							  </ul>
							<div class="clearfix"></div>
					</div>		
					</div>
				</div>
				<div class="desc span_3_of_2">
					<h2> <?php echo($row[2]) ?> </h2>
										
					
					<div class="available">
						<br>
					<div class='button1'><span><a href='<?php echo("response.php?resp=").$row[1]?>' class='button button-rounded' >BOOK NOW</a></span></div> ?>					
					<div class="clear"></div>
				</div>
				 
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Short Description</li>
				
					
					<div class="clear"></div>
				</ul>
				<div class="resp-tabs-container">
					<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Details</h2><div class="product-desc resp-tab-content resp-tab-content-active" style="display:block" aria-labelledby="tab_item-0">
						<p><?php echo($row[3]); ?></p>					</div>


		 </div>
	 </div>
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
   
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php require_once("footer.php");?>
