
<?php
include_once("Config.php");
//$Email = $_REQUEST["Tno"];
$Unam = $_REQUEST["Unam"];
$str = "select * from tblloginmaster where UserName ='$Unam'";
$rs = mysqli_query($con,$str) or die(mysqli_error($con));
$res = mysqli_num_rows($rs);
if(!$res>0)
{
	
	echo "* Invalid UserName";
	
}

?>
