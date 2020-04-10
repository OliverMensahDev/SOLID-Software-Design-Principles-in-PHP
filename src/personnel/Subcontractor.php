<?php 
namespace app\personnel;

use RuntimeException;

class Subcontractor  
{  
  private $name;
  private $email;
  private $monthlyIncome;
  private $nbHoursPerWeek;
  
  public function __construct(string $name, string $email, int $monthlyIncome, int $nbHoursPerWeek)
  {
    $this->name   = $name;
    $this->email  = $email;
    $this->monthlyIncome = $monthlyIncome;
    $this->nbHoursPerWeek = $nbHoursPerWeek;
  }

  public function approveSLA(ServiceLicenseAgreement $sla)
  {
      $result = false;
      if($sla->getMinUptimePercent() >= 98 && $sla->getProblemResolutionTimeDays() <= 2){
        $result = true;
      }
      echo "SLA approval for {$this->name}: {$result} \n";
      return $result;
  }
}
