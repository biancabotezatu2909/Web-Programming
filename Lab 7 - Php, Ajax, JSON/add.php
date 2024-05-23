<?php
session_start();
include('database/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = OpenConnection();
    
    if (isset($_POST['add'])) {
        $stmt = $con->prepare("INSERT INTO cars (model, enginePower, fuel, price, color, age, history) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $_POST['model'], $_POST['enginePower'], $_POST['fuel'], $_POST['price'], $_POST['color'], $_POST['age'], $_POST['history']);
        
        if ($stmt->execute()) {
            echo "Car added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    CloseConnection($con);
}
?>
