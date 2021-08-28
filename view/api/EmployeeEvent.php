<?php 
include '../connection.php';

$event_id =$_GET['event_id'];
$kpk      =$_GET['kpk'];


$data =  new EventController();
print($data->getJsonEmployeeWhere($event_id, $kpk));

 ?>