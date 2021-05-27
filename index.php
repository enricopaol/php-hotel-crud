<?php 
    require_once __DIR__ . '/database.php';
    
    $sql = "SELECT `id`, `room_number`, `floor` FROM `stanze`";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // output data of each row
        $rows = [];
        while($row = $result->fetch_assoc()) {           
           $rows[] = $row;
        }
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }    

    $conn->close();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Rooms</title>
</head>
<body>

    <h1>Stanze:</h1>

    <ul>
        <?php foreach($rows as $room) { ?>
            <li style="margin-bottom: 20px;">
                Numero stanza: <?php echo $room['room_number']; ?><br>
                Piano: <?php echo $room['floor']; ?> <br>
                <a href="/php-hotel-crud/single-room.php?id=<?php echo $room['id']; ?>">Vedi dettagli stanza</a>
            </li>
        <?php } ?>        
    </ul>
    
    
</body>
</html>

