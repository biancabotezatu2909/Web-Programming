<?php
include ('database/connection.php');
?>

<!DOCmodel html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars Browser</title>
    <script model="text/javascript" src="browse.js"></script>
    <link rel="stylesheet" model="text/css" href="style.css">
</head>
<body>

<button class="home" model="button" onclick="location.href='./index.html'">HOME </button>

<div id="previous-filter"></div>

    <div id="main">
        <h1>Cars</h1>
        <div style="float: left;">
            <select id="select-model" name="Select Filter" onchange="get_filtered_by_model()">
                <?php
                    $con = OpenConnection();
                    $sql = "SELECT DISTINCT model FROM cars";
                    $result_set = $con->query($sql);

                    if(mysqli_num_rows($result_set) > 0){
                        while($row = mysqli_fetch_array($result_set)){
                            $model = $row['model'];
                            echo '<option>' . $model . '</option>';
                        }
                    }
                    CloseConnection($con);
                ?>
            </select>
        </div>

        <div style="float: right;">
            <select id="select-format" name="Select Filter" onchange="get_filtered_by_format()">
                    <?php
                        $con = OpenConnection();
                        $sql = "SELECT DISTINCT format FROM cars";
                        $result_set = $con->query($sql);

                        if(mysqli_num_rows($result_set) > 0){
                            while($row = mysqli_fetch_array($result_set)){
                                $format = $row['format'];
                                echo '<option>' . $format . '</option>';
                            }
                        }
                        CloseConnection($con);
                    ?>
            </select>
        </div>

        <br /><br />

        <table id="browse-table" class="browse-table">
            <thead>
                <th>ID</th>
                <th>Model</th>
                <th>Engine Power</th>
                <th>Fuel</th>
                <th>Price</th>
                <th>Color</th>
                <th>Age</th>
                <th>History</th>
            </thead>
            <tbody id="browse-tbody">
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
                        echo "</tr>";
                    }
                    CloseConnection($con);
                ?>
            </tbody>
        </table>

        <label></label>

    </div>

</body>
</html>
