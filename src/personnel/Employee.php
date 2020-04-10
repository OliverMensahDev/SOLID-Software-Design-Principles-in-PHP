<?php 
namespace app\personnel;

abstract class Employee 
{
  private $firstName;
  private $lastName;
  private $monthlyIncome;
  private $nbHoursPerWeek;
  
  public function __construct(string $fullName, string $monthlyIncome)
  {
    $this->setMonthlyIncome($monthlyIncome);
    $names = explode(" ", $fullName);
    $this->firstName = $names[0];
    $this->lastName = $names[1];
  }
  
  public function getEmail(): string {
    // return $this->firstName . "." .$this->lastName . "@globomanticshr.com";
    return "olivermensah96@gmail.com";

  }
  public abstract function requestTimeOff(int $nbDays, Employee $manager);

    public function __toString() {
        return $this->firstName. " ". $this->lastName . " - " . $this->monthlyIncome;
    }

    public function getMonthlyIncome(): int {
        return $this->monthlyIncome;
    }

    public function setMonthlyIncome(int $monthlyIncome):void {
        if($monthlyIncome < 0){
            throw new \Exception("Income must be positive");
        }
        $this->monthlyIncome = $monthlyIncome;
    }

    public function getNbHoursPerWeek(): int {
        return $this->nbHoursPerWeek;
    }

    public function setNbHoursPerWeek(int $nbHoursPerWeek): void {
        if($nbHoursPerWeek <= 0){
            throw new \Exception("Income must be positive");
        }
        $this->nbHoursPerWeek = $nbHoursPerWeek;
    }

    public function getFullName(): string{
        return $this->firstName . " " . $this->lastName;
    }
}
