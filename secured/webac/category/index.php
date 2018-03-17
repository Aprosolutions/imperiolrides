<?php require_once("../common/header.php"); ?>
<?php require_once("../common/sidebar.php"); ?>
<?php //require_once("../common/session.php"); ?>
<?php //require_once("../common/checkuser.php"); ?>
<div class="panel panel-primary">
<div class="panel-heading">CATEGORY REGISTRATION</div>
<div class="panel-body">
<?php
require_once("../common/connect.php");
if(isset($_GET["ebid"]))
{
	$caption="UPDATE";
	$ebid=$_GET["ebid"];
	$query="select * from tb_brands where bid=$ebid";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	$bname=$row[1];
	$status=$row[2];
}
else
$caption="SAVE";
?>
<form method="post" action="">
<table width="382" border="0" align="center">
  <tr>
    <th width="153" scope="row">BRAND</th>
    <td width="219"><input name="txtBname" type="text" autofocus required id="txtBname" class="form-control" value="<?php echo $bname?>"></td>
  </tr>
  <tr>
    <th height="46" scope="row">STATUS</th>
    <td><select name="selStatus" required class="form-control" id="selStatus">
      <option value="1">ACTIVE</option>
      <option value="0">INACTIVE</option>
    </select></td>
  </tr>
  <tr>
  <br>
    <th colspan="2" scope="row"><div align="right"><a href="." class="btn btn-primary pull-right">RESET</a>
    <span class="pull-right">&nbsp;</span>
      <input type="submit" name="subSave" id="subSave" class="pull-right btn btn-primary" value="<?php echo $caption?>">
    </div></th>
    </tr>
</table>

</form>
</div>
<div class="panel-footer">
<?php require_once("../category/viewCategory.php");?>
</div>
<?php 
if(isset($_POST["subSave"]))
{
	require_once("../common/connect.php");
	$bname=$_POST["txtBname"];
	$status=$_POST["selStatus"];
	if($caption=="SAVE")
 	$query="insert into tb_brands(bname,status) values('$bname',$status)";
 	elseif($caption=="UPDATE")
 	$query="update tb_brands set bname='$bname',status=$status where bid=$ebid";
	mysqli_query($con,$query) or die("<h4>ERROR IN $query</h4>");	
	header("location:index.php");
}
else if(isset($_GET["dbid"])==true)
{
	$dbid=$_GET["dbid"];
	$query="delete from tb_brands where bid=$dbid";
	mysqli_query($con,$query) or die("<h4>ERROR IN $query</h4>");
	header("location:index.php");
}
?>
<?php require_once("../category/viewCategory.php"); ?>
</div>
<?php require_once("../common/footer.php"); ?>
<script>
$("#mnuModel").addClass("active");
</script>