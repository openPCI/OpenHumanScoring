<?php
session_start();
if(!$_SESSION["userid"]) exit;
else $user_id=$_SESSION["userid"];
?>
