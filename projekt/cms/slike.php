<?php
   
require "../bazaPodataka.php";
$id = $_GET['id'];
$stmt = $mysqli->prepare("SELECT * FROM izleti WHERE id = ? ");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$izlet = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <title>Galerija slika</title>
</head>
<body>
<section>

<nav  class="navbar navbar-dark bg-primary">
<div class="container-fluid">
<a class="navbar-brand" href="adminHome.php">Admin home</a>
<a class="navbar-brand" href="logout.php">Log out</a>
</div>

</nav>
</section>
  <style>
    
h1 {
  margin: 0;
    display: inline-block;
    margin-bottom: 1.5rem;
}
button {
  float: center;
  display: inline-block;
  margin-bottom: 1.5rem;
}
.form-control{
  width:30%;
}

  </style>
<div id="naslovSlike">
  <h1><?php echo $izlet["naziv"]?></h1> 
  <?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
  <div class="mb-3">
  <form action="spremiSliku.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
  <input class="form-control form-control-sm" name="file" id="inputFile" type="file">
</div>


<input type="submit" class="btn btn-primary" value="Spremi sliku">
</form>
</div>

      <!---SLIKE-->
      <style>
        .img-wraps {
    position: relative;
    display: inline-block;
    
    font-size: 0;
}
.img-wraps .closes {
    position: absolute;
    top: 5px;
    right: 8px;
    z-index: 100;
    background-color: #FFF;
    padding: 4px 3px;
     
    color: #000;
    font-weight: bold;
    cursor: pointer;
    
    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
    border:1px solid red;
}
.img-wraps:hover .closes {
    opacity: 1;
}
      </style>
     <?php $stmt = $mysqli->prepare("SELECT * FROM slike WHERE id_izlet = ?");
        $stmt->bind_param("i", $id);
					   $stmt->execute();
					   $result = $stmt->get_result();
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): ?>
            <div class="img-wraps">
              <div>
              <a href=izbrisiSliku.php?id_izlet=<?php echo $row['id_izlet'] ?>&id=<?php echo $row['id'] ?> >
              <span class="closes" title="Delete">X</span>
            </div>
<img class="img-responsive" src="	<?php  echo $row["putanja"] ?>" width="200" height="250">
</div>
      
    	<?php endwhile;
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>