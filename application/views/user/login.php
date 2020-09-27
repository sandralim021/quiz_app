    <div class="block mt-6">
      <div class="columns is-centered">
        <div class="column is-two-fifths">
          <form action="<?php echo base_url() ?>login_user" id="login_form" class="box">
            <div class="field">
              <label for="" class="label">Email</label>
              <div class="control has-icons-left">
                <input type="email" name="email" placeholder="e.g. bobsmith@gmail.com" class="input" required>
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
                        window.location.href = '<?php echo base_url(); ?>main';
                    } else {
                        alert(response.message);
                    }
                }
                });
            });

        });

    </script>
