<?php

require_once("config.php");
require_once(__DIR__ . "/vendor/autoload.php");

$controller = new Controller\JogadorController();
$controller->delete();