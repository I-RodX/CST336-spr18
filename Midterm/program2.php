<?php
    include 'inc/functions.php';
    $dbConn = getDataBaseConnection();
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>midterm part 2</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
        <table width="600" border="1">
            <tbody><tr>
                <th>#</th>
                <th>Task Description</th>
                <th>Points</th>
            </tr>
            <tr style="background-color:#ADD8E6">
                <td>1</td>
                <td>A report shows all female students ordered by last name, from A to Z</td>
                <td width="20" align="center">10</td>
            </tr>
            <tr style="background-color:#ADD8E6">
                <td>2</td>
                <td>A report shows students that have assignments with a grade lower than 50, ordered by grade, in ascending order</td>
                <td width="20" align="center">15</td>
            </tr>
            <tr style="background-color:#ADD8E6">
                <td>3</td>
                <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
                <td width="20" align="center">15</td>
            </tr>
            <tr style="background-color:#ADD8E6">
                <td>4</td>
                <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
                <td align="center">15</td>
            </tr>
            <tr style="background-color:#ADD8E6">
                <td>5</td>
                <td>A report lists each student along with his/her average grade, ordered by average grade, from highest to lowest</td>
                <td width="20" align="center">15</td>
            </tr>
            <tr style="background-color:#ADD8E6">
                <td>6</td>
                <td>This rubric is properly included AND UPDATED (BONUS)</td>
                <td width="20" align="center">2</td>
            </tr>
            <tr>
                <td></td>
                <td>T O T A L </td>
                <td width="20" align="center"><b></b></td>
            </tr>
        </tbody></table>
                            
    <body>
        <div align="center">
            <p>a. List of all female students </p> 
            <table>
                <tr>
                    <td><b>firstName</b></td>
                    <td><b>lastName</b></td>
                </tr>
                <?php
                    $sql = " SELECT firstName,lastName ".
                            "FROM `m_students` ".
                            "WHERE gender = :gender ".
                            "ORDER BY lastName ASC ";
                     $stmt = $dbConn -> prepare ($sql);
                     $stmt -> execute ( array(':gender'=>'F') );
                     if ($stmt->rowCount() > 0) {
                      while ($row = $stmt -> fetch())  {
                          echo "<tr>";
                          echo "<td>".$row['firstName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['lastName']."</td>";
                          echo "</tr>";
                      }
                    }
                    else {
                      echo "No data found";
                    }
                ?>
            </table>
        </div><br/>
        
        <div align="center">
            <p>b. List of students that have assignments with a grade lower than 50 </p> 
            <table>
                <tr>
                    <td><b>firstName</b></td>
                    <td><b>lastName</b></td>
                    <td><b>grade</b></td>
                </tr>
                <?php
                    $sql = " SELECT firstName,lastName,grade ".
                            "FROM `m_students` ".
                            "NATURAL LEFT OUTER JOIN `m_gradebook` ".
                            "WHERE grade < 50 ".
                            "ORDER BY lastName ASC ";
                     $stmt = $dbConn -> prepare ($sql);
                     $stmt -> execute ();
                     if ($stmt->rowCount() > 0) {
                      while ($row = $stmt -> fetch())  {
                          echo "<tr>";
                          echo "<td>".$row['firstName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>".$row['lastName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['grade']."</td>";
                          echo "</tr>";
                      }
                    }
                    else {
                      echo "No data found";
                    }
                ?>
            </table>
        </div><br/>
        
        <div align="center">
            <p>c. List of assignments that have not been graded </p> 
            <table>
                <tr>
                    <td><b>title</b></td>
                    <td><b>dueDate</b></td>
                </tr>
                <?php
                    $sql = " SELECT title,dueDate ".
                            "FROM `m_gradebook` ".
                            "NATURAL RIGHT OUTER JOIN `m_assignments` ".
                            "WHERE grade IS NULL ".
                            "ORDER BY dueDate ASC ";
                     $stmt = $dbConn -> prepare ($sql);
                     $stmt -> execute ();
                     if ($stmt->rowCount() > 0) {
                      while ($row = $stmt -> fetch())  {
                          echo "<tr>";
                          echo "<td>".$row['title'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['dueDate']."</td>";
                          echo "</tr>";
                      }
                    }
                    else {
                      echo "No data found";
                    }
                ?>
            </table>
        </div><br/>
        
        <div align="center">
            <p>d. Gradebook </p> 
            <table>
                <tr>
                    <td><b>firstName</b></td>
                    <td><b>lastName</b></td>
                    <td><b>title</b></td>
                    <td><b>grade</b></td>
                </tr>
                <?php
                    $sql = " SELECT firstName, lastName, title, grade ".
                            "FROM `m_students` ".
                            "NATURAL LEFT OUTER JOIN `m_gradebook` ".
                            "NATURAL RIGHT OUTER JOIN `m_assignments` ".
                            "WHERE grade IS NOT NULL ".
                            "ORDER BY lastName, title ";
                     $stmt = $dbConn -> prepare ($sql);
                     $stmt -> execute ();
                     if ($stmt->rowCount() > 0) {
                      while ($row = $stmt -> fetch())  {
                          echo "<tr>";
                          echo "<td>".$row['firstName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['lastName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>".$row['title'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['grade']."</td>";
                          echo "</tr>";
                      }
                    }
                    else {
                      echo "No data found";
                    }
                ?>
            </table>
        </div><br/>
        
        <div align="center">
            <p>e. List of average grade per student (average of the three assignments) </p> 
            <table>
                <tr>
                    <td><b>firstName</b></td>
                    <td><b>lastName</b></td>
                    <td><b>avg_grade</b></td>
                </tr>
                <?php
                    $sql = " SELECT DISTINCT firstName, lastName, avg( grade ) AS avg_grade ".
                            "FROM `m_students` ".
                            "NATURAL LEFT OUTER JOIN `m_gradebook` ".
                            "GROUP BY lastName ".
                            "ORDER BY avg_grade DESC ";
                     $stmt = $dbConn -> prepare ($sql);
                     $stmt -> execute ();
                     if ($stmt->rowCount() > 0) {
                      while ($row = $stmt -> fetch())  {
                          echo "<tr>";
                          echo "<td>".$row['firstName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>".$row['lastName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['avg_grade']."</td>";
                          echo "</tr>";
                      }
                    }
                    else {
                      echo "No data found";
                    }
                ?>
            </table>
        </div><br/>
         
    </body>
</html>