<?php
session_start();
if($_GET["logout"]) {
	unset($_SESSION["userid"]);
}
$user_id=$_SESSION["userid"];
$loggedin=($user_id);
$relative="./";
include_once("dirs.php");
// include_once($secretdir."settings.php");
include_once("header.php");
include_once($shareddir."database.php");
include_once($shareddir."templates.php");
?>
<div class="container-fluid" id="contentdiv">
<?php
	if($_GET["contact"]) {
		echo get_template("contact")["template"];
	}
	if($loggedin) {
		$p=($_POST["p"]?$_POST["p"]:($_GET["p"]?$_GET["p"]:"main"));
		echo get_template($p)["template"];
	}
	else {
		echo get_template("login")["template"];
	}
?>
</div>
<?php
include_once("footer.php");
