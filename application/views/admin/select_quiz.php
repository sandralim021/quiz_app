<div class="section">
	<div class="notification" style="display:none;"></div>

	<div class="card">
		<div class="card-header">
			<p class="card-header-title">Ranking - Select Quiz Below</p>
		</div>
		<div class="card-content">
			<table class="table is-fullwidth" id="quiz_data">
				<thead>
					<tr>
						<th>#</th>
						<th>Quiz</th>
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

<script>
    $(document).ready(function (){
        var dataTable = $('#quiz_data').DataTable({
			"order": [],
			"ajax": {
				url: "<?php echo base_url() . 'admin/ranking/fetch_quiz'; ?>",
			}
        });
    })
</script>