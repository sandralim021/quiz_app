   <div class="block mt-4">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <th>#</th>
                <th>Topic</th>
                <th>No. of Questions</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row->topic_name ?></td>
                    <td><?php echo $row->num_questions ?></td>
                    <!-- Checking if already exists -->
                    <?php
                        $user_id = $this->session->userdata('user_id');
                        $query = $this->db->query("SELECT * FROM scores WHERE topic_id = $row->topic_id AND user_id = $user_id");
                        if($query->num_rows() > 0){
                    ?>
                        <td><a class="button is-info" href="<?php echo base_url('get_questions/'.$row->topic_id) ?>">Restart</a></td>
                    <?php 
                        }else{
                    ?>
                        <td><a class="button is-primary" href="<?php echo base_url('get_questions/'.$row->topic_id) ?>">Start</a></td>
                    <?php
                        }
                    ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
   </div>
