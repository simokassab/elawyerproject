<?php

include_once './config.php';
$con=  connectDB($_SESSION['office']);

$target_dir = "../server/php/files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $ar['info']="Sorry, your file is too large";
    $ar['status']='failed';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $ar['info']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $ar['status']='failed';
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   
    $ar['info']="Sorry, your file was not uploaded.";
    $ar['status']='failed';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $userid=$_POST['userid'];
        $query="update users set photo='". basename( $_FILES["fileToUpload"]["name"])."' where ID=$userid";
        if (mysqli_query($con, $query)) {
        $ar['photo']="e-lawyer.co/server/php/files/". basename( $_FILES["fileToUpload"]["name"]);
        $ar['info']="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $ar['status']='success';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
        
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    } else {
       // echo "Sorry, there was an error uploading your file.";
        $ar['info']="Sorry, there was an error uploading your file";
        $ar['status']='failed';
    }
    $content= json_encode($ar, JSON_UNESCAPED_UNICODE);
    $content=  str_replace('\\', '', $content);
    echo $content;
}
?>