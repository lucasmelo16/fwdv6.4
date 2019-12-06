<?php

include __DIR__.'/../control/JogosControl.php';

$jogosControl = new JogosControl();

header('Content-Type: application/json');
echo json_encode($jogosControl->findAll());
// foreach($jogosControl->findAll() as $valor){
// 	echo json_encode($valor);
// }

?>