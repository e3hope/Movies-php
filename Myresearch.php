<?php	
	$con = mysqli_connect("localhost", "root", "ds64079376", "Movie");//아이피,아이디,비번,디비이름
	
	$ID = $_POST["ID"];
	$Moviename = $_POST["Moviename"];
	$Movieimage = $_POST["Movieimage"];
	$Rating = (float)$_POST["Rating"];
	$statement = mysqli_prepare($con, "INSERT INTO MyMovie VALUES (?, ?, ?, ?)");
	mysqli_stmt_bind_param($statement, "sssd", $ID,$Moviename,$Movieimage,$Rating);
	mysqli_stmt_execute($statement);

	$response = array();	
	$response["success"] = true;
	echo json_encode($response);
	
?>
