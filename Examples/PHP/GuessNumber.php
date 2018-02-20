<?php
   
     session_start();
     
     
     $x = rand(1,10);
     $y = rand(1,10);

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         $firstNumber=$_POST["firstNumber"];
         $secondNumber=$_POST["secondNumber"];
    }
   
   
   function GuessNumber(){
    global $x, $y, $firstNumber, $secondNumber;
    static $guesses = 0;
    
    if($firstNumber==$x){
        echo "You guessed right!";
    } else if ($firstNumber < $x) {
        echo "Your guess is too low";
    } else {
        echo "your guess is too high";
    }
    
    if($secondNumber==$y){
        echo "You guessed right!";
    } else if ($secondNumber < $y) {
        echo "Your guess is too low";
    } else {
        echo "your guess is too high";
    }
    $guesses = $guesses + 1;
    echo "This is the number of guesses: " . $guesses;
   }
   
   function GiveUp(){
       global $x, $y;
       echo "The first number is ". $x . " and the second number is " . $y ;
   }
   
   function resetButton(){
       session_destroy();
   }
    
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Guess Number</title>
    </head>
    <body>
        <h1>Guess the Numbers</h1>
        <h3>Guess two numbers between numbers 1 and 10!</h3>
        
        <form action="GuessNumber.php" method="POST">
        First Number:  <input type="text" name="firstNumber"><br>
        Second Number: <input type="text" name="secondNumber"><br><br>
        <input type="submit" value="Guess Numbers" name="guessNumber"><br><br>
        <input type="submit" value="Give up" name="giveUp">
        <input type="submit" value="Reset" name="reset">
        </form>
        <?php
            if (isset($_POST['guessNumber'])){
                GuessNumber();
            }
            else if (isset($_POST['giveUp'])){
                giveUp();
            }
            else if (isset($_POST['reset'])){
                resetButton();
            }

        ?>
    </body>
</html>