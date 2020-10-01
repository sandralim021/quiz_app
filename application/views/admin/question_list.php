<div class="section">
	<div class="notification" style="display:none;"></div>

	<div class="card">
		<div class="card-header">
			<p class="card-header-title"><?php echo $topic->topic_name ?> - Questions</p>
		</div>
		<div class="card-content">
			<button href="" class="button is-primary" id="btn_add"><i class="fas fa-plus"></i>Add Record</button>
			<table class="table is-fullwidth" id="question_data">
				<thead>
					<tr>
						<th>#</th>
						<th>Questions</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody id="selected_data">

				</tbody>
			</table>
		</div>
	</div>
	<br />
</div>
<!-- Topic Modal -->
<div class="modal question_modal">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Modal title</p>
			<button class="delete close-modal" aria-label="close"></button>
		</header>
			<section class="modal-card-body">
                <form id="question_form">
                    <!-- Content ... -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Question</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" name="question"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Option A</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" name="choice[0]" type="text">
                                </div>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="answer[0]" class="answer" value="1">
                                        Mark as Right Choice
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Option B</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" name="choice[1]" class="input">
                                </div>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="answer[1]" class="answer" value="1">
                                        Mark as Right Choice
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Option C</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" name="choice[2]" class="input">
                                </div>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="answer[2]" class="answer" value="1">
                                        Mark as Right Choice
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Option D</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" name="choice[3]" class="input">
                                </div>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio"name="answer[3]" class="answer" value="1">
                                        Mark as Right Choice
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
			</section>
			<footer class="modal-card-foot">
				<button class="button is-success" id="btn_save" type="submit">Save changes</button>
				<button class="button close-modal">Cancel</button>
			</footer>
	</div>
</div>
<!-- Delete Topic -->
<div class="modal delete_modal">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Confirm Delete</p>
			<button class="delete close-modal" aria-label="close"></button>
		</header>
			<section class="modal-card-body">
				<!-- Content ... -->
				Do you want to delete this record?
			</section>
			<footer class="modal-card-foot">
				<button class="button is-danger" id="btn_delete" type="submit">Delete</button>
				<button class="button close-modal">Cancel</button>
			</footer>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $('#question_data').DataTable({
			"order": [],
			"ajax": {
				url: "<?php echo base_url() . 'admin/questions/fetch/'.$topic->topic_id; ?>",
			}
		});
        //Radio Button
        $('.answer').each(function(){
			$(this).click(function(){
				$('.answer').prop('checked',false);
				$(this).prop('checked',true);
			})
		})

        //Add New
		$('#btn_add').click(function () {
			$('.question_modal').addClass('is-active');
			$('.question_modal').find('.modal-card-title').text('Add New Question');
			$('#question_form').attr('action', '<?php echo base_url('admin/questions/insert/'.$topic->topic_id); ?>');

		});

		//Close Modal
		$(".question_modal .close-modal").click(function () {
			$(".question_modal").removeClass("is-active");
		});

        //Close Delete Modal
		$(".delete_modal .close-modal").click(function () {
			$(".delete_modal").removeClass("is-active");
		});
        //Save and Edit
        $('#btn_save').click(function(){
            var url = $('#question_form').attr('action');
            var data = $('#question_form').serialize();

            $.ajax({
				url: url,
				data: data, // /converting the form data into array and sending it to server
				method: 'post',
				dataType: 'json',
				success: function (response) {
					dataTable.ajax.reload(null, false);
					if (response.success === true) {
						$(".question_modal").removeClass("is-active");
                        $("#question_form")[0].reset();
						$('.notification').addClass('is-success');
						$('.notification').html(response.messages).fadeIn().delay(2000).fadeOut('slow');
					} else {
						alert(response.messages);
					}
				}
			});
        });
        //Edit Question
        $('#selected_data').on('click', '.item-edit', function(){
            var id = $(this).attr('data');
            $('.question_modal').addClass('is-active');
			$('.question_modal').find('.modal-card-title').text('Add New Question');
			$('#question_form').attr('action', '<?php echo base_url(); ?>admin/questions/update/'+id);
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>admin/questions/edit/'+id,
                async: false,
                dataType: 'json',
                success: function(data){
                    $('textarea[name=question]').val(data.question.question);
                    for(var i=0; i<data.choices.length; i++) {
                        var obj = data.choices[i];
                        $('input[name="choice['+i+']"]').val(obj.choice);
                        if(obj.answer == 1){
                            $('input[name="answer['+i+']"]').prop('checked',true);
                        }else if(obj.answer == 0){
                            $('input[name="answer['+i+']"]').prop('checked',false);
                        }
                        
                    }
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
		});
        //Delete Question
        $('#selected_data').on('click', '.item-delete', function () {
			var id = $(this).attr('data');
			// showing the delete modal
			$('.delete_modal').addClass('is-active');
			//prevent previous handler - unbind()
			$('#btn_delete').unbind().click(function () {
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url(); ?>admin/questions/delete/'+id,
					dataType: 'json',
					success: function (response) {
						dataTable.ajax.reload(null, false);
						if (response.success === true) {
							$(".delete_modal").removeClass("is-active");
							$('.notification').addClass('is-success');
							$('.notification').html(response.messages).fadeIn().delay(2000).fadeOut('slow');

						} else {
							$(".delete_modal").removeClass("is-active");
							$('.notification').addClass('is-danger');
							$('.notification').html(response.messages).fadeIn().delay(2000).fadeOut('slow');
						}
					},
					error: function () {
						alert('Error deleting');
					}
				});
				return false;
			});
		});



    })
</script>
