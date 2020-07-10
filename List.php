<?php
include_once("Config.php");
if(!isset($_SESSION['UserName']))
{
    // not logged in
    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
          <?php include_once("LF1.php");?>
	</head>
	<?php

			/*$Tno=$_REQUEST['Tno'];
			$CoachCode=$_REQUEST['CoachCode'];
			$no=$_REQUEST['no'];
			$s=$_REQUEST['s'];*/


        /*if(isset($_REQUEST['Tno']))
        {*/
            $Select_Train="select * from tbltrainmaster where TrainNumber='".$_REQUEST['Tno']."'";
            $Select_Train_Exe=mysqli_query($con,$Select_Train) or die(mysqli_error($con));
            $Select_Train_Fetch=mysqli_fetch_array($Select_Train_Exe);

            $TID=$Select_Train_Fetch['TrainMasterID'];
            //echo $_REQUEST['CID'];
/*			
        }*/
        	$TID=$Select_Train_Fetch['TrainMasterID'];

        	  /* Update Perform on IsActive OF Bedroom field Start*/
			    if(isset($_REQUEST['JourneyDetailID']))
			    {
			        $up="update tbljourneydetails set IsBoarded='".$_REQUEST['Bord']."' where JourneyDetailID='".$_REQUEST['JourneyDetailID']."'";
			        mysqli_query($con,$up) or die(mysqli_error($con));
			    }
			/* Update Perform on IsActive OF Bedroom field End*/


			/*Btn Checked*/
				if(isset($_REQUEST['btnCheck']))
				{
					//echo "check";

					$sel_WL="SELECT tbljourneydetails.*,tblcoach.*,tblpassengermaster.* 
					            				FROM tbljourneydetails 
					            				INNER JOIN tblcoach 
					            				ON tbljourneydetails.CoachType = tblcoach.CoachType 
					            				INNER JOIN tblpassengermaster 
					            				ON tbljourneydetails.PassengerID= tblpassengermaster.PassengerMAsterID 
					            				WHERE tbljourneydetails.TrainID='".$Select_Train_Fetch['TrainMasterID']."' AND tbljourneydetails.ConfirmationStatus='WL' ORDER BY tbljourneydetails.WLSequence";
					$Select_Exe_WL=mysqli_query($con,$sel_WL) or die(mysqli_error($con));
					while($Select_Pas_Fetch_WL=mysqli_fetch_array($Select_Exe_WL))
					{
					echo "<br><br>".$Select_Pas_Fetch_WL['PassengerName'];
				}


					

					

				}
			/**/
        

        /*WL Allocate*/
        	if(isset($_REQUEST['JDID']))
        	{
        		echo $_REQUEST['JDID'];

        		$selCount="SELECT COUNT(*) AS Confirm FROM tbljourneydetails  WHERE ConfirmationStatus='Confirm'";
        		$Exe_selCount=mysqli_query($con,$selCount) or die(mysqli_error($con));
				$Select_Count_Fetch=mysqli_fetch_array($Exe_selCount);
				$NewSeat=$Select_Count_Fetch['Confirm']+1;

        		$sel_WLDEtail="SELECT tbljourneydetails.*,tblcoach.*,tblpassengermaster.* 
					            				FROM tbljourneydetails 
					            				INNER JOIN tblcoach 
					            				ON tbljourneydetails.CoachType = tblcoach.CoachType 
					            				INNER JOIN tblpassengermaster 
					            				ON tbljourneydetails.PassengerID= tblpassengermaster.PassengerMAsterID 
					            				WHERE tbljourneydetails.JourneyDetailID='".$_REQUEST['JDID']."'";
				$EXE_WL_Detail=mysqli_query($con,$sel_WLDEtail) or die(mysqli_error($con));
				$Select_Pas_Fetch_WL=mysqli_fetch_array($EXE_WL_Detail);
        		$update="UPDATE tbljourneydetails set AllocatedTo=1 ,AllocatedFrom='".$Select_Pas_Fetch_WL['BoardingFrom']."',AllocatedUpto='".$Select_Pas_Fetch_WL['BoardingUpto']."', CoachNo='".$_REQUEST['s'].$_REQUEST['no']."',SeatNo='".$NewSeat."' ,ConfirmationStatus='Confirm' WHERE JourneyDetailID='".$_REQUEST['JDID']."'";
        		$EXE_WL_Detail_Allocate=mysqli_query($con,$update) or die(mysqli_error($con));


        		$username = "nestseekers.real.estate2019a2@gmail.com";
				    $hash = "4e59077be13dd048c70a092e454a26e0e1c4032e83b31c47bc279fd731edc727";

				    // Config variables. Consult http://api.textlocal.in/docs for more info.
				    $test = "0";

				    //$sender = "TXTLCL"; 
				    $numbers = $Select_Pas_Fetch_WL['ContactNo']; 
				    //$otp=mt_rand(100000,999999);
				    //$_SESSION['ContactOTP']=$otp;
				    $message = "Welcome To IRCTC  Your Seat Number is".$NewSeat." & it is Confirmed. From :".$Select_Pas_Fetch_WL['BoardingFrom']." UpTo".$Select_Pas_Fetch_WL['BoardingUpto'];
				   
				    $message = urlencode($message);
				    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
				    $ch = curl_init('http://api.textlocal.in/send/?');
				    curl_setopt($ch, CURLOPT_POST, true);
				    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				    $result = curl_exec($ch);
				    curl_close($ch);


        	}
        /**/
    ?>
	<body>

		<!-- Start Header -->
        <?php include_once("TopHeader.php");?>
		
		<!-- End Header -->

		

		<!-- Tables -->
		<section id="elemets-tables" class="pt100 pb100">
			<div class="container">

				<div class="col-md-8 mr-auto text-center pb20">
					<h1><strong><?php echo $Select_Train_Fetch['TrainName'];?>(<?php echo $_REQUEST['Tno'];?>)</strong></h1>
				<!-- 	<h3><strong><?php echo $Select_Train_Fetch['TrainName'];?>.</strong></h3> -->
					<p class="lead">
						<strong>Date Of Journey :</strong> 22/2/2019   &nbsp; <strong>Coach No:</strong> <?php echo $_REQUEST['s'].$_REQUEST['no'];?></p>
				</div>

				<div class="row">

					<table class="fullwidth">
						<thead>
							<tr>
								<th>Seat No.</th>
								<th>Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>PNR</th>
								<th>Boarding From stn.</th>
								<th>Boarding upTo stn.</th>
								<th>Status</th>
								<th>Boarding Status</th>

							</tr>
						</thead>

						<tbody>

							<?php
								
					        	/*$Select_Coach="select TotalBirth from tblCoach where CoachType='".$_REQUEST['CoachCode']."'";
					            $Select_Coach_Exe=mysqli_query($con,$Select_Coach) or die(mysqli_error($con));
					            $Select_Coach_Fetch=mysqli_fetch_array($Select_Coach_Exe);
						        
					            for ($i=1; $i <= $Select_Coach_Fetch['TotalBirth'] ; $i++) {*/

					            	/*$Sel_Pas="SELECT * FROM tbljourneydetails WHERE TrainID='".$TID."' AND CoachNo='".$_REQUEST['s'].$_REQUEST['no']."'";*/

					            	/*SELECT COUNT(tbljourneydetails.JourneyDetailID) AS TotalPassanger,tbljourneydetails.TrainID,tbljourneydetails.DOJ,tbljourneydetails.BoardingFrom,tbljourneydetails.BoardingUpto,tbljourneydetails.SeatNo,tbljourneydetails.Birth,tbljourneydetails.PassengerID,tbljourneydetails.IsBoarded,tbljourneydetails.PNR,
tbljourneydetails.AllocatedTo,tbljourneydetails.AllocatedFrom,tbljourneydetails.AllocatedUpto,tbljourneydetails.CoachNo,tbljourneydetails.CoachType,tbljourneydetails.ConfirmationStatus,tblcoach.*,tblpassengermaster.* FROM tbljourneydetails INNER JOIN tblcoach ON tbljourneydetails.CoachType = tblcoach.CoachType INNER JOIN tblpassengermaster ON tbljourneydetails.PassengerID= tblpassengermaster.PassengerMAsterID WHERE tbljourneydetails.CoachNo='S1'*/
					            	$Sel_Pas="SELECT tbljourneydetails.*,tblcoach.*,tblpassengermaster.* FROM tbljourneydetails INNER JOIN tblcoach ON tbljourneydetails.CoachType = tblcoach.CoachType INNER JOIN tblpassengermaster ON tbljourneydetails.PassengerID= tblpassengermaster.PassengerMAsterID WHERE tbljourneydetails.TrainID='".$Select_Train_Fetch['TrainMasterID']."' AND tbljourneydetails.CoachNo='".$_REQUEST['s'].$_REQUEST['no']."'";
					            	$Select_Pas_Exe=mysqli_query($con,$Sel_Pas) or die(mysqli_error($con));
					            	$i=0;
					            	while($Select_Pas_Fetch=mysqli_fetch_array($Select_Pas_Exe))
					            	{
					            		$i=$i+1;

					           /* $Select_Coach="SELECT tbljourneydetails.*,tblcoach.*
										FROM tbljourneydetails
										INNER JOIN tblcoach
										ON tbljourneydetails.CoachType = tblcoach.CoachType
										WHERE tbljourneydetails.CoachType='".$_REQUEST['CoachCode']."'";
										$Select_Coach_Exe=mysqli_query($con,$Select_Coach) or die(mysqli_error($con));
					            while($Select_Coach_Fetch=mysqli_fetch_array($Select_Coach_Exe)){
*/

       
							?>
							<tr>
								<td><?php echo $Select_Pas_Fetch['CoachNo']."-".$Select_Pas_Fetch['SeatNo']." (".$Select_Pas_Fetch['Birth'].")";?></td>
								<td><?php echo $Select_Pas_Fetch['PassengerName'];?></td>
								<td><?php echo $Select_Pas_Fetch['Age'];?></td>
								<td><?php echo $Select_Pas_Fetch['Gender'];?></td>
								<td><?php echo $Select_Pas_Fetch['PNR'];?></td>
								<td><?php echo $Select_Pas_Fetch['BoardingFrom'];?></td>
								<td><?php echo $Select_Pas_Fetch['BoardingUpto'];?></td>
								<td><?php echo $Select_Pas_Fetch['ConfirmationStatus'];?></td>
								<td><!-- <a href="#" class="btn btn-sm btn-primary btn-appear"><span>l <i class="ion-rig"></i></span></a> -->
									
									 <?php if($Select_Pas_Fetch['IsBoarded']==1)
                                      {
                                      	?>
                                    
                                        <a href="?Tno=<?php echo $_REQUEST['Tno']?>&CoachCode=<?php echo $_REQUEST['CoachCode']?>&no=<?php echo $_REQUEST['no']?>&s=<?php echo $_REQUEST['s']?>&JourneyDetailID=<?php echo $Select_Pas_Fetch['JourneyDetailID']; ?>&Bord=0" class="btn btn-simple btn-danger btn-icon "><i class="fa fa-check" aria-hidden="true" style="font-size: 25px;color: green;"></i></a>                                      
                                    <?php
                                        } 
                                        else
                                        {
                                    ?>
                                        <a href="?Tno=<?php echo $_REQUEST['Tno']?>&CoachCode=<?php echo $_REQUEST['CoachCode']?>&no=<?php echo $_REQUEST['no']?>&s=<?php echo $_REQUEST['s']?>&JourneyDetailID=<?php echo $Select_Pas_Fetch['JourneyDetailID']; ?>&Bord=1" class="btn btn-simple btn-danger btn-icon "><i class="fa fa-times" aria-hidden="true" style="font-size: 25px;color: red;"></i></a>
                                    <?php
                                        }
                                    ?>
								</td>
							</tr>	
							<?php /* }*/
									$TotalSeat=$Select_Pas_Fetch['TotalBirth'];
								}
							?>						
						</tbody>
					</table>
						<h4 style="float: right;">Vacant Seats: <?php echo $TotalSeat-$i;?></h4>
						
					
				</div>

			</div>
		</section>
		<!-- End Tables-->

		<!-- Lists -->
		<section id="elements-lists" class="pt100 pb60">
			<div class="container">
				<div class="col-md-8 mr-auto text-center pb20">
					
					<p class="lead">
						<strong>Waiting List </strong>
					</p>
				</div>
				<div class="row">

					<table class="fullwidth">
						<thead>
							<tr>
								<!-- <th>Seat No.</th> -->
								<th>Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>PNR</th>
								<th>Boarding From stn.</th>
								<th>Boarding upTo stn.</th>
								<th>Status</th>
								<th>#</th>
								

							</tr>
						</thead>

						<tbody>

							<?php
								
					        	/*$Select_Coach="select TotalBirth from tblCoach where CoachType='".$_REQUEST['CoachCode']."'";
					            $Select_Coach_Exe=mysqli_query($con,$Select_Coach) or die(mysqli_error($con));
					            $Select_Coach_Fetch=mysqli_fetch_array($Select_Coach_Exe);
						        
					            for ($i=1; $i <= $Select_Coach_Fetch['TotalBirth'] ; $i++) {*/

					            	/*$Sel_Pas="SELECT * FROM tbljourneydetails WHERE TrainID='".$TID."' AND CoachNo='".$_REQUEST['s'].$_REQUEST['no']."'";*/

					            	/*SELECT COUNT(tbljourneydetails.JourneyDetailID) AS TotalPassanger,tbljourneydetails.TrainID,tbljourneydetails.DOJ,tbljourneydetails.BoardingFrom,tbljourneydetails.BoardingUpto,tbljourneydetails.SeatNo,tbljourneydetails.Birth,tbljourneydetails.PassengerID,tbljourneydetails.IsBoarded,tbljourneydetails.PNR,
tbljourneydetails.AllocatedTo,tbljourneydetails.AllocatedFrom,tbljourneydetails.AllocatedUpto,tbljourneydetails.CoachNo,tbljourneydetails.CoachType,tbljourneydetails.ConfirmationStatus,tblcoach.*,tblpassengermaster.* FROM tbljourneydetails INNER JOIN tblcoach ON tbljourneydetails.CoachType = tblcoach.CoachType INNER JOIN tblpassengermaster ON tbljourneydetails.PassengerID= tblpassengermaster.PassengerMAsterID WHERE tbljourneydetails.CoachNo='S1'*/
									$Sel_Pas1="SELECT tbljourneydetails.*,tblcoach.*,tblpassengermaster.* 
					            				FROM tbljourneydetails 
					            				INNER JOIN tblcoach 
					            				ON tbljourneydetails.CoachType = tblcoach.CoachType 
					            				INNER JOIN tblpassengermaster 
					            				ON tbljourneydetails.PassengerID= tblpassengermaster.PassengerMAsterID 
					            				WHERE tbljourneydetails.TrainID='".$Select_Train_Fetch['TrainMasterID']."' AND tbljourneydetails.ConfirmationStatus='WL' ORDER BY tbljourneydetails.WLSequence";

					            	$Select_Pas_Exe1=mysqli_query($con,$Sel_Pas1) or die(mysqli_error($con));
					            	$i=0;
					            	while($Select_Pas_Fetch1=mysqli_fetch_array($Select_Pas_Exe1))
					            	{
					            		$i=$i+1;

					            /*$Select_Coach="SELECT tbljourneydetails.*,tblcoach.*
										FROM tbljourneydetails
										INNER JOIN tblcoach
										ON tbljourneydetails.CoachType = tblcoach.CoachType
										WHERE tbljourneydetails.CoachType='".$_REQUEST['CoachCode']."'";
										$Select_Coach_Exe=mysqli_query($con,$Select_Coach) or die(mysqli_error($con));
					            while($Select_Coach_Fetch=mysqli_fetch_array($Select_Coach_Exe)){*/


       
							?>
							<tr>
								<!-- <td><?php echo $Select_Pas_Fetch1['CoachNo']."-".$Select_Pas_Fetch['SeatNo']." (".$Select_Pas_Fetch['Birth'].")";?></td> -->
								<td><?php echo $Select_Pas_Fetch1['PassengerName'];?></td>
								<td><?php echo $Select_Pas_Fetch1['Age'];?></td>
								<td><?php echo $Select_Pas_Fetch1['Gender'];?></td>
								<td><?php echo $Select_Pas_Fetch1['PNR'];?></td>
								<td><?php echo $Select_Pas_Fetch1['BoardingFrom'];?></td>
								<td><?php echo $Select_Pas_Fetch1['BoardingUpto'];?></td>
								<td><?php echo $Select_Pas_Fetch1['ConfirmationStatus'].$Select_Pas_Fetch1['WLSequence'];?></td>
								<td>
									<?php if($Select_Pas_Fetch['IsBoarded']==0)
                                      {
                                      	echo $Select_Pas_Fetch['JourneyDetailID'];
                                      	?>
                                    
                                        <a href="?Tno=<?php echo $_REQUEST['Tno']?>&CoachCode=<?php echo $_REQUEST['CoachCode']?>&no=<?php echo $_REQUEST['no']?>&s=<?php echo $_REQUEST['s']?>&JDID=<?php echo $Select_Pas_Fetch1['JourneyDetailID']; ?>&WL=1" class="btn btn-simple btn-danger btn-icon "><i class="fa fa-check-circle" aria-hidden="true"></i></a>                                      
                                    <?php
                                        } 
                                        /*else
                                        {
                                    ?>
                                        <a href="?Tno=<?php echo $_REQUEST['Tno']?>&CoachCode=<?php echo $_REQUEST['CoachCode']?>&no=<?php echo $_REQUEST['no']?>&s=<?php echo $_REQUEST['s']?>&JourneyDetailID=<?php echo $Select_Pas_Fetch['JourneyDetailID']; ?>&WL=1" class="btn btn-simple btn-danger btn-icon "><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                                    <?php
                                        }*/
                                    ?>
									</td>
								
							</tr>

							<?php /* }*/
									$TotalSeat=$Select_Pas_Fetch1['TotalBirth'];
								}
							?>						
						</tbody>
					</table>
					<!-- 	<h4 style="float: right;">Vacant Seats: <?php echo $TotalSeat-$i;?></h4> -->
				</div>
			</div>
		</section>
		<!-- End Lists -->

		<hr>

		<!-- Lists -->
		<!-- <section class="pt60 pb60">
			<div class="container">
				<div class="row">

					<div class="col-md-4 col-sm-6 mt40 mb40">
						<ul class="list-icons">
							<li><i class="ion-android-favorite-outline"></i>Vivamus nunc nunc dolor consectetur</li>
							<li><i class="ion-android-favorite-outline"></i>Lacinia ac consectetu nulla eget</li>
							<li><i class="ion-android-favorite-outline"></i>Phasellus consectetu fermentum velit
								<ul class="list-icons pl20">
									<li><i class="ion-android-favorite-outline"></i>Et consectetu dignissim neque porttitor</li>
									<li><i class="ion-android-favorite-outline"></i>Sed imperdiet id est in consectetu.</li>
									<li><i class="ion-android-favorite-outline"></i>Et consectetu dignissim neque porttitor</li>
								</ul>
							</li>
							<li><i class="ion-android-favorite-outline"></i>Aliquam pharetra consectetu orci ligula</li>
							<li><i class="ion-android-favorite-outline"></i>Et consectetu dignissim neque porttitor</li>
							<li><i class="ion-android-favorite-outline"></i>Sed imperdiet id est in consectetu.</li>
						</ul>
					</div>

					<div class="col-md-4 col-sm-6 mt40 mb40">
						<ul class="list-icons">
							<li><i class="ion-android-checkbox-outline"></i>Vivamus consectetu nunc nunc dolor</li>
							<li><i class="ion-android-checkbox-outline"></i>Lacinia ac consectetu nulla eget
								<ul class="list-icons pl20">
									<li><i class="ion-android-checkbox-outline"></i>Vivamus consectetu nunc nunc dolor</li>
									<li><i class="ion-android-checkbox-outline"></i>Lacinia ac consectetu nulla eget</li>
									<li><i class="ion-android-checkbox-outline"></i>Phasellus fermentum velitconsectetu</li>
								</ul>
							</li>
							<li><i class="ion-android-checkbox-outline"></i>Phasellus fermentum velitconsectetu</li>
							<li><i class="ion-android-checkbox-outline"></i>Aliquam pharetra orci ligula</li>
							<li><i class="ion-android-checkbox-outline"></i>Et dignissim neque porttitor</li>
							<li><i class="ion-android-checkbox-outline"></i>Sed imperdiet id est in consectetu</li>
						</ul>
					</div>

					<div class="col-md-4 col-sm-6 mt40 mb40">
						<ul class="list-icons">
							<li><i class="ion-android-done-all"></i>Vivamus nunc nunc consectetu dolor</li>
							<li><i class="ion-android-done-all"></i>Lacinia consectetu ac nulla eget
								<ul class="list-icons pl20">
									<li><i class="ion-android-done-all"></i>Vivamus nunc nunc consectetu dolor</li>
								</ul>
							</li>
							<li><i class="ion-android-done-all"></i>Phasellus consectetu fermentum velit</li>
							<li><i class="ion-android-done-all"></i>Aliquam pharetra orci ligula consectetu
								<ul class="list-icons pl20">
									<li><i class="ion-android-done-all"></i>Vivamus nunc nunc consectetu dolor</li>
									<li><i class="ion-android-done-all"></i>Lacinia consectetu ac nulla eget</li>
								</ul>
							</li>
							<li><i class="ion-android-done-all"></i>Et dignissim neque consectetu porttitor</li>
							<li><i class="ion-android-done-all"></i>Sed consectetu imperdiet id est in.</li>
						</ul>
					</div>

				</div>
			</div>
		</section> -->
		<!-- End Lists -->


		 <!-- Start Footer -->
        <?php include_once("Footer.php");?>
        
        <!-- End Footer -->
        <?php include_once("LF2.php");?>

	</body>
</html>
