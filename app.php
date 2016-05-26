<?php // This file loads any required packages and plugins before WordPress boots

use CupOfTea\WordPress\Application;

/**
 * Composer
 */
$composer = require 'vendor/autoload.php';

/**
 * Application
 */
$app = new Application(__DIR__, $composer);

$app->singleton(
	'Illuminate\Contracts\Debug\ExceptionHandler',
	'CupOfTea\WordPress\Exception\Handler'
);
