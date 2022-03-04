<?php
session_start();

if (!(isset($_SESSION['korisnicko_ime']))) {
	header("Location: admin.php");
	exit();
}
require "../bazaPodataka.php";


$stmt = $mysqli->prepare("SELECT * FROM transferi");
$stmt->execute();
$result = $stmt->get_result();

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Transferi</title>
</head>

<body>
	<section>

		<nav class="navbar navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="adminHome.php">Admin home</a>
				<a class="navbar-brand" href="logout.php">Log out</a>
			</div>

		</nav>
	</section>
	<div name="naslovTransfer">
		<h1 style="text-align: center">Uredi transfere<h1>
				<a href="dodajTransfer.php" class="button">Dodaj novi transfer</a>

	</div>
	<table>
		<style>
			table,
			th,
			td {
				border: 1px solid black;
			}

			tr:nth-child(even) {
				background-color: #c2c2d6;
			}
		</style>
		<?php if (isset($result)) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
				<tr>
					<th>Naziv</th>
					<th>Cijena</th>
					<th>Broj osoba</th>
					<th colspan="2">Uredi podatke</th>

				</tr>
				<tr>
					<td><?php echo $row['naziv'] ?></td>
					<td><?php echo $row['cijena'] ?></td>
					<td><?php echo $row['broj_osoba'] ?></td>
					<td><a href=izbrisiTransfer.php?id=<?php echo $row['id'] ?>><img src='cms_images/slika1.png' alt='ikona' style='height: 50px; width=50px'></td>
					<td><a href=urediTransfer.php?id=<?php echo $row['id'] ?>><img src='cms_images/slika2.png' alt='ikona' style='height: 50px; width=50px'></td>
				</tr>
		<?php endwhile;
		} ?>
	</table>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>