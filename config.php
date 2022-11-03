<?php

require 'vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;

const CONTROLLERS_DIR = __DIR__ . "/application/controllers/";
const CORE_DIR = __DIR__ . "/application/core/";
const PROJECT_DIR = __DIR__;
const APPLICATION_DIR = __DIR__ . "/application/";

$dotenv = new Dotenv();
$dotenv->usePutenv(true)->bootEnv(__DIR__ . "/.env");
