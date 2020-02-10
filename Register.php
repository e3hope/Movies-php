<?php	//회원가입문
	$con = mysqli_connect("localhost", "root", "ds64079376", "Movie");//아이피,아이디,비번,디비이름
	
	$ID = $_POST["ID"];
	$Password = $_POST["Password"];
	$Name = $_POST["Name"];
	$Email = $_POST["Email"];
	
	$statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?, ?, ?, ?)");
	mysqli_stmt_bind_param($statement, "ssss", $ID, $Password, $Name, $Email);//ssss->string형으로 4개값받기
	mysqli_stmt_execute($statement);

	$response = array();	
	$response["success"] = true;
	
	echo json_encode($response);
?>