<?php

require "bazaPodataka.php";



?>


<!DOCTYPE HTML>

<html>

<head>
	<title>Arka travel </title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
</head>

<body class="is-preload">

	<!-- Sidebar -->

	<section id="sidebar">
		<div class="inner" style="background-color:#b3b3ff">
			<nav>
				<ul>
					<li><a href="#intro">Home</a></li>
					<li><a href="#one">Tours</a></li>
					<li><a href="#two">Transfers</a></li>
					<li><a href="#three">Get in touch</a></li>
				</ul>
			</nav>
		</div>
	</section>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Intro -->



		<section id="intro" style="background-image: url(assets/images/glavnaSlika/dubrovnik.jpeg);   opacity: 0.7;" class="wrapper style1 fullscreen fade-up">

			<div class="inner">
                <h3>Arka travel</h3>
				<h2>
					<p>Travel is the only thing you buy that makes you richer</p>
				</h2>
				<ul class="actions">
					<li><a href="#one" class="button scrolly">Learn more</a></li>
				</ul>
			</div>
		</section><!--666699-->
		<!-- One -->
		<section id="one" style="background-color:#666699; font-family:times new roman;" class="wrapper style2 spotlights">
			<?php
			$stmt = $mysqli->prepare("SELECT * FROM izleti");
			$stmt->execute();
			$result = $stmt->get_result();
			if (isset($result)) {
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
					<section>
						<?php $stmt2 = $mysqli->prepare("SELECT * FROM slike WHERE id_izlet = ? limit 1");
						$stmt2->bind_param("i", $row["id"]);
						$stmt2->execute();
						$result2 = $stmt2->get_result();
						$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
						$putanja = substr_replace($row2["putanja"], "", 0, 3); ?>
						<a href="#" class="image"><img src="<?php echo $putanja ?>" alt="" data-position="center center" /></a>
						<div class="content">
							<div class="inner">
								<h2>
									<?php echo $row["naziv"];
									?>

								</h2>
								<p><?php echo $row["kratki_opis"]; ?></p>
								<div>
									<i class="fas fa-user-friends"></i>
									<?php echo $row['broj_osoba']; ?>
								</div>
								<div>
									<i class="fas fa-money-bill-wave"></i>
									<?php echo $row['cijena']; ?>
								</div>
								<ul class="actions">

									<li><a href=generic.php?id=<?php echo $row['id']  ?> class="button">Learn more</a></li>
								</ul>
							</div>
						</div>
					</section>
			<?php endwhile;
			} ?>
		</section>

		<!-- Two -->
		<section id="two" style="background-color:#8585ad" class="wrapper style3 fade-up">
			<div class="inner">
				<h2>Transfers</h2>
				<p> If you need a transfer, you can choose one of the following. Just send us an email with pickup up location and time of departure!</p>
				<div class="features">
					<?php
					$stmt2 = $mysqli->prepare("SELECT * FROM transferi");
					$stmt2->execute();
					$result2 = $stmt2->get_result();
					if (isset($result2)) {
						$br = 0;
						while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) :
							$br++;
					?>
							<section>
								<span class="icon solid major fa-car"></span>
								<h3><?php echo $row2['naziv']; ?></h3>
								<div>
									<i class="fas fa-user-friends"></i>
									<?php echo $row2['broj_osoba']; ?>
								</div>
								<div>
									<i class="fas fa-money-bill-wave"></i>
									<?php echo $row2['cijena']; ?>
								</div>
							</section>
					<?php endwhile;
					} ?>
					<?php if ($br % 2 != 0) { ?>
						<section></section>
					<?php } ?>


				</div>

			</div>
		</section>

		<!-- Three -->

		<section id="three" style="background-color:#7575a3" class="wrapper style1 fade-up">

			<div class="inner">
				<h2>Get in touch</h2>
				<p>If you want to make a reservation or simply wish to know more about one of our tours or transfers,please feel free to contact us!</p>
				<div class="split style1">
					<section>
						<form method="post" action="mail.php">
							<div class="fields">
								<div class="field half">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" />
								</div>
								<div class="field half">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" />
								</div>
								<div class="field">
									<label for="subject">Subject</label>
									<input type="text" name="subject" id="subject" />
								</div>
								<div class="field">
									<label for="message">Message</label>
									<textarea name="message" id="message" rows="5"></textarea>
								</div>
							</div>
							<ul class="actions">
								<li><a href="" class="button submit">Send Message</a></li>
							</ul>
						</form>
					</section>

					<section>
						<?php $id = 1;
						$stmt3 = $mysqli->prepare("Select * from kontakt_forma WHERE ID=?");
						$stmt3->bind_param("i", $id);
						$stmt3->execute();
						$result3 = $stmt3->get_result();
						$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC); ?>
						<ul class="contact">
							<li>
								<h3>Name</h3>
								<span><?php echo $row3['ime']; ?> </span>
							</li>
							<li>
								<h3>Email</h3>
								<a href="mailto:<?php $row3['email']; ?>"><?php echo $row3['email']; ?></a>
							</li>
							<li>
								<h3>Phone</h3>
								<span><?php echo $row3['broj_mob']; ?></span>
							</li>
							<li>
								<h3>Social</h3>
								<ul class="icons">

									<li><a href="https://www.instagram.com/arka_travel_dubrovnik/" target="_blank" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>

								</ul>
							</li>
						</ul>
					</section>
				</div>
			</div>
		</section>

	</div>

	<!-- Footer -->
	<footer id="footer" class="wrapper style1-alt">
		<div class="inner" style="background-color:#b3b3ff">
			<ul class="menu">
				<h3 style="color:black">Partners</h3>
				<li><a href="https://buracellar.com/" target="_blank"><img src="assets/images/bura.jpg" style="width:70%;height:100px;"></a>></li>
				<li><a href="https://milos.hr/" target="_blank"><img src="assets/images/milos.jpg" style="width:70%;height:100px;"></a><li>
			</ul>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>