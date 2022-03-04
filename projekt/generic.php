<?php
require "bazaPodataka.php";

$id = $_GET['id'];
$stmt = $mysqli->prepare("Select * from izleti WHERE ID=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Tours</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<!-- Header -->
	<header id="header" style="background-color:#b3b3ff;">

		<a href="index.php" style="background-color:#b3b3ff; font-family:times new roman;" class="title">Arka travel</a>
	</header>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<section id="main" style="background-color:#666699" class="wrapper">
			<div class="inner">
				<h1 class="major"><?php echo $row['naziv'] ?></h1>
				<style>
					.carousel-control-next {
						top: 50% !important;
					}

					.carousel-control-prev {
						top: 50% !important;

					}

					.img-responsive-karta {
						width: 100%;
						height: 600;

					}

					@media screen and (max-width: 820px) {
						.w-100 {
							width: 100% !important;
							height: 400px;
						}
					}

					@media screen and (max-width: 360px) {

						.w-100 {
							width: 100% !important;
							height: 350px;
						}

					}
				</style>
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<?php
						$br = 0;
						$stmt2 = $mysqli->prepare("Select * from slike WHERE id_izlet=?");
						$stmt2->bind_param("i", $row["id"]);
						$stmt2->execute();
						$result2 = $stmt2->get_result();

						while ($row2 = $result2->fetch_assoc()) { ?>
							<?php
							$putanja = substr_replace($row2["putanja"], "", 0, 3);
							echo '<div ' . ($br == 0 ? "class='carousel-item active'" : "class='carousel-item'") . '>'; ?>
							<img src="<?php echo $putanja ?>" class="d-block w-100" width="150px" height="500px" />
						<?php echo '</div>';
							$br++;
						} ?>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
					<p>
					<div class="card-body">
						<b> <span class="card-text"><?php echo $row['opis']; ?> </span><br>
					</div>
					</p>
					<img class="img-responsive-karta" src="	<?php echo $row["slike_karta"] ?>">

				</div>
		</section>
	</div>

	<!-- Footer -->
	<footer id="footer" style="background-color:#b3b3ff;" class="wrapper alt">
		<div class="inner">
			<ul class="menu">
				<li>&copy; Untitled. All rights reserved.</li>

			</ul>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>