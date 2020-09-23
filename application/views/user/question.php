    <div class="block mt-6">
        <div class="columns is-two-thirds is-centered">
                <div class="box">
                        <h5 class="title is-5">1. <?php echo $question ?></h5>
                        <hr>
                        <div class="control">
                                <?php foreach($choices as $row): ?>
                                <label class="radio">
                                        <input type="radio" name="choice" value="<?php echo $row->choice_id ?>">
                                        <?php echo $row->choice ?>
                                </label>
                                <br>
                                <?php endforeach ?>
                        </div>

                </div>
        </div>
    </div>
    
