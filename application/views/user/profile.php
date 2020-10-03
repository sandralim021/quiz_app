<div class="block mt-6">
	<div class="columns is-centered">
		<div class="column is-two-fifths">
        <?php if($this->session->flashdata('success')): ?>
            <div class="notification is-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif($this->session->flashdata('error')): ?>
            <div class="notification is-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
			<div class="box has-text-centered">
				<h3 class="title is-3">User Information</h3>
			</div>
		</div>
	</div>
</div>
<div class="block mt-2">
	<div class="columns is-centered">
		<div class="column is-two-fifths">
			<form action="<?php echo base_url('update_profile/'.$this->session->userdata('user_id')) ?>" id="profile_form" class="box">
				<div class="field">
					<label for="" class="label">Name</label>
					<div class="control has-icons-left">
						<input type="text" name="name" class="input" id="name" value="<?php echo $this->session->userdata('name') ?>">
						<span class="icon is-small is-left">
							<i class="fas fa-user"></i>
						</span>
					</div>
				</div>
				<div class="field">
					<label for="" class="label">Email</label>
					<div class="control has-icons-left">
						<input type="email" name="email" class="input" id="email" value="<?php echo $this->session->userdata('email') ?>">
						<span class="icon is-small is-left">
							<i class="fas fa-envelope"></i>
						</span>
					</div>
				</div>
				<div class="field">
					<label for="" class="label">Password</label>
					<div class="control has-icons-left">
						<input type="password" name="password" placeholder="(Leave Empty If Not Changing)" class="input">
						<span class="icon is-small is-left">
							<i class="fas fa-lock"></i>
						</span>
					</div>
				</div>
				<div class="field has-text-centered">
					<button class="button is-primary" type="submit">
						Update Profile
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
        <?php if($this->session->flashdata('success') || $this->session->flashdata('error')): ?>
            $('.notification').fadeIn().delay(2000).fadeOut('slow');
		<?php endif; ?>
        
        $('#profile_form').submit(function (e){
            e.preventDefault();
            var form = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                data: form,
                dataType: 'json',
                type: 'post',
                success: function(response){
                    if(response.success == true){
                        location.reload();
                    }
                    else{
                        $.each(response.messages, function(index, value) {
                            var id = $("#" + index);
								id.closest('.input')
									.removeClass('is-success')
									.removeClass('is-danger')
									.addClass(value.length > 0 ? 'is-danger' :
										'is-success');

								id.after(value);

                    });
                    }
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                }
            });
            
        });

    });
</script>
