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
                font-family: Arial, Helvetica, sans-serif;
                width: 700px;
                padding: 5px 25px;
                margin-bottom:35px;
                border: 1px solid grey;
                border-radius:4px;
            }
            /* Options (Need More Research)*/
            /*
            .hideRadio{
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
        $musicQuestions = array(
            1 => array('ques' => 'One Direction is known for being the runners-up in The X Factor in 2010, but who was the champion?', 'ans' => 'c', 'opt' => array('a' => 'Miley Cyrus', 'b' => 'David Archuleta', 'c' => 'Matt Cardle', 'd' => 'Susan Boyle')),
            2 => array('ques' => 'Which singer has the most UK Number One singles ever?', 'ans' => 'a', 'opt' => array('a' => 'Elvis Presley', 'b' => 'Elton John', 'c' => 'Queen', 'd' => 'Shayne Ward')),
            3 => array('ques' => 'What was Britney Spears’ first single called?', 'ans' => 'd', 'opt' => array('a' => 'Opps! I did it again', 'b' => 'Toxic', 'c' => 'Criminal', 'd' => 'Baby One More Time')),
            4 => array('ques' => 'What is  the very first song from the boyband group called Westlife in 1999?', 'ans' => 'a', 'opt' => array('a' => 'Swear It Again', 'b' => 'Fool Again', 'c' => 'Seasons in the Sun', 'd' => 'I Have A Dream')),
            5 => array('ques' => 'What was the name of Madonna’s first studio album, released in 1983?', 'ans' => 'a', 'opt' => array('a' => 'Madonna', 'b' => 'Carabana', 'c' => 'Edge of Glory', 'd' => 'Bad Romance')),
            6 => array('ques' => 'What is the song that has the lyrics "Annie are you ok? are you ok Annie?"', 'ans' => 'c', 'opt' => array('a' => 'Heal the World', 'b' => 'You Are Not Alone', 'c' => 'Smooth Criminal', 'd' => 'Black or White')),
            7 => array('ques' => 'What song did Celine Dion sing that represents the Titanic?', 'ans' => 'b', 'opt' => array('a' => 'I\'m Alive ', 'b' => 'My Heart Will Go On', 'c' => 'Just walk Away', 'd' => 'If You Asked Me To')),
            8 => array('ques' => 'Which famous rapper married reality TV star Kim Kardashian in 2014?', 'ans' => 'd', 'opt' => array('a' => 'Lana Del Rey', 'b' => 'Madonna', 'c' => 'Taylor Swift', 'd' => 'Kanye West')),
            9 => array('ques' => 'Which song did Taylor Swift sing that involves tearsdrops?', 'ans' => 'a', 'opt' => array('a' => 'Teardrops on my Guitar', 'b' => '22', 'c' => 'Love Story', 'd' => 'Bad Blood')),
            10 => array('ques' => 'Which group created the song called “When can I see you again?”', 'ans' => 'b', 'opt' => array('a' => 'Black Eye Peas', 'b' => 'Owl City', 'c' => 'The four seasons', 'd' => 'The Jackson 5')),
            11 => array('ques' => 'Who is a member of the group "Owl City?"', 'ans' => 'c', 'opt' => array('a' => 'Jason Mraz', 'b' => 'Celena Harper', 'c' => 'Adam Young', 'd' => 'Selena Gomez')),
            12 => array('ques' => 'Which song did Jason Mraz created?', 'ans' => 'a', 'opt' => array('a' => 'I\'m Yours', 'b' => 'Sorry', 'c' => 'Love Somebody', 'd' => 'You are Mine')),
            13 => array('ques' => 'Which song did maroon5 sing?', 'ans' => 'b', 'opt' => array('a' => 'ABC', 'b' => 'Love Somebody', 'c' => 'Push It', 'd' => 'We are Family')),
            14 => array('ques' => 'Which year Maroon5 was first formed?', 'ans' => 'd', 'opt' => array('a' => '2003', 'b' => '2002', 'c' => '1998', 'd' => '1994')),
            15 => array('ques' => 'What is the song Lady Gaga is famous for in the movie "A Star Is Born"?', 'ans' => 'b', 'opt' => array('a' => 'Just Dance', 'b' => 'Shallow', 'c' => 'Paparazzi', 'd' => 'Telephone')),
            16 => array('ques' => 'Which song did NSYNC release in 2000?', 'ans' => 'c', 'opt' => array('a' => 'Bad Day', 'b' => 'Beautiful Day', 'c' => 'Bye Bye Bye', 'd' => 'Say My Name')),
            17 => array('ques' => 'What song did Vanessa Carlton sing which became a famous hit song in 2003?', 'ans' => 'd', 'opt' => array('a' => 'Drops of Jupiter', 'b' => 'A Thousand Tears', 'c' => 'Ms Jackson', 'd' => 'A Thousand Miles')),
            18 => array('ques' => 'Which song is a hot hit for Katy Perry in 2012?', 'ans' => 'd', 'opt' => array('a' => 'We are Young', 'b' => 'Roar', 'c' => 'Grenade', 'd' => 'Firework')),
            19 => array('ques' => 'What song is Adele famous for in 2017?', 'ans' => 'a', 'opt' => array('a' => 'Hello', 'b' => 'Don\'t Stop Believing', 'c' => 'Savage', 'd' => 'Truth Hurts')),
            20 => array('ques' => 'What song is Ricky Martin famous for in the movie shrek?', 'ans' => 'b', 'opt' => array('a' => 'Hero', 'b' => 'Livin\' La Vida Loca', 'c' => 'Little Drop of Poison', 'd' => 'Changes')),
        );
        $sportQuestions = array(
            1 => array('ques' => 'What is Usain Bolt’s 100m world record time?', 'ans' => 'd', 'opt' => array('a' => '5 seconds', 'b' => '11 seconds', 'c' => '10.55 seconds', 'd' => '9.58 seconds')),
            2 => array('ques' => 'The LA Lakers and New York Knicks play which sport?', 'ans' => 'd', 'opt' => array('a' => 'Swimming', 'b' => 'Soccer', 'c' => 'Baseball', 'd' => 'Basketball')),
            3 => array('ques' => 'Which sport involves tucks and pikes?', 'ans' => 'c', 'opt' => array('a' => 'Bowling', 'b' => 'Fencing', 'c' => 'Diving', 'd' => 'Swimming')),
            4 => array('ques' => 'Which country did F1 legend Ayrton Senna come from?', 'ans' => 'a', 'opt' => array('a' => 'Brazil', 'b' => 'Canada', 'c' => 'Japan', 'd' => 'Italy')),
            5 => array('ques' => 'A penalty in football is taken how many yards away from the goal?', 'ans' => 'b', 'opt' => array('a' => '10 Yards', 'b' => '12 Yards', 'c' => '15 Yards', 'd' => '20 Yards')),
            6 => array('ques' => 'Who are the owners of Liverpool FC?', 'ans' => 'b', 'opt' => array('a' => 'Shenton Way Council', 'b' => 'Fenway Sports Group', 'c' => 'Brazil Sports Group', 'd' => 'Canada International Sports')),
            7 => array('ques' => 'Where were the Olympics held in 1980?', 'ans' => 'a', 'opt' => array('a' => 'Russia', 'b' => 'Ukraine', 'c' => 'Siberia', 'd' => 'Artic')),
            8 => array('ques' => 'Which England footballer was famously never given a yellow card?', 'ans' => 'd', 'opt' => array('a' => 'Tyrone Mings', 'b' => 'Kieran Trippier', 'c' => 'Harry Winks', 'd' => 'Gary Lineker')),
            9 => array('ques' => 'In which sport do you wear a plastron?', 'ans' => 'c', 'opt' => array('a' => 'Darts', 'b' => 'Basketball', 'c' => 'Fencing', 'd' => 'Football')),
            10 => array('ques' => 'Which snooker player is nicknamed The Rocket?', 'ans' => 'c', 'opt' => array('a' => 'Donald J. Trump', 'b' => 'Rosie O\'Donald', 'c' => 'Ronnie O\'Sullivan', 'd' => 'Rocket Raccoon')),
            11 => array('ques' => 'How many clubs did David Beckham play for during his career?', 'ans' => 'b', 'opt' => array('a' => '5', 'b' => '6', 'c' => '7', 'd' => '10')),
            12 => array('ques' => 'What colour medal did diver Tom Daley win at London 2012?', 'ans' => 'c', 'opt' => array('a' => 'Gold', 'b' => 'Silver', 'c' => 'Bronze')),
            13 => array('ques' => 'Who is the current manager of Crystal Palace?', 'ans' => 'a', 'opt' => array('a' => 'Roy Hodgson', 'b' => 'Diego Simeone', 'c' => 'Antonio  Conte', 'd' => 'Louis Van Gaal')),
            14 => array('ques' => 'In which sport do competitors refer to ‘catching a crab’?', 'ans' => 'a', 'opt' => array('a' => 'Rowing', 'b' => 'Fencing', 'c' => 'Floorball', 'd' => 'Netball')),
            15 => array('ques' => 'At which Olympics did Dame Kelly Holmes win two gold medals?', 'ans' => 'd', 'opt' => array('a' => '2000', 'b' => '2008', 'c' => '2013', 'd' => '2004')),
            16 => array('ques' => 'What does the term ‘albatross’ in golf means?', 'ans' => 'c', 'opt' => array('a' => 'Two under par', 'b' => 'Five under par', 'c' => 'Three under par', 'd' => 'Extra turn')),
            17 => array('ques' => 'Wayne Rooney scored his Premier League first goal against which team?', 'ans' => 'a', 'opt' => array('a' => 'Arsenal', 'b' => 'Manchester united F.C', 'c' => 'Liverpool F.C', 'd' => 'Chelsea')),
            18 => array('ques' => 'Name the only two positions who can score in netball.', 'ans' => 'a', 'opt' => array('a' => 'Goal Shooter and Goal Attack', 'b' => 'Wing Attack and Wing Defence', 'c' => 'Goal Defence and Goal Keeper', 'd' => 'Centre and Goal Shooter')),
            19 => array('ques' => 'In bowling, what is the term given for three consecutive strikes?', 'ans' => 'b', 'opt' => array('a' => 'A Chicken', 'b' => 'A Turkey', 'c' => 'A Split', 'd' => 'A Strike')),
            20 => array('ques' => 'Who has won more Grand Slams, Roger Federer or Serena Williams?', 'ans' => 'b', 'opt' => array('a' => 'Roger Federer', 'b' => 'Serena Williams')),
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
                    $_SESSION['questionsArr']= loadQuestions($category);
                    if (sizeof($_SESSION['questionsArr']) !== 0) {
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
        $current_point = $correct_ques_count = $wrong_ques_count  =  0;
        
        // When user finish the challenge
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['attempt_count'] += 1;   // Increase the attempt
            
            // Load the posted data to the userAns array
            foreach ($_POST as $key => $value) {
                if ($key != 'submit'){
                    $userAns[$key] = htmlspecialchars($value);
                }
            }
            // Check the user ans and the correct ans (userAns vs questionsArr)
            foreach ($userAns as $key => $value){
                if($value == $_SESSION['questionsArr'][$key]['ans']){
                    $correct_ques_count++;
                } else {
                    $wrong_ques_count++;
                }
            }

            // Point calculations
            $_SESSION['current_points'] = (3 * ($correct_ques_count)) - (2 * ($wrong_ques_count));
            $_SESSION['total_points'] += (int) $_SESSION['current_points'];
            $_SESSION['overall_points']= (int) ($_SESSION['total_points'] / $_SESSION['attempt_count']);
            unset($_SESSION['questionsArr']);
            header("Location:gameResult.php");
            
        }
        ?>
        <div id="logo"></div>
        <div>
        <?php echo "Nickname: " . $_SESSION["name"]; ?> <!-- Name Testing -->
        </div>
        <!-- Question Section -->
        <div class="quesSection">
            <?php
            if ($checked) {
                echo '<form method="post"  action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                for ($i = 1; $i <= sizeof($_SESSION['questionsArr']); $i++) {
                    echo '<div class="quesClass"><p>Q' . ($i) . '. ' . $_SESSION['questionsArr'][$i]['ques'] . '</p>';
                    foreach ($_SESSION['questionsArr'][$i]['opt'] as $key => $value) {   // key(a,b,c,d)
                        echo '<p><input type="radio" class="hideRadio" id="' . $i . $key . '" name="' . $i . '" value="' . $key . '">';
                        echo '<label for="' . $i . $key . '" class="optBtnLabel">' . $key . '. ' . $value . '</label></p>';
                    }
                    echo '</div>';
                }
                echo '<div><input type="submit" name="submit"value="Finish Challenge"></div>';
                echo '</form>';
            }
            ?>
        </div>

    </body>
</html>


