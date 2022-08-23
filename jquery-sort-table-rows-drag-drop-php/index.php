<?php 
include('header.php');
include_once("db_connect.php");
?>
<title>phpzag.com : Demo jQuery Sort Table Rows using Drag and Drop with PHP</title>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="functions.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" media="all">
<div class="container">
	<h2>Example: jQuery Sort Table Rows using Drag and Drop with PHP</h2>	
	
	<ul id="sortable-rows">
	<?php
	$sql = "SELECT id, question FROM php_questions ORDER BY display_order";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	while( $rows = mysqli_fetch_assoc($resultset) ) { 
	?>	
	<li id=<?php echo $rows["id"]; ?>><?php echo $rows["question"]; ?></li>
	<?php }	?>	
	</ul>
		
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/sort-table-rows-using-jquery-and-php" title="">Back to Tutorial</a>			
	</div>		
</div>
