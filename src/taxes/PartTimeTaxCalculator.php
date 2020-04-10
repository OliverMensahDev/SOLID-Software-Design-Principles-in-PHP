<?php 

namespace app\taxes;

use app\personnel\Employee;

class PartTimeTaxCalculator implements TaxCalculator
{

  private const RETIREMENT_TAX_PERCENTAGE = 5;
  private const INCOME_TAX_PERCENTAGE = 16;
  private const BASE_HEALTH_INSURANCE = 100;

  public function calculate(Employee $employee)
  {
    return self::BASE_HEALTH_INSURANCE + ($employee->getMonthlyIncome() * self::RETIREMENT_TAX_PERCENTAGE)/ 100 +
    ($employee->getMonthlyIncome() * self::INCOME_TAX_PERCENTAGE) / 100 ;
  }
}