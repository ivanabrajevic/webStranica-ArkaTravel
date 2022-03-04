<?php
  session_start();

  if (!(isset($_SESSION['korisnicko_ime']))){
     header("Location: admin.php");
     exit();
  }
require "../bazaPodataka.php";
  
$id = $_GET['id'];
$stmt = $mysqli->prepare("DELETE FROM transferi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$mysqli->close();
header("Location: transferi.php");

?>
    