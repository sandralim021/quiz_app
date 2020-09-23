   <div class="block mt-4">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <th>#</th>
                <th>Topic</th>
                <th>No. of Questions</th>
                <th>Marks</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row->topic_name ?></td>
                    <td><?php echo $row->num_questions ?></td>
                    <td>Not Yet Available</td>
                    <td><button class="button is-primary choose" data=<?php echo $row->topic_id ?>>Start</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
   </div>
<script>
    $(document).ready(function(){
        // Check for click events on the navbar burger icon
        $(".choose").click(function() {
            var id = $(this).attr('data');
            window.location.href = '<?php echo base_url() ?>questions/'+id;
        });
    });
</script>