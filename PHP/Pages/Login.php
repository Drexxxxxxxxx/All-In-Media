
<?php
include_once '../MasterPages/MasterPage.html';
include_once '../PagesCode/LoginCode.php';
?>
    &nbsp;
    <form action="" method="post">
        <div class="container">
            <div class="row" style="">
                <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0">
                    <div class="staticImg">

                    </div>

                </div>
                <div class="col-lg-9 col-md-9  ">
                    &nbsp;
                    <fieldset>
                        <hr>
                        <h1 style="text-align:left"> Sign In </h1>

                        <label id="lbl_user" for="username"> Username </label><br>
                        <input type="text" name="name" id="username" required="required"
                            placeholder="Insert your name"><br><br>
                        <label id="lbl_password" for="password"> Password </label><br>
                        <input type="password" name="password" id="password" required="required"
                            placeholder="Insert your password"><br><br>
                        <input type="submit" id="btn_login" value="Login" name="submit"><br><br>
                        <a href="#" onclick="$('#SearchInputDiv').toggle();"> Forgot Password </a><br><br>
                        New to All In Media? <a href="#" onclick="window.location = 'Registar.php';"> Sign Up
                        </a><br><br>
                        By signing up, you agree to our <a href="">Terms</a> and that you have read our <a
                            href="">Privacy Policy</a> and <a href="">Content Policy</a>.<br><br>
                        <hr>
                    </fieldset>

                </div>

            </div>
        </div>
    </form>
    <div class="input-group" id="SearchInputDiv" style="display: none;">
        <input type="text" class="form-control" placeholder="Insert youre email to recover youre password"
            id="SearchInputID">
        <div class="input-group-append">
            <Button class="input-group-text" onclick="RecoverPassword();">&ThickSpace; Search &ThickSpace;</Button>
        </div>
    </div>
    <p id="responseid"></p>
    </div>
  </body>
</html>
<link rel="stylesheet" href="../../Style/Login.css">
<script src="../../JS/Login.js"></script>
<?php
include_once '../MasterPages/FooterMasterPage.html';
?>