<?php require_once("../common/header.php"); ?>
<?php require_once("../common/sidebar.php"); ?>
<?php require_once("../common/session.php"); ?>

<div class="panel panel-primary">
<div class="panel-heading">CARS</div>
<div class="panel-body">
<?php
require_once("../common/connect.php");
if(isset($_GET["ecid"]))
{
	$caption="UPDATE";
	$ecid=$_GET["ecid"];
	$query="select * from tb_cars where cid=$ecid";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	$bid=$row[1];
	$Model=$row[2];
	$Description=$row[3];
	$pic1=$row[4];
	$status=$row[5];
}
else
$caption="SAVE";
?>
<form method="post" action="" enctype="multipart/form-data">
<table width="382" border="0" align="center">

  <tr>
    <th height="46" scope="row">BRAND</th>
    <td><select name="selBid" required autofocus class="form-control" id="selBid">
     <?php
		$query="select bid,bname from tb_brands";
		$result=mysqli_query($con,$query);
		while(($row=mysqli_fetch_array($result)))
		{
		echo "<option value='$row[0]'>$row[1]</option>";	
		}
	 ?> 
    </select></td>
  </tr>
  <tr>
    <th width="153" scope="row">MODEL</th>
    <td width="219"><input name="txtModel" type="text"  required id="txtModel" class="form-control" value="<?php echo $Model?>"></td>
  </tr>
  <tr>
    <th width="153" scope="row">DESCRIPTION</th>
    <td width="219"><textarea name="txtDescription" cols="20" rows="6"><?php echo $Description?></textarea></td>
  </tr>
  
  <tr>
  <th height="46" scope="row">IMAGE 1</th>
    <td>
    <input type="file" name="fileImg1" accept="image/*" class="form-control">
    </td>
  </tr>
  
    <th height="46" scope="row">STATUS</th>
    <td><select name="selStatus" required class="form-control" id="selStatus">
      <option value="1">ACTIVE</option>
      <option value="0">INACTIVE</option>
      </select></td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><div align="right"><a href="." class="btn btn-primary pull-right">RESET</a>
    <span class="pull-right">&nbsp;</span>
      <input type="submit" name="subSave" id="subSave" class="pull-right btn btn-primary" value="<?php echo $caption?>">
    </div></th>
    </tr>
</table>

</form>
</div>
<div class="panel-footer">
<?php require_once("../item/viewItem.php");?>
</div>
<?php 
if(isset($_POST["subSave"]))
{
	require_once("../common/connect.php");
	$folder="uploads";
	$file=basename($_FILES["fileImg"]["name"]);
	$path="$folder/$file";
	move_uploaded_file($_FILES["fileImg"]["tmp_name"],$path);
	echo "<h5>Succesfully Uploaded</h5>";
	echo "<img src='$path' width='200' height='200' alt='$file'>";
	$bid=$_POST["selBid"];
	$Model=$_POST["txtModel"];
	$Description=$_POST["txtDescription"];
	$status=$_POST["selStatus"];
	if($caption=="SAVE")
 	$query="insert into tb_cars(bid,model,description,pic1,status) values($bid,'$Model','$Description','$path',$status)";
 	elseif($caption=="UPDATE")
 	$query="update tb_cars set bid=$bid,model=$Model,description='$Description',pic1='$path',status=$status where cid=$ecid";
	mysqli_query($con,$query) or die("<h4>ERROR IN $query</h4>");	
	header("location:index.php");
}
else if(isset($_GET["dcid"])==true)
{
	$dcid=$_GET["dcid"];
	$query="delete from tb_cars where cid=$dcid";
	mysqli_query($con,$query) or die("<h4>ERROR IN $query</h4>");
	header("location:index.php");
}
?>
<?php require_once("../item/viewItem.php"); ?>
</div>
<?php require_once("../common/footer.php"); ?>
<script>
$("#mnuItem").addClass("active");
</script>