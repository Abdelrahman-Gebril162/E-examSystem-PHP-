//#region exam submition
$(document).on("submit","#examPaper",function(e){
    e.preventDefault();
    $.ajax({
    type : "post",
    url : "../../../functions/exam/submitExam.php",
    dataType : "json",
    data : $(this).serialize(),
    cache : false,
    complete: function() {
        window.location.href="/E-examSystem/";
    }
})
return false});
//#endregion