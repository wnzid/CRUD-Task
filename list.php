<?php
include "connect.php";

print ("<a href=form.html> New record </a> <br>");

	$sql="SELECT id, author , title  FROM book";
	$data = $conn->query($sql)->fetchAll();
	
	
	//counting how many record found
	$sql_kiek=("SELECT count(id) as kiekis FROM book");
	$count = $conn->query("$sql_kiek")->fetchColumn();
		print("Found rec: ".$count);
		print("<br><br>");
	

	//isvedimas
	 foreach ($data as $row) {
	  echo $row['id']." ";
	  echo $row['author']." ";
	  echo $row['title']." ";
	  $id=$row['id'];
	  print ("<a href=remove.php?id=$id> Remove </a> ");
	  print ("<a href=edit.php?id=$id> Change </a>" . "<br>");
  }
 
?>