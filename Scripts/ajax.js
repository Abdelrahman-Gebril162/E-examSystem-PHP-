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

//#region create student account
$(document).on("submit","#createStudent" , function(){
    $.post("../../../functions/student/create.php", $(this).serialize() , function(data){
        if(data.res == "exist")
        {
            Swal.fire(
                'Already Exist',
                'check National id or phone Number',
                'error'
            )
        }
        else if(data.res == "success")
        {
            Swal.fire(
                'Success',
                ' Successfully Added',
                'success'
            )
            location.reload();
              setTimeout(function(){ 
                  $('#body').load(document.URL);
               }, 2000);
        }
    },'json')
    return false;
  });
//#endregion

//#region faculty list of specific faculty
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
