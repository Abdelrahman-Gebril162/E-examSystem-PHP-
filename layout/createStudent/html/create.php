<form method="POST" id="createStudent">
<div class="container">
    <div class="row">
        <div class="col-lg-3 " style="text-align: center;"></div>
        <div class="col-lg-6 " style="text-align: center;"> 
            
            <label for="file-input">
                <img id="image_preview" src="../../../upload/defaultImages/male-student-icon-png_251938.jpg"style="cursor: pointer; width: 25vw; height: 35vh; border-radius: 50%;"/>
            </label>
            <input id="file-input" name="upload" onchange="readfile(this)" type="file" style="display: none"/>
        </div>
        </div>
        <div class="col-lg-3 " style="text-align: center;"></div>
    </div></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 " style="text-align: center;"></div>
            <div class="col-lg-3 " style="text-align: center;">  <input type="text" id="firstname" name="firstname" placeholder="firstname" required>
            </div>
            <div class="col-lg-3 " style="text-align: center;">  <input type="text" id="lastname" name="lastname" placeholder="lastname" required>
            </div>

            <div class="col-lg-3 " style="text-align: center;"></div>
        </div></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 " style="text-align: center;"></div>
                <div class="col-lg-6 " style="text-align: center;">  <input type="text" id="Nid" name="Nid" placeholder="National Id (14) digit" minlength="14" maxlength="14" required>
                </div>
                <div class="col-lg-3 " style="text-align: center;"></div>
            </div></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 " style="text-align: center;"></div>
                <div class="col-lg-6 " style="text-align: center;">  <input type="date" id="Birthday" name="Birthday" placeholder="Birthday" required>
                </div>
                <div class="col-lg-3 " style="text-align: center;"></div>
            </div></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  <input type="text" id="country" name="country" placeholder="country" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  <input type="text" id="city" name="city" placeholder="city" required>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>
                </div></div>
                    <div class="container">
<div class="row">
    <div class="col-lg-3 " style="text-align: center;"></div>
    <div class="col-lg-6 " style="text-align: center;">  <input type="text" id="phoneNumber" name="phoneNumber" placeholder="phone number" minlength="11" maxlength="11" required>
    </div>
    <div class="col-lg-3 " style="text-align: center;"></div>
</div></div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 " style="text-align: center;"></div>
        <div class="col-lg-6 " style="text-align: center;">  <input type="password" id="password" name="password" placeholder="password" required>
        </div>
        <div class="col-lg-3 " style="text-align: center;"></div>
    </div></div>        
        <div class="container">
            <div class="row">
                <div class="col-lg-3 " style="text-align: center;"></div>
                <div class="col-lg-6 " style="text-align: center;">
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" required>

                </div>
                <div class="col-lg-3 " style="text-align: center;"></div>
            </div></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="gender" id="select" name="gender" required>
                            <option value="" disabled selected hidden>Choose a Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                         </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>

                </div></div>                
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 " style="text-align: center;"></div>
                    <div class="col-lg-6 " style="text-align: center;">  
                         <select class="faculty" id="select" name="faculty" required>
                            <option value="" disabled selected hidden>Choose a Faculty</option>
                               
                         </select>
                    </div>
                    <div class="col-lg-3 " style="text-align: center;"></div>

                </div></div> 
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 " style="text-align: center;"></div>
                        <div class="col-lg-6 " style="text-align: center;">  
                             <select class="department" id="select" name="department" required>
                                <option value="" disabled selected hidden>Choose a Department</option>
                                
                             </select>
                        </div>
                        <div class="col-lg-3 " style="text-align: center;"></div>

                    </div></div> 
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 " style="text-align: center;"></div>
                            <div class="col-lg-6 " style="text-align: center;">  
                                <select id="select" class="facultyLevels" name="facultyLevels" required>
                                    <option value="" disabled selected hidden>Choose a Level</option>
                                 </select>                                    </div>
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

<script>
function readfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>