<?php
#checkpermissions()
// if(!$_SESSION["user_id"]) exit;
// else $user_id=$_SESSION["user_id"];
$relative="../";
include_once($relative."dirs.php");
include_once($shareddir."database.php");

$value=$mysqli->real_escape_string(trim($_POST["value"]));
switch($_POST["edittype"]) {
	case "items": 
		if($_POST["edittype2"]=="name") {
			$value='JSON_REMOVE(JSON_SET(`items`,"$.'.$value.'",`items`->>"$.'.$_POST["oldvalue"].'"),"$.'.$_POST["oldvalue"].'")';
		} else 
		$value='JSON_SET(`items`,"$.'.$_POST["oldvalue"].'",'.$value.')';
	break;
	case "tasktype_variables":
		$value='JSON_SET(`tasktype_variables`,"$.'.$_POST["variable"].'","'.$mysqli->real_escape_string($_POST["value"]).'")';
	break;
	case "tasktype_id":
		$q="select variables from tasktypes where tasktype_id=".$value;
		$result=$mysqli->query($q);
		$variables=json_decode($result->fetch_assoc()["variables"]);
		ob_start();
		include("gettasktypevariables.php");
        $res["variables"]=ob_get_clean();
	break;
	default:
		$value='"'.$value.'"';
	break;
}
$q='update tasks set `'.$_POST["edittype"].'`='.$value.' where task_id='.$_POST["task_id"];
$mysqli->query($q);
$test_id=$mysqli->insert_id;
$log.="\n".$q;
$res["task_id"]=$_POST["task_id"];
$res["log"]=$log;
echo json_encode($res);
