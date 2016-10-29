<?php

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$index = $_POST["index"];

$connect = mysqli_connect("localhost", "usr_2016_9", "jtwyoua1996", "db_2016_9") 
	or die("Error - Could not connect to mysqli ".mysqli_error($connect));

// insert into quest
$query = "INSERT INTO guest (Guest_Name, Age, Gender, E_mail) VALUES ('$name', '$age', '$gender', '$email')";
$result = mysqli_query($connect,$query) or die("Error - Insert failed in guest db".mysqli_error($connect));

// get quest id
$query = "SELECT Guest_ID FROM guest WHERE Guest_Name = '$name'";
$result = mysqli_query($connect,$query) or die("Error - Select failed in guest db".mysqli_error($connect));
$pair = mysqli_fetch_array($result,MYSQLI_ASSOC);
$guestid = $pair['Guest_ID'];

// insert into guest_party
foreach ($index as $partyid){
	$query = "INSERT INTO guest_party (Guest_ID, Party_ID) VALUES ($guestid, $partyid+1)";
	$result = mysqli_query($connect,$query) or die("Error = Insert failed in guest_party db".mysqli_error($connect));
}

mysqli_close($connect);
// success
print "<script type=\"text/javascript\">alert('Success. Thank you!');window.history.go(-1)</script>";

?>
