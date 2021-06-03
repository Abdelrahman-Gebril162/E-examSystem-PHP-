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
<form method="POST" id="createFaculty" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-lg-3 " style="text-align: center;"></div>
        <div class="col-lg-6 " style="text-align: center;">
            
            <label for="file-input">
            <img id="image_preview" src="../../../upload/defaultImages/Faculty_default.png"style="cursor: pointer; width: 25vw; height: 35vh; border-radius: 50%;"/><br>
              <input type="file" id="upload" onchange="readfile(this)" name="upImage" style="position:relative;right:-98px;margin-top:10px;"/>
            </label>
        </div>
        </div>
        <div class="col-lg-3 " style="text-align: center;"></div>
    </div>
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
                         <select class="level" id="select" name="level" required>
                            <option value="" disabled selected hidden>Choose a Level</option>
                            <option value="1">1 Year</option>
                            <option value="2">2 Year</option>
                            <option value="3">3 Year</option>
                            <option value="4">4 Year</option>
                            <option value="5">5 Year</option>
                            <option value="6">6 Year</option>
                            <option value="7">7 Year</option>
                         </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>

                </div></div>                
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="special" id="select" name="special" required>
                            <option value="" disabled selected hidden>Choose a Special Year</option>
                            <option value="1">1st first</option>
                            <option value="2">2sc second</option>
                            <option value="3">3d third</option>
                            <option value="4">4th fourth</option>
                            <option value="5">5th fiveth</option>
                            <option value="6">6th Sixth</option>
                            <option value="7">7th Seventh</option>
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
<script>
function readfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<!-- JS Scripts -->
<script src="../../../Scripts/jquery-3.6.0.min.js"></script>
<script src="../../../Scripts/ajax.js"></script>
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>

<!-- JS Scripts-->
</body>
</html>