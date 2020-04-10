<?php

use app\notification\EmailSender;
use app\payment\PaymentProcessor;
use app\persistence\EmployeeFileSerializer;
use app\persistence\EmployeeRepository;

require_once '../../vendor/autoload.php';


$paymentProcessor = new PaymentProcessor(new EmployeeRepository(new EmployeeFileSerializer()), new EmailSender());
$totalPayments = $paymentProcessor->sendPayments();
 echo "Total payments " .  $totalPayments;