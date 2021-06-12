<?php include "../../../functions/exam/getExam.php";$total =0;$questionNum=1; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Exam</title>
</head>

<body>
    <div class="row header">
        <div class="col-12 col-md-1"><img src="../images/Group 604.svg" style="width: 90%;height: 85%; padding:  8px 0 8px;"></div>
        <div class="col-12 col-md-6"><br><i class="bi bi-star-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
        </svg></i>ONLINE UNIVERSITY<br> <i class="bi bi-star-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
        </svg></i>faculty of <?php echo $facultyName;?> </div>
        <div class="col-12 col-md-4" style="padding-left: 0%;"><div class="border"><i class="bi bi-star-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
        </svg></i>
        professor: <?php echo $profName;?></div> <div class="border"><i class="bi bi-star-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                        </svg></i> Course: <?php echo $courseName;?></div><div class="border"><i class="bi bi-star-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                        </svg></i>level: <?php echo $level;?></div><i class="bi bi-star-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                        </svg></i> <h5 style="position:relative;top:-20px;left:20px">Duration of Exam: <?php echo $duration;?></h5></div>
    </div>
    <form method="post" id="examPaper">
        <h1 colspan="4" class="Timer" style="text-align: center;"></h1>
        <div class="container" style="background-color:white;font-size:16px">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th colspan="4" style="text-align:left">Total Mark of Exam <?php foreach ($res as $q) {$total+=$q['question_mark'];}?> (<?php echo $total;?>)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach ($res as $q) { ?>
                    <tr>
                        <th colspan="4" style="text-align:left;margin:auto">Q<?php $questionNum++?>: <?php echo $q['header'];?> 
                    
                    <?php if($q['header_type'] == "a") { ?>
                        <audio controls style="border:1px solid gray; float:right;">
                        <source src="<?php echo $q['va'];?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                    <?php } ?>
                    <?php if($q['header_type'] == "v") { ?>
                        <video width="400" height="150" controls>
                            <source src="<?php echo $q['va'];?>" type="video/mp4">
                            Your browser does not support the video tag.
                            </video>                    
                    <?php } ?>
                    </th>
                    </tr>
                    <tr>
                        <td><input type="radio" name="<?php echo $q['id'];?>" value="<?php echo $q['answerA'];?>" aria-label="Radio button for following text input"><?php echo $q['answerA'];?></td>
                        <td><input type="radio" name="<?php echo $q['id'];?>" value="<?php echo $q['answerB'];?>" aria-label="Radio button for following text input"><?php echo $q['answerB'];?></td>
                        <?php if($q['question_type'] != "tf") { ?>
                        <td><input type="radio" name="<?php echo $q['id'];?>" value="<?php echo $q['answerC'];?>" aria-label="Radio button for following text input"><?php echo $q['answerC'];?></td>
                        <td><input type="radio" name="<?php echo $q['id'];?>" value="<?php echo $q['answerD'];?>" aria-label="Radio button for following text input"><?php echo $q['answerD'];?></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
        </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" style="text-align: center;">best wishes</th>
                </tr>
            </tfoot>
            
    </table>
    <button type="submit" class="ff" style="margin:0 50% 0 50% ;">submit</button>
    <input type="hidden" class="exam" name="examid" value="<?php echo $_GET['id'];?>">
    </div>
    <div class="tar"></div>
</form>
    <script src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        function preventBack(){window.history.forward();}
        setTimeout(preventBack, 0);
        window.onunload=function(){null};
    });
</script>
<script>
setInterval(check,1000);
function check(){
$(document).ready(function(){
        var start = new Date("<?php echo $profR[0]['startDate']?>");
        var duration =  parseFloat(<?php echo ($durationm/1000)*-1;?>);
        var end =start.getTime()+duration;
        console.log(end);
        if(Date.now()>=end){
            clearInterval();
            $( "#examPaper" ).submit(function(e){e.preventDefault();});
            alert("finished");
            window.location.href="/E-examSystem/layout/exam/html/availableE.php";
        }
});
};
$(document).on("submit","#examPaper",function(){
                clearInterval();
                alert();
                $.ajax({
                type : "post",
                url : "../../../functions/exam/submitExam.php",
                dataType : "json",
                data : $(this).serialize(),
                cache : false,
                success:function(){
                }
            });
        });
</script>
</body>
</html>