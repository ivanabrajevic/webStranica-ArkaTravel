<?php
  session_start();

  if (!(isset($_SESSION['korisnicko_ime']))){
      header("Location: admin.php");
      exit();
  }
require "../bazaPodataka.php";
$id_izlet=$_GET["id"];
if($_SERVER['REQUEST_METHOD']==='POST'){
    //Slika obrada
    if(isset($_FILES["file"]["type"]))
    {
        $validextensions = array("jpeg", "jpg", "png","JPG","JPEG","PNG");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
            ) && ($_FILES["file"]["size"] < 1000000000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
        $uploaddir="../assets/images/";
            $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $uploaddir.$_FILES['file']['name']; // Target path where file is to be stored
            if(file_exists($targetPath)) {
                chmod($targetPath,0755); //Change the file permissions if allowed
                unlink($targetPath); //remove the file
            }
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
            $stmt = $mysqli->prepare("INSERT INTO slike (id_izlet,putanja) VALUES(?,?)");
            $stmt->bind_param("is", $id_izlet,$targetPath);
            $stmt->execute();
           header("Location:slike.php?id=".$id_izlet);
        }
        else
        {
            header("Location:slike.php?id=".$id_izlet."&error=slika krivog formata!");
        }
        
   }

}
