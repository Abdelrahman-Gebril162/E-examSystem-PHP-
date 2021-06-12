<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
<form method="POST" id="createQuestion" enctype="multipart/form-data">
<div class="container">
        <div class="row">
            <div class="col-lg-3 " style="text-align: center;"></div>
            <div class="col-lg-6 " style="text-align: center;"> <h1 style="color:#c6d9ca;border:1px dotted 1px dotted #0ba8c8bf;background-color:rgb(0 0 0 / 20%);padding:30px;border-radius:50px;margin-top: 40px;">Question Bank</h1>
            </div>
            <div class="col-lg-3 " style="text-align: center;"></div>
        </div></div>
<div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="qt" id="select" name="qt" required>
                            <option value="" disabled selected hidden>Choose Question type</option>
                            <option value="mcq">MCQ</option>
                            <option value="tf">True & False</option>
                        </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="ht" id="select" name="ht" required>
                            <option value="" style="color:white" disabled selected hidden>Choose Question header type</option>
                            <option value="snt">sentence</option>
                            <option value="v">Video</option>
                            <option value="a">audio</option>
                        </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="text" class="header" placeholder="header of Question" name="header" style="display:none;" required>
                         <label for="vaSource" class="labelH" style="color:white;font-size:30px;display:none;">Video | Audio File</label>
                         <input type="file" name="vaSource" accept=".mp4,.mp3" size="" class="vaSource form-control" style="font-size:30px;display:none;" placeholder="header of Question (audio, vidio)" name="headerva" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>

                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="text" class="ana" placeholder="Answer number one" name="ana" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="text" class="anb" placeholder="Answer number Two" name="anb" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="text" class="anc" placeholder="Answer number Three" name="anc" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="text" class="and" placeholder="Answer number Four" name="and" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="cha" id="select" name="cha" required>
                            <option value="" disabled selected hidden>Choose Correct answer</option>
                            <option class="o1" value="1">Answer one 1</option>
                            <option class="o2" value="2">Answer two 2</option>
                            <option class="o3" value="3">Answer three 3</option>
                            <option class="o4" value="4">Answer four 4</option>
                         </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="number" class="mark form-control" placeholder="Mark For Correct Answer" min="1" max="15" style="padding:20px;font-size:25px" name="mark" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="diff" id="select" name="diff" required>
                            <option value="" disabled selected hidden>Choose Diffeculty</option>
                            <option value="1">easy</option>
                            <option value="2">medium</option>
                            <option value="3">hard</option>
                         </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div> 
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="c" id="select" name="c" required>
                            <option value="" disabled selected hidden>Choose Course</option>
                         </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div> 

                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="chapter" id="select" name="chapter" required>
                            <option value="" disabled selected hidden>Choose Chapter From this Course</option>
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