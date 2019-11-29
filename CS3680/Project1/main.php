<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Project 1</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
    <div class = 'centerTxt' id = 'title'>
        <h1>MY QUIZ</h1>
    </div>

    <?php
        function loadTxtFile($link)
        {
            $filename = $link;
            $file = fopen ($filename, "r") or exit("Unable to open data file.");
            $output = array();
            if($file) {
                for($i = 0 ; ($line = fgets($file)) !== false ; $i++) {
                    $output[$i] = $line;
                }
            }
            return $output;
        }
        $quiz = loadTxtFile('./questions.txt');
        $numOfQues = sizeof($quiz)/5;

        function clean_input($data)
        {
            return (htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES));
        }

        $posted = false;
        if($_SERVER['REQUEST_METHOD'] == "POST" ) {
            
            $fName = clean_input($_POST['fName']);
            $lName = clean_input($_POST['lName']);
            $answers = ($_POST['answer']);
            
            foreach($answers as $arr) {
                clean_input($arr[0]);
            }

            ///echo sizeof($unfiltered_answers);
            /*
            var_dump($unfiltered_answers);
            echo sizeof($unfiltered_answers)."<br>";
            echo "<br>";
            */
            //var_dump($answers);
            /*
            echo sizeof($answers)."<br>";
            */
            
            $err = '';
            $nameErr = false;
            $questionErr = [];
            $correctAnswer = [];
            for($i = 0; $i < $numOfQues ; $i++) {
                $questionErr[$i] = false;
            }

            if(!isset($fName) || empty($fName)) {
                $err.="Please enter your first name<br>";
                $nameErr = true;
            }

            if(!isset($lName) || empty($lName)) {
                $err.="Please enter your last name<br>";
                $nameErr = true;
            }
            

            if(sizeof($answers) < $numOfQues) {
                $err.="Please answer all questions <br>";
                for($i = 0; $i < $numOfQues ; $i++) {
                    if(!isset($answers[$i][0]) || empty($answers[$i][0])) {
                        $questionErr[$i] = true;
                        $correctAnswer[$i] = false;
                    }
                }
            }

            $posted = true;

            //check that all questions have been answered
            //for($i )
        }
        if($posted && $err == '') { 
            //process quiz
            $key = loadTxtFile('./answerkey.txt');
            $score = 0;
            for($i = 0; $i < sizeof($key) ; $i++) {
                clean_input($key[$i]);
                
                if($answers[$i][0] == $key[$i][0]) {
                    $score++;
                    $correctAnswer[$i] = true;
                } else {
                    $correctAnswer[$i] = false;
                }
            }
        }
        
    ?>
    <div class = 'centerTxt' id = 'signIn'>
        <h3>Please input your first and last name below</h3>
        <form id = 'quizForm' action ='main.php' method = 'POST'>
            <?php if($nameErr) { ?>
            <span class = 'err'>*</span>
            <?php } ?>
            First Name: <input type = 'text' name = 'fName' value = '<?php if(!empty($fName)) echo $fName?>'>
            <br><br>
            Last Name: <input type = 'text' name = 'lName' value = '<?php if(!empty($lName)) echo $lName?>'>
            <br><br>
            <?php 
              for($i = 0, $j = 0; $i < sizeof($quiz) ; $i+=5) {
            ?>

            <div>
               
                <h3 <?php if ($correctAnswer[$j] && $err == '') { ?>
                    style = "background-color: green"
                <?php } elseif ($posted && !$correctAnswer[$j] && $err == '') { ?>
                    style = "background-color: red"
                <?php } ?> >
                <?php if($questionErr[$j]) { ?>
                <span class = 'err'>*</span>
                <?php }?>
                <?php echo $quiz[$i] ?>
                </h3>
                    <input type='radio' name = 'answer[<?php echo $j ?>][]' value = 'A' <?php if(!empty($answers[$j][0]) && $answers[$j][0] == 'A') echo "checked";?> > <?php echo $quiz[$i+1] ?> <br>
                    <input type='radio' name = 'answer[<?php echo $j ?>][]' value = 'B' <?php if(!empty($answers[$j][0]) && $answers[$j][0] == 'B') echo "checked";?> > <?php echo $quiz[$i+2] ?> <br>
                    <input type='radio' name = 'answer[<?php echo $j ?>][]' value = 'C' <?php if(!empty($answers[$j][0]) && $answers[$j][0] == 'C') echo "checked";?> > <?php echo $quiz[$i+3] ?> <br>
                    <input type='radio' name = 'answer[<?php echo $j ?>][]' value = 'D' <?php if(!empty($answers[$j][0]) && $answers[$j][0] == 'D') echo "checked";?> > <?php echo $quiz[$i+4] ?> <br>
            </div>
            <?php $j++; } ?>
            <br>
            <?php if($err != '') { ?>
            <span class = 'err'><?php echo $err?> </span>
            <?php } ?>
            <br>
            <input id = 'sBtn' type = 'submit' value = 'SUBMIT'>
            <?php if ($posted && $err == '') { ?>

            <h2>SCORE: <?php echo "$score / $numOfQues<br>Thank you $fName $lName for taking this Quiz" ?></h2>
            <?php } ?>
        </form>
        <?php
        
        ?>
    </div>
    
</body>
</html>