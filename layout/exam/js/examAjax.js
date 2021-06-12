//#region getCourse
$(document).ready(function(){
    $.ajax({
        url: '../../../functions/chapters/getCourse.php',
        type: 'post',
        dataType: 'json',
        success: function(response){
            var scnn=response;
            var len= scnn.length;
            for(let i=0; i<len; i++){
                let id = scnn[i].id;
                let name = scnn[i].name;
                let option = "<option value='"+id+"'>" + name + "</option>";
                $('.c').append(option);
            }
            if(len==0){
                swal.fire(
                    'error',
                    'There is no Course For NOW',
                    'error'
                )
            }
        }
    });
});
//#endregion getCourseForStudent

//#region get all chapter of specific course
$(document).on('change','.c',function(){
    $.ajax({
        url: '../../../functions/question/getChapter.php',
        type: 'post',
        data:{Cid:$(this).val()},
        dataType: 'json',
        success: function(response){
            var scnn=response;
            var len= scnn.length;
            $(".chapter").empty();
            for(let i=0; i<len; i++){
                let id = scnn[i]["id (pk)"];
                let name = scnn[i].title;
                let option = "<option value='"+id+"'>"+name+"</optoin>";
                $(".chapter").append(option);
            }
            if(len==0){
                swal.fire(
                    'error',
                    'This Course Does Not Have Any Chapter',
                    'error'
                )
            }
        }
    });
    });
    //#endregion

//#region get proffessor of specific course
$(document).on('change','.c',function(){
    $.ajax({
        url: '../../../functions/exam/getProfessor.php',
        type: 'post',
        data:{Cid:$(this).val()},
        dataType: 'json',
        success: function(response){
            if(response.length==0)
            {
                $('.pn').text("No professor");
            }
            else{
                $('.pn').val(response[0].id);
            }
        }
    });
    });
    //#endregion

//#region create exam account
$("form#createExam").submit(function(e) {
    e.preventDefault(); 
    var formData = new FormData(this);
    $.ajax({
        url: "../../../functions/exam/create.php",
        type: 'POST',
        data: formData,
        dataType:'json',
        success: callbackQ,
        cache: false,
        contentType: false,
        processData: false,
    });
});
function callbackQ(data) {
            if(data.res=='success'){
                Swal.fire({
                    title: 'Do You Want To Add More',
                    icon: 'question',
                    iconHtml: '؟',
                    confirmButtonText: 'YES',
                    cancelButtonText: 'NO',
                    showCancelButton: true,
                    showCloseButton: true
                  }).then((result) => {
                    if(result.isConfirmed){
                      location.reload();
                    }
                    else{
                        window.location.href="/E-examSystem/layout/exam/html/stable.php";
                    }
                  });
            }
            else if(data.res=='exist'){
                Swal.fire(
                    'error',
                    'This exam created',
                    'error'
                );}
                else if(data.res=='failed'){
                    Swal.fire(
                        'error',
                        'Invalid inseartion',
                        'error'
                    );}
            }
//#endregion

//#region delete exam account
$(document).on("click", ".deleteE", function(e){
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want To Delete this Exam!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result) {
            e.preventDefault();
            $.ajax({
            type : "post",
            url : "../../../functions/exam/delete.php",
            dataType : "json",  
            data : {id:$(this).attr('id')},
            cache : false,
            success : function(d){
            if(d.res == "success")
            {
                Swal.fire(
                'Success',
                'Selected exam successfully Deleted',
                'success'
                )
                location.reload();
            }
            },
            error : function(xhr, ErrorStatus, error){
            console.log(status.error);
            }
        });
        }
      })
    return false;
  });
//#endregion

//#region update exam account dont need it now
$(document).on("click", ".editE", function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        html: ` <input type='text' id='title' name='title' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='Change Title '/>
                `,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.value) {
            $.ajax({
             type : "post",
             url : "../../../functions/exam/update.php",
             dataType : "json",
             data : {id:$(this).attr('id'),title:$('#title').val()},
             cache : false,
             success : function(data){
               if(data.res == "success")
               {
                 Swal.fire(
                   'Success',
                   'Selected exam successfully updated',
                   'success'
                 )
                 location.reload();
               }
             },
             error : function(xhr, ErrorStatus, error){
               console.log(status.error);
             }
           });
        }
      })
    return false;
  });
//#endregion

//#region selectSingle exam dont need it now 
    $(document).on("click", ".viewE", function(e){
        e.preventDefault();
            $.ajax({
            type : "post",
            url : "../../../functions/exam/selectSingle.php",
            dataType : "json",  
            data : {id: $(this).attr('href')},
            cache : false,
            success : function(data){
                Swal.fire({
                    html: `
                        <h4>`+ "Exam Name : "+data[0].title+`</h4><br>
                        ` ,
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                });
            
            },
            error : function(xhr, ErrorStatus, error){
            console.log(status.error);
            }
        });
        return false;})
        //#endregion

//#region GET ALL QUESTION IN SPECIFIC CHAPTER AND COURSE
$(document).ready(function(){
    $('.cha:first').last().click(function(event){
        $.ajax({
            url: '../../../functions/exam/select.php',
            type: 'post',
            data:{Cid:$(this).val(),course:$('.c').val()},
            dataType: 'json',
            success: function(response){
                var hasmcq=false;var hastf=false;var hassen=false;var hasv=false;hasa=false;
                var iseasy=false;var ishard=false;var ismedium=false;
                response.forEach(element => {
                    console.log(element);
                    if(element.question_type=="tf"){hastf=true;}
                    else if(element.question_type=="mcq"){hasmcq=true;}
                    if(element.header_type=='a'){hasa=true;}
                    else if(element.header_type=="v"){hasv=true;}
                    else if(element.header_type=="sen"){hassen=true;}
                    if(element.difficulty=="1"){iseasy=true;}
                    else if(element.difficulty=="2"){ismedium=true;}
                    else if(element.difficulty=="3"){ishard=true;}
                });
                let mcq = "<option value='mcq'> MCQ </option>";
                let tf = "<option value='tf'>True&False</option>";
                let sen = "<option value='sen'>Just-Sentence</option>";
                let vid = "<option value='v'>Video</option>";
                let aud = "<option value='a'>Audio</option>";
                let easy = "<option value='1'>Easy</option>";
                let hard = "<option value='3'>Hard</option>";
                let med = "<option value='2'>Medium</option>";
                $('.qt:first').empty();
                $('.diff:first').empty();
                $('.ht:first').empty();
                if (hasmcq && hastf) {$('.qt:first').append(mcq);$('.qt:first').append(tf);}
                else if(hasmcq){$('.qt:first').append(mcq);}
                else if(hastf){ $('.qt:first').append(tf);}
                if (iseasy) {$('.diff:first').append(easy);}
                if(ismedium){$('.diff:first').append(med);}
                if(ishard){$('.diff:first').append(hard);}
                if (hassen) {$('.ht:first').append(sen);}
                if(hasv){$('.ht:first').append(vid);}
                if(hasa){$('.ht:first').append(aud);}
            }
        });
    })
    
    });

$(document).on("change",".cha:last",function(event){
        $.ajax({
            url: '../../../functions/exam/select.php',
            type: 'post',
            data:{Cid:$(this).val(),course:$('.c').val()},
            dataType: 'json',
            success: function(response){
                var hasmcq=false;var hastf=false;var hassen=false;var hasv=false;hasa=false;
                var iseasy=false;var ishard=false;var ismedium=false;
                response.forEach(element => {
                    console.log(element);
                    if(element.question_type=="tf"){hastf=true;}
                    else if(element.question_type=="mcq"){hasmcq=true;}
                    if(element.header_type=='a'){hasa=true;}
                    else if(element.header_type=="v"){hasv=true;}
                    else if(element.header_type=="sen"){hassen=true;}
                    if(element.difficulty=="1"){iseasy=true;}
                    else if(element.difficulty=="2"){ismedium=true;}
                    else if(element.difficulty=="3"){ishard=true;}
                });
                let mcq = "<option value='mcq'> MCQ </option>";
                let tf = "<option value='tf'>True&False</option>";
                let sen = "<option value='sen'>Just-Sentence</option>";
                let vid = "<option value='v'>Video</option>";
                let aud = "<option value='a'>Audio</option>";
                let easy = "<option value='1'>Easy</option>";
                let hard = "<option value='3'>Hard</option>";
                let med = "<option value='2'>Medium</option>";
                $('.qt:last').empty();
                $('.diff:last').empty();
                $('.ht:last').empty();
                if (hasmcq && hastf) {$('.qt:last').append(mcq);$('.qt:last').append(tf);}
                else if(hasmcq){$('.qt:last').append(mcq);}
                else if(hastf){ $('.qt:last').append(tf);}
                if (iseasy) {$('.diff:last').append(easy);}
                if(ismedium){$('.diff:last').append(med);}
                if(ishard){$('.diff:last').append(hard);}
                if (hassen) {$('.ht:last').append(sen);}
                if(hasv){$('.ht:last').append(vid);}
                if(hasa){$('.ht:last').append(aud);}
            }
        });
    });
//#endregion 


