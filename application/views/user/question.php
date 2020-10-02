    <div class="block mt-6">
    	<div class="columns is-centered">
                <div class="box column is-three-fifths">
                        <form id="quiz_form" action="<?php echo base_url() ?>next_question" method="POST">
                                <h5 class="title is-5"><?php echo $question ?></h5>
                                <hr>
                                <div class="control">
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
                                <div class="has-text-centered">
                                        <button class="button is-primary" type="submit">Next</button>
                                </div>
                        </form>
                </div>
    	</div>
    </div>
    <!-- Javscript -->
