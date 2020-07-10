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
        if(isset($_REQUEST['CID']))
        {
            $Select_Train="select * from tbltrainmaster where TrainNumber='".$_REQUEST['CID']."'";
            $Select_Train_Exe=mysqli_query($con,$Select_Train) or die(mysqli_error($con));
            $Select_Train_Fetch=mysqli_fetch_array($Select_Train_Exe);
            //echo $_REQUEST['CID'];

        }
    ?>
    <body data-fade-in="true">

        <!-- Start Header -->
        <?php include_once("TopHeader.php");?>
        
        <!-- End Header -->

        <!-- Blog -->
        <section class="pt110 pb90 bg-grey">
            <div class="container">
                <div class="row text-center">

                    <div class="col-md-12 text-center pb20">
                        <h2>Train No : <?php echo $_REQUEST['CID'];?>  <br><strong><?php echo $Select_Train_Fetch['TrainName'];?></strong></h2>

                    </div>

                    <?php
                        if($Select_Train_Fetch['EACount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>Executive Anubhuti Coach</b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['EACount'])
                                {
                                    $coach=$Select_Train_Fetch['EACount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                
                                <div class="blog-grid-content">
                                    <time><span>EA</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=EA&no=<?php echo $i+1;?>&s=EA" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>56</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>


                         <!-- Start Grid 2 -->
                     <?php
                        if($Select_Train_Fetch['ECCount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>Executive Chair Car</b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['ECCount'])
                                {
                                    $coach=$Select_Train_Fetch['ECCount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>EC</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=EC&no=<?php echo $i+1;?>&s=EC" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>56</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 2-->

                    <!-- Start Grid 3 -->
                     <?php
                        if($Select_Train_Fetch['1ACount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>First Class AC</b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['1ACount'])
                                {
                                    $coach=$Select_Train_Fetch['1ACount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>H</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=1A&no=<?php echo $i+1;?>&s=H" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>22</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 3-->

                    <!-- Start Grid 4 -->
                     <?php
                        if($Select_Train_Fetch['2ACount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>Two Tier AC</b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['2ACount'])
                                {
                                    $coach=$Select_Train_Fetch['2ACount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>A</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=2A&no=<?php echo $i+1;?>&s=A" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>46</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 4-->

                    <!-- Start Grid 5 -->
                     <?php
                        if($Select_Train_Fetch['3ACount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>Three Tier AC</b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['3ACount'])
                                {
                                    $coach=$Select_Train_Fetch['3ACount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>B</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=3A&no=<?php echo $i+1;?>&s=B" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>64</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 5-->

                    

                        <!-- Start Grid 7 -->
                     <?php
                        if($Select_Train_Fetch['FCCount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>First Class </b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['FCCount'])
                                {
                                    $coach=$Select_Train_Fetch['FCCount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>FC</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=FC&no=<?php echo $i+1;?>&s=FC" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>26</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 7-->

                    <!-- Start Grid 8 -->
                     <?php
                        if($Select_Train_Fetch['CCCount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>Chair Car</b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['CCCount'])
                                {
                                    $coach=$Select_Train_Fetch['CCCount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>C</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=CC&no=<?php echo $i+1;?>&s=C" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>73</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 8-->

                    <!-- Start Grid 9 -->
                     <?php
                        if($Select_Train_Fetch['SLCount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>Sleeper Coach</b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['SLCount'])
                                {
                                    $coach=$Select_Train_Fetch['SLCount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>S</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=SL&no=<?php echo $i+1;?>&s=S" class="color">Total Berths</a></strong></h5>
                                        <!-- <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"> --><h3><strong>72</strong></h3><!-- </a> -->
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 9-->

                        <!-- Start Grid 9 -->
                     <?php
                        if($Select_Train_Fetch['2SCount']>0)
                        {
                    ?>
                    <div class="blog-grid">

                             <h3><b>Second Seating </b></h3>
                             <br>
                        <!-- Blog Items Container-->
                        <div class="vossen-blog-grid">

                            <!-- Blog Item -->
                            <?php
                                if($Select_Train_Fetch['2SCount'])
                                {
                                    $coach=$Select_Train_Fetch['2SCount'];
                                    for ($i=0; $i < $coach ; $i++) { 
                                        # code...

                                    
                            ?>

                            <div class="col-md-3 col-sm-4">
                                <!-- <div class="blog-grid-img">
                                    <a href="blog-post-gallery.html"><img src="img\blog\irctcl.png" class="img-responsive width50" alt="#"></a>
                                </div> -->
                                <div class="blog-grid-content">
                                    <time><span>D</span><span><?php echo $i+1;?></span></time>
                                    <div class="post-header">
                                        <h5><strong><a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>&CoachCode=2S&no=<?php echo $i+1;?>&s=D" class="color">Total Berths</a></strong></h5>
                                        <a href="List.php?Tno=<?php echo $_REQUEST['CID'];?>"><h3><strong>108</strong></h3></a>
                                    </div>
                                   <!--  <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica...</p> -->
                                </div>
                            </div>

<?php
            }
                        }
                    ?>

                         
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- End Grid 9-->
                </div>
            </div>
        </section>
        <!-- End Blog -->

        <!-- Start Footer -->
        <?php include_once("Footer.php");?>
        
        <!-- End Footer -->
        <?php include_once("LF2.php");?>

    </body>
</html>
