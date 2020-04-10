<?php 

namespace app\taxes;

use app\personnel\Employee;

class FullTimeTaxCalculator implements TaxCalculator
{

  private const RETIREMENT_TAX_PERCENTAGE = 10;
  private const INCOME_TAX_PERCENTAGE = 16;
  private const BASE_HEALTH_INSURANCE = 100;

  public function calculate(Employee $employee)
  {    
    $monthlyIncome = $employee->getMonthlyIncome();
    return self::BASE_HEALTH_INSURANCE + ($monthlyIncome * self::RETIREMENT_TAX_PERCENTAGE)/ 100 +
    ($monthlyIncome * self::INCOME_TAX_PERCENTAGE) / 100 ;
  }
}