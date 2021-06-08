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
<form method="POST" id="createExam" enctype="multipart/form-data">
<div class="container">
        <div class="row">
            <div class="col-lg-3 " style="text-align: center;"></div>
            <div class="col-lg-6 " style="text-align: center;"> <h1 style="color:#c6d9ca;border:1px dotted 1px dotted #0ba8c8bf;background-color:rgb(0 0 0 / 20%);padding:30px;border-radius:50px;margin-top: 40px;">Exam Management</h1>
            </div>
            <div class="col-lg-3 " style="text-align: center;"></div>
        </div></div>
        <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="text" class="examName" placeholder="Exam Name" name="examName" required>
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
                        <input type="datetime-local" class="form-control" name="startDate" min="2021-06-07T00:00" id="startDate" placeholder="Exam Start Date" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <input type="number" class="form-control" name="duration" id="duration" min="0.5" max="3" step="0.5" placeholder="Duration of Exam (0.5:3)Hr" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <h3 style="text-align:center;Color:white">Set Question for each Chapter</h3>
            <div class="d-flex justify-content-center" id="ch1" style="width:42%;margin:20px auto;background-color:black">
                        
                        <input type="number" onchange="findTotal()" class="form-control" placeholder="Q NUM" name="qnum" id="qnum" min="1" max="10">
                        <select class="chapter form-select cha"   id="select" style="font:normal normal normal 12px/12px Arial;" name="chapter" required>
                        <option value="" disabled selected hidden>Chapter</option>
                        </select>
                        
                        <select class="qt form-select qt" id="select" style="font:normal normal normal 12px/12px Arial" name="qt" required>
                            <option value="" disabled selected hidden>Question</option>
                        </select>
                        <select class="cqdiff1 form-select diff" id="select" style="font:normal normal normal 12px/12px Arial;" name="cqdiff1" required>
                        <option value="" disabled selected hidden>Diffeculty</option>
                        </select>
                        <select class="ht form-select ht" id="select" style="font:normal normal normal 12px/12px Arial" name="ht" required>
                            <option value="" style="color:white" disabled selected hidden>header</option>
                        </select>
            </div>
            <div class="container" >
                <div class="row">
                    <div class="col-lg-4 " style="text-align: center;"></div>
                    <div class="col-lg-4 " style="text-align: center;">
                    <div class="row">
                    <button class="btn btn-secondary" onclick="repeat(this.id)" id="b1" style="font-size:15px;display:inline-block">more</button>
                    <button class="btn btn-secondary" onclick="less()" id="b2" style="font-size:15px;display:inline-block">Less</button>  
                    </div>
                    <div class="col-lg-4 " style="text-align: center;"></div>
                </div></div>
                
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                        <select class="et" id="select" name="et" required>
                            <option value="" disabled selected hidden>Exam type</option>
                            <option value="finall">Finnal</option>
                            <option value="quiz">Quiz</option>
                        </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                        <input type="text" class="pn" placeholder="There is NO Professor" name="pn" readonly required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
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
<script src="../js/examAjax.js"></script>
<script src="../../../Scripts/bootstrap.min.js"></script>
<script src="../../../Scripts/all.min.js"></script>
<script src="../../../Scripts/sweetalert.js"></script>

<!-- JS Scripts-->
</body>
</html>
<script>

/*var elements = document.querySelector('input.cqn');
var total =parseInt(elements.value);
function maxQNum(){
            var allInputOfNum = $('input.cqn').length;
            for (let index = 0; index < allInputOfNum; index++) {
            total += parseInt($('input.cqn').next().val());
            console.log(total);
            }
        repeat($("#b1").attr('id'));
    }*/
    function findTotal(){
    var arr = $("input[type='number']");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    console.log(tot);
}
        function repeat(num){
        var chnum = $('#ch'+num[1]).val();
        var self = document.getElementById(num);
        var div= $('#ch'+num[1]).first();
        div.after(div.clone());
        findTotal();
        changeName();
        
   }
    function changeName() {
        $('div#ch1:last input#qnum').attr('name','qnum'+counter);
        $('div#ch1:last .chapter').attr('name','chapter'+counter);
        $('div#ch1:last .qt').attr('name','qt'+counter);
        $('div#ch1:last .cqdiff1').attr('name','cqdiff'+counter);
        $('div#ch1:last .ht').attr('name','ht'+counter);
        counter++;
        
    }
    var counter = 2;
    function less() {
        $('div#ch1:last').remove();
        $('div#ch1:last').focus();
    }
  </script>
