<?php
ini_set("display_errors","true");
session_start();
function checkperm($type="") {
	global $user_id;
	if(!$_SESSION["user_id"]) {echo json_encode(array("relogin"=>true)); exit;}
	else $user_id=$_SESSION["user_id"];
	if($type and !$_SESSION["perms"][$type][$_SESSION["project_id"]]) { echo json_encode(array("template"=>_("You don't have access here"))); exit;}
}
if(!$relative) $relative="./";
$systemfilesdir=$relative."systemfiles/";
$datadir=$relative."data/";
$templatesdir=$relative."templates/";
$frontenddir=$relative."frontend/";
$shareddir=$relative."shared/";
$backenddir=$relative."backend/";
$imgdir=$relative."img/";
$jsdir=$relative."js/";
$secretdir=$relative."secrets/";#/var/www/opencodingsecrets/";
