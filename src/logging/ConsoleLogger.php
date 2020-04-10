<?php 

namespace app\logging;

class ConsoleLogger
{
  public function writeInfo(string $msg)
  {
    echo $msg;
  }

  public function writeError(string $msg, \Exception $e)
  {
    echo "Error: $msg; {$e->getMessage()}";
  }
}
