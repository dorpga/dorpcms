<?php
  require_once(__DIR__.'/../vendor/autoload.php');
  use MyCLabs\Enum\Enum;

  class Errors extends Enum {
    const Unknown = 0;
    const LoaderObjectNotFound = 1;
  }
?>
