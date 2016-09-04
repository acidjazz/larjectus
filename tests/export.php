<?php

include 'vendor/autoload.php';
$data = \Larjectus\Objectus::slurp('test/dat/');
echo var_export($data);
