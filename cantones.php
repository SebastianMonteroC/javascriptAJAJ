<?php
$request = json_decode(file_get_contents('php://input'));
switch($request->id) {
    case 1:
        $cantones = array(
            array('id' => 1,'nombre' => 'San José'),
            array('id' => 2,'nombre' => 'Escazú')
        );
        break;
    case 2:
        $cantones = array(
            array('id' => 3,'nombre' => 'Heredia'),
            array('id' => 4,'nombre' => 'Santo Domingo')
        );
        break;
    default:
        $cantones = array();
        break;
}
echo json_encode($cantones);
?>