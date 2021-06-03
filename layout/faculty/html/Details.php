<?php include "../../../functions/faculty/facultyDetails.php"?>
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
    <!--    Css Stylesheets-->
    <script src="../../../Scripts/jquery-3.6.0.min.js"></script>
<script src="../../../Scripts/ajax.js"></script>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
            <a class="nav-link" href="../../../layout/faculty/html/Details.php?id=<?php echo $res[0]["id"];?>">
                <img src="<?php echo $res[0]["logo"];?>" alt="<?php echo $res[0]["name"].'LOGO';?>" style="width:100px;height:100px;border-radius:50%;">
                <a>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/facultyProf.php?id=<?php echo $res[0]["id"];?>">Professors</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/facultyDepartment.php?id=<?php echo $res[0]["id"];?>">Departments</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/facultyStudent.php?id=<?php echo $res[0]["id"];?>">Students</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../../layout/faculty/html/Details.php?id=<?php echo $res[0]["id"];?>">Courses</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 exam" href="../../../layout/faculty/html/Details.php?id=<?php echo $res[0]["id"];?>">Exams</a>
            </div>
            
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="../../../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../layout/faculty/html/Details.php?id=<?php echo $res[0]["id"];?>"><?php echo $res[0]["name"];?></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <img src="<?php echo $res[0]["background"];?>" style="width:100%;height:15em">
                <h1 class="mt-4"><?php echo $res[0]["name"];?></h1>
                <p><?php echo $res[0]["description"];?></p>
                <div style="width:80%;margin:50px auto">
                <table class="table">
                        <thead class="thead-dark"style="color:white;background-color:gray;">
                            <tr>
                            <th scope="col" colspan="4">DeTails</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">ID</th>
                            <td colspan="3"><?php echo $res[0]["id"];?></td>
                            </tr>
                            <tr>
                            <th scope="row">Faculty Name</th>
                            <td colspan="3"><?php echo $res[0]["name"];?></td>
                            </tr>
                            <tr>
                            <th scope="row">Created AT</th>
                            <td colspan="3"><?php echo $res[0]["createdAt"];?></td>
                            </tr>
                            <tr>
                            <th scope="row">Number Of Levels</th>
                            <td colspan="3"><?php echo $res[0]["levelsNum"];?></td>
                            </tr>
                            <tr>
                            <th scope="row">Year Of Specialization</th>
                            <td colspan="3"><?php echo $res[0]["specialYear"];?></td>
                            </tr>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

<!-- JS Scripts -->
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>
<script src="../js/scripts.js"></script>


<!-- JS Scripts-->
</body>
</html>