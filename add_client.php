<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = isset($_POST['clientName']) ? $_POST['clientName'] : '';
    $contactInfo = isset($_POST['contactInfo']) ? $_POST['contactInfo'] : '';

    if ($clientName !== '' && $contactInfo !== '') {
        $sql = "INSERT INTO client (Name, ContactInfo) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $clientName, $contactInfo);
        if ($stmt->execute()) {
            echo "<div class='success' style='color:#388e3c;text-align:center;'>New client added successfully</div>";
        } else {
            echo "<div class='error' style='color:#c0392b;text-align:center;'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='error' style='color:#c0392b;text-align:center;'>Please fill in all fields.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Client</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Add New Client</h2>
    <form method="post" action="">
        <label>Client Name:<br><input type="text" name="clientName" required></label>
        <label>Contact Info:<br><input type="text" name="contactInfo" required></label>
        <input type="submit" value="Add Client">
    </form>
    <div class="navbar" style="text-align:center; margin-top:16px;">
        <a href="index.php">Back to Productions</a>
    </div>
</body>
</html>
