<?php 
namespace app\personnel;

class PartTimeEmployee extends Employee {
    public function __construct(string $fullName, int $monthlyIncome) {
        parent::__construct($fullName, $monthlyIncome);
        parent::setNbHoursPerWeek(20);
    }
    public function requestTimeOff(int $nbDays, Employee $manager)
    {
      /*
      HR business logic for time off for part time employees
       */
  
      echo "Time off request for part time employee " .
        $this->getFullName() .
        "; Nb days " . $nbDays .
        "; Requested from " . $manager->getFullName();
    }
}