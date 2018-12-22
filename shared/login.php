<?php
session_start();
$relative="../";
include_once($relative."dirs.php");
include_once($shareddir."database.php");
include_once($shareddir."templates.php");
if($_POST["inputUser"]) {
	$password=crypt($_POST["inputPassword"],base64_encode($_POST["inputPassword"]));
	$q='select * from users where username="'.str_replace("\"","",$_POST["inputUser"]).'" and password="'.$password.'"';
	
	$res=$mysqli->query($q);
	$r=$res->fetch_assoc();
	if($r) {
		$_SESSION["userid"]=$r["userid"];
		$q='select * from user_permissions p left join units u on p.unit_id=u.unit_id where p.userid='.$r["userid"];
// 		echo $q;
		$res=$mysqli->query($q);
		$perms=array();
		while($r2=$res->fetch_assoc()) {
			$perms[]=array("unit_id"=>$r2["unit_id"],"unittype"=>$r2["unittype"],"unitname"=>$r2["unitname"],"permission"=>$r2["permission"]);
		}
		$_SESSION["perms"]=$perms;
		$welcome=_("Welcome back!");
		if($_POST["rememberMe"]) $_SESSION["rememberMe"]=true;
		$log.="p".$_POST["p"];
		$template=get_template($_POST["p"])["template"];
	}
 	else $warning=_("Username or password was wrong");
} else $warning=_("No username");
echo json_encode(array("log"=>$log,"warning"=>$warning,"userid"=>$_SESSION["userid"],"welcome"=>$welcome,"p"=>$_POST["p"],"template"=>$template));
