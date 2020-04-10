<?php

use app\document\Payslip;
use app\logging\ConsoleLogger;
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;

require_once '../../vendor/autoload.php';

$repository = new EmployeeRepository(new EmployeeFileSerializer());
$employees = $repository->findAll();
$logger = new ConsoleLogger();
$totalTax = 0;
foreach($employees as $employee){
  $payslip = new Payslip($employee , "AUGUST");
  $exportableText = $payslip->toTxt();
  echo $exportableText;
}