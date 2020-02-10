<?php	//중복방지문
	$con = mysqli_connect("localhost", "root", "ds64079376", "Movie");	//아이피,아이디,비번,디비이름
	
	$ID = $_POST["ID"];
	
	$statement = mysqli_prepare($con, "SELECT * FROM MyMovie WHERE ID = ?");	//테이블안아이디비번확인
	mysqli_stmt_bind_param($statement, "s", $ID);	
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement,$ID, $Moviename, $Movieimage, $Rating);

	$count = 0;
	$response = array();

	while(mysqli_stmt_fetch($statement)){
		$response[$count++] = $Moviename.",".$Movieimage.",".(string)$Rating;
		#$response[$count++] = array($Movieimage,$Moviename,$Rating);
	}
	
	echo json_encode($response);
?>
