<?php
// Establish a connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "fichier";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get the number of clients from the database
function getNumberOfClientsFromDatabase($conn) {
    $sql = "SELECT COUNT(*) as count FROM client";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}

// Call the function to get the number of clients
$numberOfClients = getNumberOfClientsFromDatabase($conn);

// Close the database connection
$conn->close();

// Return the number of clients as JSON
echo json_encode(['numberOfClients' => $numberOfClients]);
?>

