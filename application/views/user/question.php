    <div class="block mt-6">
        <form id="quiz_form" action="<?php echo base_url() ?>next_question" method="POST">
                <div class="columns is-two-thirds is-centered">
                        <div class="box">
                                <h5 class="title is-5"><?php echo $question ?></h5>
                                <hr>
                                <div class="control">
                                        <input type="hidden" value="<?php echo $topic_id ?>" name="topic_id">
                                        <input type="hidden" value="<?php echo $score_id ?>" name="score_id">
                                        <input type="hidden" value="<?php echo $session_id ?>" name="session_id">
                                        <?php foreach($choices as $row): ?>
                                                <label class="radio">
                                                        <input type="radio" name="choice" value="<?php echo $row->choice_id ?>">
                                                        <?php echo $row->choice ?>
                                                </label>
                                                <br>
                                        <?php endforeach ?>
                                </div>
                                <hr>
                                <button class="button is-primary" type="submit">Next</button>
                        </div>
                </div>
        </form>
    </div>
    <!-- Javscript -->
    
