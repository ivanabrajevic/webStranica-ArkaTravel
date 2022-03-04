<?php
  session_start();

  if (!(isset($_SESSION['korisnicko_ime']))){
      header("Location: admin.php");
      exit();
  }
require "../bazaPodataka.php";
    
$id = $_GET['id'];
$id_izlet = $_GET['id_izlet'];

$stmt = $mysqli->prepare("DELETE FROM slike WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$mysqli->close();
header("Location:slike.php?id=".$id_izlet);
?>
