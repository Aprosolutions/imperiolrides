<?php require_once("connect.php");
set_time_limit(0);

$q="select * from tb_cars";
$result=mysqli_query($con,$q);
$rowc=mysqli_num_rows($result);
$rcount=ceil(mysqli_num_rows($result)/4);

 ?>
<div class="main">
<?php 
  while ($rcount>0)
  {
	 echo" <div class='section group btm'>";
	  $count=0;
     while($count<4)
	 {
		 while($row=mysqli_fetch_array($result))
		 {  if(!empty($row))
		    {
			     echo"<div class='grid_1_of_4 images_1_of_4'>
			     <a href='detail.php?stat=$row[0]'><img src='../secured/webac/cars/$row[4]'></a>
			     <a href='detail.php?stat=$row[0]'><h3>$row[2]</h3></a>
		         </div>";
		      
			}
		
			else
	          break;
			 $count=$count+1;
			$rowc=$rowc-1;		
		 }
		 
		 $rcount=$rcount-1;
		 if($rowc<1)
		 break;
	 }
	 echo"</div>";
  }
	?>
</div>
