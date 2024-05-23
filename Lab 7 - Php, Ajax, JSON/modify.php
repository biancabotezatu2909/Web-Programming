<?php
use FTP\Connection;
include ('database/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con = OpenConnection();
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $color = $_POST['color'];
        
        $stmt = $con->prepare("UPDATE car SET make=?, model=?, year=?, color=? WHERE id=?");
        $stmt->bind_param("ssisi", $make, $model, $year, $color, $id);
        $stmt->execute();
    }
    CloseConnection($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars Processing </title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
<button class="home" type="button" onclick="location.href='./index.html'">HOME </button>
<br>

<section class="update_form">
    <form action="modify_cars.php" method="post">
        <input id="id" type="text" name="id" placeholder="id">
        <input id="make" type="text" name="make" placeholder="make">
        <input id="model" type="text" name="model" placeholder="model">
        <input id="year" type="text" name="year" placeholder="year">
        <input id="color" type="text" name="color" placeholder="color">
        <input id="update" type="submit" name="update" value="Update car">
    </form>
</section>

<section class="display_modify">
    <br>
    <table class="display-table">
        <thead>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Color</th>
            <th> </th>
        </thead>
        <tbody>

            <?php
            $con = OpenConnection();
            $result_set = mysqli_query($con, "SELECT * FROM car");
            
            while($row = mysqli_fetch_array($result_set)){
                echo "<tr>";
                echo  "<td>" . $row['id'] . "</td>";
                echo  "<td>" . $row['make'] . "</td>";
                echo  "<td>" . $row['model'] . "</td>";
                echo  "<td>" . $row['year'] . "</td>";
                echo  "<td>" . $row['color'] . "</td>";
                echo  "<td> 
                            <button class='btnUpdate' type='button'>Update</button>
                      </td>
                      </tr>";
            }
            CloseConnection($con);
            ?>

        </tbody>
    </table>
</section>

</body>
</html>
