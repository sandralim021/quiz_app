<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bulma/bulma.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/style.css">
	<script src="<?php echo base_url() ?>assets/font-awesome/js/all.min.js"></script>
	<!-- JS Files -->
	<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
    <title>Quiz App</title>
</head>

<body class="has-background-grey-lighter">
	<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
		<div class="navbar-brand">
			<a class="navbar-item" href="https://bulma.io">
				<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
			</a>

			<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
				data-target="navbarBasicExample">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

		<div id="navbarBasicExample" class="navbar-menu">
			<div class="navbar-start">
				<a class="navbar-item" href="<?php echo base_url() ?>main">
					Home
				</a>

				<a class="navbar-item">
					Ranking
				</a>

			</div>

			<div class="navbar-end">
				<?php if ($this->session->userdata('logged_in')): ?>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">
						<?php echo $this->session->userdata('name') ?>
						</a>
						<div class="navbar-dropdown">
							<a class="navbar-item">
								Profile
							</a>
							<a class="navbar-item" href="<?php echo base_url() ?>logout">
								Logout
							</a>
						</div>
					</div>
				<?php else: ?>
					<div class="navbar-item">
						<div class="buttons">
							<a class="button is-primary" href="<?php echo base_url() ?>signup">
								<strong>Sign up</strong>
							</a>
							<a class="button is-light" href="<?php echo base_url() ?>login">
								Log in
							</a>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</nav>
    <div class="container">
    
