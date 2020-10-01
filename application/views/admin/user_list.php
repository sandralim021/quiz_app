<div class="section">
	<div class="notification" style="display:none;"></div>

	<div class="card">
		<div class="card-header">
			<p class="card-header-title">Users</p>
		</div>
		<div class="card-content">
			<button href="" class="button is-primary" id="btn_add"><i class="fas fa-plus"></i>Add Record</button>
			<table class="table is-fullwidth" id="question_data">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody id="selected_data">

				</tbody>
			</table>
		</div>
	</div>
	<br />
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $('#question_data').DataTable({
			"order": [],
			"ajax": {
				url: "<?php echo base_url() . 'admin/users/fetch/' ?>",
			}
		});

    })
</script>