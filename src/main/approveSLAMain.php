<?php

use app\personnel\ServiceLicenseAgreement;
use app\personnel\Subcontractor;

require_once '../../vendor/autoload.php';

//Define SLA
$minTimeOutPercent = 98;
$maxResolutionDays = 2;
$companySLA = new ServiceLicenseAgreement($minTimeOutPercent, $maxResolutionDays);

// Get collaborators from their own source
$subcontractor1 = new Subcontractor(
  "Rebekah Jackson",
  "rebekah-jackson@abc.com",
  3000,
  15
);
$subcontractor2 = new Subcontractor(
  "Harry Fitz",
  "harryfitz@def.com",
  3000,
  15
);
$collaborators = array($subcontractor1, $subcontractor2);
foreach($collaborators as $collaborator){
  $collaborator->approveSLA($companySLA);
}
