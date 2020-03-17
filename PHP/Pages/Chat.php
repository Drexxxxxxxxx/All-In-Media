<?php
include_once '../MasterPages/MasterPage.html';
include_once '../PagesCode/ChatCode.php';
?>

<div id="result">
    <?php
        if (!function_exists('EAdminQuery')) {
            EAdminQuery();
        }				
    ?>
</div>
<div class="Adicionarppldiv" style="display: none;"></div>
<div class="custompopup" id="AbrirVideo" runat="server" style="display:none;">
    <button type='button' style="padding: 0% 0%; position: fixed;
				top: 2.5%;
				right: 1.4%; z-index: 1" id="FecharvideoBtn" onclick=DivVideo()>X</button>
    <video width="100%" id="v1" style="height: -webkit-fill-available;" controls autoplay>
    </video>
</div>
<nav class="navbar navbar-light bg-light justify-content-between nvb_perfil">
    <a class="navbar-brand" href="Home.php"><i class="fas fa-arrow-left"> </i> <input type="image"
            src="images/profile.jpeg" class="friend_ppic" alt="">
        <p id="nomegrupoId" class="d-inline"></p>
    </a>
    <form class="form-inline">
        <a class="nav-link " style="padding:10px"
            href="../../chatapp-master/chatapp/index.html?room=<?php echo $_REQUEST['idgrupo']."" ?>"><i
                class="fas fa-video"></i></a>
        <a class="nav-link " style="padding:10px" href="#"><i class="fas fa-phone"></i></a>
        <a class="nav-link " style="padding:10px" href="#"><i class="fas fa-ellipsis-v"></i></a>
    </form>
</nav>
<div class="centeralised">
    <div class="row" style="overflow:auto; max-height: 500px;" id="chathistory"></div>
    <div class="chatbox">
        <form action="" method="POST" id="FormUploadImage" enctype="multipart/form-data">
            <div class="row div_msg">
                <div class="col-lg-11 col-md-10 col-sm-10 col-9">
                    <?php
                        include_once "../MasterPages/EmojiPage.html";
                    ?>
                </div>
                <div class="col-lg-1 col-md-2 col-sm-2 col-3">
                    <div class="send_btn">
                        <a href="" onclick="EnterText()"><input type="image" id="send_icon"
                                src="../_Groups/images/send.png" alt=""></a>
                    </div>
                </div>
            </div>

            <div class="upload-btn-wrapper">
                <button class="btn2">Upload Image</button>
                <input class="file-upload" id="file-uploadImage" type="file" name="image" />
            </div>
            <input type="submit" id="submit_image" name="submit" value="Post" style="display:none;" />
        </form>
        <form id="formUploadVideo" action="Upload.php<?php echo "?idgrupo=".$_REQUEST['idgrupo']."" ?>" method="post"
            enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn2">Upload Video</button>
                <input class="file-upload" id="file-uploadVideo" name="fileToUpload" type="file" accept="video/*">
            </div>
        </form>
    </div>
</div>

</body>

</html>
<link rel="stylesheet" href="../../Style/Chat.css">
<script src="../../JS/Chat.js"></script>
<?php
include_once '../MasterPages/FooterMasterPage.html';
?>