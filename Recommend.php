<?php	
	$con = mysqli_connect("localhost", "root", "ds64079376", "Movie");//아이피,아이디,비번,디비이름
	
	$ID = $_POST["ID"];
	$Moviename = $_POST["Moviename"];
	$Rating = (float)$_POST["Rating"];
	#$statement = mysqli_prepare($con,"SELECT * FROM MyMovie WHERE ID = ? AND Moviename = ? AND Rating = ?");
	$statement = mysqli_prepare($con, "SELECT ID, Moviename, Movieimage, MAX(Rating) FROM MyMovie WHERE ID = (SELECT ID FROM MyMovie WHERE ID != ? AND Moviename = ? AND Rating BETWEEN ? - 0.5 AND ? + 0.5) AND Moviename != ?");
	mysqli_stmt_bind_param($statement, "ssdds", $ID, $Moviename, $Rating, $Rating, $Moviename);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement,$ID, $Moviename, $Movieimage, $Rating);
	$response = array();
	#$response["recommend"]=null;	
	$response["success"] = false;
		
	while(mysqli_stmt_fetch($statement)){
		$response["ID"] = $ID;
		$response["Moviename"] = $Moviename;
		$response["Movieimage"] = $Movieimage;
		$response["success"] = true;
		#$response["recommend"]=$ID.",".$Moviename.",".$Movieimage;
	}
	echo json_encode($response);
	
?>
