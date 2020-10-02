<div class="block mt-4">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <th>#</th>
                <th>Quiz</th>
                <th>Number Of Questions</th>
                <th>Options</th>
            </thead>
            <tbody>
            <?php $i = 1;?>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row->topic_name ?></td>
                    <td><?php echo $row->num_questions ?></td>
                    <td><a class="button is-primary" href="<?php echo base_url('ranking/list/'.$row->topic_id) ?>">Select</a></td>
                    <!-- Checking if already exists -->
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
   </div>
