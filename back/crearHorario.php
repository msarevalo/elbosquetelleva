<?php

include ('conection.php');

$dia = null;
$hora = null;
$servicio = null;
$orden = null;

if (isset($_SESSION['idHorario'])){
    $id = $_SESSION['idHorario'];
}
if (isset($_POST['dias'])){
    $dia = $_POST['dias'];
    if ($dia=="Lunes"){
        $orden = 1;
    }else{
        if ($dia=="Martes"){
            $orden = 2;
        }else{
            if ($dia=="Miercoles"){
                $orden = 3;
            }else{
                if ($orden=="Jueves"){
                    $orden = 4;
                }else{
                    $orden = 5;
                }
            }
        }
    }
}
if (isset($_POST['hora'])){
    $hora = $_POST['hora'];
}
if (isset($_POST['tipo'])){
    $servicio = $_POST['tipo'];
}

$consulta = mysqli_query($con,"INSERT INTO `horarios` (`dia`, `Hora`, `servicio`, `orden`) VALUES ('" . $dia ."', '" . $hora ."', '" . $servicio . "', '" . $orden . "');");

if ($consulta){
    echo "<script>alert('Se creó el horario con exito'); window.location.href='../views/horarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../views/horarios-admin.php'</script>";
}