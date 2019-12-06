<?php

include __DIR__.'/../control/JogosControl.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);

//echo $obj->nome;
$id = $obj->id;

    if(!empty($data)){	

        $jogosControl = new JogosControl();
        $jogosControl->delete($obj,$id);
        header('Location:listar.php');
}

?>