<?php
$pname = $_POST['pname'];
$date = $_POST['date'];
$place = $_POST['place'];


$connect = mysqli_connect("localhost", "usr_2016_9", "jtwyoua1996","db_2016_9") 
	or die("Error - Could not connect to mysqli ".mysqli_error());

// insert into party 
$query = "INSERT INTO party (party_Name, Date, Place) VALUES "."('$pname', '$date', '$place')";
$result = mysqli_query($connect, $query) or die("Error - Insert failed in party db".mysqli_error($connect));

mysqli_close($connect);

// success
print "<script type=\"text/javascript\">alert('Success. Thank you! Refresh to see change or click RESULT button');window.history.go(-1)</script>";

?>