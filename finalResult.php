<html>
    <head>
        <title>Challenge Final Result</title>
        <style type="text/css">   
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            .resultBoard{
                width: 400px;
                height: 180px;
                margin-left:auto;
                margin-right:auto;
                border-radius:15px;
                text-align:center;
                background:cadetblue;
                color:white;
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
            /* New Challenge Button */
            #new_challenge{
                cursor:pointer;
                padding: 4px 6px;
                background-color:brown;
                color:white;
                border:none;
                border-radius: 3px;
                margin-bottom: 10px;
                outline:none;
                
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        /* Kill the session when user end the game */

        function exitGame() {
            session_unset();
            session_destroy();
        }
        ?>
        <div class="resultBoard">
            <div id="resultTitle">Results</div>
            <?php
            echo "<p><b>" . $_SESSION['user'] . "</b>'s Challenge Score Board</p>";
            echo "<p>Overall Score: " . $_SESSION['overall_points'] . "</p>";
            exitGame();
            ?>
            <div>
                <form action = "index.php" method = "get">
                    <input type = "submit" name = "new_game" id="new_challenge" value = "New Challenge">
                </form>
            </div>
        </div>

    </body>
</html>

