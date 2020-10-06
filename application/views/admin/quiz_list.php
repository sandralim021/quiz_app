<div class="section">
	<div class="notification" style="display:none;"></div>

	<div class="card">
		<div class="card-header">
			<p class="card-header-title">Quizzes</p>
		</div>
		<div class="card-content">
			<button href="" class="button is-primary" id="btn_add"><i class="fas fa-plus"></i>Add Record</button>
			<table class="table is-fullwidth" id="quiz_data">
				<thead>
					<tr>
						<th>#</th>
						<th>Topic</th>
						<th>Topic Status</th>
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
<div class="modal quiz_modal">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Modal title</p>
			<button class="delete close-modal" aria-label="close"></button>
		</header>
		<form id="topic_form">
			<section class="modal-card-body">
				<!-- Content ... -->
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Topic</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control">
								<input class="input" name="topic_name" id="topic_name" type="text"
									placeholder="Enter Topic Title">
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Status</label>
					</div>
					<div class="field-body">
						<div class="field is-narrow">
							<div class="control">
								<div class="select is-fullwidth">
									<select name="topic_status">
										<option value="active">Active</option>
										<option value="not_active">Not Active</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<footer class="modal-card-foot">
				<button class="button is-success" id="btn_save" type="submit">Save changes</button>
				<button class="button close-modal">Cancel</button>
			</footer>
		</form>
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
	$(document).ready(function () {
		var dataTable = $('#quiz_data').DataTable({
			"order": [],
			"ajax": {
				url: "<?php echo base_url() . 'admin/quizzes/fetch'; ?>",
			}
		});
		//Add New
		$('#btn_add').click(function () {
			$(".help").remove();
			$("#topic_form")[0].reset();
			$('.quiz_modal').addClass('is-active');
			$('.quiz_modal').find('.modal-card-title').text('Add New Quiz');
			$('#topic_form').attr('action', '<?php echo base_url(); ?>admin/quizzes/insert');

		});
		//Close Modal
		$(".quiz_modal .close-modal").click(function () {
			$(".help").remove();
			$("#topic_form")[0].reset();
			$(".quiz_modal").removeClass("is-active");
		});

		//Close Delete Modal
		$(".delete_modal .close-modal").click(function () {
			$(".delete_modal").removeClass("is-active");
		});

		//Inserting/Updating data
		$('#topic_form').submit(function (e) {
			e.preventDefault();
			var url = $(this).attr('action');
			var data = $(this).serialize();
			$(".help").remove();

			$.ajax({
				url: url,
				data: data, // /converting the form data into array and sending it to server
				method: 'post',
				dataType: 'json',
				success: function (response) {
					dataTable.ajax.reload(null, false);
					if (response.success === true) {
						$(".help").remove();
						$("#topic_form")[0].reset();
						$(".quiz_modal").removeClass("is-active");
						$('.notification').addClass('is-success');
						$('.notification').html(response.messages).fadeIn().delay(2000).fadeOut('slow');
					} else {
						if (response.messages instanceof Object) {
							$.each(response.messages, function (index, value) {
								var id = $("#" + index);
								id.closest('.input')
									.removeClass('is-success')
									.removeClass('is-danger')
									.addClass(value.length > 0 ? 'is-danger' :
										'is-success');

								id.after(value);
							});
						} else {
							alert(response.messages);
						}
					}
				}
			});

		});
		//EDIT CATEGORY
		$('#selected_data').on('click', '.item-edit', function () {
			var id = $(this).attr('data');
			$('.quiz_modal').addClass('is-active');
			$('.quiz_modal').find('.modal-card-title').text('Edit Quiz');
			$('#topic_form').attr('action', '<?php echo base_url(); ?>admin/quizzes/update/' + id);
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url() ?>admin/quizzes/edit/' + id,
				async: false,
				dataType: 'json',
				success: function (data) {
					$('input[name=topic_name]').val(data.topic_name);
					$('select[name=topic_status]').val(data.topic_status);
				},
				error: function () {
					alert('Could not Edit Data');
				}
			});
		});

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
					url: '<?php echo base_url(); ?>admin/quizzes/delete/'+id,
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

	});

</script>
