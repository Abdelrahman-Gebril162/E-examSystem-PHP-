<?php include "../../../functions/profile/getUser.php"; ?>
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
    <link rel="stylesheet" href="../css/style.css">
    <!--    Css Stylesheets-->
</head>
<body>
<nav>
        <ul>
            <li class="menu">
              <a href="#"><i class="bi bi-chat-square-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                  </svg>
                </i>
                </a>
                  <ul class="submenu">
                    <li><a href="/E-examSystem/">Home</a></li>
                    <li><a href="/E-examSystem/layout/faculty/html/allFaculty.php">Faculty</a></li>
                    <li><a href="/E-examSystem/layout/exam/html/AvailableE.php">Exam</a></li>
                  </ul>
            </li>
            <li><img src="<?php if($res==NULL)echo $res3[0]['picture'];else{echo $res[0]['picture'];}?>" class="red" style="margin-top: 1px;"></li>
            <li>
<i class="bi bi-person-plus">         
<svg xmlns="http://www.w3.org/2000/svg"  width="24" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                  </svg>
</i>
</li>
<li>
<i class="bi bi-bell"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
  </svg></i></li>
  <li>
  <i class="bi bi-search"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
  </svg></i></li>            
  
  <li><a></a></li>


        </ul>

    </nav>
   
<div class="container">
    <div class="row">
        <div class="col-lg-2 " style="text-align: center;">
            <img src="<?php if($res==NULL)echo $res3[0]['picture'];else{echo $res[0]['picture'];}?>" class="amira">

          <a> <figcaption class="figure-caption">edit photo</figcaption></a> 

    </div>
    <div class=" bor col-lg-5  ">
        <h2>
        <?php if($res==NULL){echo $res3[0]['fname']." ". $res3[0]['lname'];}else{echo $res[0]['fname']." ". $res[0]['lname'];}?>
        </h2>
        <br>
        <br>
        <p>
            Faculty Name: <?php if($res==NULL)echo $res3[0]['ffname'];else{echo $res[0]['ffname'];}?>
            </p>
            <p>
            <?php if($_SESSION['loginSession']['role_id']==1 ||$_SESSION['loginSession']['role_id']==3 ) { ?>
            Mobile <?php echo $res[0]['mobileN']?> 
            <?php } ?>
            <?php if($_SESSION['loginSession']['role_id']==2 ) { ?>
            Level <?php if($res==NULL)echo $res3[0]['level'];else{echo $res[0]['level'];}?>
            <?php } ?>
            </p>
            <p>
                Department: <?php if($res==NULL)echo $res3[0]['ddname'];else{echo $res[0]['ddname'];}?>
            </p>
            <p>
            <?php if($_SESSION['loginSession']['role_id']==1 ||$_SESSION['loginSession']['role_id']==3 ) { ?>
            National_id <?php echo $res[0]['N_id']?> 
            <?php } ?>
            <?php if($_SESSION['loginSession']['role_id']==2 ) { ?>
            Total Result <?php if($res!=NULL) {$coursesTotal=0;$studenTotal=0; foreach($res as $u) {$studenTotal+=$u['grade'];foreach($res2 as $s) { if($s['name']==$u['name']){$coursesTotal+=$s['CSum'];}}} echo (($studenTotal*100)/$coursesTotal)." %";}?>
            <?php } ?>
            </p>
            <p>
                gmail : <?php if($res==NULL)echo $res3[0]['email'];else{echo $res[0]['email'];}?>
            </p>

</div>

<div class="bor col-lg-5">
</div>

</div>
<center style="font-size:30px;font-weight:bold;">Courses List</center>
<?php if($_SESSION['loginSession']['role_id']==1 ||$_SESSION['loginSession']['role_id']==3 ) { ?>
<div class="container">
    <div class="row" >
    <?php foreach($res as $u) {?>
    <div class="org col-lg-4">
        <div class="column">
            <h1> Course Name: <?php echo $u['name'];?></h1>
            <p><span style="color: white;font-size: 25px;">+</span>Chapters Count:<?php echo $u['chaptersNum'];?> </p>
            <p><span style="color: white;font-size: 25px;">+</span>Cridet Hours: <?php echo $u['credit_hours'];?> </p>            
        </div>
    </div>
    <?php } ?>
    </div>
</div>
<?php } ?>
<?php if($_SESSION['loginSession']['role_id']==2 ) { ?>
<div class="container">
    <div class="row" >
    <?php if($res!=NULL) { ?>
    <?php foreach($res as $u) {?>
    <div class="org col-lg-4" >
        <div class="column" style="height:100%">
            <h1> Course Name: <?php echo $u['name'];?></h1>
            <p><span style="color: white;font-size: 25px;">+</span>Chapters Count:<?php echo $u['chaptersNum'];?> </p>
            <p><span style="color: white;font-size: 25px;">+</span>Cridet Hours: <?php echo $u['credit_hours'];?> </p>            
            <?php foreach($res2 as $s) {?>
            <?php if($s['name']==$u['name']) { ?>
            <p><span style="color: white;font-size: 25px;">+</span> YOur Grade:  <?php echo $u['grade'];?> /<?php echo $s['CSum'];?> </p>
            <?php if(($u['grade']*100)/$s['CSum']>=50){echo '<p><span style="color: white;font-size: 25px;">+</span> Result: <span style="color: green;font-size: 15px;font-weight:bold;">SUCCESS</span> </p>';}elseif($u['grade']==NUll){echo '<p><span style="color: white;font-size: 25px;">+</span> Result: <span style="color: blue;font-size: 15px;font-weight:bold;">Take Exam First</span> </p>';}else{echo '<p><span style="color: white;font-size: 25px;">+</span> Result: <span style="color: RED;font-size: 15px;font-weight:bold;">FAILED</span> </p>';}?>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <?php } ?>
    </div>
</div>
<?php } ?>
<!-- JS Scripts -->
<script src="../../../Scripts/jquery-3.6.0.min.js"></script>
<script src="../../../Scripts/ajax.js"></script>
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>

<!-- JS Scripts-->
</body>
</html>