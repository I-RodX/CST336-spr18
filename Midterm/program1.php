<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>midterm part 1</title>
        <table width="600" border="1">
        <tbody><tr>
            <th>#</th>
            <th>Task Description</th>
            <th>Points</th>
        </tr>
        <tr style="background-color:#ADD8E6">
            <td>1</td>
            <td>The page includes the basic form elements as in the Program Sample: Text boxes, Dropdown menu, submit button</td>
            <td width="20" align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>2</td>
            <td>When submitting the form, an error message is displayed if the product of columns and rows exceeds 39</td>
            <td width="20" align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>3</td>
            <td>When submitting the form, a table is created with random playing cards</td>
            <td align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>4</td>
            <td>The size of the table corresponds to the one selected by the user </td>
            <td align="center">10</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>5</td>
            <td>The cards are NOT duplicated </td>
            <td align="center">10</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>6</td>
            <td>No cards of the suit selected by the user are displayed in the game </td>
            <td align="center">10</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>7</td>
            <td>The Aces have a yellow background</td>
            <td align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>8</td>
            <td>The Kings have a cyan background</td>
            <td align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>9</td>
            <td>The total number of Aces and Kings are displayed</td>
            <td align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>10</td>
            <td>A message indicates who won, Aces or Kings, (or neither) </td>
            <td align="center">5</td>
        </tr>
        <tr style="background-color:#FFC0C0">
            <td>11</td>
            <td>At least five CSS rules are included</td>
            <td align="center">5</td>
        </tr>
        <tr style="background-color:#ADD8E6">
            <td>12</td>
            <td>This rubric is properly included AND UPDATED (BONUS)</td>
            <td width="20" align="center">2</td>
        </tr>
        <tr>
            <td></td>
            <td>T O T A L </td>
            <td width="20" align="center"><b></b></td>
        </tr>
    </tbody></table>
        <h1>Aces vs Kings</h1>
    </head>
    
    <body>
        <div>
            <form>
                Number of Rows: <input type="text" name="Row"><br><br>
                Number of Columns:<input type="text" name="Col"><br><br>
                Suits to ommit:<select name="Choose">
                            <option value="None">      </option>
                            <option value="diamonds">diamonds</option>
                            <option value="clubs">clubs</option>
                            <option value="hearts">hearts</option>
                            <option value="spades">spades</option>
                        </select>
                <input id="subButtom" type="submit" value="Submit Query" name="submitquery">
            </form>
        </div>
        <?php
            
        ?>
    </body>
</html>