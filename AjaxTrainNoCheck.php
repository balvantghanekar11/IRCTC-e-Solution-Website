<?php
include_once("Config.php");
//$Email = $_REQUEST["Tno"];
$Tno = $_REQUEST["Tno"];
$str = "select * from tbltrainmaster where TrainNumber ='$Tno'";
$rs = mysqli_query($con,$str) or die(mysqli_error($con));
$res = mysqli_num_rows($rs);
if(!$res>0)
{
	
	echo "* Please Enter Valid Train no.";
	
}

?>
