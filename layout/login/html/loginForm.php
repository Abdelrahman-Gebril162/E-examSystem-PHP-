<link rel="stylesheet" href="../../../layout/login/css/loginStyle.css"/>
<div style="height: 100%; width: 100%; display: flex; align-items: center;">
    <div style="position: absolute; top: 20px; right: 50px; height: 140px; width: 140px">
        <img style="height: 100%; width: 100%;" src="../../../layout/login/images/Background-Illustrator.svg"/>
    </div>
    <div style="position: absolute; top: 47%; right: 20px; transform: translateY(-50%);height: 600px; width: 600px;">
        <img style="height: 100%; width: 100%" src="../../../layout/login/images/Background-Illustrator.svg" />
    </div>

    <div style="height: 100%; width: 394px; background-color: #FFBE55;"></div>
    <div class="form-container" style=" width: 394px;">
        <form id="loginForm" method="POST">
            <p style="font: normal normal normal 28px/28px Arial; color: #F2F5FA; text-align: center; margin-bottom: 40px;">Sign In</p>
            <div class="input-container">
                <input type="text" name="email" required=""/>
                <label>E-mail</label>		
            </div>
            <div class="input-container">
                <input type="password" name="pass" required=""/>
                <label>Password</label>		
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="option1" required>
                <label class="form-check-label" for="inlineRadio1" style="color: #F2F5FA;">Professor</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="option2" required>
                <label class="form-check-label" for="inlineRadio2" style="color: #F2F5FA;">Student</label>
              </div>
              <br><br>
              <button class="signin-button" type="submit">
                  Sign In
              </Button><br><br>
              <p class="notification-message">Sign-In And Enjoy Your Journey</p>
        </form>
    </div>
</div>
<script src="../../../layout/login/js/InputAnimation.js"></script>