<?php 
    require_once __DIR__ . '/database.php';
    
    $sql = "SELECT `room_number`, `floor` FROM `stanze`";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           var_dump($row);
        }
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }

    $conn->close();
    
?>