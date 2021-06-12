<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning University</title>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <!-- Google fonts-->

    <!--    CSS Stylesheets-->
    <link rel="stylesheet" href="../../../contents/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../contents/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <!--    Css Stylesheets-->
</head>
<body>

<!-- start let's learn section-->
<section class="lets-learn">
        <div class="slogon">
            Let's Learn
        </div>
        <div class="header">
            <div class="navbar">

                <div class="search">
                    <input type="text" class="form-control"
                           placeholder="">
                    <i class="fa fa-search fa-fw"></i>
                </div>


                <div class="nav-links">
                    <ul>
                        <li>
                            <a href="../../../layout/faculty/html/index.php">Faculties</a>
                        </li>

                        <li> <a href="../../../index.php">Home</a></li>
                    </ul>
                </div>
                <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle" style="width: 30px;height:30px"></i>
            </button>
            <?php if(isset($_SESSION['loginSession']['login']) == true){include ("../../../layout/login/html/loggedin.php");}
            else {
                include ("../../../layout/login/html/logout.php");
            } ?>
            </div>
                <div>
                    <img src="../images/logo.png" class="img-responsive" alt="">
                    
                </div>
            </div>
        </div>
        <div class="data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="svg">
                            <img src="../images/Group%20706.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="content text-center">
                                <p> Future University provides you with the easiest and most sophisticated way to E-Learning</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="creative">
    <?php foreach ($res as $row) { ?>
        <?php error_reporting(0); $r = $r=="right"?"left":"right";?>
        <?php if($row['name']!="university"){?>
        <div class="<?php echo $r?>"> <a href="<?php echo $row['id'];?>" class="viewF" style="width:100%"> <h1><?php echo $row['name'];?></h1><img src="<?php echo $row['background'];?>"> </a></div> 
        <?php } ?>
        <?php } ?>
</section>

<!-- JS Scripts -->
<script src="../../../Scripts/jquery-3.6.0.min.js"></script>
<script src="../../../Scripts/ajax.js"></script>
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>

<!-- JS Scripts-->
</body>
</html>