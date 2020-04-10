<?php
namespace app\personnel;

class ServiceLicenseAgreement {
    private $minUptimePercent;
    private $problemResolutionTimeDays;

    public function __construct(int $minUptime, int $problemResolutionTimeDays) {
        $this->minUptimePercent = $minUptime;
        $this->problemResolutionTimeDays = $problemResolutionTimeDays;
    }

    public function getminUptimePercent() {
        return $this->minUptimePercent;
    }

    public function getproblemResolutionTimeDays() {
        return $this->problemResolutionTimeDays;
    }
}