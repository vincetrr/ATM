<?php
require_once('Change.php');
$array = [
    1 => 25, 
    2 => 74, 
    5 => 14, 
    10 => 18, 
    20 => 0, 
    50 => 5, 
    100 => 30, 
    200 => 15, 
    500 => 8, 
    1000 => 11, 
    2000 => 8, 
    5000 => 5, 
    10000 => 2, 
    20000 => 0,  
    50000 => 0 
];

$change = new Change($array, 1000);
print_r($change->getChange());

$change2 = new Change($array, 699.99);
print_r($change2->getChange());

$change3 = new Change($array, 300);
print_r($change3->getChange());

$change4 = new Change($array, 100);
print_r($change4->getChange());

$change5 = new Change($array, 52.20);
print_r($change5->getChange());

$change6 = new Change($array, 1.121);
print_r($change6->getChange());

$change7 = new Change($array, 0);
print_r($change7->getChange());







