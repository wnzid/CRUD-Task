<?php
include "connect.php";

	$title1=$_GET["title"];
	$author1=$_GET["author"];
	//print ($title." ");
	$sql="INSERT INTO book (title, author) VALUES ('".$title1."','".$author1."')";
	
	if ($conn->query($sql) == TRUE) {
		print ("New record created");
		print ("<a href=list.php> List </a>");
	} else {
		print ("Klaida");
	}
?>