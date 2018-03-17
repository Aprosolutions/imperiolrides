<?php
require_once("../common/connect.php");
$query = "select * from tb_cars";
$result = mysqli_query($con,$query) or die ("ERROR IN $query");
echo "<table border='1' width='200' class='table table-stripped'>
<tr class='bg-info'>
<th>BRAND</th>
<th>MODEL</th>
<th>DESCRIPTION</th>
<th>IMAGE</th>
<th>STATUS</th>
<th>ACTIONS</th>
<tr>";
while(($row = mysqli_fetch_array($result))==true)
{
	$editURL="index.php?ecid=$row[0]";
	$deleteURL="index.php?dcid=$row[0]";
	$deleteMsg="\"return confirm('Confirm your Deletion of $row[1]');\"";
		if($row[5]==0)
	$s="INACTIVE";
	else
	$s="ACTIVE";
	echo "<tr>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td><img src='$row[4]' height='50' width='50'></td>
	<td>$s</td>
	<td>
	<span class='glyphicon glyphicon-pencil'></span>
	<a href='$editURL'>EDIT</a>
	<span class='glyphicon glyphicon-trash'></span>
	<a href='$deleteURL' onClick=$deleteMsg>DELETE</a>
	</td>
	<tr>";
}
	echo "</table>";
?>
