<?php

use app\logging\ConsoleLogger;
use app\persistence\EmployeeRepository;
use app\persistence\EmployeeFileSerializer;
use app\personnel\FullTimeEmployee;
use app\personnel\Intern;
use app\personnel\PartTimeEmployee;
use app\taxes\FullTimeTaxCalculator;
use app\taxes\InternTaxCalculator;
use app\taxes\PartTimeTaxCalculator;
use app\taxes\TaxCalculatorFactory;

require_once '../../vendor/autoload.php';

$repository = new EmployeeRepository(new EmployeeFileSerializer());
$employees  = $repository->findAll();
$logger     = new ConsoleLogger();

$taxCalculatorFactory = new TaxCalculatorFactory();
$taxCalculatorFactory->addTaxCalculatorFactory(Intern::class, 
function () {
  return new InternTaxCalculator();
});
$taxCalculatorFactory->addTaxCalculatorFactory(FullTimeEmployee::class, 
function () {
  return new FullTimeTaxCalculator();
});
$taxCalculatorFactory->addTaxCalculatorFactory(PartTimeEmployee::class, 
function () {
  return new PartTimeTaxCalculator();
});
  

$totalTax = 0;
foreach($employees as $employee){
  try {
    $taxCalculator = $taxCalculatorFactory->create(get_class($employee));
    $tax = $taxCalculator->calculate($employee);
    $totalTax += $tax;
    $logger->writeInfo("Employee {$employee->getFullName()} tax: {$tax} \n");
  } catch (\Exception $e) {
     $logger->writeError("Error Saving employee", $e);
  }
}

$logger->writeInfo("Total Tax: {$totalTax} \n");
