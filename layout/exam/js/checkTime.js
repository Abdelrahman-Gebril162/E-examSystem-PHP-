
//#region  check Time exam
setInterval(check,1000);
function check(){
$(document).ready(function(){
    $( ".s" ).each(function( index ) {
        var start = new Date($(this).text());
        var duration =  parseFloat($(this).attr("duration")) * 3600000;
        var end =start.getTime()+duration;
        var status = $(this).next().next().attr("class");
        if (Date.now()>=start && Date.now()< end){
            $("."+status).text("Starting");
            $("."+status).css({"cursor":"pointer","color":"green","font-weight":"bold"});
            $("."+status).attr("id","start");
            $.ajax({
                type : "post",
                url : "../../../functions/exam/updateStatus.php",
                dataType : "json",
                data : {id:$(this).attr('exam'),state:"start"},
                cache : false,
              });
        }
        else if(Date.now()>=end){
            $("."+status).text("complete");
            $("."+status).css({"cursor":"default","color":"red","font-weight":"bold"});
            $("."+status).attr("id","complete");
            $.ajax({
                type : "post",
                url : "../../../functions/exam/updateStatus.php",
                dataType : "json",
                data : {id:$(this).attr('exam'),state:"complete"},
                cache : false,
              });
        }
        else if(Date.now()<start){
            $("."+status).text("Pending");
            $("."+status).css({"cursor":"default","color":"orange","font-weight":"bold"});
            $("."+status).attr("id","pending");
            $.ajax({
                type : "post",
                url : "../../../functions/exam/updateStatus.php",
                dataType : "json",
                data : {id:$(this).attr('exam'),state:"pending"},
                cache : false,
              });
        }
    });
});
}
//#endregion

//#region  events for each button appear
$(document).on("click","#start",function(){
    var examId = $(this).attr('exam');
    $.ajax({
        type : "post",
        url : "../../../functions/exam/updateattendance.php",
        dataType : "json",
        data : {id:$(this).attr('exam'),state:"start"},
        cache : false,
      });
    window.location.href="/E-examSystem/layout/exam/html/ExamPaper.php?id="+examId;
});
$(document).on("click","#complete",function(){
        alert("Exam Completed");
    
});
$(document).on("click","#pending",function(){
        alert("Exam Not start Yet");
    
});
//#endregion

//#region exam submition




//#endregion









//#region exam submition

