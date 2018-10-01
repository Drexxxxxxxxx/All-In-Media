<?php
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
   echo "Sorry, file already exists.";
   $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1073741824) {
   echo "Sorry, your file is too large.";
   $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       savevideo($target_file);
   } else {
       echo "Sorry, there was an error uploading your file.";
   }
}



function savevideo ($nomedoficheiro)
{
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql="insert INTO chat SET idQuemEnviou=17, message='$nomedoficheiro', idGrupo=1, isimage=2" ;
    $query=mysqli_query($con,$sql);

    if($query){
    echo"sucess";
    }
    else {
        echo "n deu";
    }
    mysqli_close($con);

}
?>

