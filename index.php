<?php
define("DB_SEVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "db-university");
define("DB_PORT", 3306);


$conn = new mysqli(DB_SEVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

//var_dump($conn);

if( $conn && $conn->connect_error) {
    echo "Error"; $conn->connect_error;
    die();
}


// Query per il db 
$sql = "SELECT id, name FROM departments;";
$result = $conn->query($sql);  //in questo modo mi connetto al db

//var_dump($result);

$departments = [];


//CONTROLLO SE IL RISULTATO C'E' E SE NON E' VUOTO

if ($result && $result->num_rows > 0) {

    //abbiamo dei risultati della query

    while ($row =$result->fetch_assoc()) {
        //var_dump($row);
        $curr_department = new Department($row["id"], $row["name"]);
        $departments[] = $row;
    }

    //var_dump($departments);

}elseif($result) {

    //query è andata a buon fine, però non ci sono risultati

} else {
    //query non è andata a buon fine
    // C'è un errore di sintassi nella query

    echo "Query error";
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista di dipartimenti</h1>

    <?php foreach($departments as $department) { ?>

    <div>
        <h2><?php echo $department->name; ?></h2>
        <a href="single-department.php?id"=<?php echo $department->id; ?> " Vedi</a>
    </div>
    <?php } ?>
</body>
</html>
