<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productionID = $_POST['productionID'];
    $productionType = $_POST['productionType'];
    $numDays = $_POST['numDays'];
    $clientID = $_POST['clientID'];

    // Validate ClientID exists
    $clientCheck = $conn->prepare("SELECT ClientID FROM client WHERE ClientID = ?");
    $clientCheck->bind_param("i", $clientID);
    $clientCheck->execute();
    $clientCheck->store_result();
    if ($clientCheck->num_rows === 0) {
        echo "<div class='error' style='color:#c0392b;text-align:center;'>Error: Client ID does not exist.</div>";
    } else {
        $sql = "UPDATE Production SET ProductionType=?, NumDays=?, ClientID=? WHERE ProductionID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siii", $productionType, $numDays, $clientID, $productionID);
        if ($stmt->execute()) {
            echo "<div class='success' style='color:#388e3c;text-align:center;'>Production updated successfully</div>";
        } else {
            echo "<div class='error' style='color:#c0392b;text-align:center;'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
    $clientCheck->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Production</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Update Production</h2>
    <form method="post" action="">
        <label>Production ID:<br><input type="number" name="productionID" required></label>
        <label>Production Type:<br><input type="text" name="productionType" required></label>
        <label>Number of Days:<br><input type="number" name="numDays" required></label>
        <label>Client ID:<br><input type="number" name="clientID" required></label>
        <input type="submit" value="Update">
    </form>
    <div class="navbar" style="text-align:center; margin-top:16px;">
        <a href="index.php">Back to Productions</a>
    </div>
</body>
</html>