<html>
    <head>
        <title>Take a challenge</title>
        <!-- Styling (Include time to force reload of CSS) -->
        <link rel="stylesheet" href="gameMenu.css?<?php echo time();?>"/> 
    </head>
    <body>
        <!-- PHP Scripts -->
        <?php
        /* Remove any older session if present */
        session_start();
        $_SESSION = array();
        session_destroy();

        /* Start new session */
        session_start();
        $gameArr = array(
            'user' => '',
            'category' => ''
        );
        $errMsg = "";
        $checked = TRUE;  // Only if true then will proceed to start game
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Do not do check when first get redirected from the exit page 
            if (!isset($_POST['new_game'])) { // Prevent printing err msg
                if (!empty($_POST["user"])) {
                    $gameArr['user'] = $_POST["user"];
                } else {
                    $checked = False;
                }
                if (!empty($_POST["category"])) {
                    $gameArr['category'] = $_POST["category"];
                } else {
                    $checked = False;
                }
                // Start Game Only when the user filled in required fields
                if ($checked) {
                    $_SESSION["user"] = $gameArr["user"];
                    $_SESSION["valid_challenge"] = TRUE; // Set to true to allow user to start game
                    header("Location:game.php?category=" . $gameArr['category']);
                } else {
                    $errMsg = "Please fill in your nickname and select <b>one</b> category to start game";
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $gameArr = array(
                'user' => '',
                'category' => ''
            );
        }
        ?>
        <!-- Game Logo -->
        <div>
            <p id="logo"></p>
        </div>
        <!-- Game Start Menu Prompt -->
        <div>
            <p id="challengeTitle">Take a Challenge</p>
            <form class="gameStartForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"/>
            <p><input type="text" name="user" id="user" placeholder="Enter your Nickname" value="<?php echo $gameArr['user']; ?>"></p>
            <?php require 'gameMenu.php'; ?>
        </div>
        <div class="errMsg">
            <p><?php echo $errMsg; ?></p>
        </div>
    </form>

</body>
</html>
