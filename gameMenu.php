
<!-- Category Section -->
<div class="categorySection">
    <label for="category">Choose 1 Category:</label>
    <p id="categoryRadioBtn">
        <input type="radio" class="hideRadio" name="category" id="movies" value="Movies"<?php
        if ($gameArr['category'] == "Movies") {
            echo "checked";
        }
        ?>/><label for="movies" class="btnLabel">Movies</label>
        <input type="radio" class="hideRadio" name="category" id="music" value="Music" <?php
        if ($gameArr['category'] == "Music") {
            echo "checked";
        }
        ?> /><label for="music" class="btnLabel">Music</label>
        <input type="radio" class="hideRadio" name="category" id="sport" value="Sport" <?php
        if ($gameArr['category'] == "Sport") {
            echo "checked";
        }
        ?>/><label for="sport" class="btnLabel">Sport</label>  
    </p>
</div>
<div class="startGameBtn">
    <input type="submit" name="start_game" value="Start Game">
</div>  
