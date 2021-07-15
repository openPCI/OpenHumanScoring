<?php
session_start();
if(!$_SESSION["user_id"]) {
	echo json_encode(array("getlogin"=>true));
	exit;
} else $user_id=$_SESSION["user_id"];
include_once($shareddir."database.php");

?>
<div class="">
<h3>Welcome</h3>
Get ready for coding... 
</div>
