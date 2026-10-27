
<?php

header("Content-Type: application/json; charset=UTF-8");

// Connect to MySQL database
$conn = new mysqli("localhost", "root", "", "book_db");

// Check database connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        "error" => "Database connection failed"
    ]);
    exit;
}

// Retrieve all books
$sql = "SELECT id, title, author FROM books";
$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode([
        "error" => "Unable to retrieve books"
    ]);
    $conn->close();
    exit;
}

// Store book records in an array
$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

// Convert PHP array into JSON
echo json_encode($books);

// Close database connection
$conn->close();

?>
