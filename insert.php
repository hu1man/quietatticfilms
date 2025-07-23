<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $sql = "INSERT INTO Production (ProductionType, NumDays, ClientID) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $productionType, $numDays, $clientID);
        if ($stmt->execute()) {
            echo "<div class='success' style='color:#388e3c;text-align:center;'>New production created successfully</div>";
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
    <title>Insert Production</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Insert Production</h2>
    <form method="post" action="">
        <label>Production Type:<br><input type="text" name="productionType" required></label>
        <label>Number of Days:<br><input type="number" name="numDays" required></label>
        <label>Client ID:<br><input type="number" name="clientID" required></label>
        <input type="submit" value="Submit">
    </form>
    <div class="navbar" style="text-align:center; margin-top:16px;">
        <a href="index.php">Back to Productions</a>
    </div>
</body>
</html>