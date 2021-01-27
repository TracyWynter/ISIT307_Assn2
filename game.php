<html>
    <head>
        <title><?php echo $_GET["category"]; ?> Challenge</title>
        <style type="text/css">
            /* Questions (Each Questions) */
            .quesClass{
                margin-bottom:10px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();


        // Arrays of Questions
        $musicQuestions = array(
            0 => 'Who acted as Jack in Titanic?',
            1 => 'Where school did Harry Potter go to?',
            2 => 'What is Darth Vader\'s real name?',
            3 => 'What is the name of the captain Jack Sparrow\'s ship?',
            4 => 'What is the name of the planet which the Transformers are from?',
            5 => 'In the Matrix , which pill does the character Neo from the matrix take?',
            6 => 'In the movie "The Mummy(1999)" , which actress plays as Evie the Librarian?',
            7 => 'Which actor plays as gandalf in Lord of The Rings movie trilogy?'
        );
        $moviesQuestions = array(
        );
        $sportQuestions = array(
        );

        // Function to load the category questions
        function loadQuestions($category) {
            $questions = [];    // Store all questions from selected category
            $questionList = [];  // Store the 7 selected questions
            switch ($category) {
                case "Movies":
                    global $moviesQuestions;
                    $questions = $moviesQuestions;
                    break;
                case "Music":
                    global $musicQuestions;
                    $questions = $musicQuestions;
                    break;
                case "Sport":
                    global $sportQuestions;
                    $questions = $sportQuestions;
                    break;
            }
            $ran_keys = array_rand($questions, 7);  // Randomly pick 7 questions
            for ($i =0; $i < sizeof($ran_keys); $i++){
                $questionList[$i] = $questions[$ran_keys[$i]];
            }
            return $questionList;
        }

        $category = "";
        $checked = False;
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            /* Load values */
            if (isset($_GET["category"])) {
                $category = $_GET["category"];
                if (!empty($category)) {
                    $questionsArr = loadQuestions($category);
                    if (sizeof($questionsArr) !== 0) {
                        $checked = True;    // If only the category is not blank and not returning empty questions.
                    }
                } else {
                    echo "No category is selected";
                }
            }
        }
        ?>
        <div>
            <?php echo $_SESSION["name"]; ?> <!-- Name Testing -->
        </div>
        <!-- Question Section -->
        <div>
            <?php
            if ($checked) {
                for ($i = 0; $i < sizeof($questionsArr); $i++) {
                    echo '<div class="quesClass">Q'.($i+1).'. '.$questionsArr[$i].'</div>';
                }
            }
            ?>
        </div>

    </body>
</html>


