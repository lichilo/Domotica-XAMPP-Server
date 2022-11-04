<?php
$Float_1 = $_GET['Float_1'];
$Float_2 = $_GET['Float_2'];
$Float_3 = $_GET['Float_3'];


$Variable = $_GET['Var'];
$Valor = $_GET['Val'];

//los datos del servidor
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


//Insercion de datos
$consulta = "UPDATE ".$tabla." SET Float_1=".$Float_1.", Float_2 =".$Float_2.", Float_3 =".$Float_3." ORDER BY id DESC LIMIT 1";


if(!mysqli_query($Conexion,$consulta)){
    echo mysqli_error($Conexion);
}

usleep(20);


//crea una conexión a la base de datos
$Conexion2=new mysqli($hostname, $username, $password, $datebase);

//Confirma que no hubieron errores al conectarse
if($Conexion2->connect_error){
    die("Connection failed: " . $Conexion->connect_error);
}

$consulta2 = "UPDATE `tablatry3` SET ".$Variable."= ".$Valor." ORDER BY `id` DESC LIMIT 1";//"".$Variable."=".$Valor."

if(!mysqli_query($Conexion2,$consulta2)){
    echo mysqli_error($Conexion2);
}

$query = "SELECT DISTINCT Bool_1, Bool_2, Bool_3, Bool_4, Bool_5, Bool_6, Bool_7, Bool_8 FROM ".$tabla." ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($Conexion, $query);
    $number_of_rows = mysqli_num_rows($result);

    $response = array();

    if($number_of_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }

if(!mysqli_query($Conexion,$query)){
    echo mysqli_error($Conexion);
}

//header('Content-Type: application/json');
echo json_encode($response);
mysqli_close($Conexion);
mysqli_close($Conexion2);
//
?>