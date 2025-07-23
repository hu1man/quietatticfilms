<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productionID = $_POST['productionID'];

    // Validate ProductionID exists
    $prodCheck = $conn->prepare("SELECT ProductionID FROM Production WHERE ProductionID = ?");
    $prodCheck->bind_param("i", $productionID);
    $prodCheck->execute();
    $prodCheck->store_result();
    if ($prodCheck->num_rows === 0) {
        echo "<div class='error' style='color:#c0392b;text-align:center;'>Error: Production ID does not exist.</div>";
    } else {
        $sql = "DELETE FROM Production WHERE ProductionID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productionID);
        if ($stmt->execute()) {
            echo "<div class='success' style='color:#388e3c;text-align:center;'>Production deleted successfully</div>";
        } else {
            echo "<div class='error' style='color:#c0392b;text-align:center;'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
    $prodCheck->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Production</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Delete Production</h2>
    <form method="post" action="">
        <label>Production ID:<br><input type="number" name="productionID" required></label>
        <input type="submit" value="Delete">
    </form>
    <div class="navbar" style="text-align:center; margin-top:16px;">
        <a href="index.php">Back to Productions</a>
    </div>
</body>
</html>