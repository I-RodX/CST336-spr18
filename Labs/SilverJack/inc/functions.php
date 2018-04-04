<?php
   
    $deck = array();
    $Player1 = array();
    $Player2 = array();
    $Player3 = array();
    $Player4 = array();
   
    function shuffleDeck(){
        global $deck;
        shuffle($deck);
    }
    
    function drawCard(){
        global $deck;
        $card = array_shift($deck);
        echo "<img src='".$card["cardIMG"]."'/>";
        //return $card;
    }
    
    function setup(){
        global $deck;
        $suits=array("daimonds","clubs","hearts", "spades");
        $cardValues=array("1","2","3","4","5","6","7","8","9","10","11","12","13");
        $cardIMG = array();
      
         
        foreach($suits as $suit){
            foreach($cardValues as $cardValue){
                $cardIMG[] = "./cards/".$suit."/".$cardValue.".png";
                $deck[] = array("cardValue"=>$cardValue,"suit"=>$suit,"cardIMG"=>$cardIMG);
            }
        }
        
        shuffleDeck();
    }
    
?>