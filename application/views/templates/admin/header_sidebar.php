<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bulma/bulma.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/css/datatables.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/css/dataTables.jqueryui.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/admin_style.css">
	<!-- JS Files -->
	<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/datatables/js/datatables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/datatables/js/datatables.jqueryui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/font-awesome/js/all.min.js"></script>
	<title>QUIZ APP ADMIN | <?php echo $title; ?></title>
</head>

<body>
	<div id="app">

		<nav class="navbar has-shadow">
			<div class="container">
				<div class="navbar-brand">
					<a class="navbar-item">
						Quiz Application
					</a>
					<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
						data-target="navbarBasicExample">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>
				<div id="navbarBasicExample" class="navbar-end navbar-menu">
					<a class="navbar-item is-tab is-hidden-tablet <?php if($this->uri->segment(2)=="home"){echo "is-active";}?>" href="<?php echo base_url() ?>admin/home">
						<span class="icon"><i class="fa fa-home"></i></span> Home
					</a>
					<a class="navbar-item is-tab is-hidden-tablet <?php if($this->uri->segment(2)=="ranking"){echo "is-active";}?>" href="<?php echo base_url() ?>admin/ranking/select_quiz">
						<span class="icon"><i class="fa fa-trophy"></i></span> Ranking
					</a>
					<a class="navbar-item is-tab is-hidden-tablet <?php if($this->uri->segment(2)=="history"){echo "is-active";}?>" href="<?php echo base_url() ?>admin/history">
						<span class="icon"><i class="fa fa-history"></i></span> History
					</a>
					<a class="navbar-item is-tab is-hidden-tablet <?php if($this->uri->segment(2)=="quizzes" || $this->uri->segment(2)=="questions"){echo "is-active";}?>" href="<?php echo base_url() ?>admin/quizzes">
						<span class="icon"><i class="fa fa-list"></i></span> Quizzes
					</a>
					<a class="navbar-item is-tab is-hidden-tablet <?php if($this->uri->segment(2)=="users"){echo "is-active";}?>" href="<?php echo base_url() ?>admin/users">
						<span class="icon"><i class="fa fa-users"></i></span> Users
					</a>
					<a class="navbar-item is-tab <?php if($this->uri->segment(2)=="profile"){echo "is-active";}?>" href="<?php echo base_url() ?>admin/profile">
						<?php echo $this->session->userdata('admin_name') ?>
					</a>
					<a class="navbar-item is-tab" href="<?php echo base_url() ?>admin/logout">
						<span class="icon"><i class="fas fa-sign-out-alt"></i></span>
					</a>
				</div>
			</div>
		</nav>

		<section class="main-content columns is-fullheight">

			<aside class="column is-2 is-narrow-mobile is-fullheight section is-hidden-mobile">
				<p class="menu-label is-hidden-touch">Navigation</p>
				<ul class="menu-list">
					<li>
						<a href="<?php echo base_url() ?>admin/home" class="<?php if($this->uri->segment(2)=="home"){echo "is-active";}?>">
							<span class="icon"><i class="fa fa-home"></i></span> Home
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/ranking/select_quiz" class="<?php if($this->uri->segment(2)=="ranking"){echo "is-active";}?>">
							<span class="icon"><i class="fas fa-trophy"></i></span> Ranking
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/history" class="<?php if($this->uri->segment(2)=="history"){echo "is-active";}?>">
							<span class="icon"><i class="fas fa-history"></i></span> History
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/quizzes" class="<?php if($this->uri->segment(2)=="quizzes" || $this->uri->segment(2)=="questions"){echo "is-active";}?>">
							<span class="icon"><i class="fas fa-list"></i></span> Quizzes
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/users" class="<?php if($this->uri->segment(2)=="users"){echo "is-active";}?>">
							<span class="icon"><i class="fas fa-users"></i></span> Users
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/profile" class="<?php if($this->uri->segment(2)=="profile"){echo "is-active";}?>">
							<span class="icon"><i class="fa fa-info"></i></span> Profile
						</a>
					</li>
				</ul>
			</aside>

			<div class="container column is-10">
			
				