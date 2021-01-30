<html>
    <head>
        <title>Game Result</title>
        <link rel="stylesheet" href="gameMenu.css"> <!-- Game Menu CSS import -->
        <style type="text/css">
            body{
                font-family: "Comic Sans MS", "Comic Sans", cursive;  
                padding-bottom:35px;
                background-image: linear-gradient(to bottom right, mediumblue,teal ,indigo ,darkcyan, midnightblue);
            }
            .resultBoard{
                width: 400px;
                height:410px;
                margin-left:auto;
                margin-right:auto;
                border-radius:15px;
                text-align:center;
                background:cadetblue;
                color:white;
                padding-bottom:10px;
            }
            #resultTitle{
                display:block;
                width: 400px;
                margin-top:0;
                margin-left:auto;
                margin-right:auto;
                background-color:darkslategray;
                color:white;
                border-radius:15px;
                font-size:35px;
            }
            #nextRound{
                margin-left:auto;
                margin-right:auto;
                width: 220px;
                padding:5px;
                border-radius:50px;
                background-color:powderblue;
                color:black;
            }
            .err{
                margin-bottom:8px;
                color:red;
                height:20px;
            }
            #exitBtn{
                padding:6px 8px;
                cursor:pointer;
                background:brown;
                color:white;
                border:none;
                border-radius: 4px;
                outline:none;
            }

        </style>
    </head>
    <body>
        <?php
        session_start();
        $gameArr = array(
            'user' => '',
            'category' => ''
        );
        $errMsg = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['exit_game'])) {
                header("Location:finalResult.php"); // Direct to the ending result of the challenge
            }
            if (isset($_POST['start_game']) && !empty($_POST['category'])) {
                $_SESSION["valid_challenge"] = TRUE;  // Set to true to allow user to start a new round of game
                header("Location:game.php?category=" . $_POST['category']);   // A new round of challenge
            } else {
                $errMsg = "Select one category";
            }
        }
        $current_points = $overall_points = 0;
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            if (isset($_SESSION['overall_points']) && isset($_SESSION['current_points'])){
                $_SESSION["valid_challenge"] = FALSE;   // Set to false to prevent going back to game
                $current_points = $_SESSION['current_points'];
                $overall_points = $_SESSION['overall_points'];
            } else{
                header("Location:index.php");   // If the session variable is not set, direct user to main page
            }
        }
        ?>
        <!-- Game Logo -->
        <div>
            <p id="logo"></p>
        </div>
        <!-- Display Result -->
        <div class="resultBoard">
            <div id="resultTitle">Results</div>
            <?php
            echo "<p>Overall Points: " . $overall_points . "</p>";
            echo "<p>Current Points: " . $current_points . "</p>";
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="submit" id="exitBtn" name="exit_game" value="Exit Game">
            </form>
            <div class="err"><?php echo $errMsg; ?></div>
            <div id="nextRound">
                <p>Proceed to next round ... </p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                    <?php require 'gameMenu.php'; ?>
                </form>
            </div>
        </div>
    </body>
</html>
