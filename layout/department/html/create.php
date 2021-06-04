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
    <link rel="stylesheet" href="../css/create.css">
    <!--    Css Stylesheets-->
</head>
<body>

<ul class="nav justify-content-center" style="background-color:white;">
  <li class="nav-item">
    <a class="nav-link" href="../../../index.php">HOME</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Disabled</a>
  </li>
</ul>
<form method="POST" id="createDepartment" enctype="multipart/form-data">
<div class="container">
        <div class="row">
            <div class="col-lg-3 " style="text-align: center;"></div>
            <div class="col-lg-6 " style="text-align: center;"> <h1 style="color:#c6d9ca;border:1px dotted 1px dotted #0ba8c8bf;background-color:rgb(0 0 0 / 20%);padding:30px;border-radius:50px;margin-top: 40px;">Create Departments</h1>
            </div>
            <div class="col-lg-3 " style="text-align: center;"></div>
        </div></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 " style="text-align: center;"></div>
            <div class="col-lg-6 " style="text-align: center;">  <input type="text" id="name" name="name" placeholder="name" required>
            </div>
            <div class="col-lg-3 " style="text-align: center;"></div>
        </div></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 " style="text-align: center;"></div>
                <div class="col-lg-6 " style="text-align: center;">  <input type="text" id="description" name="description" placeholder="Descripe This Faculty" required>
                </div>
                <div class="col-lg-3 " style="text-align: center;"></div>
            </div></div>     
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="faculty" id="select" name="faculty" required>
                            <option value="" disabled selected hidden>Choose a Faculty</option>
                         </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>                
                    </div></div> 
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 " style="text-align: center;"></div>
                        <div class="col-lg-6 " style="text-align: center;">
                            <button type="submit" class="btn btn-secondary btn-sm">Send</button> 
                        </div>
                        <div class="col-lg-3 " style="text-align: center;"></div>
                    </div></div>
</form>
<!-- JS Scripts -->
<script src="../../../Scripts/jquery-3.6.0.min.js"></script>
<script src="../../../Scripts/ajax.js"></script>
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>

<!-- JS Scripts-->
</body>
</html>