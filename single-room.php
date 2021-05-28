<?php 
    require_once __DIR__ . '/database.php';
    
    $room_id = $_GET['id'];

    $sql = "SELECT `room_number`, `floor`, `beds`, `created_at`, `updated_at` FROM `stanze` WHERE stanze.id = " . $room_id . ";";

    $result = $conn->query($sql);

    $room = [];
    if ($result && $result->num_rows > 0) {
        // output data for the row        
        $room = $result->fetch_assoc();      
           
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
    <title>DB Room <?php echo $room['room_number']; ?></title>
</head>
<body>

    <h1>Stanza <?php echo $room['room_number']; ?></h1>

    <?php if(!empty($room)) { ?>
        <ul>        
            <li>
                Piano: <?php echo $room['floor']; ?>
            </li>
            <li>
                Numero letti: <?php echo $room['beds']; ?>
            </li>
            <li>
                Creata il: <?php echo date('d-m-Y', strtotime($room['created_at'])); ?>
            </li>
            <li>
                Ultimo aggiornamento: <?php echo date('d-m-Y', strtotime($room['updated_at'])); ?>
            </li>
        </ul>
    <?php } else { ?>
        <h2>Stanza non presente</h2>
    <?php } ?>
        
</body>
</html>