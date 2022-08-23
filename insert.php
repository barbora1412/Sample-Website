
<?php
// Change this to your connection info.

$DATABASE_HOST = 'localhost:3307';
$DATABASE_USER = 'family';
$DATABASE_PASS = 'password';
$DATABASE_NAME = 'family';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['meno'], $_POST['priezvisko'], $_POST['vek'], $_POST['pribuzni'])) {
	// Could not get the data that should have been sent.
	$tmp ='Please complete the registration form!';
    exit();
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['meno']) || empty($_POST['priezvisko']) || empty($_POST['vek'] || empty($_POST['pribuzni']))) {
	// One or more values are empty.
	$tmp = 'Please complete the registration form';

}



if ($stmt = $con->prepare('SELECT id FROM relatives WHERE meno = ? AND priezvisko = ? AND vek = ? AND pribuzenstvo = ?')) {
	
	$stmt->bind_param('ssis',$_POST['meno'], $_POST['priezvisko'], $_POST['vek'], $_POST['pribuzni']);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {

		$tmp ='Tento záznam už existuje.';
	} else {
		
        if ($stmt = $con->prepare('INSERT INTO relatives (meno, priezvisko, vek, pribuzenstvo) VALUES (?, ?, ?,?)')) {
 
            $stmt->bind_param('ssis',$_POST['meno'], $_POST['priezvisko'], $_POST['vek'], $_POST['pribuzni']);
            $stmt->execute();
   
            $tmp = 'Záznam pridaný';
        } else {
    
            $tmp = 'Could not prepare statement!';
        }
	}
	$stmt->close();
} else {
	

    $tmp ='Could not prepare statement!';
}
$con->close();
?>
<!DOCTYPE html>

<html lang="sk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Home</title>
    <meta content="Website" name="description">
    <meta content="CSS, HTML, JS" name="keywords">

    <link href="optimalisation/img/logo.png" rel="icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="optimalisation/css/stylesheet.css" rel="stylesheet">
    <link href="optimalisation/css/stylesheetIndex.css" rel="stylesheet">
    <link href="optimalisation/css/stylesheetHeroSection.css" rel="stylesheet">
    <link href="optimalisation/css/registration.css" rel="stylesheet">
    <link href="optimalisation/css/stylesheetDescription.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">


</head>
<body>
    <nav id="navBar" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block"></span>
            <a class="logo me-auto" href="index.html">
                Cocktails
            </a>

            <div class="w-100 text-right">
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#myNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="pictures.html" class="nav-link">Pictures</a>
                </li>
                <li class="nav-item">
                    <a href="description.html" class="nav-link">Description</a>
                </li>
                <li class="nav-item">
                    <a href="insert.html" class="nav-link active">Zadanie2</a>
                </li>
            </ul>
        </div>
    </nav>

        <section id="hero" class="d-flex align-items-center">

            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <div class="row">
                    <div class="col-xl-6">
                    <h1>Sekcia pre 2.zadanie</h1>
                        <h2>Vypracovanie a špecifikácia požiadavok na sputenie.</h2>

                    </div>
                </div>
            </div>
        </section>
 <main id="main">
           
    <div class="register">
        <h1>Pridaj príbuzného</h1>
        <form action="insert.php" method="post" autocomplete="off">

            <input type="text" class='name' style="text-transform: capitalize;" name="meno" placeholder="Meno" id="meno" required onkeypress="return /[^0-9]/i.test(event.key)">

            <input type="text" class='name' style="text-transform: capitalize;" name="priezvisko" placeholder="Priezvisko" id="priezvisko" required onkeypress="return /[^0-9]/i.test(event.key)">

            <input type="number" name="vek" placeholder="Vek" id="vek" required  min="0" max="150" onkeypress="return /[0-9]/i.test(event.key)">
        

            <div class="wrapper">
            <select class="form-control" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();' type="text" name="pribuzni" placeholder="Pribuzný" id="pribuzni" required size=1>
                <option value="" disabled selected>Vzťah</option>
                <option value="Matka">Matka</option>
                <option value="Otec">Otec</option>
                <option value="Sestra">Sestra</option>
                <option value="Brat">Brat</option>
                <option value="Dcéra">Dcéra</option>
                <option value="Syn">Syn</option>
                <option value="Vnučka">Vnučka</option>
                <option value="Vnuk">Vnuk</option>
                <option value="Babka">Babka</option>
                <option value="Dedo">Dedo</option>
              </select>
            </div>
              <div id="myMessage"> <?php print $tmp; ?></div>
            <input type="submit" value="Vlož">
        </form>
</div>

<div>
<p><a href="./vypis_udajov.php">Visit W3Schools.com!</a></p>
</div>
<section id="sekcia_zmena" style="color:#f7f7f7">
 </section>

</main>


<footer id="footer"class="fixed-bottom">
    <div class="container d-md-flex py-4 align-items-center">
        <div id="copy_right" class="text-md-end  text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Barbora Královská</span></strong>. 2021
            </div>
            <i class="bi bi-envelope"></i>
            <a href="mailto:barbora.kralovska@student.tuke.sk">barbora.kralovska@student.tuke.sk</a>

        </div>
        <div id="social_buttons" class="social-links text-center text-md-end pt-md-0">
            <a href="https://www.facebook.com/" class="btn social-icon button" data-abc="true"><i class="fa fa-facebook btn-round"></i></a>
            <a href="https://twitter.com/?lang=en" class="btn social-icon button" data-abc="true"><i class="fa fa-twitter btn-round"></i></a>
            <a href="https://www.instagram.com/" class="btn social-icon button" data-abc="true"><i class="fa fa-instagram btn-round"></i></a>
            <a href="https://www.youtube.com/" class="btn social-icon button" data-abc="true"><i class="fa fa-youtube btn-round"></i></a>
        </div>

    </div>
</footer>
</body>
</html>