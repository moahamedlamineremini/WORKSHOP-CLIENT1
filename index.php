<?php
require_once __DIR__.'symfony-app/public/vendor/autoload.php';

$kernel = new App\Kernel();
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();

?>