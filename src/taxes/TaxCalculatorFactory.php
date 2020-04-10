<?php 

namespace app\taxes;

use app\personnel\Employee;
use RuntimeException;



class TaxCalculatorFactory implements TaxCalculatorFactoryInterface
{
  private $factories = [];
  /**
   * Register a callable that returns an instance of
   * EncoderInterface for the given format.
   *
   * @param string $format
   * @param callable $factory
   */
  public function addTaxCalculatorFactory(string $employee, callable $factory): void
  {
    $this->factories[$employee] = $factory;
  }

  public function create(string $employee): TaxCalculator
  {
    if(empty($this->factories[$employee])) throw new RuntimeException("Invalid Employee Type");
    $factory = $this->factories[$employee];
    $taxCalculator = $factory();
    return $taxCalculator;
  }
}