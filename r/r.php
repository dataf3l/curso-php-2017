<?php
if(isset($_POST["user"])){
	require("c.php");
	$u = str_replace("'","",$_POST["user"]);
	$p = sha1(str_replace("'","",$_POST["password"]));

	$SQL= "SELECT count(*) as c from user where username='$u'";
	$ds = runSQL($SQL);
	if($ds[0]["c"] != 0){
		echo("el usuario ya ha sido registrado.");
		die();
	}


	$sql = "INSERT INTO user (username, password, login_count, date_created)VALUES('$u', '$p', 0, now())";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	echo("has sido creado.");
	die();
}
?>
<form method=POST>
	User:<br/>
	<input type=text name=user placeholder=user><br/>
	Password:<br/>
	<input type=password name=password placeholder=password><br/>
	<input type=submit><br/>
</form>

