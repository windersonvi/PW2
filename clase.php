<?php
class clase{ 
 
private $nombre = ""; 
private $cedula = 0; 
private $mate = 0; 
private $fisic = 0; 
private $progra = 0; 

public function getNombre(){ 
    return $this->nombre; 
} 

public function setNombre($nombre){ 
    $this->nombre=$nombre; 
} 

public function getCedula(){
    return $this->cedula;
}

public function setCedula($cedula){ 
    $this->cedula=$cedula; 
}

public function getMate(){
    return $this->mate;
}

public function setMate($mate){ 
    $this->mate=$mate; 
}

public function getFisic(){
    return $this->fisic;
}

public function setFisic($fisic){ 
    $this->fisic=$fisic; 
} 

public function getProgra(){
    return $this->progra;
}

public function setProgra($progra){ 
    $this->progra=$progra; 
} 
}
?>