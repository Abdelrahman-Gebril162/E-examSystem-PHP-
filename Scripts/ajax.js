//#region Login for all users
$(document).on("submit","#loginForm", function(){
   $.post("../../../functions/login/login.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Invalid',
          'Please input valid email / password',
          'error'
        )
      }
      else if(data.res == "success")
      {
        $('body').fadeOut();
        window.location.href = "../../../index.php";
      }
   },'json');
   return false;
});
//#endregion

//#region student ajax call
    //#region create student account
$("form#createStudent").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: "../../../functions/student/create.php",
        type: 'POST',
        data: formData,
        success: callback,
        cache: false,
        contentType: false,
        processData: false,
    });
});
function callback() {
            Swal.fire(
                'Success',
                'Successfully Added ',
                'success'
            ).then((result) => {
                if (result) {
                   window.location.href="../../../layout/student/html/";
                }
              })
}
//#endregion

//#region delete student account
$(document).on("click", ".delete", function(e){
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want To Delete this student!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.value) {
            e.preventDefault();
            $.ajax({
             type : "post",
             url : "../../../functions/student/delete.php",
             dataType : "json",  
             data : {id:$('#sid').val(),picture:$('#sp').val()},
             cache : false,
             success : function(data){
               if(data.res == "success")
               {
                 Swal.fire(
                   'Success',
                   'Selected student successfully deleted',
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

//#region update student account
$(document).on("click", ".edit", function(e){
    Swal.fire({
        title: 'Are you sure?',
        html: ` <input type='text' id='fname' name='fname' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='first Name '/>
                <input type='text' id='lname' name='lname' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='last Name '/>
                <input type='text' id='city' name='city' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='City '/>
                <input type='password' id='pass' name='password' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='password '/>`,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.value) {
            e.preventDefault();
            $.ajax({
             type : "post",
             url : "../../../functions/student/update.php",
             dataType : "json",  
             data : {id:$('#sid').val(),fname:$('#fname').val(),lname:$('#lname').val(),city:$('#lname').val(),password:$('#pass').val(),},
             cache : false,
             success : function(data){
               if(data.res == "success")
               {
                 Swal.fire(
                   'Success',
                   'Selected student successfully updated',
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

//#region selectSingle student account
$(document).on("click", ".view", function(e){
            e.preventDefault();
            $.ajax({
            type : "post",
            url : "../../../functions/student/selectSingle.php",
            dataType : "json",  
            data : {id:$('#sid').val()},
            cache : false,
            success : function(data){
                Swal.fire({
                    html: `<img src='`+data[0].picture+`' style="width:200px;height:200px;border-radius:50%">
                        <h4>`+ "firsName: "+data[0].fname+`</h4><br>
                        <h4>`+ "LastName: "+data[0].lname+`</h4><br>
                        <h4>`+ "City:  "+data[0].city+`</h4><br>
                        <h4>`+ "Faculty:  "+data[0].ffname+`</h4><br>
                        <h4>`+ "Department:  "+data[0].ddname+`</h4><br>` ,
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

//#endregion

//#region mainFunctions ajax call

//#region faculty list
$(document).ready(function(){
    $.ajax({
        url: '../../../functions/mainFunctions/getFacultyList.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            var len = response.length;
            for(let i=0; i<len; i++){
                let id = response[i].id;
                let name = response[i].name;
                let option = "<option value='"+id+"'>"+name+"</optoin>";
                $(".faculty").append(option);
            }
            
        }
    });
});
//#endregion

//#region department list of specific faculty
$(document).ready(function(){
    let level=0;
    $(".faculty").change(function(){
        $.ajax({
            url: '../../../functions/mainFunctions/getDepartmentList.php',
            data: {id: $(".faculty").val()},
            type: 'get',
            dataType: 'JSON',
            success: function(response){
                $(".department").empty();
                $(".facultyLevels").append("<option value='' disabled selected hidden>Choose a Department</option>");
                var len = response.length;
                for(let i=0; i<len; i++){
                    let id = response[i].id;
                    let name = response[i].name;
                    level = response[i].level;
                    let option = "<option value='"+id+"'>"+name+"</optoin>";
                    $(".department").append(option);
                }
            },
            complete: function(){
                $(".facultyLevels").empty();
                $(".facultyLevels").append("<option value='' disabled selected hidden>Choose a Level</option>");
                for(let i=1; i<=level; i++){
                    let option = "<option value='"+i+"'>"+'LEVEL '+i+"</optoin>";
                    $(".facultyLevels").append(option);
                }
            }
        });
    })
    
});
//#endregion

//#endregion mainFuncions

//#region logout from websit 
$(".logout").click(function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want To Logout!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.value) {
          window.location.href = "functions/logout/logout.php";
          $('body').fadeToggle(3000);
        }
      })
});
//#endregion
