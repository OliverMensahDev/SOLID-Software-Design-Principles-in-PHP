<?php

namespace app\taxes;

use app\personnel\Employee;

interface TaxCalculatorFactoryInterface
{
  public function create(string $employee): TaxCalculator;
}
