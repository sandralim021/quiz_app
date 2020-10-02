<div class="section">
	<div class="notification" style="display:none;"></div>
	<div class="card">
		<div class="card-header">
			<p class="card-header-title">History</p>
		</div>
		<div class="card-content">
			<table class="table is-fullwidth" id="history_data">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Quiz Taken</th>
						<th>Correct</th>
						<th>Wrong</th>
                        <th>Date</th>
                        <th>Time</th>
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
<!-- Delete History -->
<div class="modal delete_modal">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Confirm Delete</p>
			<button class="delete close-modal" aria-label="close"></button>
		</header>
			<section class="modal-card-body">
				<!-- Content ... -->
				Do you want to delete this history record?
			</section>
			<footer class="modal-card-foot">
				<button class="button is-danger" id="btn_delete" type="submit">Delete</button>
				<button class="button close-modal">Cancel</button>
			</footer>
	</div>
</div>
<script>
    $(document).ready(function (){
        var dataTable = $('#history_data').DataTable({
			"order": [],
			"ajax": {
				url: "<?php echo base_url() . 'admin/history/fetch'?>",
			}
		});
		//Close Delete Modal
		$(".delete_modal .close-modal").click(function () {
			$(".delete_modal").removeClass("is-active");
		});
		//Delete History Record
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
					url: '<?php echo base_url(); ?>admin/history/delete/'+id,
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