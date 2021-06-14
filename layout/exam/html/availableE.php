<?php include "../../../functions/exam/selectAllExam.php";?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../contents/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../../../contents/css/all.min.css">
    <link rel="stylesheet" href="../../../layout/student/css/style.css">
    <link rel="stylesheet" href="../../../layout/professor/css/stable.css">
    <style>
    .pending{
        color:orange;
        font-weight:bold;
    }
    .complete{
        color:red;
    }
    .start{
        color:green;
    }
    </style>
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
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row" style="margin:0;padding:0">
                    <div class="col-sm-8"><h1><b>Available</b> Exams</h1></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="search" id="myInput" class="form-control" placeholder="&#x1F50E;&#xFE0E; Search">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" id="myTable">
                <thead>
                        <th>Exam id</th>
                        <th>Faculty Name</th>
                        <th>Exam Title</th>
                        <th>Course Name</th>
                        <th>Total_Question</th>
                        <th>startDate<i class="fa fa-sort"></i></th>
                        <th>Exam Duration</th>
                        <th>Status</th>
                </thead>
                <tbody>
                <?php $i =0; ?>
                <?php if($_SESSION['courses'] == NULL) { ?>
                <tr>
                <td colspan="8"> NO Exam Created YEt</td>
                </tr>
                <?php } ?>
                <?php if($_SESSION['courses'] != NULL) { ?>
                    <?php
                    foreach ($res as $row) {
                    ?>
                    <?php foreach ($_SESSION['courses'] as $c=>$cid) { ?>
                        <?php if($cid==$row['cid']) { ?>
                        <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['ffname'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['cname'];?></td>
                        <td><?php echo $row['question_num'];?></td>
                        <td class="s" duration="<?php $workingHours = (strtotime($row['endTime']) - strtotime($row['startDate'])) / 3600;echo $workingHours." Hours";?>" exam="<?php echo $row['id'];?>"><?php echo $row['startDate']?></td>
                        <td><?php $workingHours = (strtotime($row['endTime']) - strtotime($row['startDate'])) / 3600;echo $workingHours." Hours";?></td>
                        <td class="enroll<?php echo $i++;?>" exam="<?php echo $row['id'];?>" style="border:1px solid gray;border:radius:50%;background-color:black">-----</td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                <?php } ?>
                <?php } ?>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>  
</div>
<script src="../../../Scripts/jquery-3.6.0.min.js"></script>
<script src="../js/checkTime.js"></script>
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>
</script>
</body>
</html>