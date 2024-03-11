<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
if(empty($attractie))
{
    $errors[] = "Vul de attractie naam in.";
}
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
if(!is_numeric($capaciteit))
{
    $errors[] = "Vul voor capaciteit een geldig getal in";
}
if(isset($_POST['prioriteit']))
{
    $prioriteit = 0;
}
else
{
    $prioriteit = 1;
}
$melder = $_POST['melder'];
if(empty($melder))
{
    $errors[] = "Vul de melders naam in."
}
$overig = $_POST['overig'];


//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query="INSERT INTO meldingen(attractie, type, capaciteit, prioriteit, melder, overige_info ) VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie"=> $attractie,
    ":type"=> $type,
    ":capaciteit"=> $capaciteit,
    "prioriteit"=> $prioriteit,
    ":melder"=> $melder,
    ":overige_info"=> $overig
 ]);

 header("Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen"); 
 
 //5. Bij errors dumpen 
 if(isset($errors))
 {
    var_dump($errors);die();
}
 