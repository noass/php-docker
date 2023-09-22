<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        tr:nth-child(even){
            background-color: #b0b0b0;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>product_id</th>
            <th>name</th>
            <th>quantity_in_stock</th>
            <th>unit_price</th>
        </tr>
        
<?php

$connect = mysqli_connect(
    'db',
    'lamp_demo',
    'password',
    'lamp_demo'
);

$sql4 = "SELECT * FROM products";
$result4 = $connect->query($sql4);

      if (mysqli_num_rows($result4) > 0) {
            while ($row = mysqli_fetch_assoc($result4)) {
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["quantity_in_stock"] . "</td>";
                echo "<td>" . $row["unit_price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

?>

</body>
</html>