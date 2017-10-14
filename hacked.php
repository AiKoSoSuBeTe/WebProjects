<?php
if ($_POST['jslng']) {
	$connToNiyiDB=mysqli_connect("wekooks.com","niyi_root","password");
	if (!$connToNiyiDB) {
		die("连接服务器失败".mysqli_error(false));
	}
	if (mysqli_select_db($connToNiyiDB,"niyidb")) {
		echo "alert('connected.');\n";
	}
	mysqli_set_charset( $connToNiyiDB,"utf8" );
	mysqli_query($connToNiyiDB,"set character set 'utf8'");
	mysqli_query($connToNiyiDB,"set names 'utf8'");
	$timezone=mysqli_query($connToNiyiDB,"SET time_zone = '+8:00'");
	$cLng = $_POST['jslng'];
	$cLat = $_POST['jslat'];
	//echo "<script>alert(".$cLng.");</script>";
	$sql = "insert into ass values('','".$cLng."','".$cLat."',now())";
	$result = mysqli_query($connToNiyiDB,$sql);
	echo "Get.";
}	
?>