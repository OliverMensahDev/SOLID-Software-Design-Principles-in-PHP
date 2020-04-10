<?php

namespace app\personnel;

class FullTimeEmployee extends Employee
{
  public function __construct(string $fullName, int $monthlyIncome)
  {
    parent::__construct($fullName, $monthlyIncome);
    parent::setNbHoursPerWeek(40);
  }

  public function requestTimeOff(int $nbDays, Employee $manager)
  {
    /*
    HR business logic for time off for full time employees
     */

    echo "Time off request for full time employee " .
      $this->getFullName() .
      "; Nb days " . $nbDays .
      "; Requested from " . $manager->getFullName();
  }
}
