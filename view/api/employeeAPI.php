<?php
include '../connection.php';
$data =  new EventController;
print_r($data->getJsonEmployee()) ;

