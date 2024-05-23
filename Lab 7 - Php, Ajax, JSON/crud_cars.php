<?php
include ('database/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $con = OpenConnection();
    if(isset($_POST['add'])){
        $id = $_POST['id'];
        $model = $_POST['model'];
        $enginePower = $_POST['enginePower'];
        $fuel = $_POST['fuel'];
        $price = $_POST['price'];
        $color = $_POST['color'];
        $age = $_POST['age'];
        $history = $_POST['history'];
        $query = "INSERT INTO cars VALUES('$id', '$model', '$enginePower', '$fuel', '$price', '$color', '$age', '$history')";
        $con->query($query);
    }
    else if(isset($_POST['update'])){
        $id = $_POST['id'];
        $model = $_POST['model'];
        $enginePower = $_POST['enginePower'];
        $fuel = $_POST['fuel'];
        $price = $_POST['price'];
        $color = $_POST['color'];
        $age = $_POST['age'];
        $history = $_POST['history'];
        $query = "UPDATE cars SET model='$model', enginePower='$enginePower', fuel='$fuel', price='$price', color='$color', age='$age', history='$history' WHERE id='$id'";
        $con->query($query);
    }

    CloseConnection($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars Processing</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
<button class="home" type="button" onclick="location.href='./index.html'">HOME</button>
<br>

<section class="add_form">
    <form action="crud_cars.php" method="post">
        <input id="id" type="text" name="id" placeholder="ID">
        <input id="model" type="text" name="model" placeholder="Model">
        <input id="enginePower" type="text" name="enginePower" placeholder="Engine Power">
        <input id="fuel" type="text" name="fuel" placeholder="Fuel">
        <input id="price" type="text" name="price" placeholder="Price">
        <input id="color" type="text" name="color" placeholder="Color">
        <input id="age" type="text" name="age" placeholder="Age">
        <input id="history" type="text" name="history" placeholder="History">
        <input id="add" type="submit" name="add" value="Add new car">
    </form>
</section>

<section class="update_form">
    <form action="crud_cars.php" method="post">
        <input id="id" type="text" name="id" placeholder="ID">
        <input id="model" type="text" name="model" placeholder="Model">
        <input id="enginePower" type="text" name="enginePower" placeholder="Engine Power">
        <input id="fuel" type="text" name="fuel" placeholder="Fuel">
        <input id="price" type="text" name="price" placeholder="Price">
        <input id="color" type="text" name="color" placeholder="Color">
        <input id="age" type="text" name="age" placeholder="Age">
        <input id="history" type="text" name="history" placeholder="History">
        <input id="update" type="submit" name="update" value="Update car">
    </form>
</section>

<section class="display">
    <br>
    <table class="display-table">
        <thead>
            <th>ID</th>
            <th>Model</th>
            <th>Engine Power</th>
            <th>Fuel</th>
            <th>Price</th>
            <th>Color</th>
            <th>Age</th>
            <th>History</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php
            $con = OpenConnection();
            $result_set = mysqli_query($con, "SELECT * FROM cars");
            
            while($row = mysqli_fetch_array($result_set)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['enginePower'] . "</td>";
                echo "<td>" . $row['fuel'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['color'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['history'] . "</td>";
                echo "<td> 
                          <button class='btnUpdate' type='button'>Update</button>
                          <button class='btnDelete' type='button'>Delete</button>
                      </td>
                      </tr>";
            }
            CloseConnection($con);
