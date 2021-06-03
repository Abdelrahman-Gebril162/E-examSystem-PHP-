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
        success: callbackk,
        cache: false,
        contentType: false,
        processData: false,
    });
});
function callbackk(data) {
            var dd=JSON.parse(data);
            if(dd.res=='success'){
                Swal.fire(
                    'Success',
                    'Successfully Added ',
                    'success'
                ).then((result) => {
                    if (result) {
                       window.location.href="../../../layout/student/html/";
                    }
                  });
            }
            else{
                Swal.fire(
                    'warning',
                    'check email,mobile,National id (May be Exist)',
                    'warning'
                );
            }
            
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
             data : {id:$(this).attr('href'),picture:$(this).attr('picture')},
             cache : false,
             success : function(d){
               if(d.res == "success")
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
             data : {id:$(this).attr('href'),fname:$('#fname').val(),lname:$('#lname').val(),city:$('#lname').val(),password:$('#pass').val(),},
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
            data : {id:$(this).attr('href')},
            cache : false,
            success : function(data){
                Swal.fire({
                    html: `<img src='`+data[0].picture+`' style="width:200px;height:200px;border-radius:50%">
                        <h4>`+ "firsName: "+data[0].fname+`</h4><br>
                        <h4>`+ "LastName: "+data[0].lname+`</h4><br>
                        <h4>`+ "City:  "+data[0].city+`</h4><br>
                        <h4>`+ "Faculty:  "+data[0].ffname+`</h4><br>
                        <h4>`+ "Department:  "+ data[0].Dname+`</h4><br>` ,
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
    var level=0;
    $(".faculty").change(function(){
        var len=0;
        $.ajax({
            url: '../../../functions/mainFunctions/getDepartmentList.php',
            data: {id: $(".faculty").val()},
            type: 'get',
            dataType: 'JSON',
            success: function(response){
                $(".department").empty();
                len = response.length;
                if(len==0){
                    $(".department").append("<option value='' selected >General Department</option>");
                    }
                for(let i=0; i<len; i++){
                    let id = response[i].id;
                    let name = response[i].name;
                    level = response[i].level;
                    let option = "<option value='"+id+"'>"+name+"</optoin>";
                    $(".department").append(option);
                }
                if(len<1){
                    swal.fire(
                        "warning",
        `<pre><b>User</b> will be in :->
        General Department 
        level will be 1 if <b>Student</b></pre>`,
                    );
                }
            },
            complete: function(){
                $(".facultyLevels").empty();
                if(len==0){
                    $(".facultyLevels").append("<option value='' selected>LeveL 1</option>");
                }
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

//#region getAccount ajac call
var role="";
$('button').click(function(s){
    role = s.target.value;
});
$(document).on('click', '#subm', function(e){
    e.preventDefault();
    $.ajax({
    type : "post",
    url : "../../../functions/mainFunctions/getAccount.php",
    dataType : "json",  
    data : {Nid:$('#Nid').val(),rolep:role,roleS:role},
    cache : false,
    success : function(data){
        if(data[0] !=null)
        {
            Swal.fire({
                html: `<img src='`+data[0].picture+`' style="width:200px;height:200px;border-radius:50%">
                    <h4>`+ "Your Email: "+data[0].email+`</h4><br>
                    <h4>`+ "Your Password: "+data[0].password+`</h4>`,
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
              });
        }
        else
        {
            Swal.fire(
                'Not Found User',
                'Please Ask Admin To Create Acccount For You',
                'error'
              );
        }
    },
    error : function(xhr, ErrorStatus, error){
    console.log(status.error);
    }
});
return false;});
//#endregion

//#region professor Crud 
    //#region Create prof
    $("form#createProfessor").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
    
        $.ajax({
            url: "../../../functions/professor/create.php",
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
                       window.location.href="../../../layout/professor/html/";
                    }
                  })
    }
    //#endregion

    //#region delete professor account
$(document).on("click", ".deleteP", function(e){
    Swal.fire({
        title: 'Are you sure?',
        text: "You Want To Delete this Professor!",
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
            url : "../../../functions/professor/delete.php",
            dataType : "json",  
            data : {id:$(this).attr('href'),picture:$(this).attr('picture')},
            cache : false,
            success : function(data){
            if(data.res == "success")
            {
                Swal.fire(
                'Success',
                'Selected student successfully deleted',
                'success'
                );
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

    //#region update professor account
$(document).on("click", ".editP", function(e){
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
             url : "../../../functions/professor/update.php",
             dataType : "json",  
             data : {id:$(this).attr('href'),fname:$('#fname').val(),lname:$('#lname').val(),city:$('#city').val(),password:$('#pass').val(),},
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

     //#region selectSingle professor account
$(document).on("click", ".viewP", function(e){
    e.preventDefault();
    $.ajax({
    type : "post",
    url : "../../../functions/professor/selectSingle.php",
    dataType : "json",  
    data : {id: $(this).attr('href')},
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

//#region faculty ajax call
    //#region create faculty account
    $("form#createFaculty").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
    
        $.ajax({
            url: "../../../functions/faculty/create.php",
            type: 'POST',
            data: formData,
            success: callbackf,
            cache: false,
            contentType: false,
            processData: false,
        });
    });
    function callbackf(data) {
        var dataa =JSON.parse(data);
                if(dataa.res=='success'){
                    Swal.fire(
                        'Success',
                        'Successfully Added ',
                        'success'
                    ).then((result) => {
                        if (result) {
                           window.location.href="../../../layout/faculty/html/index.php";
                        }
                      });
                }
                else{
                    Swal.fire(
                        'warning',
                        'check data enter my be inserted before',
                        'warning'
                    );
                }
                
    }
    //#endregion
    
        //#region delete faculty account
    $(document).on("click", ".deleteF", function(e){
        Swal.fire({
            title: 'Are you sure?',
            text: "You Want To Delete this faculty!",
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
                 url : "../../../functions/faculty/delete.php",
                 dataType : "json",  
                 data : {id:$(this).attr('id'),picture:$(this).attr('picture')},
                 cache : false,
                 success : function(d){
                    alert(d.res);
                   if(d.res == "success")
                   {
                     Swal.fire(
                       'Success',
                       'Selected faculty successfully deleted',
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
    
        //#region update faculty account
    $(document).on("click", ".editF", function(e){
        Swal.fire({
            title: 'Are you sure?',
            html: ` <input type='text' id='name' name='name' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='Name '/>
                    <input type='text' id='description' name='description' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='Put another Description '/>`,
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
                 url : "../../../functions/faculty/update.php",
                 dataType : "json",  
                 data : {id:$(this).attr('id'),name:$('#name').val(),description:$('#description').val()},
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
    
        //#region selectSingle faculty
    $(document).on("click", ".viewF", function(e){
        e.preventDefault();
    $.ajax({
    type : "post",
    url : "../../../functions/faculty/selectSingle.php",
    dataType : "json",  
    data : {id: $(this).attr('href')},
    cache : false,
    success : function(data){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          });
          window.location.href = "../../../layout/faculty/html/Details.php?id="+data[0].id;
    },
    error : function(xhr, ErrorStatus, error){
    console.log(status.error);
    }
    });return false;})
    //#endregion
    
    //#endregion
