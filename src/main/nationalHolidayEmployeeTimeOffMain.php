<?php

use app\logging\ConsoleLogger;
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;
use app\persistence\FileStore;
use app\personnel\FullTimeEmployee;

require_once '../../vendor/autoload.php';

//dependencies 
$repository = new EmployeeRepository(new EmployeeFileSerializer());
$employees = $repository->findAll();
$logger = new ConsoleLogger();

//Define manager
$manager = new FullTimeEmployee("Steve Jackson", 5000);
foreach($employees as $employee){
  $employee->requestTimeOff(1, $manager);
}

