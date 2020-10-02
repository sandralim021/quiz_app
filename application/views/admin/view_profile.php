<div class="section">
    <?php if($this->session->flashdata('success')): ?>
        <div class="notification is-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php elseif($this->session->flashdata('error')): ?>
        <div class="notification is-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
   <?php endif; ?>
	<div class="card">
		<div class="card-header">
			<p class="card-header-title">View Profile</p>
		</div>
		<div class="card-content">
            <div class="columns is-centered">
                <div class="column is-half">
                    <form action="<?php echo base_url('admin/update_profile/'.$this->session->userdata('admin_id')) ?>" id="profile_form">
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Name</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input" type="text" name="name" id="name" value="<?php echo $this->session->userdata('admin_name') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Email</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input" type="text" name="email" id="email" value="<?php echo $this->session->userdata('admin_email') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Password</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input" type="password" name="password" id="password" placeholder="(Leave empty if not changing)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal has-text-centered">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <button class="button is-primary" type="submit">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
	<br />
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
