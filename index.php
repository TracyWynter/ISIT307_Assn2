<html>
    <head>
        <title>Take a challenge</title>
        <!-- Styling -->
        <link rel="stylesheet" href="gameMenu.css">
    </head>
    <body>
        <!-- PHP Scripts -->
        <?php
        session_start();
        $gameArr = array(
            'user' => '',
            'category' => ''
        );
        $errMsg = "";
        $checked = TRUE;  // Only if true then will proceed to start game
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            if ($checked) {
                $_SESSION["user"] = $gameArr["user"];
                header("Location:game.php?category=" . $gameArr['category']);
            } else {
                $errMsg = "Please fill in your nickname and select <b>one</b> category to start game";
            }
        }
        ?>
        <div>
            <p id="logo"></p>
        </div>
        <div>
            <p id="challengeTitle">Take a Challenge</p>
            <form class="gameStartForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"/>
            <p><input type="text" name="user" id="user" placeholder="Enter your Nickname" value="<?php echo $gameArr['user']; ?>"></p>
                <?php require 'gameMenu.php'; ?>
        </div>
        <div>
            <p><?php echo $errMsg; ?></p>
        </div>
    </form>

</body>
</html>
