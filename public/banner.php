<?php
header('Content-type: image/jpeg');
echo file_get_contents('http://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260');

require '../vendor/autoload.php';

$trafficAnalyzer = new \App\Service\TrafficAnalyzer();
$trafficAnalyzer->analyze();
