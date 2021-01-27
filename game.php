<html>
    <head>
        <title><?php echo $_GET["category"]; ?> Challenge</title>
        <style type="text/css">
            /* Questions (Each Questions) */
            .quesSection{
                width: 700px;
                margin-left:auto;
                margin-right:auto;
            }
            .quesClass{
                width: 700px;
                padding: 5px 25px;
                margin-bottom:35px;
                border: 1px solid grey;
            }
            /* Options (Need More Research)*/
/*            .hideRadio{
                display:none;
            }
            .optBtnLabel{
                cursor:pointer;
                border-radius: 5px;
                background: lightgrey;
                color: black;
                padding: 1px 5px;
            }*/

        </style>
    </head>
    <body>
        <?php
        session_start();


        // Arrays of Questions
        $moviesQuestions = array(
            1 => array('ques' => 'Who acted as Jack in Titanic?', 'ans' => 'c', 'opt' => array('a' => 'Robert Downey Junior', 'b' => 'Clark Gregg', 'c' => 'Leonardo DiCaprio', 'd' => 'Bruce Willis')),
            2 => array('ques' => 'Where school did Harry Potter go to?', 'ans' => 'a', 'opt' => array('a' => 'Hogwarts', 'b' => 'Beauxbatons', 'c' => 'Durmstrang', 'd' => 'Merlin Academy for Fine Arts')),
            3 => array('ques' => 'What is Darth Vader\'s real name?', 'ans' => 'd', 'opt' => array('a' => 'Obi wan Kenobi', 'b' => 'Liam Neeson', 'c' => 'Ewan McGregor', 'd' => 'Anakin Skywalker')),
            4 => array('ques' => 'What is the name of the captain Jack Sparrow\'s ship?', 'ans' => 'c', 'opt' => array('a' => 'The Bone Heart', 'b' => 'The Serpent', 'c' => 'The Black pearl', 'd' => 'The Flying Dutchman')),
            5 => array('ques' => 'What is the name of the planet which the Transformers are from?', 'ans' => 'a', 'opt' => array('a' => 'Cybertron', 'b' => 'Machine Empire', 'c' => 'Mythrilheim', 'd' => 'Uranus')),
            6 => array('ques' => 'In the Matrix , which pill does the character Neo from the matrix take?', 'ans' => 'b', 'opt' => array('a' => 'The poison pill', 'b' => 'The red pill', 'c' => 'The blue pill', 'd' => 'The sleeping pill')),
            7 => array('ques' => 'In the movie "The Mummy(1999)" , which actress plays as Evie the Librarian?', 'ans' => 'a', 'opt' => array('a' => 'Rachel Weisz', 'b' => 'Gal Gadot', 'c' => 'Jennifer Lawrence', 'd' => 'Natalie Portman')),
            8 => array('ques' => 'Which actor plays as gandalf in Lord of The Rings movie trilogy?', 'ans' => 'b', 'opt' => array('a' => 'Sean Connery', 'b' => 'Ian McKellen', 'c' => 'James Earl Jones', 'd' => 'Micheal Gambon')),
            9 => array('ques' => 'In the action thriller Speed, why is Annie (Sandra Bullock)’s driver’s license suspended?', 'ans' => 'b', 'opt' => array('a' => 'She was crashing', 'b' => 'She was speeding', 'c' => 'She was in a hit and run accident', 'd' => 'She was being a clown')),
            10 => array('ques' => 'Who wrote the screenplay for Rocky?', 'ans' => 'a', 'opt' => array('a' => 'Sylvester Stallone', 'b' => 'Sean Connery', 'c' => 'Michael Gambon', 'd' => 'Dwayne "Rock" Johnson')),
            11 => array('ques' => 'Who are the three actress who acted as the three charlie angels(2000)?', 'ans' => 'a', 'opt' => array('a' => 'Cameron Diaz , Lucy Liu , Drew Barrymore', 'b' => 'Dame Maggie Smith , Dame Judi Dench , Julie Andrews', 'c' => 'Helen Mirren , Joan Collins , Julie Andrews')),
            12 => array('ques' => 'Who is the first woman actress to act as the cat woman and won a oscar prize?', 'ans' => 'a', 'opt' => array('a' => 'Halle Berry', 'b' => 'Brie Larson', 'c' => 'Cate Blanchett', 'd' => 'Jennifer Lawrence')),
            13 => array('ques' => 'Who is the actress who acts in the "Mask of Zorro" as "Elena Montero"?', 'ans' => 'c', 'opt' => array('a' => 'Elena Bonterri', 'b' => 'Cate Blanchett', 'c' => 'Caterine Zeta-Jones', 'd' => 'Judie Dench')),
            14 => array('ques' => 'Which actor plays as Indiana Jones?', 'ans' => 'a', 'opt' => array('a' => 'Harrison Ford', 'b' => 'Tom Cruise', 'c' => 'Tom Hanks', 'd' => 'Justin Beiber')),
            15 => array('ques' => 'Who did a voice over as Maui the demigod  in Moana?', 'ans' => '', 'opt' => array('a' => 'Dwayne "Rock" Johnson', 'b' => 'Bruce Willis', 'c' => 'Johnny Yong Bosch', 'd' => 'Jason David Frank')),
            16 => array('ques' => 'Which president got assasinated  as the president of the United States of America?', 'ans' => 'c', 'opt' => array('a' => 'Donald J. Trump', 'b' => 'Richard Nixon', 'c' => 'John F.Kennedy', 'd' => 'Barrack Obama')),
            17 => array('ques' => 'Which creature has attacked Hermione in Harry Potter and the Sorceror\'s stone?', 'ans' => 'd', 'opt' => array('a' => 'Grindylow', 'b' => 'Hippogriff', 'c' => 'Goblin', 'd' => 'Troll')),
            18 => array('ques' => 'What is the name of the hobbit played by Elijah Wood in the Lord of the Rings movie? ', 'ans' => 'a', 'opt' => array('a' => 'Frodo Baggins', 'b' => 'Samuel Baggins', 'c' => 'Bilbo Baggins', 'd' => 'Merry Brandybuck')),
            19 => array('ques' => 'Who was once the head of the white council in the Lord of the Rings?', 'ans' => 'b', 'opt' => array('a' => 'Gandalf', 'b' => 'Saruman', 'c' => 'Illuvitar', 'd' => 'Radaghast')),
            20 => array('ques' => 'What is the name of the movie that involves in asteroids?', 'ans' => 'a', 'opt' => array('a' => 'Armageddon', 'b' => 'World War Z', 'c' => 'Rocks are falling on my head', 'd' => 'Panic Room'))
        );
        $musicQuestion = array(
            1 => array('ques' => '', 'ans' => '', 'opt' => array('a' => '', 'b' => '', 'c' => '', 'd' => ''))
        );
        $sportQuestions = array(
            1 => array('ques' => '', 'ans' => '', 'opt' => array('a' => '', 'b' => '', 'c' => '', 'd' => ''))
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
            if (sizeof($questions) > 0) {
                $ran_keys = array_rand($questions, 7);  // Randomly pick 7 questions (numbers)
                for ($i = 0; $i < sizeof($ran_keys); $i++) {
                    $questionList[$i + 1] = $questions[$ran_keys[$i]];
                }
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
        // Array to store the user answers
        $userAns = array(
            1 => '',
            2 => '',
            3 => '',
            4 => '',
            5 => '',
            6 => '',
            7 => '',
        );
        // When user finish the challenge
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Load the posted data to the userAns array
            foreach($_POST as $key => $value){
                $userAns[$key] = $value;
            }
            
            // Check the user ans and the correct ans
            
            
            
            $current_point = (3 *($correct_ques_count)) - (2 * ($wrong_ques_count));
            $total_point += $current_point;
            $overall_point = $total_points/ $attempt_count;
            
        }
        
        
        ?>
        <div id="logo"></div>
        <div>
            <?php echo "Nickname: ".$_SESSION["name"]; ?> <!-- Name Testing -->
        </div>
        <!-- Question Section -->
        <div class="quesSection">
            <?php
            if ($checked) {
                echo '<form method="post"  action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">';
                for ($i = 1; $i <= sizeof($questionsArr); $i++) {
                    echo '<div class="quesClass"><p>Q' . ($i) . '. ' . $questionsArr[$i]['ques'] . '</p>';
                    foreach ($questionsArr[$i]['opt'] as $key => $value) {   // key(a,b,c,d)
                        echo '<p><input type="radio" class="hideRadio" id="' . $i . $key . '" name="' . $i . '" value="' . $key . '/>';
                        echo '<label for="' . $i . $key . '" class="optBtnLabel">' . $key . '. ' . $value . '</label></p>';
                    }
                    echo '</div>';
                }
                echo '<div><button type="submit" name="submit">Finish Challenge</button></div>';
                echo '</form>';
            }
            ?>
        </div>

    </body>
</html>


