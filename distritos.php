<?php
$request = json_decode(file_get_contents('php://input'));
switch($request->id) {
case 1:
$distritos = array(
array('id' => 1, 'nombre' => 'Pavas'),
array('id' => 2, 'nombre' => 'Hatillo')
);
break;
case 2:
$distritos = array(
array('id' => 1, 'nombre' => 'San Antonio'),
array('id' => 2, 'nombre' => 'San Rafael')
);
break;
case 3:
$distritos = array(
array('id' => 1, 'nombre' => 'Ulloa'),
array('id' => 2, 'nombre' => 'Mercedes')
);
break;
case 4:
$distritos = array(
array('id' => 1, 'nombre' => 'San Miguel'),
array('id' => 2, 'nombre' => 'Santo Tomás')
);
break;
default:
$distritos = array();
break;
}
echo json_encode($distritos);
?>