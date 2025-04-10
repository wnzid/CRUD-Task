<?php
include "connect.php";
	$id=$_GET["id"];
	print ($id." ");
	$sql="DELETE FROM book WHERE id=$id";
	if ($conn->query($sql) == TRUE) {
		print ( "Removed");
		print ("<a href=list.php> List </a>");
		} else {
			print ("error");
		}
?>