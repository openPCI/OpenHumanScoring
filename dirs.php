<?php
ini_set("display_errors","true");
session_start();

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
