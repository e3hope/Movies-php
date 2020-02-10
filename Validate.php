<?php	//중복방지문
	$con = mysqli_connect("localhost", "root", "ds64079376", "Movie");	//아이피,아이디,비번,디비이름
	
	$ID = $_POST["ID"];

	$statement = mysqli_prepare($con, "SELECT * FROM USER WHERE ID = ?");

	mysqli_stmt_bind_param($statement, "s", $ID);	//s->string형으로 id 받기 여기서부터 에러남
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $ID);

	$response = array();	
	$response["success"] = true;

	while(mysqli_stmt_fetch($statement)){	
		$response["success"] = false;
		$response["ID"] = $ID;
	}
	echo json_encode($response);
?>