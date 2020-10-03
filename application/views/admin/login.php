<!DOCTYPE html>
<html lang="en" class="has-background-primary-dark">

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
	<title>QUIZ APP ADMIN</title>
</head>
<body>
	<div class="container">
		<div class="block mt-6">
			<div class="columns is-centered">
				<div class="column is-two-fifths">
					<div class="box has-text-centered">
						<h3 class="title is-3">ADMIN LOGIN</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="block mt-2">
			<div class="columns is-centered">
				<div class="column is-two-fifths">
					<form action="<?php echo base_url() ?>admin/login_user" id="login_form" class="box">
						<div class="field">
							<label for="" class="label">Email</label>
							<div class="control has-icons-left">
								<input type="email" name="email" placeholder="e.g. sample@gmail.com" class="input"
									required>
								<span class="icon is-small is-left">
									<i class="fas fa-envelope"></i>
								</span>
							</div>
						</div>
						<div class="field">
							<label for="" class="label">Password</label>
							<div class="control has-icons-left">
								<input type="password" name="password" placeholder="*******" class="input" required>
								<span class="icon is-small is-left">
									<i class="fas fa-lock"></i>
								</span>
							</div>
						</div>
						<div class="field has-text-centered">
							<button class="button is-primary">
								Login
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" language="javascript">
        $(document).ready(function (){
            $('#login_form').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                // perform ajax
                $.ajax({
                url: form.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: form.serialize(), // /converting the form data into array and sending it to server
                async: false,
                success: function (response) {
                    if (response.error == false) {
                        window.location.href = '<?php echo base_url(); ?>admin/home';
                    } else {
                        alert(response.message);
                    }
                }
                });
            });

        });

    </script>
</body>

</html>
