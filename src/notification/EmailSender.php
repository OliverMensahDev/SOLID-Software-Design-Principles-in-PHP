<?php

namespace app\notification;

use app\personnel\Employee;
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv::createImmutable("../../");
$dotenv->load();

class EmailSender implements EmployeeNotifier
{
  public function notify(Employee $employee)
  {
    $email = new  PHPMailer(true);
    try {
      $email->isSMTP();
      $email->Host       = 'smtp.zoho.com';
      $email->SMTPAuth   = true;
      $email->Username   = getenv('SMTP_USERNAME');
      $email->Password   = getenv('SMTP_PASSWORD');
      $email->SMTPSecure = "tls";
      $email->Port       = 587;
      $email->setFrom(getenv('SMTP_USERNAME'), 'Admin');
      $email->addAddress($employee->getEmail());
      $email->addReplyTo(getenv('SMTP_USERNAME'));
      $email->isHTML(true);
      $email->Subject = "Employee Pay";
      $sb = "### EMPLOYEE RECORD ####";
      $sb .= PHP_EOL;
      $sb .= "NAME: " . $employee->getFullName();
      $sb .= PHP_EOL;
      $sb .= PHP_EOL;
      $sb .= "EMAIL: " .  $employee->getEmail();
      $sb .= PHP_EOL;
      $sb .= "MONTHLY WAGE: " . $employee->getMonthlyIncome();
      $email->Body = $sb;
      $email->send();
    } catch (Exception $e) {
      die("Message could not be sent. Error: {$email->ErrorInfo}");
    }
  }
}
