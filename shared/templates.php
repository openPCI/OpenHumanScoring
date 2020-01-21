<?php
if(!$templatesdir) { //Then we have a call from js
	$relative="../";
	include_once($relative."dirs.php");
	echo json_encode(get_template($_POST["template"],$_POST));
}
function get_template($filename,$args=array()) {
	global $log,$templatesdir,$mysqli;;
	extract($args);
	$istemplate=true;
    if (is_file($templatesdir.$filename.".php")) {
        ob_start();
        include ($templatesdir.$filename.".php");
        if(!is_array($res)) $res=array();
        return array_merge(array("template"=>ob_get_clean()),$res);
    }
    return false;
}
