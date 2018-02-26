<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Homework 2: HTML Forms</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <form action="result.php" method="POST">
            <div align ="center">
                <table>
                    <tr>
                        <td> Enter Name:</td>
                        <td><input type="text" name="Name"></td>
                    </tr>
                    <tr>
                        <td>How many bits are in a nibble?:</td> 
                        <td><select name="Choose">
                            <option value="bitsN">      </option>
                            <option value="bits1">1 bits</option>
                            <option value="bits2">2 bits</option>
                            <option value="bits3">4 bits</option>
                            <option value="bits4">8 bits</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>What are considered the three major components of a computer?:</td>
                        <td>
                            Processor<input type="checkbox" name="comp1" value ="true">
                            Monitor<input type="checkbox" name="comp2" value ="false">
                            Keyboard<input type="checkbox" name="comp3" value ="false"><br>
                            Memory<input type="checkbox" name="comp4" value ="true">
                            Printer<input type="checkbox" name="comp5" value ="false">
                            I/O<input type="checkbox" name="comp6" value ="true"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>What is the the decimal conversion for 11010?:</td>
                        <td>
                            26 <input type="radio" name="dec1" value ="true">
                            25 <input type="radio" name="dec1" value ="false">
                            31 <input type="radio" name="dec1" value ="false">
                            48 <input type="radio" name="dec1" value ="false">
                        </td>
                    </tr>
                </table>
            </div><br>
           <div align="center">
                <input id="subButtom" type="submit" value="Submit" name="submit">
           </div>
        </form>
        <?php
            
        ?>
    </body>
</html>