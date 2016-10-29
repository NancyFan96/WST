<?php

$index = $_POST["index"];

$connect = mysqli_connect("localhost", "usr_2016_9", "jtwyoua1996", "db_2016_9") 
	or die("Error - Could not connect to mysqli ".mysqli_error($connect));

// delete from quest
foreach ($index as $guestid){
	$query = "SELECT Guest_ID FROM guest  LIMIT 1 OFFSET $guestid";
	$result = mysqli_query($connect,$query) or die("Error - Select failed in guest db".mysqli_error($connect));
	$pair = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$guestid = $pair['Guest_ID'];

	$query = "DELETE FROM guest WHERE Guest_ID = $guestid";
	$result = mysqli_query($connect,$query) or die("Error - Delete failed in guest db".mysqli_error($connect));
	$query = "DELETE FROM guest_party WHERE Guest_ID = $guestid";
	$result = mysqli_query($connect,$query) or die("Error - Delete failed in guest_party db".mysqli_error($connect));
}


mysqli_close($connect);
// success
print "<script type=\"text/javascript\">alert('Delete Guest Success! Refresh to see change!')</script>";//;window.history.go(-1)</script>";

?>
