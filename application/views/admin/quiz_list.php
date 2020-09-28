<div class="section">

	<div class="card">
		<div class="card-header">
			<p class="card-header-title">Header</p>
		</div>
		<div class="card-content">
			<table class="table is-fullwidth" id="quiz_data">
				<thead>
					<tr>
                        <th>#</th>
                        <th>Topic</th>
                        <th>Options</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
	<br />
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $('#quiz_data').DataTable({
			   "order":[],
			   "ajax":{
				   url:"<?php echo base_url() . 'admin/quizzes/fetch'; ?>",  
			   }
            });
    });
</script>
