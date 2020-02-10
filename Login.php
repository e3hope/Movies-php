<?php	//중복방지문
	$con = mysqli_connect("localhost", "root", "ds64079376", "Movie");	//아이피,아이디,비번,디비이름
	
	$ID = $_POST["ID"];
	$Password = $_POST["Password"];

	$statement = mysqli_prepare($con, "SELECT * FROM USER WHERE ID = ? AND Password = ?");	//테이블안아이디비번확인
	mysqli_stmt_bind_param($statement, "ss", $ID, $Password);	
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $ID, $Password);

	$response = array();	
	$response["success"] = false;

	while(mysqli_stmt_fetch($statement)){
		$response["success"] = true;
		$response["ID"] = $ID;
		$response["Password"] = $Password;
	}
	
	
	echo json_encode($response);
?>