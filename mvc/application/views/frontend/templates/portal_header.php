<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>images/favicon.png" />
<title>Sable Portal</title>
<!-- Google Fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/leaderboard.css"/>
</head>
<body class="portal">

<nav class="navbar shrink-nav navbar-dropdown navbar-fixed-top" role="navigation">
   <div class="container">
     <div class="col-xs-12 portal-header">
      <div class="navbar-header">
         <a class="navbar-brand" href="<?php echo base_url(); ?>">
         <img class="logo" alt="logo" src="<?php echo base_url(); ?>images/sable-logo.png" />
         </a>
      </div>
     <ul class="nav navbar-nav navbar-right">
     	<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           <span class="profile-name"><?php echo $user['USER_FIRST_NAME'].' '.$user['USER_LAST_NAME'] ?></span>
           <span style="background-image: url('<?php echo base_url().$user['USER_IMAGE_URL'] ?>')" class="img-rounded profile-img"></span>

           <span class="caret"></span>
           </a>

	        <ul class="dropdown-menu">
		        <li><a href="<?php echo base_url(); ?>leaderboard?companyId=<?php echo $user['COMPANY_ID'] ?>">Leaderboard</a>
		        </li>
		        <li><a href="<?php echo base_url(); ?>user/setting">Profile Settings</a></li>
		        <li><a href="<?php echo base_url(); ?>user/logout" role="button">Logout</a></li>
           </ul>
        </li>
     </ul>

     </div>
   </div>
</nav>
