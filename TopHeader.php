  <?php
include_once("Config.php");

?>
  <nav class="navbar nav-down" data-fullwidth="true" data-menu-style="transparent" data-animation="shrink">
                                        
            <div class="container">

                <div class="navbar-header">
                    <div class="container">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <a class="navbar-brand to-top" href="index.php"><img src="img\assets\w.png" class="logo-light" alt="#" height="30px;" style="margin-top: 25px;"><img src="img\assets\bl.png" class="logo-dark" height="30px;" style="margin-top: 25px;" alt="#"></a>
                    </div>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <div class="container">
                       
                            <ul class="nav navbar-nav menu-right">

                            
                            <li>
                                <?php
                                    if(isset($_SESSION["UserName"]))
                                    {


                                ?>
                                <a href="void:javascript(0);" style="color: #000000;"><?php echo $_SESSION["UserName"];?></a>

                                <?php
                                    }
                                ?>

                               
                            </li>
                            <li>
                                <?php
                                    if(isset($_SESSION["UserName"]))
                                    {
                                ?>
                                <a href="Logout.php" style="color: #000000;">Logout</a>
                                <?php
                                    }
                                ?>

                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </nav>