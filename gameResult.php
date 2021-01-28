<html>
    <head>
        <title>Game Result</title>
        <style type="text/css">
            .resultBoard{
                width: 400px;
                height: 150px;
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
                font-family: Arial, Helvetica, sans-serif;
                font-size:35px;
            }
            #btns{
                margin-left:auto;
                margin-right:auto;
                width: 400px;
                padding:10px;
            }
            #exitBtn{
                padding:4px 6px;
                cursor:pointer;
                background:brown;
                color:white;
                border:none;
                border-radius: 2px;
            }

        </style>
    </head>
    <body>
        <?php
        session_start();

        function exitGame() {
            session_unset();
            session_destroy();
            header("Location:index.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            if (isset($_POST['exit_game'])){
                exitGame();
            }
        }
        ?>
        <div class="resultBoard">
            <div id="resultTitle">Results</div>
            <?php
            echo "<p>Overall Points: " . $_SESSION['overall_points'] . "</p>";
            echo "<p>Current Points: " . $_SESSION['current_points']."</p>";
            ?>
        </div>
        <div id="btns">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <input type="submit" id="exitBtn" name="exit_game" value="Exit Game">
            </form>
        </div>
    </body>
</html>
