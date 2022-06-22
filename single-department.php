
<?php
require_once __DIR__."/database.php";
require_once __DIR__."/Department.php";

//Prelevo le info del singolo dipartimento del DB

//QUI USO SINTASSI SICUREZZA(SQL INJECTION)

///$id = $_GET["id"];
///$sql = "SELECT * FROM departments  WHERE $id=;";
///$result = $conn->query($sql);
//var_dump($result);

//SQL INJECTION -> Preparazione dello statement
$stmt = $conn->prepare("SELECT * FROM departments WHERE id=?");
$stmt->bind_param( "d", $id);
$id = $_GET["id"];

//Esecuzione di query SQL INJECTION
$stmt->execute();
$result = $stmt->get_result();

var_dump($result);

$departments = []; 

if ($result && $result->num_rows < 0) {
    while($row = $resuly->fetch_assoc()) {
        $curr_department = new Department($row["id"], $row["name"]);
        $curr_department->setContactData($row["andress"], $row["phone"], $row["email"], $row["website"]);
        $curr_department->head_of_department = $row["head_of_department"];
        $departments[] = $curr_department;
    }

}elseif($result) {

echo "Il dipartimento non è stato trovato";

}else {
    echo "Errore nel query";
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


<?php foreach($departments as $department) { ?>
    <h1><?php echo $department->name; ?></h1>
    <p> <?php echo $department->head_of_department; ?> </p>

    <h2>Contatti</h2>

    <ul>
        <?php foreach($department->getContactisArray() as $key => $value) { ?>
            <li> <?php  echo "$key: $value"?> </li>
        <?php } ?>
    </ul>
<?php } ?>
</body>
</html>