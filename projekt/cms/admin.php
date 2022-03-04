<!DOCTYPE html>
<?php
require "../bazaPodataka.php";
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">
  <title>Administrator Login</title>
  <link href="admin.css" rel="stylesheet">
</head>

<body class="text-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-2"></div>
      <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-key">
          <i class="fa fa-key" aria-hidden="true"></i>
        </div>
        <div class="col-lg-12 login-title">
          Dobrodošli!
        </div>

        <div class="col-lg-12 login-form">
          <div class="col-lg-12 login-form">
            <form action="login.php" method="post">
              <div class="form-group">
                <?php if (isset($_GET['error'])) { ?>

                  <p class="error"><?php echo $_GET['error']; ?></p>

                <?php } ?>
                <label class="form-control-label">KORISNIČKO IME</label>
                <input type="text" name="korisnicko_ime" class="form-control"><br>
              </div>
              <div class="form-group">
                <label class="form-control-label">LOZINKA</label>
                <input type="password" name="lozinka" class="form-control">
              </div>

              <div class="col-lg-12 loginbttm">
                <div class="col-lg-6 login-btm login-text">
                  <!-- Error Message -->
                </div>
                <div class="col-lg-6 login-btm login-button">
                  <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-3 col-md-2"></div>
      </div>
    </div>
    <?php if (isset($_GET["state"])) {
      if ($_GET["state"] === "loginfailed") { ?>
        <div class="alert alert-danger">
          <strong>Netočni korisnički podaci!</strong> Molimo vas pokušajte ponovo.
        </div>
    <?php }
    } ?>
  </div>
</body>

</html>