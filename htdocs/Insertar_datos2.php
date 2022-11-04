<?php

//variables
$Bool_1 = isset($_POST['Bool_1']) ? $_POST['Bool_1'] : array();
$Bool_2 = isset($_POST['Bool_2']) ? $_POST['Bool_2'] : array();
$Bool_3 = isset($_POST['Bool_3']) ? $_POST['Bool_3'] : array();
$Bool_4 = isset($_POST['Bool_4']) ? $_POST['Bool_4'] : array();
$Bool_5 = isset($_POST['Bool_5']) ? $_POST['Bool_5'] : array();
$Bool_6 = isset($_POST['Bool_6']) ? $_POST['Bool_6'] : array();
$Bool_7 = isset($_POST['Bool_7']) ? $_POST['Bool_7'] : array();
$Bool_8 = isset($_POST['Bool_8']) ? $_POST['Bool_8'] : array();

//Variables a binario
$value_Bool1 = (boolval($Bool_1) ? '1' : '0')."\n";
$value_Bool2 = (boolval($Bool_2) ? '1' : '0')."\n";
$value_Bool3 = (boolval($Bool_3) ? '1' : '0')."\n";
$value_Bool4 = (boolval($Bool_4) ? '1' : '0')."\n";
$value_Bool5 = (boolval($Bool_5) ? '1' : '0')."\n";
$value_Bool6 = (boolval($Bool_6) ? '1' : '0')."\n";
$value_Bool7 = (boolval($Bool_7) ? '1' : '0')."\n";
$value_Bool8 = (boolval($Bool_8) ? '1' : '0')."\n";


//datos para la conexión de la base de datos
$hostname=$_GET['hostname'];
$datebase=$_GET['datebase'];
$username=$_GET['username'];
$password=$_GET['password'];
$tabla=$_GET['tabla'];	


$Conexion1=new mysqli($hostname, $username, $password, $datebase);

//Confirma que no hubieron errores al conectarse
if($Conexion1->connect_error){
	die("Connection failed: " . $Conexion->connect_error);
}


$sql1 = ("SELECT Alarm_1, Alarm_2, Float_1, Float_2, Float_3, Float_4, Float_5 FROM ".$tabla." ORDER BY id DESC LIMIT 1");

$result = mysqli_query($Conexion1, $sql1);


while ($row = mysqli_fetch_assoc($result)) 
{
    $Alarm_1 = $row["Alarm_1"];
    $Alarm_2 = $row["Alarm_2"];
    $Float_1 = $row["Float_1"];
    $Float_2 = $row["Float_2"];
    $Float_3 = $row["Float_3"];
    $Float_4 = $row["Float_4"];
    $Float_5 = $row["Float_5"];
}

//crea una conexión a la base de datos
$Conexion=new mysqli($hostname, $username, $password, $datebase);

//Confirma que no hubieron errores al conectarse
if($Conexion->connect_error){
    die("Connection failed: " . $Conexion->connect_error);
}

//INSERT INTO `tablatry3` (`id`, `Bool_1`, `Bool_2`, `Bool_3`, `Bool_4`, `Bool_5`, `Bool_6`, `Bool_7`, `Bool_8`, `Alarm_1`, `Alarm_2`, `Float_1`, `Float_2`, `Float_3`, `Float_4`, `Float_5`) VALUES (NULL, '0', '0', '0', '0', '1', '1', '1', '1', '0', '1', '123321', '89987', '0650694')
$sql = "INSERT INTO ".$tabla." (Bool_1, Bool_2, Bool_3, Bool_4, Bool_5, Bool_6, Bool_7, Bool_8, Alarm_1, Alarm_2, Float_1, Float_2, Float_3, Float_4, Float_5) VALUES (".$value_Bool1.", ".$value_Bool2.", ".$value_Bool3.", ".$value_Bool4.", ".$value_Bool5.", ".$value_Bool6.", ".$value_Bool7.", ".$value_Bool8.", ".$Alarm_1.", ".$Alarm_2.", ".$Float_1.", ".$Float_2.", ".$Float_3.", ".$Float_4.", ".$Float_5.")";

if(mysqli_query($Conexion,$sql)){
	echo 'Colmpetado';
}else{
    echo mysqli_error($Conexion);
}	

$Conexion->close();
?>