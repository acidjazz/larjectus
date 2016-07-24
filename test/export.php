<?php

include 'vendor/autoload.php';
$data = \larjectus\Objectus::slurp('test/dat/');
echo var_export($data);
