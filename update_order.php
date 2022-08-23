<?php
include_once("db_connect.php");
if(isset($_GET["sort_order"])) {
	$id_ary = explode(",",$_GET["sort_order"]);
	for($i=0;$i<count($id_ary);$i++) {		
		$sql = "UPDATE php_questions SET display_order='" . $i . "' WHERE id=". $id_ary[$i];
		mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	}
}
?>