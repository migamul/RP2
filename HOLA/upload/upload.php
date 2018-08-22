<?php
require_once '../model/db.class.php';
$target_dir = "uploads/";
$username = $_POST["new_name"];

if(!isset($_FILES["fileToUpload"])) {
	echo "You have not chosen a file!";
	return;
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submitImage"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 100000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$username.'.'.$imageFileType)) {

		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'UPDATE llUsers SET profile_image=:imageName WHERE username=:username' );
			$st->execute(array('imageName'=>'/upload/uploads/'.$username.'.'.$imageFileType, 'username'=>$username));
		}catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
		
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>