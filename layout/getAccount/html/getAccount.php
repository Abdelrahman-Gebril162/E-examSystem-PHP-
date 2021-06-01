<div class="page">
    <div class="row g-0" >
        <div class="col-sm-12 col-md-12 " style="height: 150px;"><a href="../../../index.php"><img src="../../../layout/getAccount/images/Group 604.svg" style="height: 100px;top: 0;vertical-align: top;"  ></a>
    </div>
</div>
        <div class="row g-0">
            <div class="col-sm-1 col-md-2"></div>
        <div class="col-sm-6 col-md-5">
            <div style="color: #084C94;  margin-top: 70px;">E-exam system</div>
            <div class="d-grid gap-2 d-md-block">
                <button onclick= "showmsg()" class ="btn btn-primary" id ="p" value="professor" > proffesor </button>
                <button onclick= "showmsg()" class="btn btn-primary" id="s" value="student"> student </button>
            </div>
        </div>
        <div class="col-sm-5 col-md-5"><img src="../../../layout/getAccount/images/1.jpeg" width="90% "></div></div>
    <div id="mymsg">
<h2 id='mymsg-con'>
Enter your ID
</h2>
<form method="post" id="getNid">
<input type="text" class="form-control" name="Nid" id="Nid" placeholder="Enter 14 numbers" minlength="14" maxlength="14" aria-describedby="basic-addon1"> 
<input type="submit" id="subm" onclick="hidemsg()"class="btn btn-light" style="display: block;">
</form>
