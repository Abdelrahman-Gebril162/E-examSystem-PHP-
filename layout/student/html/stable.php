<link rel="stylesheet" href="../../../layout/student/css/stable.css">

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
                    <a href="../../../layout/student/html/create.php" id='add' class="btn btn-success" style="float:right;"><i class="fas fa-plus"></i> ADD</a>
                    </div>
                </div>
                <div class="row" style="margin:0;padding:0">
                    <div class="col-sm-8"><h1>Student <b>Details</b></h1></div>
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
                        <th>Photo</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Faculty</th>
                        <th>Department <i class="fa fa-sort"></i></th>
                        <th>City</th>
                        <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                     foreach ($res as $row) {
                    ?>
                    <?php if($row['fname'] != "master") {?> 
                        <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><img src="<?php echo $row['picture'];?>" style="width=40px;height:40px;"></td>
                        <td><?php echo $row['fname']." ".$row['lname'];?></td>
                        <td><?php echo $row['ffname'];?></td>
                        <td><?php echo$row['ddname'];?></td>
                        <td><?php echo $row['city'];?></td>
                        <td><!--url  ../../../functions -->
                            <a href="<?php echo $row['id'];?>" class="view" title="View" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                            <a href="<?php echo $row['id']; ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo $row['id']; ?>" class="delete" picture="<?php echo $row['picture']; ?>" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>
                        </td>
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