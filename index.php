<html>
    <head>
        <title>Take a challenge</title>
        <!-- Styling -->
        <style type="text/css">
            body{
                text-align:center;
                font-family: Arial, Helvetica, sans-serif;
                padding: 20px;
            }

            /* Quiz Category Radio Selection */
            .hideRadio{
                /*hide the radio button */
                display:none;
            }
            /* Category Button Label */
            .btnLabel{
                width:50px;
                display: inline-block;
                cursor: pointer;
                border-radius: 4px;
                background: dimgrey;
                color:white;
                padding: 2px 5px;
            }
            .btnLabel:hover{
                background:grey;
            }
            /* When radio btn is checked */
            #movies:checked + .btnLabel ,
            #music:checked + .btnLabel,
            #sport:checked + .btnLabel {
                background:teal;
                color:white;
            }

            /* Game Form */
            .gameStartForm{
                margin-left:auto;
                margin-right:auto;
                width: 700px;
            }
            /* Nickname Input */
            #name{
                border:1.5px solid grey;
                border-radius:2px;
                padding: 3px 5px;
            }

            /* Start Game (Submit) Button */
            .startGameBtn{
                margin-left: auto;
                margin-right:auto;
            }
            .startGameBtn input[type=submit]{
                padding:2px 6px;
            }
            .startGameBtn input[type=submit]:hover{
                cursor: pointer;
            }


        </style>
    </head>
    <body>
        <!-- PHP Scripts -->
        <?php
        session_start();
        $gameArr = array(
            'name' => '',
            'category' => ''
        );
         $errMsg = "";
        $checked = TRUE;  // Only if true then will proceed to start game
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["name"])) {
                $gameArr['name'] =  $_POST["name"];
            } else {
                $checked = False;
            }
            if (!empty($_POST["category"])) {
                $gameArr['category'] = $_POST["category"];
            } else {
                $checked = False;
            }

            if ($checked) {
                $_SESSION["name"] = $gameArr["name"];
                header("Location:game.php?category=" . $gameArr['category']);
            } else {
                $errMsg = "Please fill in your nickname and select <b>one</b> category to start game";
            }
        }
        ?>
        <div>
            <form class="gameStartForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"/>
            <p><label for="name" >Nickname: </label><input type="text" name="name" id="name" value="<?php echo $gameArr['name'];?>"></p>
            <p><label for="category">Choose 1:</label>
                <input type="radio" class="hideRadio" name="category" id="movies" value="Movies"<?php if ($gameArr['category'] == "Movies") {
            echo "checked";
        } ?>/><label for="movies" class="btnLabel">Movies</label>
                <input type="radio" class="hideRadio" name="category" id="music" value="Music" <?php if ($gameArr['category'] == "Music") {
            echo "checked";
        } ?> /><label for="music" class="btnLabel">Music</label>
                <input type="radio" class="hideRadio" name="category" id="sport" value="Sport"/><label for="sport" class="btnLabel">Sport</label>  
            </p>
            <div class="startGameBtn">
                <input type="submit" name="submit" value="Start Game">
            </div>  
            <div>
                <p><?php echo $errMsg; ?></p>
            </div>
        </form>
    </div>
</body>
</html>
