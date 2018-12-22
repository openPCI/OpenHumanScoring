<!DOCTYPE html>
<html lang="<?= $locale; ?>">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="OpenScoring">
    <meta name="author" content="Jeppe Bundsgaard">
    <link rel="icon" href="favicon.png">

    <title>OpenScoring - <?=_('Human scoring of test responses');?> ...</title>
    
	<link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css">
    <link rel="stylesheet" href="./css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="./css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="./css/daterangepicker.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<!-- 	 <script defer src="./js/fontawesome-all.min.js"></script> -->
    <!-- styles for OpenScoring -->
    <link rel="stylesheet" href="css/openscoring.css" rel="stylesheet">
  </head>

  <body>
<!-- Header --><!-- add? fixed-top -->
<nav class="navbar navbar-expand-sm navbar-dark justify-content-between sticky-top">
	<div class="col-2 col-md-4">
<!-- 		<a class="align-left" href="/" aria-label="OpenScoring - <?=_('Human scoring of test responses');?>"> -->
			<span class="openscoring-logo"><i class="fas fa-user-edit fa-3x"></i></span>
<!-- 			<img class="openscoring-logo" src="img/<?= ($settings->logo?$settings->logo:'logo.png');?>"> -->
<!-- 		</a> -->
	</div>
	<div class="col-2 col-md-4 openscoring text-center align-left">
		OpenScoring<span class="d-none d-md-block small">&#8211; <?=_('Human scoring of test responses');?></span><span class="d-block" id="OpenScoringHeader"></span>
	</div>
	<div class="col-3 d-md-none">
		<button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse col-6 col-md-4 justify-content-end float-right" id="navbarToggler">
			<ul class="navbar-nav">
				<li class="nav-item active d-flex justify-content-end">
					<a class="nav-link menulink" href="./"><?= _('Score');?></a>
				</li>
				<li class="nav-item active d-flex justify-content-end">
					<a class="nav-link menulink" href="./?p=manage"><?= _('Manage');?></a>
				</li>
				<li class="nav-item active d-flex justify-content-end">
					<a class="nav-link menulink" href="./?p=admin"><?= _('Scoring Admin');?></a>
				</li>
				<li class="nav-item active d-flex justify-content-end">
					<a class="nav-link menulink" href="./?p=projectadmin"><?= _('Project Admin');?></a>
				</li>
				<div class="collapse <?= ($_SESSION["userid"]?"show":""); ?>" id="logoutMenuItem">
					<li class="nav-item active d-flex justify-content-end " >
						<a class="nav-link menulink" id="logout" href="?logout=true"><?= _('Log out');?></a>
					</li>
				</div>
			</ul>
		
	</div>
</nav>
