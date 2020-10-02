<div class="block mt-4">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Quiz Taken</th>
                <th>Correct</th>
                <th>Wrong</th>
                <th>Date</th>
                <th>Time</th>
            </thead>
            <tbody>
                <?php if(count($data) > 0): ?>
                    <?php $i = 1;?>
                    <?php foreach($data as $row): ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->topic_name ?></td>
                        <td><?php echo $row->correct ?></td>
                        <td><?php echo $row->wrong ?></td>
                        <td><?php echo  date('F j, Y',strtotime($row->date)) ?></td>
                        <td><?php echo date('g:i A',strtotime($row->time)) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="has-text-centered">No Data Available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
   </div>
