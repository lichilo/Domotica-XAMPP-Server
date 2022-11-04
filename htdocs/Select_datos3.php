<?php

//datos para la conexión de la base de datos
$hostname=$_GET['hostname'];
$datebase=$_GET['datebase'];
$username=$_GET['username'];
$password=$_GET['password'];    
$tabla=$_GET['tabla'];  

//crea una conexión a la base de datos
$Conexion=new mysqli($hostname, $username, $password, $datebase);

//Confirma que no hubieron errores al conectarse
if($Conexion->connect_error){
    echo "connect_error, error 404";
    die($Conexion->connect_error);
}

    $query = "SELECT DISTINCT Float_1, Float_2, Float_3, Float_4, Float_5 FROM ".$tabla." ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($Conexion, $query);  //<--------change
    $number_of_rows = mysqli_num_rows($result);

    $response = array();

    if($number_of_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode(array($response));
    mysqli_close($Conexion);  //<--------change

?>