<?php
include_once '../Home/_header.php';
?>
        <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div>
                <hr>
                <h1> Create Post </h1>
                <hr>
                <div class="row">
                    <div class="col-lg-8 col-md-8" style="width: 100%;">
                        <div class="input_form" style="">
                            <input class="txt_titulo" type="text" class="card-title" placeholder="Title" name="titulo" id="titulo"> <br><br>
                            <textarea class="txt_textOpcional"  placeholder="Text(Optional)" name="description" id="description"></textarea>                    
                      
                        </div>
                          
                    </div>
                    <div class="col-lg-4 col-md-4 preview "> 
                        <div class="input_form" >
                            <img src="images/video_plc.jpg" width="100%" height="100%" alt="" srcset="">
                        </div>
                    </div> 
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-lg-12 col-md-12">
                        <div style="text-align:center" >
                            <label  for="file-input">
                                <div id="load_icon"></div>
                            </label> 
                            <label  for="submit_post">
                                <div id="submit_icon"></div>
                            </label>


                            <input class="file-upload" id="file-input" name="fileToUpload" type="file" accept="video/*">
                            <input type="submit" id="submit_post" name="submit" value="Post">
                        </div>
                       
                    </div> 
                </div>
                
            </div>
            <hr>  
            <br>        
            
        </form>
    </div>    
  
</body>
</html>
