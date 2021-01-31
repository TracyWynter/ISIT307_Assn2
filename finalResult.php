<html>
    <head>
        <title>Challenge Final Result</title>
        <!-- Styling -->
        <style type="text/css">   
            body{
                font-family: "Comic Sans MS", "Comic Sans", cursive;
                background-repeat: no-repeat;
                background-size:cover;
                background-image: linear-gradient(to bottom right, mediumblue,teal ,indigo ,darkcyan, midnightblue);
                padding:20px;
                height:100%;
            }
            /* Game Logo */
            #logo{
                background-image:url(Images/Logo.png);
                margin-left:auto;
                margin-right: auto;
                background-repeat: no-repeat;
                background-size:contain;
                height:150px;
                width:150px;
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
                padding: 6px 6px;
                background-color:brown;
                color:white;
                border:none;
                border-radius: 3px;
                margin-bottom: 10px;
                outline:none;
            }
            /* Circlular Display of Nickname */
            #username{
                border-radius:15px;
                background-color:darkslategray;
                color:white;
                text-align:center;
                vertical-align:text-top;
                padding:0px 8px 3px 8px;

            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        /* Kill the session when user end the game */
        function exitGame() {
            $_SESSION = array();
            session_destroy();
        }

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            // If the session is empty direct user to the main page
            if (sizeof($_SESSION) == 0) {
                header("Location:index.php");
            }
        }
        ?>
        <!-- Game Logo -->
        <div>
            <p id="logo"></p>
        </div>
        <!-- Final Result Board -->
        <div class="resultBoard">
            <div id="resultTitle">Results</div>
            <?php
            echo "<p><span id='username'><b>" . $_SESSION['user'] . "</b></span> 's Challenge Score Board</p>";
            echo "<p>Overall Score: " . $_SESSION['overall_points'] . "</p>";
            exitGame();
            ?>
            <div>
                <form action = "index.php" method = "post">
                    <input type = "submit" name = "new_game" id="new_challenge" value = "New Challenge">
                </form>
            </div>
        </div>
    </body>
</html>

