<?php 

namespace app\taxes;

use app\personnel\Employee;

class InternTaxCalculator implements TaxCalculator
{

  private const INCOME_TAX_PERCENTAGE = 16;

  public function calculate(Employee $employee)
  {
    $monthlyIncome = $employee->getMonthlyIncome();
    if($monthlyIncome < 350){
      return 0;
    }else {
      return ($monthlyIncome * self::INCOME_TAX_PERCENTAGE) /100;
    }
  }
}