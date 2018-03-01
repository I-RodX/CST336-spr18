<?php
$correctAns = 0;
function checkFields(){
    global $correctAns;
    $notEmpty = 1;
    if(empty( $_POST['Name'])){
        $notEmpty=0;
    }
    if(empty( $_POST['Choose'])){
         $notEmpty=0;
         echo "Choose";
    }
    else if($_POST['Choose']=="bits2"){
         $correctAns++;
    }
    
    if(empty( $_POST['comp1'])&&empty( $_POST['comp2'])&&empty( $_POST['comp3'])&&empty( $_POST['comp4'])&&empty( $_POST['comp5'])&&empty( $_POST['comp6'])){
         $notEmpty=0;
    }
    else if(isset($_POST['comp1'])&&isset($_POST['comp4'])&&isset($_POST['comp6'])){
        $correctAns++;
    }
    
    if(empty( $_POST['dec1'])){
         $notEmpty=0;
    }
    else if($_POST['dec1']=="true"){
        $correctAns++;
    }
    
    if($notEmpty==0){
        echo "Missing data! Please make sure you fill in all fields.";
    }
    else{
        printResult();
    }
}

function printResult(){
    global $correctAns;
    echo "Hello ".$_POST['Name']."! You got ".$correctAns." out of 3 right!";
}

?>