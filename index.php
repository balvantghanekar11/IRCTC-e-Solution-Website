<?php
include_once("Config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("LF1.php");?>
    <script type="text/javascript">
        function TrainNocheck(TrainNo)
        {
            
                    var xhttp = new XMLHttpRequest();
                    var Url = "AjaxTrainNoCheck.php?Tno="+TrainNo;
                    //alert(Url);
                    xhttp.onreadystatechange = function() 
                    {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("lblEmail1").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", Url, true);
                    xhttp.send();
        }
         function UserCheck(UserName)
        {
            
                    var xhttp = new XMLHttpRequest();
                    var Url = "AjaxUserCheck.php?Unam="+UserName;
                    //alert(Url);
                    xhttp.onreadystatechange = function() 
                    {
                        if (this.readyState == 4 && this.status == 200) 
                        {
                            document.getElementById("lbluname").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", Url, true);
         }
    </script>
</head>

<?php

if (isset($_REQUEST['btnLogin'])) 
{

    if($_REQUEST['txtUsername']=='bhaskar' && $_REQUEST['txtTrainNo']==12905)
    {
        $Select="select * from tblloginmaster where UserName='".$_REQUEST['txtUsername']."' and Password='".$_REQUEST['txtPassword']."'";
        $Select_res=mysqli_query($con,$Select) or die(mysqli_error($con));
        if(mysqli_num_rows($Select_res)>0)
        {

            $result=mysqli_fetch_array($Select_res);
            $_SESSION["UserName"]=$result["UserName"];
            $_SESSION["IsVerified"]=$result["IsVerified"];
            $CIDD=$_REQUEST['txtTrainNo'];
            header("location:Coach.php?CID=$CIDD");
            
        }  
        else
        {
            ?>
            <script type="text/javascript" id="error">alert('Invalid Username / Password');</script>
        <?php

        } 
    }
    elseif($_REQUEST['txtUsername']=='balvant' && $_REQUEST['txtTrainNo']==16318)
    {
       $Select="select * from tblloginmaster where UserName='".$_REQUEST['txtUsername']."' and Password='".$_REQUEST['txtPassword']."'";
       $Select_res=mysqli_query($con,$Select) or die(mysqli_error($con));
       if(mysqli_num_rows($Select_res)>0)
       {

        $result=mysqli_fetch_array($Select_res);
        $_SESSION["UserName"]=$result["UserName"];
        $_SESSION["IsVerified"]=$result["IsVerified"];
        $CIDD=$_REQUEST['txtTrainNo'];
        header("location:Coach.php?CID=$CIDD");

        }
        else
        {
            ?>
            <script type="text/javascript" id="error">alert('Invalid Username / Password');</script>
        <?php

        }
    }
    elseif ($_REQUEST['txtUsername']=='chirag' && $_REQUEST['txtTrainNo']==22691) 
    {
       $Select="select * from tblloginmaster where UserName='".$_REQUEST['txtUsername']."' and Password='".$_REQUEST['txtPassword']."'";
       $Select_res=mysqli_query($con,$Select) or die(mysqli_error($con));
       if(mysqli_num_rows($Select_res)>0)
       {

        $result=mysqli_fetch_array($Select_res);
        $_SESSION["UserName"]=$result["UserName"];
        $_SESSION["IsVerified"]=$result["IsVerified"];
        $CIDD=$_REQUEST['txtTrainNo'];
        header("location:Coach.php?CID=$CIDD");

        }
        else
        {
            ?>
            <script type="text/javascript" id="error">alert('Invalid Username / Password');</script>
        <?php

        }
    } 
    else
    {
        ?>
        <script type="text/javascript" id="error">alert('Required fields cann\'t be empty.');</script>
    <?php

    }




        //header("location:Coach.php");
}

?>
<body data-fade-in="true">
    <?php include_once("PreLoader.php");?>

    

    <!-- Start Header -->
    <?php include_once("TopHeader.php");?>
    
    <!-- End Header -->

    <!-- Hero -->
    <section id="hero" class="hero-fullscreen parallax" data-overlay-dark="7">
        <div class="background-image" style="background-size: cover">
            <img src="img\backgrounds\bg11.jpg" alt="#">
        </div>

      

        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center pb20">
                    <h2><strong>LOGIN</strong></h2>
                    <p class="lead"><h5>Welcome to IRCTC E-Services</h5></p>
                </div>

                <div class="col-md-8 col-md-offset-2 contact box-style">
                    <div id="message-info"></div>
                    <!-- Forms can be functional only on server. Upload to your server when testing. -->
                    <form  method="post">

                       <div class="col-sm-12">
                        <input name="txtTrainNo" id="txtTrainNo" placeholder="Your TrainNo *" onblur="return TrainNocheck(this.value);">
                    </div><label id="lblEmail1" style="color: red"></label>
                    <div class="col-sm-12">
                        <input name="txtUsername" id="email" placeholder="Your Username *" onblur="return UserCheck(this.value);">
                    </div><label id="lbluname" style="color: red"></label>
                    <div class="col-sm-12">
                        <input name="txtPassword" id="password" placeholder="Your Password *" type="password">
                    </div><label id="lblpass" style="color: red"></label>

                    <div class="col-md-12">
                        <input type="submit" class="submit btn btn-lg btn-primary" id="btnLogin" name="btnLogin" value="Login">
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
<!-- End Hero -->



    

               <!-- Start Footer -->
               <?php include_once("Footer.php");?>

               <!-- End Footer -->
               <?php include_once("LF2.php");?>



           </body>
           </html>
