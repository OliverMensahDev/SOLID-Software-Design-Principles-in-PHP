<?php 

namespace app\taxes;

use app\personnel\Employee;

interface TaxCalculator
{
 public function calculate(Employee $employee);
}