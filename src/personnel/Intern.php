<?php 
namespace app\personnel;

class Intern extends Employee {
  public function __construct(string $fullName, int $monthlyIncome, int $nbHours) {
    parent::__construct($fullName, $monthlyIncome);
    parent::setNbHoursPerWeek($nbHours);
  }

  public function requestTimeOff(int $nbDays, Employee $manager)
  {
    /*
    HR business logic for time off for interns
     */

    echo "Time off request for intern " .
      $this->getFullName() .
      "; Nb days " . $nbDays .
      "; Requested from " . $manager->getFullName();
  }
}
