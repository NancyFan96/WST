<?php

$index = $_POST["index"];

$connect = mysqli_connect("localhost", "usr_2016_9", "jtwyoua1996", "db_2016_9") 
	or die("Error - Could not connect to mysqli ".mysqli_error($connect));

// delete from party 
foreach ($index as $partyid){
	$query = "SELECT Party_ID FROM party LIMIT 1 OFFSET $partyid";
	$result = mysqli_query($connect,$query) or die("Error - Select failed in party db".mysqli_error($connect));
	$pair = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$partyid = $pair['Party_ID'];

	$query = "DELETE FROM party WHERE Party_ID = $partyid";
	$result = mysqli_query($connect,$query) or die("Error - Delete failed in party db".mysqli_error($connect));
	$query = "DELETE FROM guest_party WHERE Party_ID = $partyid" ;
	$result = mysqli_query($connect,$query) or die("Error - Delete failed in guest_party db".mysqli_error($connect));
}

mysqli_close($connect);
// success
print "<script type=\"text/javascript\">alert('Delete Party Success! Refresh to see change!');window.history.go(-1)</script>";

?>
