<?php 
include 'connection.php';

$event_id =$_GET['event_id'];
$kpk      =$_GET['kpk'];


$data =  new EventController();
 echo $data->getJsonEmployeeWhere($event_id, $kpk);

 ?>