<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];



//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query="INSERT INTO meldingen(attractie, capaciteit, melder) VALUES(:Pietje, :Puk, :melder)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":Pietje"=> $attractie,
    ":Puk"=> $capaciteit,
    ":melder"=> $melder,
 ]);

 header("Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");