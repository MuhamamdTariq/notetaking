<?php
function connection(){
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "notes";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn; // Return the connection object
}

$connect = connection();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DATA1 = file_get_contents('php://input');
    $DATA = json_decode($DATA1, true);
    $connection = connection();
    if ($DATA && isset($DATA['note1'])) {
        $value = $DATA['note1'];
        $stmt = $connection->prepare("DELETE FROM note WHERE note_text = ?");
        if (!$stmt) {
            die("Prepare failed: (" . $connection->errno . ") " . $connection->error);
        }
        $stmt->bind_param("s", $value);
        $stmt->execute();
        if ($stmt->errno) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $stmt->close();
        echo "Value received from AJAX request: " . $value;
    } elseif ($DATA && isset($DATA['note'])) {
        $value = $DATA['note'];
        $stmt = $connection->prepare("INSERT INTO note (note_text) VALUES (?)");
        if (!$stmt) {   
            die("Prepare failed: (" . $connection->errno . ") " . $connection->error);
        }
        $stmt->bind_param("s", $value);
        $stmt->execute();
        if ($stmt->errno) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $stmt->close();
    }

    $connection->close();
}


function update(){
    
    $connect = connection();
        if ($connect) {
    
            // SQL query
            $sql = "SELECT note_text FROM note";
        
            // Execute the query
            $result = $connect->query($sql);
        
            // Check if the query was successful
            if ($result) {  
                // Fetch and output the data
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" .$row['note_text'] . "</li>";
                }
            } else {
                echo "Error executing query: " . $connect->error;
            }
        
            // Close the connection
        } else {
            echo "Failed to connect to the database.";
        }
    
        $connect->close();
    }

