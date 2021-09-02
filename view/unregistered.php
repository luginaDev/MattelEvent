<?php 
session_start();

$recorder =  $_SESSION['username'];

include "connection.php";
$data = new EventController;
$kpk =  $_POST['kpk'];
$event_id =  $_POST['event_id'];



echo $data->unregistered('employee', $kpk, $event_id, $recorder);




 ?>