<?php
// $relative="../";
// include($relative."dirs.php");
$res=array("log"=>"test");
if(!$_SESSION["user_id"]) exit;
else $user_id=$_SESSION["user_id"];

?>
<div class="list-group list-group-flush">
<?php
$actions=array(
"upload"=>"Upload data",
"tests"=>"Administer Tests",
"users"=>"Users",
"projectsettings"=>"Project settings",
"changeproject"=>"Change project"
);
$res["links"]=array_keys($actions);
foreach($actions as $action=>$name) {
?>
  <a href="#" class="list-group-item list-group-item-action" id="<?= $action?>"><?= $name?></a>
<?php } ?>
</div>
<?php
