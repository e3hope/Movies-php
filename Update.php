<?php	//중복방지문
	$con = mysqli_connect("localhost", "root", "ds64079376", "Movie");	//아이피,아이디,비번,디비이름
	
	$ID = $_POST["ID"];
	$Password = $_POST["Password"];

	$statement = mysqli_prepare($con, "UPDATE USER SET Password = ? WHERE ID = ?");	//테이블안아이디비번확인
	mysqli_stmt_bind_param($statement, "ss", $Password, $ID);	//ss->string형으로 ID,Password 받기 여기서부터 에러남
	mysqli_stmt_execute($statement);
	
	$response = array();	
	$response["success"] = true;
	
	echo json_encode($response);
?>