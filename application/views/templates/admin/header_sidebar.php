<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bulma/bulma.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/admin_style.css">
	<script src="<?php echo base_url() ?>assets/font-awesome/js/all.min.js"></script>
	<!-- JS Files -->
	<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
	<title>Quiz App</title>
</head>

<body>
	<div id="app">

		<nav class="navbar has-shadow">
			<div class="container">
				<div class="navbar-left">
					<a class="navbar-item">
						Website
					</a>
				</div>
				<label for="menu-toggle" class="navbar-toggle">
					<span></span>
					<span></span>
					<span></span>
				</label>
				<input type="checkbox" id="menu-toggle" class="is-hidden" />
				<div class="navbar-end navbar-menu">
					<a class="navbar-item is-tab is-hidden-tablet">
						<span class="icon"><i class="fa fa-home"></i></span> Home
					</a>
					<a class="navbar-item is-tab is-hidden-tablet">
						<span class="icon"><i class="fa fa-table"></i></span> Links
					</a>
					<a class="navbar-item is-tab is-hidden-tablet">
						<span class="icon"><i class="fa fa-info"></i></span> About
					</a>

					<a class="navbar-item is-tab is-active">
						<span class="icon"><i class="fa fa-user"></i></span>
					</a>
					<a class="navbar-item is-tab">
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
						<a href="#" class="">
							<span class="icon"><i class="fa fa-home"></i></span> Home
						</a>
					</li>
					<li>
						<a href="#" class="is-active">
							<span class="icon"><i class="fa fa-table"></i></span> Links
						</a>

						<ul>
							<li>
								<a href="#">
									<span class="icon is-small"><i class="fa fa-link"></i></span> Link1
								</a>
							</li>
							<li>
								<a href="#">
									<span class="icon is-small"><i class="fa fa-link"></i></span> Link2
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="">
							<span class="icon"><i class="fa fa-info"></i></span> About
						</a>
					</li>
				</ul>
			</aside>

			<div class="container column is-10">
				