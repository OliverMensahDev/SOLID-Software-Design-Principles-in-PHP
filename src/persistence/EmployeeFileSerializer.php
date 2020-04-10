<?php 
namespace app\persistence;

use app\personnel\Employee;

class EmployeeFileSerializer {
  public function serialize(Employee $employee): string{
    $sb = "### EMPLOYEE RECORD ####";
    $sb .= PHP_EOL;
    $sb .= "NAME: " . $employee->getFullName();
    $sb .= PHP_EOL;
    $sb .= "POSITION: " .  $this->getPosition($employee);
    $sb .= PHP_EOL;
    $sb .= "EMAIL: " .  $employee->getEmail();
    $sb .= PHP_EOL;
    $sb .= "MONTHLY WAGE: ". $employee->getMonthlyIncome();
    return $sb;
  }


  private function getPosition($employee)
  {
      $class = explode( '\\', get_class($employee));
      end( $class );
      $last = key( $class );
      $class = $class[ $last ];
      return $class;
  }
}