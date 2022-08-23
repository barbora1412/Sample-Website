

<!DOCTYPE html>

<html lang="sk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Home</title>
    <meta content="Website" name="Výpis údajov">
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
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>   
    <script src="functions.js"></script>
    <link href="optimalisation/css/vypis.css" rel="stylesheet">


</head>
		<body>
    <nav id="navBar" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:20px">
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
                    <a href="insert.html" class="nav-link">Zadanie2</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
$DATABASE_HOST = 'localhost:3307';
$DATABASE_USER = 'family';
$DATABASE_PASS = 'password';
$DATABASE_NAME = 'family';

$mysqli = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('meno ','priezvisko','vek');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// Get the result...
if ($result = $mysqli->query('SELECT * FROM relatives ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	?>
			<table id="myTable">

				<tr>
					<th >Meno<i class="fa fa-sort" onclick="sortTable(0)"></i></th>
					<th >Priezvisko<i class="fa fa-sort" onclick="sortTable(1)"></i></th>
					<th >Vek<i class="fa fa-sort" onclick="sortTable(2)"></i></th>
                    <th>Vzťah</th>
        </tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td<?php echo $column == 'meno' ? $add_class : ''; ?>><?php echo $row['meno']; ?></td>
					<td<?php echo $column == 'priezvisko' ? $add_class : ''; ?>><?php echo $row['priezvisko']; ?></td>
					<td<?php echo $column == 'vek' ? $add_class : ''; ?>><?php echo $row['vek']; ?></td>
                    <td><?php echo $row['pribuzenstvo']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
      <?php
	$result->free();
}
?>

      <footer id="footer" style="position:fixed">
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
