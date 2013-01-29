<?php

include 'source/CAS.php';

$sVersion = phpCAS::getVersion();

$phar = new Phar('phpcas.'.$sVersion.'.phar', 0, 'phpcas.'.$sVersion.'.phar');
$phar->buildFromDirectory('source');

$stub  = "<?php".PHP_EOL;
$stub .= "Phar::mapPhar('phpcas.$sVersion.phar');".PHP_EOL;
$stub .= "require 'phar://phpcas.$sVersion.phar/CAS.php';".PHP_EOL;
$stub .= "__HALT_COMPILER();".PHP_EOL;

$phar->setStub($stub);
$phar->compressFiles(Phar::GZ);
$phar->stopBuffering();
