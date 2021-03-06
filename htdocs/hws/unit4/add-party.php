<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<title>Organizer</title>
<link href="../../css/homeworks.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
tiny{
	font-weight: lighter;
}
form{
	margin-top:20px;
	margin-bottom: 10px;
	display: inline;
}
label.key, label.select{   
    color: #3d3d3d;
    font-family: helvetica;
    font-size: 120%;
    margin-bottom: 10px;
    margin-top: 20px;
    display: block;
 }
label.select{
 	display: inline-block;
 	margin-left: 40px;
 }
input[type="text"]{
	margin-left: 40px;
	width: 60%;
	max-width: 200px;
	font-family: helvetica;
	font-size: 110%;
	font-weight: lighter;
	color: #4d4d4d;
	display: block;
	margin-bottom: 10px;
	padding: 10px 20px 10px 20px;
}
input[type="radio"]{
	margin-left: 20px;
	color: #4d4d4d;
}
input[type="submit"]{
	min-width: 140px;
	background-color: #4a86e8;
	color: #fff;
	border: none;
	font-weight: lighter;
	font-size: 120%;
	margin: 50px 40px 60px 0px;
	padding: 10px 20px 10px 20px;
	float: left;
}
input[type="submit"]:hover{
	background-color: #4169E1;
}

table{
    width:100%;
    border-collapse:collapse;
    margin: 0px 20px 10px 0px;
    clear: both;
    font-size:110%;
    font-weight: lighter;
}
td,th{
    border:1px solid #d9d9d9;
    padding:10px 20px 10px 20px;
    text-align:center;
    vertical-align:bottom;
}
th{
    font-size:110%;
    font-weight: lighter;
    padding-top:10px;
    padding-bottom:10px;
    background-color:#4a86e8;
    color:#ffffff;
}


</style>
</head>

<body>

<h1 id="toc_0">Unit 4: PHP and Data Base Access</h1>

<h2 id="toc_1">questionaire - Party Organizers</h2>
<script type="text/javascript">
var pwd = prompt("Enter your password","password");
if(pwd!="admin"){
	alert("Sorry, permission denied! Find the password in questionaire page!");
	window.history.go(-1);
}
  
</script>

<form action="delete-party.php" method = "post">
	<h3>Current Parties</h3>
	<table>
	<!--PHP get table of parties -->		
		<?php 
		$connect = mysqli_connect("localhost", "usr_2016_9", "jtwyoua1996","db_2016_9") 
			or die("Error - Could not connect to mysqli ".mysqli_error());

		// select from party 
		$query = "SELECT * FROM party";
		$result = mysqli_query($connect, $query) or die("Error - Select failed in party db".mysqli_error($connect));
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		$num_fields = sizeof($row)/2;

		print "<th>Select</th>";
		print "<th>Name</th>";
		print "<th>Date</th>";
		print "<th>Place</th>";
		print "</tr>";

		for($i = 0; $i < $num_rows; $i++){
			reset($row);
			print "<tr>"."<td><input type=\"checkbox\" name=\"index[]\" value=\"$i\" /></td>";
			for($j = 1; $j < $num_fields; $j++){
				print "<td>".$row[$j]."</td>";
			}
			print "</tr>";
			$row = mysqli_fetch_array($result);
		}
		mysqli_close($connect);
		?>
	<!--PHP get table of parties\END -->	
	</table>
	<input type = "submit"  value = "Delete" />

</form>

<table></table>
	
<h3>Add New Party</h3>
<form id="questionaire" action = "collect-party.php" method = "post">
	<label class="key" for="pname"> Name </label> 
	<input type="text" name="pname"  placeholder="Party's Name"> 
	<label class="key" for="date"> Date </label> 
	<input type="text" name="date" placeholder="Date">
	<label class="key" for="place"> Place</label>
	<input type="text"  name="place" placeholder="place">	
	<input type="submit" value = "Submit" />
</form>



<form name = "questionaire" action = "result.php">
	<input type = "submit"  value = "Result" />
</form>

<table></table>
<tiny><a href="questionaire.php">Back to questionaire</a></tiny><br />
<tiny><a href="hw4.html">Back to Homework of Unit 4</a></tiny>
</body>

</html>
