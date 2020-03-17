<?php
include_once '../MasterPages/MasterPage.html';
include_once '../PagesCode/RegistarCode.php';
?>

<form action="" method="post">
<div class="container">
    <div class="row" style="">
        <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0">
            <div class="staticImg_SignUp">
            </div>
        </div>
        <div class="col-lg-9 col-md-9  ">
            &nbsp;
            <fieldset>
            <hr>
                <h1 style="text-align:left"> Sign Up </h1><br>

                <input type="text" id="username" name="name" required="required" placeholder="Insert your name"><br><br>
                <input type="password" id="password" name="password" required="required" placeholder="Insert your password">                        <br><br>
                <input type="email" name="email" id="email" required="required" placeholder="Insert your Email"><br><br>
                <input type="submit" id="btn_login" value="Sign Up" name="submit"><br><br>

                Already a member? <a href="#" onclick="window.location = 'Login.php';"> Sign In </a><br><br>
                By signing up, you agree to our <a href="">Terms</a> and that you have read our <a href="">Privacy Policy</a>  and <a href="">Content Policy</a>.<br><br>
            <hr>
            </fieldset>
            
        </div>
        
    </div>
    </div>
</form>
<link rel="stylesheet" href="../../Style/Login.css">
<?php
include_once '../MasterPages/FooterMasterPage.html';
?>