<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <center>
        <h1>Programacion web actividad 2</h1>
        <h3>Estudiante Winderson Villarreal 28.756.556</h3>
        <form action="#" method="post">
            <label for=""><h3>Numero de cedula: </h3></label>
            <input type="number" min=0 name="cedula" id="">
            <label for=""><h3>Nombre del Alumno</h3></label>
            <input type="text" name="nombre" id="">
            <label for=""><h3>Nota de matematica: </h3></label>
            <input type="number" min=0 max=20 name="mate" id="">
            <label for=""><h3>Nota de fisica:</h3></label>
            <input type="number" name="fisic" min=0 max=20 id="">
            <label for=""><h3>Nota de Programacion: </h3></label>
            <input type="number" name="progra" min=0 max=20 id="">
            <br>
            <br>
            <button type="submit" name="btn">Enviar</button>
        </form>
        
        <center><h3> </h3></center>
    </center> 
    </div>
</body>
</html>

<?php

include "clase.php";
session_start();

if (!isset($_SESSION['arreglo'])) {
    $_SESSION['arreglo'] = [];
}

if (isset($_POST['btn'])) {

    if (isset($_POST['cedula']) && !empty($_POST['cedula']) && isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['mate']) && !empty($_POST['mate']) && isset($_POST['fisic']) && !empty($_POST['fisic']) && isset($_POST['progra']) && !empty($_POST['progra']) ) {

        $student = new clase();

        $student->setCedula($_POST["cedula"]);
        $student->setNombre($_POST["nombre"]);
        $student->setMate($_POST["mate"]);
        $student->setFisic($_POST["fisic"]);
        $student->setProgra($_POST["progra"]);

        array_push($_SESSION['arreglo'],$student);
        promedio();
        
    }else{
        echo "<center><h1>Ingresa todos los datos correspondientes</h1></center>";
    }
}

function promedio(){
    
    //Variables
    $y = count($_SESSION['arreglo']);
    $aproMate =0;
    $reproMate =0;
    $notaAltMATH=0;
    $acumMath=0;
    $promMath=0;

    echo"<br><br><br>";
    echo"<center><h1>Datos generales del curso</h1></center>";
    echo"<br>";
    echo "<center><h1>Datos de Matematica</h1></center>";
    //Nota mas alta de matematica
    for($i=0;$i<$y;$i++)  {
        if($_SESSION['arreglo'][$i]->getMate() > $notaAltMATH){
            $notaAltMATH = $_SESSION['arreglo'][$i]->getMate();
        }
        
    }
    echo "<center><h3>Nota alta de Matematica: </h3></center>". "<center><h3>".$notaAltMATH."</h3></center>";
    //Aprobado y reporbados de math
    if (isset($_SESSION['arreglo'])) {

        for ($i=0; $i<$y ; $i++) { 
            if ($_SESSION['arreglo'][$i]->getMate()>=10) {
                $aproMate++;
            }else{
                $reproMate++;
            }
        }
        echo "<center><h3>Aprobado de Matematica: </h3></center>". "<center><h3>".$aproMate."</h3></center>";
        echo "<center><h3>Reprobado de Matematica: </h3></center>". "<center><h3>".$reproMate."</h3></center>";
    }
    //Promedio de matematica
    for($i=0;$i<$y;$i++){ 
        $acumMath += $_SESSION['arreglo'][$i]->getMate();
    }
    $promMath= ($acumMath / $y);
    echo "<center><h3>Promedio general de Matematica: </h3></center>". "<center><h3>".$promMath."</h3></center>";
    
    echo "<center><h1>Datos de Fisica</h1></center>";
    $aproFisic =0;
    $reproFisic =0;
    $notaAltFisic=0;
    $acumFisic=0;
    $promFisic=0;
    //Nota mas alta de Fisica
    for($i=0;$i<$y;$i++)  {
        if($_SESSION['arreglo'][$i]->getFisic() > $notaAltFisic){
            $notaAltFisic = $_SESSION['arreglo'][$i]->getFisic();
        }
        
    }
    echo "<center><h3>Nota alta de Fisica: </h3></center>". "<center><h3>".$notaAltFisic."</h3></center>";
    //Aprobado o Reprobado de Fisica
    if (isset($_SESSION['arreglo'])) {

        for ($i=0; $i<$y ; $i++) { 
            if ($_SESSION['arreglo'][$i]->getFisic()>=10) {
                $aproFisic++;
            }else{
                $reproFisic++;
            }
        }
        echo "<center><h3>Aprobado de Fisica: </h3></center>". "<center><h3>".$aproFisic."</h3></center>";
        echo "<center><h3>Reprobado de Fisica: </h3></center>". "<center><h3>".$reproFisic."</h3></center>";
    }
    //Promedio de fisica
    for($i=0;$i<$y;$i++){ 
        $acumFisic += $_SESSION['arreglo'][$i]->getFisic();
    }
    $promFisic= ($acumFisic / $y);
    echo "<center><h3>Promedio general de Fisica: </h3></center>". "<center><h3>".$promFisic."</h3></center>";

    echo "<center><h1>Datos de Programacion</h1></center>";
    $aproProgra =0;
    $reproProgra =0;
    $notaAltProgra=0;
    $acumProgra=0;
    $promProgra=0;

    //Nota mas alta Porgramacion
    for($i=0;$i<$y;$i++)  {
        if($_SESSION['arreglo'][$i]->getProgra() > $notaAltProgra){
            $notaAltProgra = $_SESSION['arreglo'][$i]->getFisic();
        }
        
    }
    echo "<center><h3>Nota alta de Porgramacion: </h3></center>". "<center><h3>".$notaAltProgra."</h3></center>";

    //Aprobado y Reprobado
    if (isset($_SESSION['arreglo'])) {

        for ($i=0; $i<$y ; $i++) { 
            if ($_SESSION['arreglo'][$i]->getProgra()>=10) {
                $aproProgra++;
            }else{
                $reproProgra++;
            }
        }
        echo "<center><h3>Aprobado de Programacion: </h3></center>". "<center><h3>".$aproProgra."</h3></center>";
        echo "<center><h3>Reprobado de Porgramacion: </h3></center>". "<center><h3>".$reproProgra."</h3></center>";
    }
    //Promedio Programacion
    for($i=0;$i<$y;$i++){ 
        $acumProgra += $_SESSION['arreglo'][$i]->getProgra();
    }
    $promProgra= ($acumProgra / $y);
    echo "<center><h3>Promedio general de Matematica: </h3></center>". "<center><h3>".$promProgra."</h3></center>";

    echo "<center><h1>Datos generales de las materias</h1></center>";
    $tres=0;
    $dos=0;
    $uno=0;
    //Cuantos aprobaron las tres materias
    if(isset($_SESSION['arreglo'])) {
        for($i=0;$i<$y;$i++) {
            if($_SESSION['arreglo'][$i]->getMate() >= 10 && $_SESSION['arreglo'][$i]->getFisic() >=10 && $_SESSION['arreglo'][$i]->getProgra() >=10){
                $tres++;
            }
        }
        echo "<center><h3>Aprobaron mas de tres materias: </h3></center>". "<center><h3>".$tres."</h3></center>";
    }
    //Cuantos aprobaron con dos materias
    if(isset($_SESSION['arreglo'])) {
        for($i=0;$i<$y;$i++){
            if($_SESSION['arreglo'][$i]->getMate() >= 10 && $_SESSION['arreglo'][$i]->getFisic() >= 10 && $_SESSION['arreglo'][$i]->getProgra() < 10 || $_SESSION['arreglo'][$i]->getMate() >= 10 && $_SESSION['arreglo'][$i]->getProgra() >= 10 && $_SESSION['arreglo'][$i]->getFisic() < 10 || $_SESSION['arreglo'][$i]->getFisic() >= 10 && $_SESSION['arreglo'][$i]->getProgra() >= 10 && $_SESSION['arreglo'][$i]->getMate() < 10) {
                $dos++;
                
            }
    
        }
        echo "<center><h3>Aprobaron dos materias: </h3></center>". "<center><h3>".$dos."</h3></center>";
    }

    //Una materia aprobada
    if(isset($_SESSION['arreglo'])) {//Método para ver cuántos aprobaron una materias
        for($i=0;$i<$y;$i++){
            if($_SESSION['arreglo'][$i]->getMate() >= 10 && $_SESSION['arreglo'][$i]->getFisic() < 10 && $_SESSION['arreglo'][$i]->getProgra() < 10 || $_SESSION['arreglo'][$i]->getMate() < 10 && $_SESSION['arreglo'][$i]->getProgra() >= 10 && $_SESSION['arreglo'][$i]->getFisic() < 10 || $_SESSION['arreglo'][$i]->getFisic() >= 10 && $_SESSION['arreglo'][$i]->getProgra() < 10 && $_SESSION['arreglo'][$i]->getMate() < 10) {
                $uno++;
            }
        }
        echo "<center><h3>Aprobaron una materia: </h3></center>". "<center><h3>".$uno."</h3></center>";

    }
    
    
    
    
    
}


?>