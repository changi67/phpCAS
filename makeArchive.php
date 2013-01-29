<?php

include 'source/CAS.php';

$sVersion = phpCAS::getVersion();

$phar = new Phar('phpcas.'.$sVersion.'.phar', 0, 'phpcas.'.$sVersion.'.phar');
$phar->buildFromDirectory('source');

$stub  = "<?php";
$stub .= "Phar::mapPhar('phpcas.$sVersion.phar');";
$stub .= "require 'phar://phpcas.$sVersion.phar/CAS.php';";
$stub .= "__HALT_COMPILER();";

$phar->setStub($stub);
$phar->compressFiles(Phar::GZ);
$phar->stopBuffering();
