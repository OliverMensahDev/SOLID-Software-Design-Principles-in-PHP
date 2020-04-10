<?php

declare(strict_types=1);

use app\notification\EmployeeNotifier;
use app\payment\PaymentProcessor;
use app\persistence\EmployeeRepository;
use app\personnel\FullTimeEmployee;
use app\personnel\Intern;
use app\personnel\PartTimeEmployee;
use PHPUnit\Framework\TestCase;

class PaymentProcessorTest extends TestCase
{


    public function testSendPaymentShouldPayAllEmployeeSalaries()
    {
        $employees = [
            new FullTimeEmployee("Anna Smith", 2000),
            new FullTimeEmployee("Billy Leech", 920),
            new PartTimeEmployee("Steve Jones", 800),
            new PartTimeEmployee("Magda Iovan", 920),
            new Intern("John Lee", 300, 10),
            new Intern("Catherine Allison", 500, 15)
        ];
        $employeeRepoMock = $this->createMock(EmployeeRepository::class);
        $employeeRepoMock->method('findAll')
            ->willReturn($employees);

        $employeeNotifierMock = $this->createMock(EmployeeNotifier::class);

        $paymentProcessor = new PaymentProcessor($employeeRepoMock, $employeeNotifierMock);
        $result = $paymentProcessor->sendPayments();
        $this->assertEquals(5440, $result);
    }
}
