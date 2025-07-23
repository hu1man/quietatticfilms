<?php
include 'db.php';

$sql = "SELECT * FROM Production";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiet Attic Films - Productions</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Quiet Attic Films Productions</h1>
    <h2>Current Productions</h2>
    <div class="table-container">
    <table>
        <tr>
            <th>Production ID</th>
            <th>Production Type</th>
            <th>Number of Days</th>
            <th>Client ID</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["ProductionID"] . "</td>
                        <td>" . $row["ProductionType"] . "</td>
                        <td>" . $row["NumDays"] . "</td>
                        <td>" . $row["ClientID"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No productions found</td></tr>";
        }
        ?>
    </table>
    </div>
    <br>
    <div class="navbar" style="text-align:center; margin-top:16px;">
        <a href="insert.php">Insert New Production</a> |
        <a href="update.php">Update Existing Production</a> |
        <a href="delete.php">Delete Production</a> |
        <a href="add_client.php">Add New Client</a>
    </div>
</body>
</html>