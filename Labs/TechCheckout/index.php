<?php
     session_start();
    $filterText = '';
    if ('POST' === $_SERVER['REQUEST_METHOD']) 
    {
        $filterText = $_POST['filterText'];
        $order = $_POST['sort'];
    }
    include 'inc/DBConnection.php';
    $dbConn = getDataBaseConnection();
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = " SELECT * FROM device";
    
    $sql = $sql . " WHERE status LIKE CONCAT('%', :filterText, '%') ".
                    "OR deviceName LIKE CONCAT('%', :filterText, '%') ".
                    "OR deviceType LIKE CONCAT('%', :filterText, '%')";
                    
    if($order == name)
    {
        $sql = $sql . " ORDER BY deviceName ";
    }
    if($order == price)
    {
        $sql = $sql . " ORDER BY price ";
    }
        
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt->execute(array(':filterText' => $filterText));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tech Checkout</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div class="SortOptions" align="center">
            <form action="index.php" method="POST">
                <input type="text" name="filterText"><br>
                Order by name: <input type="radio" name="sort" value ="name">
                Order by price <input type="radio" name="sort" value ="price"><br><br>
                <input id="subButtom" type="submit" value="Submit" name="submit">
                <input id="resetButtom" type="submit" value="Reset" name="reset"><br><br>
            </form>
        </div>
        <div class="dbData" align="center">
            <table>
                <tr>
                    <td><b>deviceId</b></td>
                    <td><b>deviceName</b></td>
                    <td><b>deviceType</b></td>
                    <td><b>price</b></td>
                    <td><b>status</b></td>
                </tr>
                <?php
                    if ($stmt->rowCount() > 0) {
                      while ($row = $stmt -> fetch())  {
                          echo  "<tr>";
                          echo "<td>".$row['deviceId'].str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['deviceName'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>".$row['deviceType'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>".$row['price'] .str_repeat('&nbsp;', 1)."</td>";
                          echo "<td>". $row['status']."</td>";
                          echo "</tr>";
                      }
                    }
                    else {
                      echo "No data found";
                    }
                    
                    if(isset($_POST['reset'])){
                        session_destroy();
                    }
                ?>
            </table>
        </div>
        
    </body>
</html>