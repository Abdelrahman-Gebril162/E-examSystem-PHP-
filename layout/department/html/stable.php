<?php include "../../../functions/mainFunctions/conn.php";?>
<?php include "../../../functions/department/select.php";?><!DOCTYPE html>
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
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                    <a href="../../../layout/department/html/create.php" id='add' class="btn btn-success" style="float:right;"><i class="fas fa-plus"></i> ADD</a>
                    </div>
                </div>
                <div class="row" style="margin:0;padding:0">
                    <div class="col-sm-8"><h1><b>Department</b> Details</h1></div>
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
                        <th>#</th>
                        <th>Faculty Logo</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Description</th>
                        <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                     foreach ($res as $row) {
                    ?>
                    <?php if($row['name'] != "masterDep") {?> 
                        <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><img src="<?php echo $row['logo'];?>" style="width=40px;height:40px;"></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td><!--url  ../../../functions -->
                            <a href="<?php echo $row['id'];?>" style="color:#03A9F4" class="viewD" title="View" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                            <a id="<?php echo $row['id'];?>" style="color:#FFC107" class="editD" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                            <a id="<?php echo $row['id'];?>" picture="<?php echo $row['logo'];?>" style="color:#E34724" class="deleteD" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>
                        </tr>
                        <?php } ?>
                <?php
                }
                ?>
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
<script src="../../../Scripts/ajax.js"></script>
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>