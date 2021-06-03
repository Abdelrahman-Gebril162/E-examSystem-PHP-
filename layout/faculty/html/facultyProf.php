<?php include "../../../functions/faculty/facultyProf.php"?>
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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/cards.css">
    <!--    Css Stylesheets-->
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
            <a class="nav-link" href="../../../layout/faculty/html/Details.php?id=<?php if($res != null){echo $res[0]["faculty_id"];}else{extract($_GET);echo $id;}?>">
                <img src="<?php echo $dd[0]["logo"];?>" alt="<?php echo 'Faculty LOGO';?>" style="width:100px;height:100px;border-radius:50%;">
                <a>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/facultyProf.php?id=<?php if($res != null){echo $res[0]["faculty_id"];}else{extract($_GET);echo $id;}?>">Professors</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/facultyDepartment.php?id=<?php if($res != null){echo $res[0]["faculty_id"];}else{extract($_GET);echo $id;}?>">Departments</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/facultyStudent.php?id=<?php if($res != null){echo $res[0]["faculty_id"];}else{extract($_GET);echo $id;}?>">Students</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/Details.php?id=<?php if($res != null){echo $res[0]["faculty_id"];}else{extract($_GET);echo $id;}?>">Courses</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 exam" href="../../../layout/faculty/html/Details.php?id=<?php if($res != null){echo $res[0]["faculty_id"];}else{extract($_GET);echo $id;}?>">Exams</a>
            </div>
            
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="../../../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../layout/faculty/html/Details.php?id=<?php if($res != null){echo $res[0]["faculty_id"];}else{extract($_GET);echo $id;}?>"><?php echo "MyFaculty";?></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="row">
                <?php if($res != null) {?>
                <? foreach($res as $row)
                 { 
                ?>  
                <!-- Team member -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo $res[0]["picture"];?>" alt="card image"></p>
                                    <h4 class="card-title"><?php echo $res[0]["fname"]." ".$res[0]["lname"];?></h4>
                                    Hover 
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    More Info
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center ">
                                    <h4 class="card-title">More Info</h4>
                                    <p class="card-text">Your Faculty : <?php echo $res[0]["ffname"]?></p>
                                    <p class="card-text">Your Department : <?php echo $res[0]["ddname"]?></p>
                                    <p class="card-text">National Id  : <?php echo $res[0]["N_id"]?></p>
                                    <p class="card-text">BirthDay : <?php echo $res[0]["birthdate"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <?php
                }
         ?>
         <?}?>
         <?php if($res==null){echo "<h1 style='text-align:center;color:red;line-height:400px;transform: skewY(20deg);'> There is No Professor Created Yet.</h1>" ;}?>
            </div>
            </div>
        </div>
    </div>

<!-- JS Scripts -->
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>
<script src="../js/scripts.js"></script>
<script src="../../../Scripts/jquery-3.6.0.min.js"></script>
    <script src="../../../Scripts/ajax.js"></script>

<!-- JS Scripts-->
</body>
</html>