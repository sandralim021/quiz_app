<div class="block mt-4">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Score</th>
            </thead>
            <tbody>
            <?php if(count($data) > 0): ?>
                <?php $i = 1;?>
                    <?php foreach($data as $row): ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->email ?></td>
                        <td><?php echo $row->correct ?></td>
                        <!-- Checking if already exists -->
                    </tr>
                    <?php endforeach; ?>
            <?php else: ?>
                    <tr>
                        <td colspan="4" class="has-text-centered">No Data Available</td>
                    </tr>
            <?php endif; ?>
            </tbody>
        </table>
   </div>
