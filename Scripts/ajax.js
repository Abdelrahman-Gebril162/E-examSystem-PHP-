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

//#region professor list
$(document).on('change','.faculty',function(){
    $.ajax({
        url: '../../../functions/mainFunctions/getProfessor.php',
        type: 'GET',
        data: {id:$(".faculty").val()},
        success: function(response){
            var da = JSON.parse(response);
            console.log(da);
            var len = da.length;
            for(let i=0; i<len; i++){
                let id = da[i].id;
                let name = da[i].name;
                let option = "<option value='"+id+"'>"+name+"</optoin>";
                $(".professor").append(option);
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
          window.location.href = "/E-examSystem/functions/logout/logout.php";
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

//#region Department ajax call
    //#region create department faculty account
    $("form#createDepartment").submit(function(e) {
        e.preventDefault(); 
        var formData = new FormData(this);
        
        $.ajax({
            url: "../../../functions/department/create.php",
            type: 'POST',
            data: formData,
            success: callbackD,
            cache: false,
            contentType: false,
            processData: false,
        });
    });
    function callbackD(data) {
        var dataa =JSON.parse(data);
                if(dataa.res=='success'){
                    Swal.fire(
                        'Success',
                        'Successfully Added ',
                        'success'
                    ).then((result) => {
                        if (result) {
                           //window.location.href="../../../layout/department/html/stable.php";
                        }
                      });
                }
                else{
                    Swal.fire(
                        'error',
                        'This Department Created Before',
                        'error'
                    );
                }
                
    }
    //#endregion
    
    //#region delete department account
    $(document).on("click", ".deleteD", function(e){
        Swal.fire({
            title: 'Are you sure?',
            text: "You Want To Delete this Department!",
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
                 url : "../../../functions/department/delete.php",
                 dataType : "json",  
                 data : {id:$(this).attr('id')},
                 cache : false,
                 success : function(d){
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
    
    //#region update department account
    $(document).on("click", ".editD", function(e){
        e.preventDefault();
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
                $.ajax({
                 type : "post",
                 url : "../../../functions/department/update.php",
                 dataType : "json",  
                 data : {id:$(this).attr('id'),name:$('#name').val(),description:$('#description').val()},
                 cache : false,
                 success : function(data){
                   if(data.res == "success")
                   {
                     Swal.fire(
                       'Success',
                       'Selected Department successfully updated',
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
    
    //#region selectSingle department
    $(document).on("click", ".viewD", function(e){
        e.preventDefault();
        $.ajax({
        type : "post",
        url : "../../../functions/department/selectSingle.php",
        dataType : "json",  
        data : {id: $(this).attr('href')},
        cache : false,
        success : function(data){
            Swal.fire({
                html: `<h3>Department Faculty LOGO </h3>
                    <img src='`+data[0].logo+`' Title="Faculty Logo" style="width:200px;height:200px;border-radius:50%">
                    <h4>`+ "Name: "+data[0].name+`</h4><br>
                    <h4>`+ "Faculty Name: "+data[0].fname+`</h4><br>
                    <h4>`+ "Description:  "+data[0].description+`</h4><br>
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
    
//#endregion

//#region Course ajax call
    //#region create course account
    $("form#createCourse").submit(function(e) {
        e.preventDefault(); 
        var formData = new FormData(this);
        
        $.ajax({
            url: "../../../functions/course/create.php",
            type: 'POST',
            data: formData,
            success: callbackD,
            cache: false,
            contentType: false,
            processData: false,
        });
    });
    function callbackD(data) {
        var dataa =JSON.parse(data);
                if(dataa.res=='success'){
                    Swal.fire(
                        'Success',
                        'Successfully Added ',
                        'success'
                    )/*.then((result) => {
                        if (result) {
                           //window.location.href="../../../layout/department/html/stable.php";
                        }
                      });*/
                }
                else{
                    Swal.fire(
                        'error',
                        'This Course Created Before',
                        'error'
                    );
                }
                
    }
    //#endregion
    
    //#region delete course account
    $(document).on("click", ".deleteC", function(e){
        Swal.fire({
            title: 'Are you sure?',
            text: "You Want To Delete this Course!",
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
                 url : "../../../functions/course/delete.php",
                 dataType : "json",  
                 data : {id:$(this).attr('id')},
                 cache : false,
                 success : function(d){
                   if(d.res == "success")
                   {
                     Swal.fire(
                       'Success',
                       'Selected faculty successfully Course',
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
    
    //#region update department account
    $(document).on("click", ".editC", function(e){
        e.preventDefault();
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
                $.ajax({
                 type : "post",
                 url : "../../../functions/course/update.php",
                 dataType : "json",  
                 data : {id:$(this).attr('id'),name:$('#name').val(),description:$('#description').val()},
                 cache : false,
                 success : function(data){
                   if(data.res == "success")
                   {
                     Swal.fire(
                       'Success',
                       'Selected Course successfully updated',
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
    
    //#region selectSingle department
    $(document).on("click", ".viewC", function(e){
        e.preventDefault();
        $.ajax({
        type : "post",
        url : "../../../functions/course/selectSingle.php",
        dataType : "json",  
        data : {id: $(this).attr('href')},
        cache : false,
        success : function(data){
            Swal.fire({
                html: `<h3>Course Faculty LOGO </h3>
                    <img src='`+data[0].logo+`' Title="Faculty Logo" style="width:200px;height:200px;border-radius:50%">
                    <h4>`+ "Name: "+data[0].name+`</h4><br>
                    <h4>`+ "Faculty Name: "+data[0].fname+`</h4><br>
                    <h4>`+ "Description:  "+data[0].description+`</h4><br>
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
    
//#endregion

//#region studentCourseEn ajax call
    //#region getAllStudent
 $(document).ready(function(){
    $.ajax({
        url: '../../../functions/studentCourseEn/allStudent.php',
        type: 'get',
        dataType: 'json',
        success: function(response){
            var scnn=response;
            var len= scnn.length;
            for(let i=0; i<len; i++){
                let id = scnn[i].id;
                let fname = scnn[i].fname;
                let lname = scnn[i].lname;
                let option = "<option value='"+id+"' class='ss' fId='"+scnn[i].faculty_id+"' level='"+scnn[i].level+"'>"+fname+" "+lname +" id:"+ id+"</optoin>";
                $(".StudentName").append(option);
            }
        }
    });
    });
 //#endregion getAllStudent
    //#region getCourseForStudent
    $(document).on('change','.StudentName',function(){
        $.ajax({
            url: '../../../functions/studentCourseEn/getCourse.php',
            type: 'post',
            data:{fId:$( ".StudentName option:selected").attr('fId'),level:$( ".StudentName option:selected").attr('level')},
            dataType: 'json',
            success: function(response){
                var scnn=response;
                var len= scnn.length;
                for(let i=0; i<len; i++){
                    let id = scnn[i].id;
                    let name = scnn[i].name;
                    let option = "<option value='"+id+"'>"+name+"</optoin>";
                    $(".CourseName").append(option);
                }
                if(len==0){
                    swal.fire(
                        'error',
                        'There is no Course For You Now',
                        'error'
                    )
                }
            }
        });
        });
    //#endregion getCourseForStudent

    //#region create courseEn account
    $("form#createCourseEn").submit(function(e) {
        e.preventDefault(); 
        var formData = new FormData(this);
        
        $.ajax({
            url: "../../../functions/studentCourseEn/create.php",
            type: 'POST',
            data: formData,
            success: callbackCourse,
            cache: false,
            contentType: false,
            processData: false,
        });
    });
    function callbackCourse(data) {
        var dataa =JSON.parse(data);
                if(dataa.res=='success'){
                    Swal.fire({
                        title: 'Do You Want To Add More',
                        icon: 'question',
                        iconHtml: '؟',
                        confirmButtonText: 'YES',
                        cancelButtonText: 'NO',
                        showCancelButton: true,
                        showCloseButton: true
                      }).then((result) => {
                        if(result){
                          location.reload();
                        }
                        else{
                          $('body').slideToggle(3000);
                        }
                      });
                }
                else{
                    Swal.fire(
                        'error',
                        'This Course  Add Before',
                        'error'
                    );
                }
                
    }
    //#endregion
    
    //#region delete courseEn account
    $(document).on("click", ".deleteCE", function(e){
        Swal.fire({
            title: 'Are you sure?',
            text: "You Want To Delete this Course!",
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
                 url : "../../../functions/studentCourseEn/delete.php",
                 dataType : "json",  
                 data : {id:$(this).attr('id')},
                 cache : false,
                 success : function(d){
                   if(d.res == "success")
                   {
                     Swal.fire(
                       'Success',
                       'Selected faculty successfully Course',
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
    
    //#region update CourseEn account dont need it now
    $(document).on("click", ".edi", function(e){
        e.preventDefault();
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
                $.ajax({
                 type : "post",
                 url : "../../../functions/course/update.php",
                 dataType : "json",
                 data : {id:$(this).attr('id'),name:$('#name').val(),description:$('#description').val()},
                 cache : false,
                 success : function(data){
                   if(data.res == "success")
                   {
                     Swal.fire(
                       'Success',
                       'Selected Course successfully updated',
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
    
    //#region selectSingle CourseEn dont need it now 
    $(document).on("click", ".vie", function(e){
        e.preventDefault();
        $.ajax({
        type : "post",
        url : "../../../functions/course/selectSingle.php",
        dataType : "json",  
        data : {id: $(this).attr('href')},
        cache : false,
        success : function(data){
            Swal.fire({
                html: `<h3>Course Faculty LOGO </h3>
                    <img src='`+data[0].logo+`' Title="Faculty Logo" style="width:200px;height:200px;border-radius:50%">
                    <h4>`+ "Name: "+data[0].name+`</h4><br>
                    <h4>`+ "Faculty Name: "+data[0].fname+`</h4><br>
                    <h4>`+ "Description:  "+data[0].description+`</h4><br>
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
    
//#endregion

//#region chapters ajax call
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
                        $('.c').append(option);//hhhhhhhhh
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
    
        //#region create chapters account
        $("form#createChapter").submit(function(e) {
            e.preventDefault(); 
            var formData = new FormData(this);
            
            $.ajax({
                url: "../../../functions/chapters/create.php",
                type: 'POST',
                data: formData,
                success: callbackChapter,
                cache: false,
                contentType: false,
                processData: false,
            });
        });
        function callbackChapter(data) {
            var dataa =JSON.parse(data);
                    if(dataa.res=='success'){
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
                                window.location.href="../../../layout/chapters/html/stable.php";
                            }
                          });
                    }
                    else if (dataa.res =="max"){
                        Swal.fire(
                            'error',
                            'reach maximum Number of Chapters',
                            'error'
                        );}
                    else if (dataa.res =="founded"){
                            Swal.fire(
                                'error',
                                'Chapter is Created Before',
                                'error'
                            );}
                    else{
                        Swal.fire(
                            'error',
                            'Invalid insertion',
                            'error'
                        );}
                    }
        //#endregion
        
        //#region delete chapters account
        $(document).on("click", ".deleteCC", function(e){
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want To Delete this Chapter!",
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
                     url : "../../../functions/chapters/delete.php",
                     dataType : "json",  
                     data : {id:$(this).attr('id')},
                     cache : false,
                     success : function(d){
                       if(d.res == "success")
                       {
                         Swal.fire(
                           'Success',
                           'Selected Chapter successfully Deleted',
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
        
        //#region update chapters account dont need it now
        $(document).on("click", ".editCC", function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                html: ` <input type='text' id='title' name='title' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='Change title '/>
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
                     url : "../../../functions/chapters/update.php",
                     dataType : "json",
                     data : {id:$(this).attr('id'),title:$('#title').val()},
                     cache : false,
                     success : function(data){
                       if(data.res == "success")
                       {
                         Swal.fire(
                           'Success',
                           'Selected Chapter successfully updated',
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
        
        //#region selectSingle CourseEn dont need it now 
        $(document).on("click", ".viewCC", function(e){
            e.preventDefault();
            $.ajax({
            type : "post",
            url : "../../../functions/chapters/selectSingle.php",
            dataType : "json",  
            data : {id: $(this).attr('href')},
            cache : false,
            success : function(data){
                Swal.fire({
                    html: `<h3>Course Faculty LOGO </h3>
                        <img src='`+data[0].logo+`' Title="Faculty Logo" style="width:200px;height:200px;border-radius:50%">
                        <h4>`+ "Chapter Name: "+data[0].title+`</h4><br>
                        <h4>`+ "Faculty Name: "+data[0].FN+`</h4><br>
                        <h4>`+ "Course Name:  "+data[0].CC+`</h4><br>
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
        
//#endregion

//#region question ajax call
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
        //#region question type checking
        $(".qt").change(function(e) {
            e.preventDefault(); 
            var qtype = $(".qt option:selected").val();
            if(qtype == "mcq"){
                $(".ana").show();
                $(".anb").show();
                $(".anc").show();
                $(".and").show();
                $(".o3").show();
                $(".o4").show();
            }
            else if(qtype == "tf"){
                $(".o1").text("True 1");
                $(".o2").text("False 2");
                $(".ana").val("True");
                $(".ana").attr('readonly',true);
                $(".anb").val("False");
                $(".anb").attr('readonly',true);
                $(".anc").hide();
                $(".and").hide();
                $(".o3").hide();
                $(".o4").hide();
                $(".anc").attr("required",false);
                $(".and").attr("required",false);
                $(".o3").attr("required",false);
                $(".o4").attr("required",false);
            }
            });
        //#endregion disable header
        //#region header type checking
        $(".ht").change(function(e) {
            e.preventDefault();
            var qtype = $(".ht option:selected").val();
            if(qtype == "snt"){
                $(".header").show();
                $(".headerva").hide();
                $(".vaSource").attr("required",false);
                $(".vaSource").hide();
            }
            else if(qtype == "v" || qtype == "a"){
                $(".labelH").show();
                $(".header").show();
                $(".vaSource").show();
                $(".header").val("");
                $(".vaSource").val("");
                if(qtype == "a"){$(".vaSource").attr('accept','.mp3,.m4a');}
                else{$(".vaSource").attr('accept','.mp4');}
            }
            });
        //#endregion disable header
        //#region create question account
        $("form#createQuestion").submit(function(e) {
            e.preventDefault(); 
            var formData = new FormData(this);
            $.ajax({
                url: "../../../functions/question/create.php",
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
                                window.location.href="/E-examSystem/layout/question/html/stable.php";
                            }
                          });
                    }
                    else{
                        Swal.fire(
                            'error',
                            'Invalid insertion',
                            'error'
                        );}
                    }
        //#endregion
        
        //#region delete question account
        $(document).on("click", ".deleteQ", function(e){
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want To Delete this Question!",
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
                     url : "../../../functions/question/delete.php",
                     dataType : "json",  
                     data : {id:$(this).attr('id')},
                     cache : false,
                     success : function(d){
                       if(d.res == "success")
                       {
                         Swal.fire(
                           'Success',
                           'Selected Question successfully Deleted',
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
        
        //#region update question account dont need it now
        $(document).on("click", ".editQ", function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                html: ` <input type='text' id='header' name='header' style='background-color:white;color:black;border:1px solid gray;border-radius:20px' placeholder='Change header '/>
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
                     url : "../../../functions/question/update.php",
                     dataType : "json",
                     data : {id:$(this).attr('id'),header:$('#header').val()},
                     cache : false,
                     success : function(data){
                       if(data.res == "success")
                       {
                         Swal.fire(
                           'Success',
                           'Selected Question successfully updated',
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
        
        //#region selectSingle CourseEn dont need it now 
        $(document).on("click", ".viewQ", function(e){
            e.preventDefault();
            $.ajax({
            type : "post",
            url : "../../../functions/question/selectSingle.php",
            dataType : "json",  
            data : {id: $(this).attr('href')},
            cache : false,
            success : function(data){
                Swal.fire({
                    html: `
                        <h4>`+ "Question : "+data[0].header+`</h4><br>
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
        
//#endregion

